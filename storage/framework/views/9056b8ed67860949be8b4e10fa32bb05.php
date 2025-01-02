

<?php $__env->startSection('body'); ?>
<!-- Page header -->
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-flex">
        <div class="page-title pb-3 pt-3">
            <h5 class="mb-0"><?php echo e(isset($image) ? 'Edit' : 'Add'); ?> Instagram Image</h5>
        </div>
        <div class="my-auto ms-auto">
            <a href="<?php echo e(route('admin.instagram.index')); ?>" class="btn btn-secondary text-bold">
                <i class="icon-arrow-left"></i> Back to List
            </a>
        </div>
    </div>
</div>
<!-- /page header -->

<!-- Content area -->
<div class="content">
    <div class="card">
        <div class="card-body">
            <!-- Display Validation Errors -->
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <!-- Form for adding/updating the image -->
            <form action="<?php echo e(isset($image) ? route('admin.instagram.update', $image->id) : route('admin.instagram.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php if(isset($image)): ?>
                    <?php echo method_field('PUT'); ?>
                <?php endif; ?>

                <div class="form-group">
                    <label for="image" class="form-label">Instagram Image</label>
                    <input type="file" name="image" id="image" class="form-control" accept="image/*" <?php echo e(isset($image) ? '' : 'required'); ?>>

                    <?php if(isset($image)): ?>
                        <div class="mt-3">
                            <p>Current Image:</p>
                            <img src="<?php echo e(asset('storage/' . $image->image)); ?>" alt="Current Image" width="150">
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary text-bold">
                        <?php echo e(isset($image) ? 'Update Image' : 'Add Image'); ?>

                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /content area -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\mark11\resources\views/admin/instagram/form.blade.php ENDPATH**/ ?>