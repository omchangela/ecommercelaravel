

<?php $__env->startSection('body'); ?>
<div class="container">
    <h1>Ingredients</h1>
    <a href="<?php echo e(route('admin.ingredients.create')); ?>" class="btn btn-primary mb-3">Add Ingredient</a>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Key</th>
                <th>Value</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $ingredients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ingredient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($ingredient->id); ?></td>
                    <td><?php echo e($ingredient->product->name); ?></td>
                    <td><?php echo e($ingredient->key); ?></td>
                    <td><?php echo e($ingredient->value); ?></td>
                    <td>
                        <a href="<?php echo e(route('admin.ingredients.edit', $ingredient->id)); ?>" class="btn btn-sm btn-warning">Edit</a>
                        <form action="<?php echo e(route('admin.ingredients.destroy', $ingredient->id)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5" class="text-center">No ingredients found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <?php echo e($ingredients->links()); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\mark11\resources\views/admin/ingredients/index.blade.php ENDPATH**/ ?>