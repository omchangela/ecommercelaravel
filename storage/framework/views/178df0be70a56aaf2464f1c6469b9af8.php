

<?php $__env->startSection('body'); ?>
<!-- Page header -->
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-flex">
        <div class="page-title pb-3 pt-3">
            <h5 class="mb-0">Product Banners</h5>
        </div>
        <div class="my-auto ms-auto">
            <a href="<?php echo e(route('admin.product_banners.create')); ?>" class="btn btn-success btn-labeled btn-labeled-start text-bold">
                <span class="btn-labeled-icon bg-black bg-opacity-20"><i class="icon-plus-circle2"></i></span>
                ADD NEW BANNER
            </a>
        </div>
    </div>
</div>
<!-- /page header -->

<!-- Content area -->
<div class="content">
    <div class="card">
        <table class="table table-sm table-striped table-bordered mt-3">
            <thead>
                <tr class="bg-secondary text-light table-border-double">
                    <th>ID</th>
                    <th>Image</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($banner->id); ?></td>
                    <td><img src="<?php echo e(asset('storage/' . $banner->image_path)); ?>" width="100" /></td>
                    <td class="text-center">
                        <a href="<?php echo e(route('admin.product_banners.edit', $banner->id)); ?>" class="btn btn-warning btn-sm"> Edit</a>
                        <form action="<?php echo e(route('admin.product_banners.destroy', $banner->id)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"> Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="3" class="text-center">No banners found.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="d-flex justify-content-center mt-4">
            <?php echo e($banners->links('vendor.pagination.bootstrap-4')); ?>

            
        </div>
    </div>
</div>
<!-- /content area -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\mark11\resources\views/admin/product_banners/index.blade.php ENDPATH**/ ?>