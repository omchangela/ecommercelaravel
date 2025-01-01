

<?php $__env->startSection('body'); ?>
<div class="content">
    <div >
        <div class="card-body col-md-8 offset-md-2">
            <form method="POST" 
                  action="<?php echo e(isset($howToUse) ? route('admin.howtouses.update', $howToUse->id) : route('admin.howtouses.store')); ?>">
                <?php echo csrf_field(); ?>
                <?php if(isset($howToUse)): ?>
                    <?php echo method_field('PUT'); ?>  <!-- This indicates an update request -->
                <?php endif; ?>

                <div class="form-group">
                    <label for="product_id">Product</label>
                    <select name="product_id" class="form-control">
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($product->id); ?>" 
                                <?php echo e(isset($howToUse) && $product->id == $howToUse->product_id ? 'selected' : ''); ?>>
                                <?php echo e($product->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description-editor" name="description" class="form-control">
                        <?php echo e(isset($howToUse) ? $howToUse->description : ''); ?>

                    </textarea>
                </div>

                <button type="submit" class="btn btn-primary">
                    <?php echo e(isset($howToUse) ? 'Update' : 'Create'); ?>  <!-- Button text changes based on create/edit -->
                </button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<!-- Include CKEditor CDN -->
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#description-editor'), {
            toolbar: ['bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'insertTable'],
        })
        .catch(error => {
            console.error(error);
        });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\mark11\resources\views/admin/howtouses/form.blade.php ENDPATH**/ ?>