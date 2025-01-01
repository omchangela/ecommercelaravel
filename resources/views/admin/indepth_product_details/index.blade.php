@extends('admin.layout.app')

@section('body')
<!-- Page header -->
 
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-flex">
        <div class="page-title pb-3 pt-3">
            <h5 class="mb-0">In-depth Product Details</h5>
        </div>
        <div class="my-auto ms-auto">
            <a href="{{ route('admin.indepth-product-details.create') }}" class="btn btn-success btn-labeled btn-labeled-start text-bold">
                <span class="btn-labeled-icon bg-black bg-opacity-20"><i class="icon-plus-circle2"></i></span>
                Add New Detail
            </a>
        </div>
    </div>
</div>
<!-- /page header -->

<!-- Content area -->
<div class="content">
    <!-- Basic datatable -->
    <div class="card">
        <div class="card-body">
        <table id="product-details-table" class="table table-sm table-striped table-bordered">
    <thead>
        <tr class="bg-secondary text-light table-border-double">
            <th>ID</th>
            <th>Product</th>
            <th>Image</th>
            <th>Description</th>
            <th class="text-center" width="200">Actions</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

        </div>
    </div>
    <!-- /basic datatable -->
    
   
</div>
<!-- /content area -->

@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function () {
    // Initialize DataTable with server-side processing
    $('#product-details-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.indepth-product-details.index') }}",
        columns: [
            { data: 'id', name: 'id' },
            { data: 'product_name', name: 'product.product_name' },
            { data: 'image', name: 'image', orderable: false, searchable: false },
            { data: 'description', name: 'description' },
            { data: 'actions', name: 'actions', orderable: false, searchable: false }
        ]
    });
});

</script>
@endsection
