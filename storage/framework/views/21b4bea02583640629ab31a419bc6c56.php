

<?php $__env->startSection('body'); ?>

<div class="page-header page-header-light shadow">
    <div class="page-header-content d-flex">
        <div class="page-title pb-3 pt-3">
            <h5 class="mb-0">Manage Banners</h5>
        </div>
        <div class="my-auto ms-auto">
            <a href="<?php echo e(route('admin.banners.create')); ?>" class="btn btn-success btn-labeled btn-labeled-start text-bold">
                <span class="btn-labeled-icon bg-black bg-opacity-20"><i class="icon-plus-circle2"></i></span>
                ADD NEW BANNER
            </a>
        </div>
    </div>
</div>

<div class="content">
    <div class="card">
        <table id="datatable" class="table table-sm table-striped table-bordered">
            <thead>
                <tr class="bg-secondary text-light table-border-double">
                    <th>ID</th>
                    <th>Text Input 1</th>
                    <th>Text Input 2</th>
                    <th>Text Input 3</th>
                    <th>Image</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($banner->id); ?></td>
                    <td><?php echo e($banner->text_input_1); ?></td>
                    <td><?php echo e($banner->text_input_2); ?></td>
                    <td><?php echo e($banner->text_input_3); ?></td>
                    <td><img src="<?php echo e(Storage::url($banner->image)); ?>" alt="Banner Image" width="100"></td>
                    <td><?php echo e($banner->created_at->format('Y-m-d H:i:s')); ?></td>
                    <td>
                        <!-- View Button -->
                        <a href="<?php echo e(route('admin.banners.show', $banner->id)); ?>" class="btn btn-info btn-sm" title="View">
                            View
                        </a>

                        <!-- Edit Button -->
                        <a href="<?php echo e(route('admin.banners.edit', $banner->id)); ?>" class="btn btn-warning btn-sm" title="Edit">
                            Edit
                        </a>

                        <!-- Delete Button -->
                        <form action="<?php echo e(route('admin.banners.destroy', $banner->id)); ?>" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this banner?');">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\mark11\resources\views/admin/banners/index.blade.php ENDPATH**/ ?>