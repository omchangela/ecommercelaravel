@extends('admin.layout.app')

@section('body')
<!-- Page header -->
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-flex">
        <div class="page-title pb-3 pt-3">
            <h5 class="mb-0">How to use Product</h5>
        </div>
        <div class="my-auto ms-auto">
            <a href="{{ route('admin.howtouses.create') }}" class="btn btn-success btn-labeled btn-labeled-start text-bold">
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
                    <th>Description</th>
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
    $(document).ready(function() {
        var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.howtouses.index') }}", // Ensure this is pointing to the correct route
            columns: [
                { data: 'id', name: 'id' },
                { data: 'product_name', name: 'product_name' },
                { data: 'description', name: 'description' },
                { data: 'created_at', name: 'created_at' },
                {
                    data: 'actions',
                    name: 'actions',
                    orderable: false,
                    searchable: false
                }
            ]
        });

        // Handle the delete button click event
        $(document).on('click', '.delete-btn', function(e) {
            e.preventDefault(); // Prevent default form submission
            var form = $(this).closest('form'); // Get the form
            if (confirm("Are you sure you want to delete this item?")) {
                form.submit(); // Submit the form
            }
        });
    });
</script>
@endsection
