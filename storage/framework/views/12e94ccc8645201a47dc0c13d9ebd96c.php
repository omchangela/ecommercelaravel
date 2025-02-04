<!-- Main sidebar -->
<div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">

    <!-- Sidebar header -->
    <div class="sidebar-section bg-black bg-opacity-10 border-bottom border-bottom-white border-opacity-10">
        <div class="sidebar-logo d-flex justify-content-center align-items-center">
            <a href="<?php echo e(url('admin/dashboard')); ?>" class="d-inline-flex align-items-center py-2">
                <img src="<?php echo e(asset('assets/admin')); ?>/images/logo_icon.svg" class="sidebar-logo-icon" alt="">
                <span class="sidebar-resize-hide ms-3 text-white text-bold " style="font-size: 15px;">Admin Panel</span>
                
            </a>

            <div class="sidebar-resize-hide ms-auto">
                <button type="button"
                        class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                    <i class="ph-arrows-left-right"></i>
                </button>

                <button type="button"
                        class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-mobile-main-toggle d-lg-none">
                    <i class="ph-x"></i>
                </button>
            </div>
        </div>
    </div>
    <!-- /sidebar header -->


    <!-- Sidebar content -->
    <div class="sidebar-content">


        <!-- Main navigation -->
        <div class="sidebar-section">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                
                
                
                
                <li class="nav-item ">
                    <a href="<?php echo e(url('admin/dashboard')); ?>" class="nav-link <?php echo e(!empty($menu) && $menu == 'dashboard' ? 'active' : ''); ?>">
                        <i class="ph-house"></i>
                        <span>Dashboard</span>
                        
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(url('admin/demoajax')); ?>" class="nav-link <?php echo e(!empty($menu) && $menu == 'demoajax' ? 'active' : ''); ?>">
                        <i class="ph-rows"></i>
                        <span>Demo ajax</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(url('admin/product')); ?>" class="nav-link <?php echo e(!empty($menu) && $menu == 'demonormal' ? 'active' : ''); ?>">
                        <i class="ph-rows"></i>
                        <span>Products</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(url('admin/banners')); ?>" class="nav-link <?php echo e(!empty($menu) && $menu == 'banner' ? 'active' : ''); ?>">
                        <i class="ph-rows"></i>
                        <span>Banners</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(url('admin/category')); ?>" class="nav-link <?php echo e(!empty($menu) && $menu == 'category' ? 'active' : ''); ?>">
                        <i class="ph-rows"></i>
                        <span>Category</span>
                        
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(url('admin/indepth-product-details')); ?>" class="nav-link <?php echo e(!empty($menu) && $menu == 'indepth-product-details' ? 'active' : ''); ?>">
                        <i class="ph-rows"></i>
                        <span>Add Product Details</span>
                        
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(url('admin/ingredients')); ?>" class="nav-link <?php echo e(!empty($menu) && $menu == 'ingredients' ? 'active' : ''); ?>">
                        <i class="ph-rows"></i>
                        <span>Add Product ingredients</span>
                        
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(url('admin/howtouses')); ?>" class="nav-link <?php echo e(!empty($menu) && $menu == 'howtouses' ? 'active' : ''); ?>">
                        <i class="ph-rows"></i>
                        <span>Add How to Use Product</span>
                        
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(url('admin/instagram')); ?>" class="nav-link <?php echo e(!empty($menu) && $menu == 'instagram' ? 'active' : ''); ?>">
                        <i class="ph-rows"></i>
                        <span>Instagram Images</span>
                        
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(url('admin/product_banners')); ?>" class="nav-link <?php echo e(!empty($menu) && $menu == 'product_banners' ? 'active' : ''); ?>">
                        <i class="ph-rows"></i>
                        <span> Main Product Banners</span>
                        
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(url('admin/orders')); ?>" class="nav-link <?php echo e(!empty($menu) && $menu == 'orders' ? 'active' : ''); ?>">
                        <i class="ph-rows"></i>
                        <span> orders </span>
                        
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(url('admin/orderproducts')); ?>" class="nav-link <?php echo e(!empty($menu) && $menu == 'orderproducts' ? 'active' : ''); ?>">
                        <i class="ph-rows"></i>
                        <span> orderproducts </span>
                        
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(url('admin/payments')); ?>" class="nav-link <?php echo e(!empty($menu) && $menu == 'payments' ? 'active' : ''); ?>">
                        <i class="ph-rows"></i>
                        <span> payments </span>
                        
                    </a>
                </li>

                <!-- <li class="nav-item">
                    <a href="<?php echo e(url('admin/privacy')); ?>" class="nav-link <?php echo e(!empty($menu) && $menu == 'privacy' ? 'active' : ''); ?>">
                        <i class="ph-rows"></i>
                        <span> privacy & Policy</span>
                        
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo e(url('admin/terms')); ?>" class="nav-link <?php echo e(!empty($menu) && $menu == 'terms' ? 'active' : ''); ?>">
                        <i class="ph-rows"></i>
                        <span> Terms </span>
                        
                    </a>
                </li> -->

                <li class="nav-item nav-item-submenu <?php echo e(!empty($menu) && $menu == 'pages' ? ' nav-item-expanded nav-item-open' : ''); ?>">
                    <a href="#" class="nav-link">
                        <i class="ph-layout"></i>
                        <span>pages</span>
                    </a>
                    <ul class="nav-group-sub collapse <?php echo e(!empty($menu) && $menu == 'mainmenu' ? ' show' : ''); ?>">
                        <li class="nav-item"><a href="<?php echo e(url('admin/pages/terms')); ?>" class="nav-link <?php echo e(!empty($menu) && $menu == 'submenu' ? 'active' : ''); ?>">Terms</a></li>
                        <li class="nav-item"><a href="<?php echo e(url('admin/pages/privacy')); ?>" class="nav-link">Privacy & Policy</a></li>
                        <li class="nav-item"><a href="<?php echo e(url('admin/pages/returnpolicy')); ?>" class="nav-link">Return Policy</a></li>

                    </ul>
                </li>

                
                    
                        
                        
                        
                    
                


            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->


</div>
<!-- /main sidebar -->
<?php /**PATH C:\Users\ASUS\Downloads\mark11\resources\views/admin/layout/menu.blade.php ENDPATH**/ ?>