

<?php $__env->startSection('body'); ?>

<div class="container">
    <h1 class="my-4"><?php echo e(isset($indepthProductDetail) ? 'Edit' : 'Add'); ?> In-depth Product Detail</h1>

    <form 
        action="<?php echo e(isset($indepthProductDetail) ? route('admin.indepth-product-details.update', $indepthProductDetail->id) : route('admin.indepth-product-details.store')); ?>" 
        method="POST" 
        enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php if(isset($indepthProductDetail)): ?>
            <?php echo method_field('PUT'); ?>
        <?php endif; ?>

        <div class="form-group mb-3">
            <label for="product_id" class="form-label">Product</label>
            <select name="product_id" id="product_id" class="form-control" required>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($product->id); ?>" 
                        <?php echo e(isset($indepthProductDetail) && $product->id == $indepthProductDetail->product_id ? 'selected' : ''); ?>>
                        <?php echo e($product->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            <?php if(isset($indepthProductDetail) && $indepthProductDetail->image): ?>
                <img src="<?php echo e(asset('storage/' . $indepthProductDetail->image)); ?>" alt="Image" class="img-thumbnail mt-2" width="100">
            <?php endif; ?>
        </div>

        <div class="form-group mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">
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

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">
                <?php echo e(isset($indepthProductDetail) ? 'Update' : 'Add'); ?> Detail
            </button>
        </div>
    </form>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\mark11\resources\views/admin/indepth_product_details/form.blade.php ENDPATH**/ ?>