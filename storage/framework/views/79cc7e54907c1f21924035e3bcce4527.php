<div class="mb-2">
    <?php echo e(html()->label($title.(!empty($required) && $required==true?'<span class="text-danger"> *</span>':''))->class('form-label')); ?>

    <?php echo e(html()->file($name)->class(['form-control'])); ?>


    <?php if(!empty($image_url)): ?>
    <div class="mt-2">
        <img src="<?php echo e($image_url); ?>" width="150">
    </div>
    <?php endif; ?>
</div>
<?php /**PATH C:\Users\ASUS\Downloads\mark11\resources\views/admin/component/image.blade.php ENDPATH**/ ?>