@extends('website.layouts.app')
@section('body')
<br><br><br><br>
<div class="container">
    <h2>Checkout</h2>
    <ul>
        @foreach(session('cartItems', []) as $item)
            <li>{{ $item['name'] }} - Quantity: {{ $item['quantity'] }} - Price: ₹{{ $item['price'] }}</li>
        @endforeach
    </ul>
    <p>Total Amount: ₹{{ session('totalAmount', 0) }}</p>
    <button id="pay-button" class="btn btn-dark">Pay Now</button>
</div>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    document.getElementById('pay-button').onclick = function (e) {
        e.preventDefault();

        // Get cart items details (ID, price, quantity)
        const cartItems = @json($cartItems); // Pass cart items from Blade to JavaScript

        const orderProducts = cartItems.map(item => ({
            product_id: item.id,
            quantity: item.quantity,
            price: item.price
        }));

        // Calculate total amount
        const totalAmount = cartItems.reduce((total, item) => total + (item.price * item.quantity), 0);

        // Create order and send data
        fetch('/create-order', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({ 
                total_amount: totalAmount,
                order_products: orderProducts // Send order product details
            })
        })
        .then(response => response.json())
        .then(data => {
            var options = {
                key: data.key,
                amount: data.amount,
                order_id: data.order_id,
                handler: function (response) {
                    fetch('/payment-callback', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: JSON.stringify(response)
                    });
                }
            };
            var rzp = new Razorpay(options);
            rzp.open();
        });
    };
</script>

@endsection
