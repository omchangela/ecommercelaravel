

<?php $__env->startSection('body'); ?>
<!-- Page header -->
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-flex">
        <div class="page-title pb-3 pt-3">
            <h5 class="mb-0">Instagram Showcase</h5>
        </div>
        <div class="my-auto ms-auto">
            <a href="<?php echo e(route('admin.instagram.create')); ?>" class="btn btn-success btn-labeled btn-labeled-start text-bold">
                <span class="btn-labeled-icon bg-black bg-opacity-20"><i class="icon-plus-circle2"></i></span>
                ADD NEW IMAGE
            </a>
        </div>
    </div>
</div>
<!-- /page header -->

<!-- Content area -->
<div class="content">
    <div class="card">
        <table id="datatable" class="table table-sm table-striped table-bordered">
            <thead>
                <tr class="bg-secondary text-light table-border-double">
                    <th>ID</th>
                    <th>Image</th>
                    <th>Created At</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($image->id); ?></td>
                    <td><img src="<?php echo e(asset('storage/' . $image->image)); ?>" alt="Instagram Image" width="100"></td>
                    <td><?php echo e($image->created_at->format('d-m-Y H:i')); ?></td>
                    <td class="text-center">
                        <a href="<?php echo e(route('admin.instagram.edit', $image->id)); ?>" class="btn btn-warning btn-sm"> Edit</a>
                        <form action="<?php echo e(route('admin.instagram.destroy', $image->id)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this image?')"> Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="4" class="text-center">No images found.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="d-flex justify-content-center mt-4">
            <?php echo e($images->links('vendor.pagination.bootstrap-4')); ?>

        </div>
    </div>
</div>
<!-- /content area -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\mark11\resources\views/admin/instagram/index.blade.php ENDPATH**/ ?>