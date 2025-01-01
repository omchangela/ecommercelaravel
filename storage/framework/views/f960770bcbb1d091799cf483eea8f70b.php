

<?php $__env->startSection('body'); ?>

<!-- Page header -->
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-flex">
        <div class="page-title pb-3 pt-3">
            <h5 class="mb-0">Banner Details</h5>
        </div>
    </div>
</div>
<!-- /Page header -->

<!-- Content area -->
<div class="content">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Details</h6>
            </div>
            <div class="card-body p-1">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>Banner ID:</th>
                            <th class="text-right pl-0 pr-0">:</th>
                            <td><?php echo e($banner->id ?? 'N/A'); ?></td>
                        </tr>
                        <tr>
                            <th>Text Input 1:</th>
                            <th class="text-right pl-0 pr-0">:</th>
                            <td><?php echo e($banner->text_input_1 ?? 'N/A'); ?></td>
                        </tr>
                        <tr>
                            <th>Text Input 2:</th>
                            <th class="text-right pl-0 pr-0">:</th>
                            <td><?php echo e($banner->text_input_2 ?? 'N/A'); ?></td>
                        </tr>
                        <tr>
                            <th>Text Input 3:</th>
                            <th class="text-right pl-0 pr-0">:</th>
                            <td><?php echo e($banner->text_input_3 ?? 'N/A'); ?></td>
                        </tr>
                       
                        <tr>
                            <th>Created At</th>
                            <th class="text-right pl-0 pr-0">:</th>
                            <td><?php echo e($banner->created_at ? $banner->created_at->format('Y-m-d H:i:s') : 'N/A'); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer p-2">
                <div class="d-flex justify-content-between align-items-center">
                    <a href="<?php echo e(route('admin.banners.index')); ?>" class="btn btn-light">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /content area -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\mark11\resources\views/admin/banners/show.blade.php ENDPATH**/ ?>