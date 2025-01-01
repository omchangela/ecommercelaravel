

<?php $__env->startSection('body'); ?>

<!-- Page header -->
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-flex">
        <div class="page-title pb-3 pt-3">
            <h5 class="mb-0"><?php echo e(isset($indepthProductDetail) ? 'Edit' : 'Add'); ?> In-depth Product Detail</h5>
        </div>
    </div>
</div>
<!-- /page header -->

<!-- Content area -->
<div class="content">
    <div class="col-md-8 offset-md-2">
        <form 
            action="<?php echo e(isset($indepthProductDetail) ? route('admin.indepth-product-details.update', $indepthProductDetail->id) : route('admin.indepth-product-details.store')); ?>" 
            method="POST" 
            enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php if(isset($indepthProductDetail)): ?>
                <?php echo method_field('PUT'); ?>
            <?php endif; ?>

            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0">Form details</h6>
                </div>
                <div class="card-body">

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

                    <!-- Product Field -->
                    <div class="form-group mb-3">
                        <label for="product_id" class="form-label">Product</label>
                        <select name="product_id" id="product_id" class="form-select" required>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($product->id); ?>" 
                                    <?php echo e(isset($indepthProductDetail) && $product->id == $indepthProductDetail->product_id ? 'selected' : ''); ?>>
                                    <?php echo e($product->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <!-- Image Field -->
                    <div class="form-group mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                        <?php if(isset($indepthProductDetail) && $indepthProductDetail->image): ?>
                            <img src="<?php echo e(asset('storage/' . $indepthProductDetail->image)); ?>" alt="Image" class="img-thumbnail mt-2" width="100">
                        <?php endif; ?>
                    </div>

                    <!-- Description Field -->
                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="4" required>
                            <?php echo e(isset($indepthProductDetail) ? $indepthProductDetail->description : ''); ?>

                        </textarea>
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
                        <a href="<?php echo e(route('admin.indepth-product-details.index')); ?>" class="btn btn-light">Back</a>
                        <button type="submit" class="btn btn-primary">
                            <?php echo e(isset($indepthProductDetail) ? 'Update' : 'Add'); ?> Detail
                        </button>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\mark11\resources\views/admin/indepth_product_details/form.blade.php ENDPATH**/ ?>