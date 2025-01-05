

<?php $__env->startSection('body'); ?>

<div class="container mt-5">
    <h1>Order Details</h1>
    <table class="table table-bordered">
        <tr>
            <th>Order Number</th>
            <td><?php echo e($order->order_number); ?></td>
        </tr>
        <tr>
            <th>Customer Name</th>
            <td><?php echo e($order->shipping_name); ?></td>
        </tr>
        <tr>
            <th>Total Amount</th>
            <td>₹<?php echo e(number_format($order->total_amount, 2)); ?></td>
        </tr>
        <tr>
            <th>Status</th>
            <td><?php echo e(ucfirst($order->status)); ?></td>
        </tr>
        <tr>
            <th>Payment Method</th>
            <td><?php echo e($order->payment->payment_gateway ?? 'N/A'); ?></td>
        </tr>
        <tr>
            <th>Payment ID</th>
            <td><?php echo e($order->payment->payment_id ?? 'N/A'); ?></td>
        </tr>
        <tr>
            <th>Order Date</th>
            <td><?php echo e($order->created_at->format('d-m-Y')); ?></td>
        </tr>
    </table>

    <h3>Order Products</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $order->orderProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($product->name); ?></td>
                <td><?php echo e($product->pivot->quantity); ?></td>
                <td>₹<?php echo e(number_format($product->pivot->price, 2)); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\mark11\resources\views/admin/order/orders.blade.php ENDPATH**/ ?>