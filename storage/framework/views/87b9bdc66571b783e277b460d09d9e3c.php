

<?php $__env->startSection('body'); ?>


    <!-- Page header -->
    <div class="page-header page-header-light  shadow">
        <div class="page-header-content d-flex">
            <div class="page-title pb-3 pt-3">
                <h5 class="mb-0"><?php echo e($title); ?></h5>
            </div>

            <div class="my-auto ms-auto">
                <button type="button" class="btn btn-success btn-labeled btn-labeled-start text-bold ajax_insert_update" data-toggle="modal" data-target="#modal-data" data-method="GET"
                   data-url="<?php echo e(route($route . 'create')); ?>">
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
    <?php if(!empty($records)): ?>
        <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($record['id']); ?></td>
                <td><?php echo e($record['name']); ?></td>
                <td>
                    <?php if(!empty($record['image'])): ?>
                        <img src="<?php echo e(asset($record['image'])); ?>" alt="<?php echo e($record['name']); ?>" class="img-thumbnail" width="70" height="70">
                    <?php else: ?>
                        <span>No Image</span>
                    <?php endif; ?>
                </td>
                <td><?php echo e($record['status']); ?></td>
                <td class="text-center p-0">
                    <button data-url="<?php echo e(route($route . 'show', $record->id)); ?>" class="btn btn-indigo btn-sm ajax_show" title="View" data-method="GET">View</button>
                    &nbsp;<button href="javascript:void(0)" data-url="<?php echo e(route($route . 'edit', $record->id)); ?>" class="btn btn-teal btn-sm ajax_insert_update" title="Edit"  data-method="GET">Edit</button>
                    &nbsp;<button class="btn btn-danger btn-sm ajax_delete" data-id="<?php echo e($record->id); ?>" data-toggle="tooltip" data-original-title="Delete">Delete</button>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</tbody>

            </table>
        </div>
        <!-- /basic datatable -->

    </div>
    <!-- /content area -->

    <!-- /inner content -->


<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
    <!-- Basic modal -->
    <div id="modal-data" class="modal fade" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content" id="modal_set_data">

            </div>
        </div>
    </div>
    <!-- /basic modal -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        // Initialize DataTable with server-side processing
        var oTable = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            stateSave: true,
            ajax: '<?php echo e(route($route . 'index')); ?>',
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
                data: { "_token": "<?php echo e(csrf_token()); ?>" },
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
                    url: "<?php echo e(route($route . 'index')); ?>/" + $(this).attr('data-id'),
                    data: { "_token": "<?php echo e(csrf_token()); ?>" },
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
        url: '<?php echo e(route($route . 'index')); ?>/' + row_id,
        data: {
            "_token": "<?php echo e(csrf_token()); ?>",
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\mark11\resources\views/admin/category/index.blade.php ENDPATH**/ ?>