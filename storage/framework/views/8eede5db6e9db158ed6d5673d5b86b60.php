

<?php $__env->startSection('body'); ?>
<div class="d-flex justify-content-center pt-5 min-vh-100">
    <div class="col-4">
        <form 
            action="<?php echo e($banner ? route('admin.product_banners.update', $banner->id) : route('admin.product_banners.store')); ?>" 
            method="POST" 
            enctype="multipart/form-data" 
            class="p-4 border rounded shadow-sm bg-white">
            <?php echo csrf_field(); ?>
            <?php if($banner): ?>
                <?php echo method_field('PUT'); ?>
            <?php endif; ?>
            <h1 class="mb-4 text-center"><?php echo e($banner ? 'Edit' : 'Add'); ?> Product Banner</h1>
            
            <!-- Image Field with Preview -->
            <div class="mb-4">
                <label for="image" class="form-label">Image<span class="text-danger"> *</span></label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*" <?php echo e($banner ? '' : 'required'); ?>>
                
                <!-- Preview Section -->
                <div id="image-preview" class="mt-3">
                    <?php if($banner && $banner->image_path): ?>
                        <p>Current Image:</p>
                        <img src="<?php echo e(asset('storage/' . $banner->image_path)); ?>" class="img-thumbnail" style="width: 100%; max-height: 300px;">
                    <?php endif; ?>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <a href="<?php echo e(route('admin.product_banners.index')); ?>" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-success"><?php echo e($banner ? 'Update' : 'Submit'); ?></button>
            </div>
        </form>
    </div>
</div>

<!-- JavaScript to Preview Selected Image -->
<script>
    document.getElementById('image').addEventListener('change', function (event) {
        const previewContainer = document.getElementById('image-preview');
        const file = event.target.files[0];

        // Clear existing preview
        previewContainer.innerHTML = '';

        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.classList.add('img-thumbnail');
                img.style.width = '100%';
                img.style.maxHeight = '300px';
                previewContainer.appendChild(img);
            };
            reader.readAsDataURL(file);
        }
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\mark11\resources\views/admin/product_banners/form.blade.php ENDPATH**/ ?>