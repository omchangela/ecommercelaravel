<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Payment;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    public function createOrder(Request $request)
{
    // return $request->all();
    // Validate the incoming request data

    $validator = Validator::make($request->all(), [
       'total_amount' => 'required',
        'order_products' => 'required',
        'shipping_name' => 'required',
        'shipping_address' => 'required',
        'shipping_city' => 'required',
        'shipping_state' => 'required',
        'shipping_zip' => 'required',
        'shipping_country' => 'required',
    ]);

    

    if ($validator->fails()) {
        return response()->json([
            'error' => 'Validation failed',
            'messages' => $validator->errors(),
        ], 400); // Or other status codes if necessary
    }
    // return "789";
    // Calculate the total order amount
    $totalAmount = collect($request->order_products)->sum(function($product) {
        return $product['price'] * $product['quantity'];
    });

    // Create an order in the database
    $order = Order::create([
        'user_id' => auth()->id(),
        'order_number' => 'ORD-' . strtoupper(uniqid()),
        'total_amount' => $totalAmount,
        'status' => 'pending',
        'shipping_name' => $request->shipping_name,
        'shipping_address' => $request->shipping_address,
        'shipping_city' => $request->shipping_city,
        'shipping_state' => $request->shipping_state,
        'shipping_zip' => $request->shipping_zip,
        'shipping_country' => $request->shipping_country,
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
        'receipt' => $order->order_number,
        'amount' => $totalAmount * 100, // Convert to paise
        'currency' => 'INR',
        'payment_capture' => 1,
    ];

    try {
        $razorpayOrder = $api->order->create($orderData);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Error creating Razorpay order: ' . $e->getMessage()], 400);
    }

    // Save the Razorpay order ID in the database
    $order->payment_id = $razorpayOrder->id;
    $order->save();

    // Return the order details with a 200 OK status code
    return response()->json([
        'order_id' => $razorpayOrder->id,
        'amount' => $totalAmount * 100, // in paise
        'key' => env('RAZORPAY_KEY'),
    ], 200);
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
