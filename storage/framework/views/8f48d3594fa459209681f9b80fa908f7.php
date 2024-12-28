

<?php $__env->startSection('body'); ?>
<div class="container">
    <h1>Add Ingredient</h1>

    <form action="<?php echo e(route('admin.ingredients.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div class="mb-3">
            <label for="product_id" class="form-label">Product</label>
            <select name="product_id" id="product_id" class="form-select <?php $__errorArgs = ['product_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <option value="">Select Product</option>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($product->id); ?>" <?php echo e(old('product_id') == $product->id ? 'selected' : ''); ?>>
                        <?php echo e($product->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php $__errorArgs = ['product_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="invalid-feedback"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div id="keyValueFields">
            <div class="mb-3 key-value-pair">
                <label for="key" class="form-label">Key</label>
                <input type="text" name="key[]" id="key" class="form-control <?php $__errorArgs = ['key.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('key.0')); ?>" required>
                <label for="value" class="form-label">Value</label>
                <input type="text" name="value[]" id="value" class="form-control <?php $__errorArgs = ['value.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('value.0')); ?>" required>
                <button type="button" class="btn btn-danger btn-sm remove-key-value">Remove</button>
            </div>
        </div>

        <button type="button" class="btn btn-primary" id="addMoreKeyValue">Add More Key-Value Pair</button>
        <button type="submit" class="btn btn-primary">Add Ingredient</button>
        <a href="<?php echo e(route('admin.ingredients.index')); ?>" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<script>
    document.getElementById('addMoreKeyValue').addEventListener('click', function () {
        const keyValueFields = document.getElementById('keyValueFields');
        const newField = document.createElement('div');
        newField.classList.add('mb-3', 'key-value-pair');
        newField.innerHTML = `
            <label for="key" class="form-label">Key</label>
            <input type="text" name="key[]" class="form-control" required>
            <label for="value" class="form-label">Value</label>
            <input type="text" name="value[]" class="form-control" required>
            <button type="button" class="btn btn-danger btn-sm remove-key-value">Remove</button>
        `;
        keyValueFields.appendChild(newField);
    });

    document.getElementById('keyValueFields').addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-key-value')) {
            e.target.closest('.key-value-pair').remove();
        }
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\mark11\resources\views/admin/ingredients/create.blade.php ENDPATH**/ ?>