

<?php $__env->startSection('body'); ?>

<div class="page-header page-header-light shadow">
    <div class="page-header-content d-flex">
        <div class="page-title pb-3 pt-3">
            <h5 class="mb-0">Manage Banners</h5>
        </div>
        <div class="my-auto ms-auto">
            <a href="<?php echo e(route('admin.banners.create')); ?>" class="btn btn-success btn-labeled btn-labeled-start text-bold">
                <span class="btn-labeled-icon bg-black bg-opacity-20"><i class="icon-plus-circle2"></i></span>
                ADD NEW BANNER
            </a>
        </div>
    </div>
</div>

<div class="content">
    <div class="card">
        <table id="datatable" class="table table-sm table-striped table-bordered">
            <thead>
                <tr class="bg-secondary text-light table-border-double">
                    <th>ID</th>
                    <th>Text Input 1</th>
                    <th>Text Input 2</th>
                    <th>Text Input 3</th>
                    <th>Image</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data will be loaded dynamically via AJAX -->
            </tbody>
        </table>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').DataTable({
            "processing": true,       // Show loading indicator while data is being processed
            "serverSide": true,       // Enable server-side processing
            "ajax": {
                "url": "<?php echo e(route('admin.banners.index')); ?>", // URL for fetching the data
                "type": "GET"
            },
            "columns": [
                { "data": "id" },
                { "data": "text_input_1" },
                { "data": "text_input_2" },
                { "data": "text_input_3" },
                { "data": "image", "orderable": false, "searchable": false },
                { "data": "created_at" },
                { "data": "action", "orderable": false, "searchable": false }
            ],
            "order": [[0, 'desc']]  // Default sorting by ID
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\mark11\resources\views/admin/banners/index.blade.php ENDPATH**/ ?>