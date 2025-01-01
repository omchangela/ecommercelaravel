

<?php $__env->startSection('body'); ?>
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-flex">
        <div class="page-title pb-3 pt-3">
            <h5 class="mb-0"><?php echo e(isset($ingredient) ? 'Edit' : 'Add'); ?> Ingredient</h5>
        </div>
    </div>
</div>

<!-- Content area -->
<div class="content">
    <div class="col-md-8 offset-md-2">
        <form action="<?php echo e(isset($ingredient) ? route('admin.ingredients.update', $ingredient->id) : route('admin.ingredients.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php if(isset($ingredient)): ?>
                <?php echo method_field('PUT'); ?> <!-- Indicate the method for updating -->
            <?php endif; ?>

            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0"><?php echo e(isset($ingredient) ? 'Edit' : 'Add'); ?> Ingredient Details</h6>
                </div>
                <div class="card-body">

                    <!-- Validation errors -->
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
                                <option value="<?php echo e($product->id); ?>" <?php echo e(old('product_id', isset($ingredient) ? $ingredient->product_id : '') == $product->id ? 'selected' : ''); ?>>
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

                    <!-- Key-Value Pairs -->
                    <div id="keyValueFields">
                        <?php if(isset($ingredient) && $ingredient->keys->count() > 0): ?>
                            <?php $__currentLoopData = $ingredient->keys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="mb-3 key-value-pair">
                                    <label for="key" class="form-label">Key</label>
                                    <input type="text" name="key[]" class="form-control <?php $__errorArgs = ['key.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('key.'.$index, $key->key)); ?>" required>
                                    <label for="value" class="form-label">Value</label>
                                    <input type="text" name="value[]" class="form-control <?php $__errorArgs = ['value.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('value.'.$index, $key->value)); ?>" required>
                                    <button type="button" class="btn btn-danger btn-sm remove-key-value">Remove</button>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <div class="mb-3 key-value-pair">
                                <label for="key" class="form-label">Key</label>
                                <input type="text" name="key[]" class="form-control" value="<?php echo e(old('key.0')); ?>" required>
                                <label for="value" class="form-label">Value</label>
                                <input type="text" name="value[]" class="form-control" value="<?php echo e(old('value.0')); ?>" required>
                                <button type="button" class="btn btn-danger btn-sm remove-key-value">Remove</button>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Add More Key-Value Button -->
                    <button type="button" class="btn btn-primary" id="addMoreKeyValue">Add More Key-Value Pair</button>

                </div>

                <!-- Action buttons -->
                <div class="card-footer p-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <button type="submit" class="btn btn-primary"><?php echo e(isset($ingredient) ? 'Update Ingredient' : 'Add Ingredient'); ?></button>
                        <a href="<?php echo e(route('admin.ingredients.index')); ?>" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>

<!-- Script to handle dynamic key-value pairs -->
<script>
    document.getElementById('addMoreKeyValue').addEventListener('click', function () {
        const keyValueFields = document.getElementById('keyValueFields');
        const newField = document.createElement('div');
        newField.classList.add('mb-3', 'key-value-pair');
        newField.innerHTML = `
            <label for="key" class="form-label">Key</label>
            <input type="text" name="key[]" class="form-control" required>
            <label for="value" class="form-label">Value</label>
            <input type="text" name="value[]"  class="form-control"  required>
            <button type="button" class="btn btn-danger btn-sm  remove-key-value">Remove</button>
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

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\mark11\resources\views/admin/ingredients/form.blade.php ENDPATH**/ ?>