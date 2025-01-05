

<?php $__env->startSection('body'); ?>

<!-- Page header -->
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-flex">
        <div class="page-title pb-3 pt-3">
            <h5 class="mb-0">Order Details</h5>
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
                            <th>ID</th>
                            <th class="text-right pl-0 pr-0">:</th>
                            <td><?php echo e($order->id ?? 'N/A'); ?></td>
                        </tr>
                        <tr>
                            <th>User ID</th>
                            <th class="text-right pl-0 pr-0">:</th>
                            <td><?php echo e($order->user_id ?? 'N/A'); ?></td>
                        </tr>
                        <tr>
                            <th>Order Number</th>
                            <th class="text-right pl-0 pr-0">:</th>
                            <td><?php echo e($order->order_number ?? 'N/A'); ?></td>
                        </tr>
                        <tr>
                            <th>Total Amount</th>
                            <th class="text-right pl-0 pr-0">:</th>
                            <td><?php echo e($order->total_amount ?? 'N/A'); ?></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <th class="text-right pl-0 pr-0">:</th>
                            <td><?php echo e($order->status ?? 'N/A'); ?></td>
                        </tr>
                        <tr>
                            <th>Payment ID</th>
                            <th class="text-right pl-0 pr-0">:</th>
                            <td><?php echo e($order->payment_id ?? 'N/A'); ?></td>
                        </tr>
                        <tr>
                            <th>Shipping Name</th>
                            <th class="text-right pl-0 pr-0">:</th>
                            <td><?php echo e($order->shipping_name ?? 'N/A'); ?></td>
                        </tr>
                        <tr>
                            <th>Shipping Address</th>
                            <th class="text-right pl-0 pr-0">:</th>
                            <td><?php echo e($order->shipping_address ?? 'N/A'); ?></td>
                        </tr>
                        <tr>
                            <th>Shipping City</th>
                            <th class="text-right pl-0 pr-0">:</th>
                            <td><?php echo e($order->shipping_city ?? 'N/A'); ?></td>
                        </tr>
                        <tr>
                            <th>Shipping State</th>
                            <th class="text-right pl-0 pr-0">:</th>
                            <td><?php echo e($order->shipping_state ?? 'N/A'); ?></td>
                        </tr>
                        <tr>
                            <th>Shipping Zip</th>
                            <th class="text-right pl-0 pr-0">:</th>
                            <td><?php echo e($order->shipping_zip ?? 'N/A'); ?></td>
                        </tr>
                        <tr>
                            <th>Shipping Country</th>
                            <th class="text-right pl-0 pr-0">:</th>
                            <td><?php echo e($order->shipping_country ?? 'N/A'); ?></td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <th class="text-right pl-0 pr-0">:</th>
                            <td><?php echo e(optional($order->created_at)->format(config('setting.DATETIME_FORMAT')) ?? 'N/A'); ?></td>
                        </tr>
                        <tr>
                            <th>Updated At</th>
                            <th class="text-right pl-0 pr-0">:</th>
                            <td><?php echo e(optional($order->updated_at)->format(config('setting.DATETIME_FORMAT')) ?? 'N/A'); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer p-2">
                <div class="d-flex justify-content-between align-items-center">
                    <a href="<?php echo e(route('admin.orders.index')); ?>" class="btn btn-light">Back</a>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /content area -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\mark11\resources\views/admin/order/show.blade.php ENDPATH**/ ?>