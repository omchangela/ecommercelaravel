 <!-- Adjust path to your layout -->

<?php $__env->startSection('body'); ?>
<br><br><br><br>
<div class="container mt-5">
    <h2 class="text-center mb-4">Terms and Conditions</h2>
    
    <?php if($terms->isNotEmpty()): ?>
        <div class="terms-content">
            <?php $__currentLoopData = $terms->reverse()->take(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="term-item mb-4">
                    <!-- Render CKEditor content -->
                    <div class="ck-editor-content">
                        <?php echo $term->description; ?>

                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php else: ?>
        <p class="alert alert-warning">No terms and conditions found.</p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\mark11\resources\views/website/terms.blade.php ENDPATH**/ ?>