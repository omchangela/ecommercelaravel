

<?php $__env->startSection('body'); ?>

<div class="content">
    <div class="col-md-8 offset-md-2">
        <form 
            action="<?php echo e(isset($policy) ? route('admin.privacypolicy.update', $policy->id) : route('admin.privacypolicy.store')); ?>" 
            method="POST">
            <?php echo csrf_field(); ?>
            <?php if(isset($policy)): ?>
                <?php echo method_field('PUT'); ?>
            <?php endif; ?>

            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0"><?php echo e(isset($policy) ? 'Edit' : 'Create'); ?> Privacy Policy</h6>
                </div>
                <div class="card-body">

                    <?php if(session('success')): ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong>Success!</strong> <?php echo e(session('success')); ?>

                    </div>
                    <?php endif; ?>

                    <?php if($errors->any()): ?>
                    <div id="validation-errors" class="message-section">
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            <h5><i class="icon fas fa-ban"></i> Validation Error!</h5>
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="4" required><?php echo e(old('description', $policy->description ?? '')); ?></textarea>
                    </div>

                    <!-- Initialize CKEditor -->
                    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
                    <script>
                        ClassicEditor
                            .create(document.querySelector('#description'))
                            .catch(error => {
                                console.error(error);
                            });
                    </script>

                </div>
                <div class="card-footer p-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="<?php echo e(route('admin.privacypolicy.index')); ?>" class="btn btn-light">Back</a>
                        <button type="submit" class="btn btn-primary">
                            <?php echo e(isset($policy) ? 'Update' : 'Create'); ?> Privacy Policy
                        </button>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\mark11\resources\views/admin/privacypolicy/form.blade.php ENDPATH**/ ?>