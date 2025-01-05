<!-- Main sidebar -->
<div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">

    <!-- Sidebar header -->
    <div class="sidebar-section bg-black bg-opacity-10 border-bottom border-bottom-white border-opacity-10">
        <div class="sidebar-logo d-flex justify-content-center align-items-center">
            <a href="{{ url('admin/dashboard') }}" class="d-inline-flex align-items-center py-2">
                <img src="{{ asset('assets/admin') }}/images/logo_icon.svg" class="sidebar-logo-icon" alt="">
                <span class="sidebar-resize-hide ms-3 text-white text-bold " style="font-size: 15px;">Admin Panel</span>
                {{--<img src="{{ asset('assets/admin') }}/images/logo_text_light.svg" class="sidebar-resize-hide ms-3" height="14" alt="">--}}
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
                {{--<li class="nav-item-header">--}}
                {{--<div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Main</div>--}}
                {{--<i class="ph-dots-three sidebar-resize-show"></i>--}}
                {{--</li>--}}
                <li class="nav-item ">
                    <a href="{{ url('admin/dashboard') }}" class="nav-link {{ !empty($menu) && $menu == 'dashboard' ? 'active' : '' }}">
                        <i class="ph-house"></i>
                        <span>Dashboard</span>
                        {{--<span class="badge bg-primary align-self-center rounded-pill ms-auto">4.0</span>--}}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/demoajax') }}" class="nav-link {{ !empty($menu) && $menu == 'demoajax' ? 'active' : '' }}">
                        <i class="ph-rows"></i>
                        <span>Demo ajax</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/product') }}" class="nav-link {{ !empty($menu) && $menu == 'demonormal' ? 'active' : '' }}">
                        <i class="ph-rows"></i>
                        <span>Products</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/banners') }}" class="nav-link {{ !empty($menu) && $menu == 'banner' ? 'active' : '' }}">
                        <i class="ph-rows"></i>
                        <span>Banners</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/category') }}" class="nav-link {{ !empty($menu) && $menu == 'category' ? 'active' : '' }}">
                        <i class="ph-rows"></i>
                        <span>Category</span>
                        {{--<span class="badge bg-primary align-self-center rounded-pill ms-auto">4.0</span>--}}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/indepth-product-details') }}" class="nav-link {{ !empty($menu) && $menu == 'indepth-product-details' ? 'active' : '' }}">
                        <i class="ph-rows"></i>
                        <span>Add Product Details</span>
                        {{--<span class="badge bg-primary align-self-center rounded-pill ms-auto">4.0</span>--}}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/ingredients') }}" class="nav-link {{ !empty($menu) && $menu == 'ingredients' ? 'active' : '' }}">
                        <i class="ph-rows"></i>
                        <span>Add Product ingredients</span>
                        {{--<span class="badge bg-primary align-self-center rounded-pill ms-auto">4.0</span>--}}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/howtouses') }}" class="nav-link {{ !empty($menu) && $menu == 'howtouses' ? 'active' : '' }}">
                        <i class="ph-rows"></i>
                        <span>Add How to Use Product</span>
                        {{--<span class="badge bg-primary align-self-center rounded-pill ms-auto">4.0</span>--}}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/instagram') }}" class="nav-link {{ !empty($menu) && $menu == 'instagram' ? 'active' : '' }}">
                        <i class="ph-rows"></i>
                        <span>Instagram Images</span>
                        {{--<span class="badge bg-primary align-self-center rounded-pill ms-auto">4.0</span>--}}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/product_banners') }}" class="nav-link {{ !empty($menu) && $menu == 'product_banners' ? 'active' : '' }}">
                        <i class="ph-rows"></i>
                        <span> Main Product Banners</span>
                        {{--<span class="badge bg-primary align-self-center rounded-pill ms-auto">4.0</span>--}}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/orders') }}" class="nav-link {{ !empty($menu) && $menu == 'orders' ? 'active' : '' }}">
                        <i class="ph-rows"></i>
                        <span> orders </span>
                        {{--<span class="badge bg-primary align-self-center rounded-pill ms-auto">4.0</span>--}}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/orderproducts') }}" class="nav-link {{ !empty($menu) && $menu == 'orderproducts' ? 'active' : '' }}">
                        <i class="ph-rows"></i>
                        <span> orderproducts </span>
                        {{--<span class="badge bg-primary align-self-center rounded-pill ms-auto">4.0</span>--}}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/payments') }}" class="nav-link {{ !empty($menu) && $menu == 'payments' ? 'active' : '' }}">
                        <i class="ph-rows"></i>
                        <span> payments </span>
                        {{--<span class="badge bg-primary align-self-center rounded-pill ms-auto">4.0</span>--}}
                    </a>
                </li>

                

                {{--<li class="nav-item ">--}}
                    {{--<a href="#" onclick="event.preventDefault(); this.closest('form').submit();" class="dropdown-item text-danger">--}}
                        {{--<i class="ph-sign-out me-2"></i>--}}
                        {{--<span>Logout</span>--}}
                        {{--<span class="badge bg-primary align-self-center rounded-pill ms-auto">4.0</span>--}}
                    {{--</a>--}}
                {{--</li>--}}


            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->


</div>
<!-- /main sidebar -->
