@extends('admin.layout.app')

@section('body')
<!-- Page header -->
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-flex">
        <div class="page-title pb-3 pt-3">
            <h5 class="mb-0">Ingredients</h5>
        </div>
        <div class="my-auto ms-auto">
            <a href="{{ route('admin.ingredients.create') }}" class="btn btn-success btn-labeled btn-labeled-start text-bold">
                <span class="btn-labeled-icon bg-black bg-opacity-20"><i class="icon-plus-circle2"></i></span>
                ADD NEW
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
                    <th>Product</th>
                    <th>Key</th>
                    <th>Value</th>
                    <th>Created At</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- DataTables will populate data here -->
            </tbody>
        </table>
    </div>
</div>
<!-- /content area -->
@endsection

@section('js')
<script>
    $(document).ready(function () {
        $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.ingredients.index') }}",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'product', name: 'product' },
                { data: 'key', name: 'key' },
                { data: 'value', name: 'value' },
                { data: 'created_at', name: 'created_at' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
    });
</script>
@endsection
