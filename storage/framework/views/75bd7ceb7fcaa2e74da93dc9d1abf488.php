

<?php $__env->startSection('body'); ?>
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-flex">
        <div class="page-title pb-3 pt-3">
            <h5 class="mb-0">Order Product Details</h5>
        </div>
    </div>
</div>

<div class="content">
    <div class="card">
        <div class="card-body">
            <h6>Order ID: <?php echo e($orderProduct->order_id); ?></h6>
            <h6>Product ID: <?php echo e($orderProduct->product_id); ?></h6>
            <h6>Quantity: <?php echo e($orderProduct->quantity); ?></h6>
            <h6>Price: ₹<?php echo e(number_format($orderProduct->price, 2)); ?></h6>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\mark11\resources\views/admin/orderproducts/show.blade.php ENDPATH**/ ?>