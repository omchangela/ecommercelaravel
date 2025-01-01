

<?php $__env->startSection('body'); ?>
<div class="content">
    <div class="card">
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('admin.howtouses.store')); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="product_id">Product</label>
                    <select name="product_id" class="form-control">
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($product->id); ?>"><?php echo e($product->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description-editor" name="description" class="form-control"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Create</button>
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
        // Additional configuration options can go here
    })
    .catch(error => {
        console.error(error);
    });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\mark11\resources\views/admin/howtouses/create.blade.php ENDPATH**/ ?>