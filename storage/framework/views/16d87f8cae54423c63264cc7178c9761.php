

<?php $__env->startSection('body'); ?>
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-flex">
        <div class="page-title pb-3 pt-3">
            <h5 class="mb-0">Order Products</h5>
        </div>
    </div>
</div>

<div class="content">
    <div class="card">
        <table id="orderProductsTable" class="table table-sm table-striped table-bordered">
            <thead>
                <tr class="bg-secondary text-light table-border-double">
                    <th>ID</th>
                    <th>Order ID</th>
                    <th>Product ID</th>
                    <!-- <th>Product Image</th> Added Product Image Column -->
                    <th>Quantity</th>
                    <th>Price</th>
                    <!-- <th>Actions</th> -->
                </tr>
            </thead>
            <tbody>
                <!-- Data will be loaded dynamically via DataTables -->
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
    $(document).ready(function() {
        var oTable = $('#orderProductsTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '<?php echo e(route('admin.orderproducts.index')); ?>', // Your route
            columns: [
                { data: 'id', name: 'id' },
                { data: 'order_id', name: 'order_id' },
                { data: 'product_id', name: 'product_id' },
                // { data: 'product_image', name: 'product_image', orderable: false, searchable: false }, // Added Product Image Column
                { data: 'quantity', name: 'quantity' },
                { data: 'price', name: 'price' },
                // { data: 'action', name: 'action', orderable: false, searchable: false }
            ],
            pageLength: 10,
        });

        // Update pagination info dynamically
        oTable.on('draw', function() {
            $('#order-product-count').text(oTable.page.info().recordsTotal);
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\mark11\resources\views/admin/orderproducts/index.blade.php ENDPATH**/ ?>