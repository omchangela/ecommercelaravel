@extends('admin.layout.app')

@section('body')
<!-- Page header -->
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-flex">
        <div class="page-title pb-3 pt-3">
            <h5 class="mb-0">Product Banners</h5>
        </div>
        <div class="my-auto ms-auto">
            <a href="{{ route('admin.product_banners.create') }}" class="btn btn-success btn-labeled btn-labeled-start text-bold">
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
        <table id="productBannersTable" class="table table-sm table-striped table-bordered mt-3">
            <thead>
                <tr class="bg-secondary text-light table-border-double">
                    <th>ID</th>
                    <th>Image</th>
                    <th>Created At</th> <!-- New column for Created At -->
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data will be loaded dynamically via DataTables -->
            </tbody>
        </table>
    </div>
</div>
<!-- /content area -->
@endsection

@section('js')
<script>
    $(document).ready(function() {
        var oTable = $('#productBannersTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('admin.product_banners.index') }}', // Your route
            columns: [
                { data: 'id', name: 'id' },
                { data: 'image', name: 'image', orderable: false, searchable: false },
                { data: 'created_at', name: 'created_at' }, // Added column for Created At
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ],
            pageLength: 10,
        });
    });
</script>
@endsection
