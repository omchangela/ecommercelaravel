@extends('admin.layout.app')

@section('body')

<!-- Page header -->
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-flex">
        <div class="page-title pb-3 pt-3">
            <h5 class="mb-0">Orders</h5>
        </div>
    </div>
</div>
<!-- /page header -->

<!-- Content area -->
<div class="content">
    <!-- DataTable -->
    <div class="card">
        <table id="datatable" class="table table-sm table-striped table-bordered">
            <thead>
                <tr class="bg-secondary text-light table-border-double">
                    <th>ID</th>
                    <th>Order Number</th>
                    <th>Customer Name</th>
                    <th>Total Amount</th>
                    <th>Payment Status</th>
                    <th>Delivery Status</th>
                    <th>Created At</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data loaded dynamically via DataTables -->
            </tbody>
        </table>
    </div>
    <!-- /DataTable -->

    <!-- Pagination (optional) -->
    <div class="d-flex justify-content-between align-items-center mt-3">
        <div>
            Showing <span id="order-count"></span> orders
        </div>
    </div>
</div>
<!-- /content area -->

@endsection

@section('js')
<script>
    $(document).ready(function() {
        var oTable = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            stateSave: true,
            ajax: '{{ route('admin.orders.index') }}', // Your route
            columns: [
                { data: 'id', name: 'id' },
                { data: 'order_number', name: 'order_number' },
                { data: 'shipping_name', name: 'shipping_name' },
                { data: 'total_amount', name: 'total_amount' },
                { data: 'status', name: 'status' },
                { data: 'delivery_status', name: 'delivery_status' },
                { data: 'created_at', name: 'created_at' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ],
            pageLength: 10,
        });

        // Handle the pagination info
        oTable.on('draw', function() {
            $('#order-count').text(oTable.page.info().recordsTotal);
        });

        // Handle change event for delivery status dropdown
        $(document).on('change', '.update_field', function() {
            var orderId = $(this).data('id');
            var deliveryStatus = $(this).val();

            // Send AJAX request to update the delivery status
            $.ajax({
                url: '{{ route('admin.orders.updateDeliveryStatus') }}', // This route will call the updateDeliveryStatus method
                method: 'POST',
                data: {
                    order_id: orderId,
                    delivery_status: deliveryStatus,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            title: 'Success!',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Failed to update the delivery status.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        title: 'Error!',
                        text: 'An error occurred while updating the delivery status.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });
    });
</script>
@endsection
