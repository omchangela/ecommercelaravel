<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo e(env('APP_NAME')); ?></title>

    <!-- Global stylesheets -->
    <link href="<?php echo e(asset('assets/admin')); ?>/fonts/inter/inter.css" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('assets/admin')); ?>/icons/phosphor/styles.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('assets/admin')); ?>/css/ltr/all.min.css" id="stylesheet" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('assets/admin')); ?>/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">

    <!-- /global stylesheets -->

    <!-- Core JS files -->

    <script src="<?php echo e(asset('assets/admin')); ?>/demo/demo_configurator.js"></script>
    <script src="<?php echo e(asset('assets/admin')); ?>/js/bootstrap/bootstrap.bundle.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->


    

    <script src="<?php echo e(asset('assets/admin')); ?>/js/jquery/jquery.min.js"></script>
    <script src="<?php echo e(asset('assets/admin')); ?>/js/vendor/tables/datatables/datatables.min.js"></script>

    <script src="<?php echo e(asset('assets/admin')); ?>/js/app.js"></script>
    <script src="<?php echo e(asset('assets/admin')); ?>/demo/pages/datatables_basic.js"></script>
    <!-- /theme JS files -->

    <!-- WaitMe -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin')); ?>/js/vendor/waitme/waitMe.min.css">
    <script src="<?php echo e(asset('assets/admin')); ?>/js/vendor/waitme/waitMe.min.js"></script>
    <script src="<?php echo e(asset('assets/admin')); ?>/js/vendor/notifications/noty.min.js"></script>
    <script src="<?php echo e(asset('assets/admin')); ?>/demo/pages/extra_noty.js"></script>

    <script src="<?php echo e(asset('assets/admin')); ?>/js/custom.js"></script>
    
</head>

<body>

<!-- Page content -->
<div class="page-content">

    <?php echo $__env->make('admin.layout.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Main content -->
    <div class="content-wrapper">
        <!-- Main navbar -->
        <div class="navbar navbar-expand-lg navbar-static shadow">
            <div class="container-fluid">
                <div class="d-flex d-lg-none me-2">
                    <button type="button" class="navbar-toggler sidebar-mobile-main-toggle rounded-pill">
                        <i class="ph-list"></i>
                    </button>
                </div>

                <div class="navbar-collapse flex-lg-1 order-2 order-lg-1 collapse" id="navbar_search">
                    <span class="fw-semibold fs-lg "><?php echo e(env('APP_NAME')); ?></span>
                </div>

                <ul class="nav hstack gap-sm-1 flex-row justify-content-end order-1 order-lg-2">
                    <li class="nav-item d-lg-none">
                        <a href="#navbar_search" class="navbar-nav-link navbar-nav-link-icon rounded-pill" data-bs-toggle="collapse">
                            <i class="ph-magnifying-glass"></i>
                        </a>
                    </li>

                    <li class="nav-item nav-item-dropdown-lg dropdown">
                        <a href="#" class="navbar-nav-link align-items-center rounded-pill p-1" data-bs-toggle="dropdown">
                            <div class="status-indicator-container">
                                <img src="<?php echo e(asset('assets/admin')); ?>/images/demo/users/face1.jpg" class="w-32px h-32px rounded-pill" alt="">
                                <span class="status-indicator bg-success"></span>
                            </div>
                            <span class="d-none d-lg-inline-block mx-lg-2"><?php echo e(ucwords(auth()->guard('admin')->user()->name)); ?></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="<?php echo e(url('admin/profile')); ?>" class="dropdown-item">
                                <i class="ph-user-circle me-2"></i>
                                My profile
                            </a>
                            <div class="dropdown-divider"></div>
                            
                                
                                
                            
                            <?php echo e(html()->form("POST",url('admin/logout'))->open()); ?>

                            <a href="#" onclick="event.preventDefault(); this.closest('form').submit();" class="dropdown-item text-danger">
                                <i class="ph-sign-out me-2"></i>
                                Logout
                            </a>
                            <?php echo e(html()->form()->close()); ?>

                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /main navbar -->

        <!-- Inner content -->
        <div class="content-inner">

        <?php echo $__env->yieldContent('body'); ?>

        <?php echo $__env->make('admin.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>
    </div>
    <!-- /main content -->
    <?php echo $__env->yieldContent('modal'); ?>
</div>
<!-- /page content -->


</body>
<?php echo $__env->yieldContent('js'); ?>
</html><?php /**PATH C:\Users\ASUS\Downloads\mark11\resources\views/admin/layout/app.blade.php ENDPATH**/ ?>