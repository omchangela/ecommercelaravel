

<?php $__env->startSection('body'); ?>

<div class="page-header page-header-light shadow">
    <div class="page-header-content d-flex">
        <div class="page-title pb-3 pt-3">
            <h5 class="mb-0">Create banners</h5>
        </div>
    </div>
</div>

<div class="content">
    <form action="<?php echo e(route('admin.banners.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="text_input_1">Text Input 1</label>
                    <input type="text" name="text_input_1" id="text_input_1" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="text_input_2">Text Input 2</label>
                    <input type="text" name="text_input_2" id="text_input_2" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="text_input_3">Text Input 3</label>
                    <input type="text" name="text_input_3" id="text_input_3" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control" required>
                </div>
                
                <button type="submit" class="btn btn-primary mt-3">Save banners</button>
            </div>
        </div>
    </form>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\mark11\resources\views/admin/banners/create.blade.php ENDPATH**/ ?>