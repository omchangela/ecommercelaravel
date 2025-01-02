<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Payment;
use Illuminate\Http\Request;
use Razorpay\Api\Api;

class PaymentController extends Controller
{
    public function createOrder(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'total_amount' => 'required|numeric',
            'order_products' => 'required|array',
            'order_products.*.product_id' => 'required|exists:products,id',
            'order_products.*.quantity' => 'required|numeric|min:1',
            'order_products.*.price' => 'required|numeric',
        ]);

        // Create an order in the database
        $order = Order::create([
            'user_id' => auth()->id(),
            'order_number' => 'ORD-' . strtoupper(uniqid()),
            'total_amount' => $request->total_amount,
            'status' => 'pending',
        ]);

        // Insert order products
        foreach ($request->order_products as $product) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $product['product_id'],
                'quantity' => $product['quantity'],
                'price' => $product['price'],
            ]);
        }

        // Initialize Razorpay API
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $orderData = [
            'receipt'         => $order->order_number,
            'amount'          => $order->total_amount * 100, // Convert to paise
            'currency'        => 'INR',
            'payment_capture' => 1,
        ];

        try {
            $razorpayOrder = $api->order->create($orderData);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error creating Razorpay order: ' . $e->getMessage()]);
        }

        // Save the Razorpay order ID in the database
        $order->payment_id = $razorpayOrder->id;
        $order->save();

        return response()->json([
            'order_id' => $razorpayOrder->id,
            'amount'   => $order->total_amount * 100, // in paise
            'key'      => env('RAZORPAY_KEY'),
        ]);
    }

    public function paymentCallback(Request $request)
{
    $paymentId = $request->input('razorpay_payment_id');
    $orderId = $request->input('razorpay_order_id');
    $signature = $request->input('razorpay_signature');

    // Verify payment signature
    $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
    $attributes = [
        'razorpay_order_id' => $orderId,
        'razorpay_payment_id' => $paymentId,
        'razorpay_signature' => $signature,
    ];

    try {
        // Verify payment signature using Razorpay API
        $api->utility->verifyPaymentSignature($attributes);

        // Retrieve the order from the database using payment_id
        $order = Order::where('payment_id', $orderId)->first();

        if (!$order) {
            return redirect()->route('checkout.failure')->with('error', 'Invalid order.');
        }

        // Check if the payment entry already exists to avoid duplicates
        $existingPayment = Payment::where('payment_id', $paymentId)->first();
        if ($existingPayment) {
            // If payment entry already exists, do not proceed
            return redirect()->route('checkout.success', ['order' => $order->id]);
        }

        // Check if the order is already marked as paid to avoid updating multiple times
        if ($order->status !== 'paid') {
            // Update the order status to 'paid' if it hasn't been paid already
            $order->status = 'paid';
            $order->save();

            // Record payment success in the Payment table
            Payment::create([
                'order_id' => $order->id,
                'payment_gateway' => 'Razorpay',
                'payment_id' => $paymentId,
                'amount' => $order->total_amount,
                'status' => 'success',
            ]);

            // Redirect to the payment status page with success
            return redirect()->route('payment.status')->with([
                'status' => 'success',
                'order_id' => $order->order_number
            ]);
        }

    } catch (\Exception $e) {
        // Handle payment failure or exception
        $order = Order::where('payment_id', $orderId)->first();

        if ($order && $order->status !== 'failed') {
            // If order status isn't failed already, update it
            $order->status = 'failed';
            $order->save();

            // Record payment failure in the Payment table
            Payment::create([
                'order_id' => $order->id,
                'payment_gateway' => 'Razorpay',
                'payment_id' => $paymentId,
                'amount' => $order->total_amount,
                'status' => 'failed',
            ]);
        }

        // Redirect to the payment status page with failure
        return redirect()->route('payment.status')->with([
            'status' => 'failure',
        ]);
    }
}

}
