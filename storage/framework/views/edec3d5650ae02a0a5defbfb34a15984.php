

<?php $__env->startSection('body'); ?>
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-flex">
        <div class="page-title pb-3 pt-3">
            <h5 class="mb-0">Payment Details</h5>
        </div>
    </div>
</div>

<div class="content">
    <div class="card">
        <div class="card-body">
            <h6>Order ID: <?php echo e($payment->order_id); ?></h6>
            <h6>Payment Gateway: <?php echo e($payment->payment_gateway); ?></h6>
            <h6>Payment ID: <?php echo e($payment->payment_id); ?></h6>
            <h6>Amount: ₹<?php echo e(number_format($payment->amount, 2)); ?></h6>
            <h6>Status: <?php echo e($payment->status); ?></h6>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\mark11\resources\views/admin/payment/show.blade.php ENDPATH**/ ?>