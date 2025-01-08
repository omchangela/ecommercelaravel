@extends('admin.layout.app')

@section('body')


    <!-- Page header -->
    <div class="page-header page-header-light  shadow">
        <div class="page-header-content d-flex">
            <div class="page-title pb-3 pt-3">
                <h5 class="mb-0">{{ $title }}</h5>
            </div>

            <div class="my-auto ms-auto">
                <button type="button" class="btn btn-success btn-labeled btn-labeled-start text-bold ajax_insert_update" data-toggle="modal" data-target="#modal-data" data-method="GET"
                   data-url="{{ route($route . 'create') }}">
                    <span class="btn-labeled-icon bg-black bg-opacity-20"><i class="icon-plus-circle2"></i></span>
                    ADD NEW
                </button>
            </div>
        </div>
    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content">

        <!-- Basic datatable -->
        <div class="card">
            {{--<div class="card-header">--}}
                {{--<h5 class="mb-0">Basic datatable</h5>--}}
            {{--</div>--}}

            {{--<div class="card-body">--}}
                {{--The <code>DataTables</code> is a highly flexible tool, based upon the foundations of progressive enhancement, and will add advanced interaction controls to any HTML table. DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function. Searching, ordering, paging etc goodness will be immediately added to the table, as shown in this example. <span class="fw-semibold">Datatables support all available table styling.</span>--}}
            {{--</div>--}}

            <table id="datatable" class="table table-sm table-striped table-bordered">
                <thead>
                <tr class="bg-secondary text-light table-border-double">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th width="130">Status</th>
                    <th width="170">Created At</th>
                    <th class="text-center" width="200">Actions</th>
                </tr>
                </thead>
                <tbody>
    @if(!empty($records))
        @foreach($records as $record)
            <tr>
                <td>{{ $record['id'] }}</td>
                <td>{{ $record['name'] }}</td>
                <td>
                    @if(!empty($record['image']))
                        <img src="{{ asset($record['image']) }}" alt="{{ $record['name'] }}" class="img-thumbnail" width="70" height="70">
                    @else
                        <span>No Image</span>
                    @endif
                </td>
                <td>{{ $record['status'] }}</td>
                <td class="text-center p-0">
                    <button data-url="{{ route($route . 'show', $record->id) }}" class="btn btn-indigo btn-sm ajax_show" title="View" data-method="GET">View</button>
                    &nbsp;<button href="javascript:void(0)" data-url="{{ route($route . 'edit', $record->id) }}" class="btn btn-teal btn-sm ajax_insert_update" title="Edit"  data-method="GET">Edit</button>
                    &nbsp;<button class="btn btn-danger btn-sm ajax_delete" data-id="{{ $record->id }}" data-toggle="tooltip" data-original-title="Delete">Delete</button>
                </td>
            </tr>
        @endforeach
    @endif
</tbody>

            </table>
        </div>
        <!-- /basic datatable -->

    </div>
    <!-- /content area -->

    <!-- /inner content -->


@endsection

@section('modal')
    <!-- Basic modal -->
    <div id="modal-data" class="modal fade" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content" id="modal_set_data">

            </div>
        </div>
    </div>
    <!-- /basic modal -->
@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function () {
        // Initialize DataTable with server-side processing
        var oTable = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            stateSave: true,
            ajax: '{{ route($route . 'index') }}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'image', name: 'image' },
                {
                    data: 'status',
                    name: 'status',
                    searchable: false,
                    orderable: false,
                    className: 'text-center p-1'
                },
                { data: 'created_at', name: 'created_at' },
                {
                    data: 'action',
                    name: 'action',
                    searchable: false,
                    orderable: false,
                    className: 'text-center p-1'
                }
            ]
        });

        // Handle Insert/Update Modal
        $('body').on('click', '.ajax_insert_update', function () {
            showModalWithAjax($(this).attr('data-method'), $(this).attr('data-url'));
        });

        // Handle Show Modal
        $('body').on('click', '.ajax_show', function () {
            showModalWithAjax($(this).attr('data-method'), $(this).attr('data-url'));
        });

        function showModalWithAjax(method, url) {
            $('#modal-data').modal('show');
            $.ajax({
                type: method,
                url: url,
                data: { "_token": "{{ csrf_token() }}" },
                beforeSend: function () {
                    $('#modal_set_data').html("");
                    $('body').waitMe({ effect: 'roundBounce' });
                },
                complete: function () {
                    $('body').waitMe('hide');
                },
                success: function (result) {
                    $('#modal_set_data').html(result);
                },
                error: handleAjaxError
            });
        }

        // Handle Form Submit with Ajax
        $('body').on('submit', '.ajax_submit', function (e) {
            e.preventDefault();
            var form_obj = $(this);
            $.ajax({
                type: form_obj.attr('method'),
                url: form_obj.attr('action'),
                data: new FormData(this),
                processData: false,
                contentType: false,
                beforeSend: function () {
                    form_obj.waitMe({ effect: 'roundBounce' });
                    $('#validation-errors').html("");
                },
                complete: function () {
                    form_obj.waitMe('hide');
                },
                success: function (result) {
                    if (result.result === "1") {
                        toastr_message(result.message_type, result.message);
                        oTable.ajax.reload(null, false);
                    }
                    $('#modal-data').modal('hide');
                },
                error: handleValidationErrors
            });
        });

        // Handle Delete Action
        $('body').on('click', '.ajax_delete', function () {
            if (confirm("Are you sure to Delete Data?")) {
                $.ajax({
                    type: "DELETE",
                    url: "{{ route($route . 'index') }}/" + $(this).attr('data-id'),
                    data: { "_token": "{{ csrf_token() }}" },
                    beforeSend: function () { $(this).attr('disabled', true); },
                    success: function (result) {
                        oTable.ajax.reload();
                        toastr_message(result.message_type, result.message);
                    },
                    error: handleAjaxError
                });
            }
        });

        // Handle Quick Update Field Change
        $('body').on('change', '.update_field', function () {
    var row_id = $(this).attr('data-id');
    var status_value = $(this).val();

    $.ajax({
        type: "PUT",
        url: '{{ route($route . 'index') }}/' + row_id,
        data: {
            "_token": "{{ csrf_token() }}",
            "id": row_id,
            "status": status_value,
            "quick_update": "yes",
        },
        beforeSend: function () {
            $('#datatable').waitMe({ effect: 'roundBounce' });
        },
        complete: function () {
            $('#datatable').waitMe('hide');
        },
        success: function (result) {
            toastr_message(result.message_type, result.message);
            oTable.ajax.reload();
        },
        error: function (error) {
            alert('Error: Unable to update status.');
        }
    });
});


        // Common Error Handler
        function handleAjaxError(e) {
            if (e.status === 403) {
                alert('Unauthorized: Access is denied due to invalid credentials.');
            } else {
                alert('An internal error occurred.');
            }
        }

        // Validation Error Handler
        function handleValidationErrors(result) {
            if (result.status === 422) { // Unprocessable Entity
                let errors = '<div class="alert alert-danger"><ul>';
                $.each(result.responseJSON.errors, function (key, value) {
                    errors += '<li>' + value + '</li>';
                });
                errors += '</ul></div>';
                $('#validation-errors').html(errors);
            }
        }
    });
</script>
@endsection
