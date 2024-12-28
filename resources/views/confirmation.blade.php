<!-- resources/views/order-confirmation.blade.php -->

@extends('website.layouts.app')

@section('body')

<div class="container">
    <h2>Order Confirmation</h2>
    <p>Thank you for your order!</p>
    <p>Your order ID is: {{ $order->id }}</p>
    <p>Total Price: ₹{{ number_format($order->total_price, 2) }}</p>

    <h3>Shipping Details</h3>
    <p>{{ $order->shipping->address }}</p>
    <p>{{ $order->shipping->city }}, {{ $order->shipping->state }}</p>
    <p>{{ $order->shipping->postal_code }} - {{ $order->shipping->country }}</p>

    <p>Status: {{ ucfirst($order->status) }}</p>
</div>
@endsection

