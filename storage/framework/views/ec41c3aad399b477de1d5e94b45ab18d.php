
<?php $__env->startSection('body'); ?>
<br><br><br><br>
<div class="container">
    <h2>Checkout</h2>
    <ul>
        <?php $__currentLoopData = session('cartItems', []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($item['name']); ?> - Quantity: <?php echo e($item['quantity']); ?> - Price: ₹<?php echo e($item['price']); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <p>Total Amount: ₹<?php echo e(session('totalAmount', 0)); ?></p>
    <button id="pay-button" class="btn btn-dark">Pay Now</button>
</div>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    document.getElementById('pay-button').onclick = function (e) {
        e.preventDefault();

        // Get cart items details (ID, price, quantity)
        const cartItems = <?php echo json_encode($cartItems, 15, 512) ?>; // Pass cart items from Blade to JavaScript

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
                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
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
                            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\mark11\resources\views/checkout.blade.php ENDPATH**/ ?>