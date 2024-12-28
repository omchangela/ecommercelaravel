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
            <table class="table table-sm table-striped table-bordered">
                <thead>
                    <tr class="bg-secondary text-light table-border-double">
                        <th>ID</th>
                        <th>Product</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th class="text-center" width="200">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($details as $detail)
                    <tr>
                        <td>{{ $detail->id }}</td>
                        <td>{{ $detail->product->name }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $detail->image) }}" alt="Image" class="img-thumbnail" width="100">
                        </td>
                        <td>{{ $detail->description }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.indepth-product-details.edit', $detail->id) }}" class="btn btn-warning btn-sm" title="Edit">Edit</a>
                            <form action="{{ route('admin.indepth-product-details.destroy', $detail->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')" title="Delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- /basic datatable -->
    
    {{ $details->links() }} <!-- Pagination -->
</div>
<!-- /content area -->

@endsection

@section('modal')
<!-- Basic modal for handling in-depth product details -->
<div id="modal-data" class="modal fade" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content" id="modal_set_data">
            <!-- Modal content will be inserted dynamically here -->
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function () {
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
                        location.reload(); // Reload the page after success
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
                    url: "{{ route('admin.indepth-product-details.index') }}/" + $(this).attr('data-id'),
                    data: { "_token": "{{ csrf_token() }}" },
                    beforeSend: function () { $(this).attr('disabled', true); },
                    success: function (result) {
                        location.reload();
                        toastr_message(result.message_type, result.message);
                    },
                    error: handleAjaxError
                });
            }
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
