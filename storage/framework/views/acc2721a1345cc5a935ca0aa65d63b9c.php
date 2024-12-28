<div class="mb-2">
    <?php echo e(html()->label($title.(!empty($required) && $required==true?'<span class="text-danger"> *</span>':''))->class('form-label')); ?>

    <?php echo e(html()->select($name,$options)->class(['form-select'] + $options)->placeholder('Select '.$name)); ?>

</div>
<?php /**PATH C:\Users\ASUS\Downloads\mark11\resources\views/admin/component/select.blade.php ENDPATH**/ ?>