@extends('admin.layout.app')

@section('body')
<!-- Page header -->
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-flex">
        <div class="page-title pb-3 pt-3">
            <h5 class="mb-0">Terms & Conditions</h5>
        </div>
        <div class="my-auto ms-auto">
            <a href="{{ route('admin.terms.create') }}" class="btn btn-success btn-labeled btn-labeled-start text-bold">
                <span class="btn-labeled-icon bg-black bg-opacity-20"><i class="icon-plus-circle2"></i></span>
                CREATE NEW TERMS & CONDITIONS
            </a>
        </div>
    </div>
</div>
<!-- /page header -->

<!-- Content area -->
<div class="content">
    <div class="card">
        <table id="termsTable" class="table table-sm table-striped table-bordered mt-3">
            <thead>
                <tr class="bg-secondary text-light table-border-double">
                    <th>ID</th>
                    <th>Description</th>
                    <th>Created At</th>
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
        var oTable = $('#termsTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('admin.terms.index') }}', // Your route to fetch terms
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'description',
                    name: 'description',
                    orderable: false,
                    render: function(data) {
                        return data.length > 100 ? data.substr(0, 100) + '...' : data; // Limit description
                    }
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    className: 'text-center'
                }
            ],
            pageLength: 10,
        });
    });
</script>
@endsection