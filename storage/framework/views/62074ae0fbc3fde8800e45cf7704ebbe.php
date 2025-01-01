

<?php $__env->startSection('body'); ?>

<div class="page-header page-header-light shadow">
    <div class="page-header-content d-flex">
        <div class="page-title pb-3 pt-3">
            <h5 class="mb-0">Edit Banner</h5>
        </div>
    </div>
</div>

<div class="content">
    <div class="card">
        <!-- Corrected the route to 'admin.banners.update' -->
        <form action="<?php echo e(route('admin.banners.update', $banner->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="card-body">
                <div class="mb-3">
                    <label for="text_input_1" class="form-label">Text Input 1</label>
                    <input type="text" class="form-control" id="text_input_1" name="text_input_1" value="<?php echo e(old('text_input_1', $banner->text_input_1)); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="text_input_2" class="form-label">Text Input 2</label>
                    <input type="text" class="form-control" id="text_input_2" name="text_input_2" value="<?php echo e(old('text_input_2', $banner->text_input_2)); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="text_input_3" class="form-label">Text Input 3</label>
                    <input type="text" class="form-control" id="text_input_3" name="text_input_3" value="<?php echo e(old('text_input_3', $banner->text_input_3)); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Banner Image</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    <?php if($banner->image): ?>
                    <img src="<?php echo e(Storage::url($banner->image)); ?>" alt="Current Banner Image" width="150">
                    <?php endif; ?>
                </div>

                <div class="mb-3 text-end">
                    <button type="submit" class="btn btn-primary">Update Banner</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\mark11\resources\views/admin/banners/edit.blade.php ENDPATH**/ ?>