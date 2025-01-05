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
                    <th>Order Status</th>
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
                { data: 'created_at', name: 'created_at' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ],
            // You can configure custom settings like pagination here
            pageLength: 10,
        });

        // Handle the pagination info
        oTable.on('draw', function() {
            $('#order-count').text(oTable.page.info().recordsTotal);
        });
    });
</script>
@endsection
