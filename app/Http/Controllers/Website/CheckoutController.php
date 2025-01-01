<?php

// app/Http/Controllers/CheckoutController.php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderPayment;

class CheckoutController extends Controller
{
    public function showCheckoutForm()
    {
        $user = Auth::user(); // Get the authenticated user
        return view('website.checkout', compact('user')); // Pass the user data to the view
    }

    public function verifyPayment(Request $request)
    {
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        try {
            $attributes = [

                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_signature' => $request->razorpay_signature,
            ];

            $api->utility->verifyPaymentSignature($attributes);

            $order = OrderPayment::where('razorpay_order_id', $request->razorpay_order_id)->first();
            $order->update([
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_signature' => $request->razorpay_signature,
            ]);

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function createOrder(Request $request)
    {
        // Validate the request if needed
        $validated = $request->validate([
            'amount' => 'required|numeric|min:1',  // Ensure the amount is valid
        ]);

        $amount = $request->input('amount') * 100; // Convert to paise
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        try {
            // Create the Razorpay order
            $order = $api->order->create([
                'amount' => $amount,
                'currency' => 'INR',
                'payment_capture' => 1,  // Automatically capture the payment
            ]);

            // Return the response with the order details
            return response()->json([
                'order_id' => $order->id,
                'amount' => $amount,
                'currency' => 'INR',
            ]);
        } catch (\Exception $e) {
            // Return error response in case of failure
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);  // Ensure the correct status code is returned
        }
    }
    public function paymentSuccess(Request $request)
    {
        // Log the incoming request to check if payment data is being received correctly
        \Log::info('Payment Success Request:', $request->all());

        // Get user information
        $user = Auth::user();
        \Log::info('Authenticated User:', $user);

        // Get the order details from Razorpay
        $paymentDetails = $request->only(['razorpay_payment_id', 'razorpay_order_id', 'razorpay_signature']);
        \Log::info('Payment Details:', $paymentDetails);

        // Get cart items from the session
        $cartItems = session('cart');
        \Log::info('Cart Items:', $cartItems);

        // Get shipping details from the request
        return $shippingDetails = $request->only([
            'first_name',
            'last_name',
            'street_address',
            'apt_suite',
            'city',
            'state',
            'zip_code',
            'country',
            'email',
            'phone',
            'payment-amount'
        ]);
        \Log::info('Shipping Details:', $shippingDetails);

        // Calculate the total price from cart items
        $totalPrice = collect($cartItems)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });
        \Log::info('Total Price from Cart:', $totalPrice);

        // Add shipping cost if applicable
        $shippingCost = $request->input('shippingCost', 0);
        $finalAmount = ($totalPrice + $shippingCost) * 100; // Convert to paise (or cents) for Razorpay
        \Log::info('Final Amount (Total + Shipping):', $finalAmount);

        // Verify the payment amount
        $paymentAmount = $request->input('paymentAmount') * 100; // Convert to paise (or cents) for Razorpay
        \Log::info('Payment Amount Received:', $paymentAmount);

        if ($paymentAmount !== $finalAmount) {
            \Log::warning('Payment Amount Mismatch', [
                'expected' => $finalAmount,
                'received' => $paymentAmount,
            ]);
            return response()->json(['success' => false, 'message' => 'Payment amount mismatch. Please try again.']);
        }

        // Save the order payment
        return $orderPayment = OrderPayment::create([
            'user_id' => $user->id,
            'first_name' => $shippingDetails['first_name'],
            'last_name' => $shippingDetails['last_name'],
            'street_address' => $shippingDetails['street_address'],
            'apt_suite' => $shippingDetails['apt_suite'] ?? null,
            'city' => $shippingDetails['city'],
            'state' => $shippingDetails['state'],
            'zip_code' => $shippingDetails['zip_code'],
            'country' => $shippingDetails['country'],
            'email' => $shippingDetails['email'],
            'phone' => $shippingDetails['phone'],
            'billing_same_as_shipping' => $request->has('billing_same_as_shipping'),
            'cart_items' => json_encode($cartItems),
            'total_price' => $totalPrice + $shippingCost,
            'razorpay_payment_id' => $paymentDetails['razorpay_payment_id'],
            'razorpay_order_id' => $paymentDetails['razorpay_order_id'],
            'razorpay_signature' => $paymentDetails['razorpay_signature'],
        ]);

        if ($orderPayment) {
            \Log::info('Order placed successfully:', $orderPayment);
            return response()->json(['success' => true, 'message' => 'Order placed successfully!']);
        } else {
            \Log::error('Failed to place order');
            return response()->json(['success' => false, 'message' => 'Failed to place order. Please try again.']);
        }
    }
}
