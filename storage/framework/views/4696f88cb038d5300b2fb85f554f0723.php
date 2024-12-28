

<?php $__env->startSection('body'); ?>

<!-- Page header -->
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-flex">
        <div class="page-title pb-3 pt-3">
            <h5 class="mb-0"><?php echo e($title); ?></h5>
        </div>
        <div class="my-auto ms-auto">
            <a href="<?php echo e(route($route . 'create')); ?>" class="btn btn-success btn-labeled btn-labeled-start text-bold ajax_insert_update">
                <span class="btn-labeled-icon bg-black bg-opacity-20"><i class="icon-plus-circle2"></i></span>
                ADD NEW
            </a>
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
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Rate</th>
                    <th>Review Count</th>
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
</div>
<!-- /content area -->

<!-- Modal -->
<div id="modal-data" class="modal fade" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content" id="modal_set_data"></div>
    </div>
</div>
<!-- /Modal -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
    $(document).ready(function() {
        var oTable = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            stateSave: true,
            ajax: '<?php echo e(route($route . 'index')); ?>', // Ensure $route contains the correct prefix like 'product.'
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'image_url',
                    name: 'image_url',
                    render: renderImage
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'category_name',
                    name: 'category.name', // Ensure this field is available in the response
                    defaultContent: 'N/A'
                },
                {
                    data: 'status',
                    name: 'status',
                    className: 'text-center p-1'
                },
                {
                    data: 'rate',
                    name: 'rate',
                    className: 'text-center p-1'
                },
                {
                    data: 'review_count',
                    name: 'review_count',
                    className: 'text-center p-1'
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    render: formatDate
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    className: 'text-center p-1'
                },
            ],
        });

        // Render image function
        function renderImage(data) {
            // Check if the data is not null and is a valid URL
            if (data) {
                // Return image tag with proper image URL
                return `<img src="${data}" alt="Image" width="100" height="100" class="img-thumbnail">`;
            } else {
                // If no image, return 'N/A'
                return 'N/A';
            }
        }

        // Format date function
        function formatDate(data) {
            if (!data || isNaN(new Date(data))) {
                return 'N/A'; // Return 'N/A' if the date is invalid
            }
            return new Date(data).toLocaleString(); // Format the date
        }

        // AJAX actions for delete and quick update
        $("body").on('click', '.ajax_delete', function() {
            var obj = $(this);
            var id = $(this).attr('data-id');

            if (confirm("Are you sure to Delete Data?")) {
                $.ajax({
                    type: "DELETE",
                    url: "<?php echo e(route($route . 'index')); ?>/" + id, // Ensure route is correct
                    data: {
                        id: id,
                        _token: "<?php echo e(csrf_token()); ?>"
                    },
                    dataType: 'json',
                    beforeSend: function() {
                        $(this).attr('disabled', true);
                        $('.alert .msg-content').html('');
                        $('.alert').hide();
                    },
                    success: function(result) {
                        oTable.ajax.reload();
                        toastr_message(result.message_type, result.message); // Ensure toastr is included for success message
                    },
                    error: function(e) {
                        if (e.status == 403) {
                            alert('Unauthorized: Access is denied due to invalid credentials.');
                        } else {
                            alert('Internal error occurred.');
                        }
                    }
                });
            }
        });

        // Update status field via AJAX
        $("body").on("change", ".update_field", function() {
            var row_id = $(this).attr('data-id');
            var status = $(this).val();

            $.ajax({
                type: "PUT",
                url: '<?php echo e(route($route . 'index')); ?>/' + row_id, // Ensure correct route
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
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
                        alert('Internal error occurred.');
                    }
                },
                success: function(result) {
                    toastr_message(result.message_type, result.message);
                    oTable.ajax.reload(); // Refresh table data
                }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\mark11\resources\views/admin/product/index.blade.php ENDPATH**/ ?>