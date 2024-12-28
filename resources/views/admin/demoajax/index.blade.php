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
                    <th width="130">Status</th>
                    <th width="170">Created At</th>
                    <th class="text-center" width="200">Actions</th>
                </tr>
                </thead>
                <tbody>

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
        $(document).ready(function() {
            var oTable = $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                stateSave: true,
                // responsive: true,
                // scrollY: 300,
                ajax: '{{ route($route . 'index') }}',
                columns: [{
                    data: 'id',
                    name: 'id'
                },
                    {
                        data: 'name',
                        name: 'name'
                    },
//                    {
//                        data: 'image',
//                        name: 'image'
//                    },
                    {
                        data: 'status',
                        name: 'status',
                        searchable: false,
                        orderable: false,
                        className: 'text-center p-1'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        searchable: false,
                        orderable: false,
                        className: 'text-center p-1'
                    },
                ]
            });


            $('body').on('click', '.ajax_insert_update', function() {
                $('#modal-data').modal('show');
                var method = $(this).attr('data-method');
                var url = $(this).attr('data-url');

                $.ajax({
                    type: method,
                    url: url,
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    beforeSend: function() {
                        $('#modal_set_data').html("");
                        $('body').waitMe({
                            effect: 'roundBounce'
                        });
                    },
                    complete: function() {
                        $('body').waitMe('hide');
                    },
                    error: function(e) {
                        if (e.status == 403) {
                            alert('Unauthorized: Access is denied due to invalid credentials.');
                        } else {
                            alert('internal error occurred.');
                        }
                    },
                    success: function(result) {
                        //Success Code.
                        $('#modal_set_data').html(result);
//                        bsCustomFileInput.init();
                    }
                });
            });

            $('body').on('submit', '.ajax_submit', function(e) {
                e.preventDefault();
                var form_obj = $(this);
                var url = $(this).attr('action');
                var method = $(this).attr('method');
                var formData = new FormData(this);
                $.ajax({
                    type: method,
                    url: url,
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        $(form_obj).waitMe({
                            effect: 'roundBounce'
                        });
                        $('#validation-errors').html("");
                    },
                    complete: function() {
                        $(form_obj).waitMe('hide');
                    },
                    error: function(result) {
                        if (result.status == "403") {
                            var validation_errors =
                                '<div class="alert alert-danger alert-dismissible"><button type="button" class="btn-close" data-bs-dismiss="alert"></button><h5><i class="icon fas fa-ban"></i> Validation Error!</h5><ul>';
                            $.each(result.responseJSON.errors, function(key, value) {
                                validation_errors += '<li>' + value + '</li>';
                            });
                            validation_errors += '</ul></div>';
                            $('#validation-errors').html(validation_errors);
                        }
                    },
                    success: function(result) {
                        if (result.result == "1") {
                            toastr_message(result.message_type, result.message);
                            oTable.ajax.reload(null, false);
                        }
                        //Success Code.
                        $('#modal-data').modal('hide');
                    }
                });
            });

            $('body').on('click', '.ajax_show', function() {
                $('#modal-data').modal('show');
                var method = $(this).attr('data-method');
                var url = $(this).attr('data-url');

                $.ajax({
                    type: method,
                    url: url,
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    beforeSend: function() {
                        $('#modal_set_data').html("");
                        $('body').waitMe({
                            effect: 'roundBounce'
                        });
                    },
                    complete: function() {
                        $('body').waitMe('hide');
                    },
                    error: function(e) {
                        if (e.status == 403) {
                            alert('Unauthorized: Access is denied due to invalid credentials.');
                        } else {
                            alert('internal error occurred.');
                        }
                    },
                    success: function(result) {
                        //Success Code.
                        $('#modal_set_data').html(result);
                        //                        bsCustomFileInput.init();
                    }
                });
            });

            $("body").on('click', '.ajax_delete', function() {
                var obj = $(this);
                var id = $(this).attr('data-id');

                if (confirm("Are you sure to Delete Data?")) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route($route . 'index') }}/" + id,
                        data: {
                            id: id,
                            _token: "{{ csrf_token() }}"
                        },
                        dataType: 'json',
                        beforeSend: function() {
                            $(this).attr('disabled', true);
                            $('.alert .msg-content').html('');
                            $('.alert').hide();
                        },
                        success: function(result) {
                            oTable.ajax.reload();
                            toastr_message(result.message_type, result.message);
                        },
                        error: function(e) {
                            if (e.status == 403) {
                                alert(
                                    'Unauthorized: Access is denied due to invalid credentials.'
                                );
                            } else {
                                alert('internal error occurred.');
                            }
                        }
                    });
                }
            });

            $("body").on("change", ".update_field", function() {

                var row_id = $(this).attr('data-id');
                var status = $(this).val();

                $.ajax({
                    type: "PUT",
                    url: '{{ route($route . 'index') }}/' + row_id,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": row_id,
                        "status": status,
                        "quick_update": "yes",
                    },
                    beforeSend: function() {
                        $('#datatable').waitMe({
                            effect: 'roundBounce'
                        });
                    },
                    complete: function() {
                        $('#datatable').waitMe('hide');
                    },
                    error: function(e) {
                        if (e.status == 403) {
                            alert('Unauthorized: Access is denied due to invalid credentials.');
                        } else {
                            alert('internal error occurred.');
                        }
                    },
                    success: function(result) {
                        //Success Code.
                        toastr_message(result.message_type, result.message);
                        oTable.ajax.reload();

                    }
                });
            });

        });
    </script>
@endsection