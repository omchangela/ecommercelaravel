
<?php $__env->startSection('body'); ?>
<br><br><br><br>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php if(session('status') == 'success'): ?>
                    <div class="alert alert-success mt-5">
                        <h4>Payment Successful!</h4>
                        <p>Your payment has been processed successfully.</p>
                        <p><strong>Order ID:</strong> <?php echo e(session('order_id')); ?></p>
                    </div>
                <?php elseif(session('status') == 'failure'): ?>
                    <div class="alert alert-danger mt-5">
                        <h4>Payment Failed!</h4>
                        <p>Sorry, there was an issue with your payment. Please try again.</p>
                    </div>
                <?php else: ?>
                    <div class="alert alert-warning mt-5">
                        <h4>Payment Status Unknown</h4>
                        <p>We couldn't determine the status of your payment. Please try again later.</p>
                    </div>
                <?php endif; ?>
                <div class="text-center">
                    <a href="<?php echo e(route('checkout.show')); ?>" class="btn btn-primary mt-3">Go Back to Checkout</a>
                </div>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('website.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\mark11\resources\views/payment-status.blade.php ENDPATH**/ ?>