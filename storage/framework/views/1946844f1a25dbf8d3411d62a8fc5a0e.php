

<?php $__env->startSection('body'); ?>
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-flex">
        <div class="page-title pb-3 pt-3">
            <h5 class="mb-0">Payments</h5>
        </div>
    </div>
</div>

<div class="content">
    <div class="card">
        <table id="paymentsTable" class="table table-sm table-striped table-bordered">
            <thead>
                <tr class="bg-secondary text-light table-border-double">
                    <th>ID</th>
                    <th>Order ID</th>
                    <th>Payment ID</th>
                    <th>Payment Gateway</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <!-- <th>Actions</th> -->
                </tr>
            </thead>
            <tbody>
                <!-- Data loaded dynamically via DataTables -->
            </tbody>
        </table>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
    $(document).ready(function() {
        var oTable = $('#paymentsTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '<?php echo e(route('admin.payments.index')); ?>', // Your route
            columns: [
                { data: 'id', name: 'id' },
                { data: 'order_id', name: 'order_id' },
                { data: 'payment_id', name: 'payment_id' },
                { data: 'payment_gateway', name: 'payment_gateway' },
                { data: 'amount', name: 'amount' },
                { data: 'status', name: 'status' },
                // { data: 'action', name: 'action', orderable: false, searchable: false }
            ],
            pageLength: 10,
        });

        // Update pagination info dynamically
        oTable.on('draw', function() {
            $('#payment-count').text(oTable.page.info().recordsTotal);
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\mark11\resources\views/admin/payment/index.blade.php ENDPATH**/ ?>