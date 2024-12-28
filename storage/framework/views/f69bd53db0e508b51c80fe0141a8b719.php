<div class="modal-header pt-2 pb-2 bg-secondary text-white">
    <h5 class="modal-title"><?php echo e($title); ?> - Form</h5>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
</div>

<?php if(!empty($record)): ?>
    <?php echo e(html()->modelForm($record, 'PUT')->class('ajax_submit')->attribute('enctype', 'multipart/form-data')->route($route . 'update', $record->id)->open()); ?>

<?php else: ?>
    <?php echo e(html()->form('POST')->class('ajax_submit')->attribute('enctype', 'multipart/form-data')->route($route . 'store')->open()); ?>

<?php endif; ?>

<div class="modal-body">
    <div id="validation-errors" class="message-section"></div>

    
    <?php $__env->startComponent('admin.component.text', [
        'name' => 'name',
        'title' => 'Name',
        'value' => null,
        'required' => true,
    ]); ?><?php echo $__env->renderComponent(); ?>

    
    <?php $__env->startComponent('admin.component.select', [
        'name' => 'status',
        'title' => 'Status',
        'value' => null,
        'required' => true,
        'options' => ['Active' => 'Active','Inactive' => 'Inactive'],
    ]); ?><?php echo $__env->renderComponent(); ?>

    
    <div class="mb-2">
        <label for="image" class="form-label">Image</label>
        <input type="file" name="image" class="form-control" id="image" accept="image/*">
    </div>

    <?php if(isset($record) && !empty($record->image)): ?>
    <img src="<?php echo e(asset('storage/' . $record->image)); ?>" alt="<?php echo e($record->name); ?>" class="img-thumbnail" width="150" height="150">
<?php else: ?>
    <span></span>
<?php endif; ?>


</div>

<div class="modal-footer bg-light pt-1 pb-1">
    <button type="button" class="btn btn-link border-info" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes <i class="ph-paper-plane-tilt ms-2"></i></button>
</div>

<?php echo e(html()->form()->close()); ?>

<?php /**PATH C:\Users\ASUS\Downloads\mark11\resources\views/admin/category/form.blade.php ENDPATH**/ ?>