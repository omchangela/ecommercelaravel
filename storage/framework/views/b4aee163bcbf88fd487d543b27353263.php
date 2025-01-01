

<?php $__env->startSection('body'); ?>
<div class="content">
    <div class="card">
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('admin.howtouses.update', $howToUse->id)); ?>">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="form-group">
                    <label for="product_id">Product</label>
                    <select name="product_id" class="form-control">
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($product->id); ?>" <?php echo e($product->id == $howToUse->product_id ? 'selected' : ''); ?>><?php echo e($product->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description-editor" name="description" class="form-control"><?php echo e($howToUse->description); ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: '#description-editor',
        plugins: 'image',
        toolbar: 'undo redo | styleselect | bold italic | link image',
        height: 300
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\mark11\resources\views/admin/howtouses/edit.blade.php ENDPATH**/ ?>