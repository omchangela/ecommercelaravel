

<?php $__env->startSection('body'); ?>
<br><br><br><br>
<main id="content" class="wrapper layout-page">
    <section class="page-title z-index-2 position-relative">
        <div class="bg-body-secondary">
            <div class="container">
                <nav class="py-4 lh-30px" aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center py-1">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shop Grid Layout</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="text-center py-13">
            <div class="container">
                <h2 class="mb-0">Shop Grid Layout</h2>
            </div>
        </div>
    </section>

    <section class="container container-xxl">
        <div class="tool-bar mb-11 align-items-center justify-content-between d-lg-flex">
            <div class="tool-bar-left mb-6 mb-lg-0 fs-18px">
                We found <span class="text-body-emphasis fw-semibold"><?php echo e($totalProducts); ?></span> products available for you
            </div>
            <div class="tool-bar-right align-items-center d-flex">
                <ul class="list-unstyled d-flex align-items-center list-inline mb-0 ms-auto">
                    <li class="list-inline-item me-0">
                        <form method="GET" action="<?php echo e(route('shop.index')); ?>" id="filter-form">
                            <select class="form-select" name="orderby" onchange="this.form.submit()">
                                <option value="date" <?php echo e(request('orderby') == 'date' ? 'selected' : ''); ?>>Sort by latest</option>
                                <option value="price" <?php echo e(request('orderby') == 'price' ? 'selected' : ''); ?>>Sort by price: low to high</option>
                                <option value="price-desc" <?php echo e(request('orderby') == 'price-desc' ? 'selected' : ''); ?>>Sort by price: high to low</option>
                            </select>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <div class="container container-xxl pb-16 pb-lg-18">
        <div class="row">
            <div class="col-lg-9 order-lg-1">
                <div class="row gy-11" id="product-list">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-sm-6 col-lg-4 col-xl-3">
                        <div class="card card-product grid-2 bg-transparent border-0" data-animate="fadeInUp">
                            <figure class="card-img-top position-relative mb-7 overflow-hidden">
                                <a href="<?php echo e(route('product.detail', ['id' => $product->id])); ?>" class="hover-zoom-in d-block" title="<?php echo e($product->name); ?>">
                                    <img src="<?php echo e($product->image_url); ?>" class="img-fluid lazy-image w-100" alt="<?php echo e($product->name); ?>" width="330" height="440">
                                </a>
                            </figure>
                            <div class="card-body text-center p-0">
                                <?php if($product->prices->isNotEmpty()): ?>
                                <?php
                                $minPrice = $product->prices->min('price');
                                ?>
                                <span class="d-flex align-items-center price text-body-emphasis fw-bold justify-content-center mb-3 fs-6">
                                    Starting From ₹ <?php echo e(number_format($minPrice)); ?>

                                </span>
                                <?php else: ?>
                                <span class="d-flex align-items-center price text-body-emphasis fw-bold justify-content-center mb-3 fs-6">
                                    Price Not Available
                                </span>
                                <?php endif; ?>

                                <h4 class="product-title card-title text-primary-hover text-body-emphasis fs-15px fw-500 mb-3">
                                    <a class="text-decoration-none text-reset" href="<?php echo e(route('product.detail', ['id' => $product->id])); ?>"><?php echo e($product->name); ?></a>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <nav class="d-flex mt-13 pt-3 justify-content-center" aria-label="pagination" data-animate="fadeInUp" id="pagination">
    <?php echo e($products->links('vendor.pagination.bootstrap-5')); ?>

</nav>

            </div>

            <div class="col-lg-3 d-lg-block d-none">
                <aside class="primary-sidebar pe-xl-9 me-xl-2 mt-12 pt-2 mt-lg-0 pt-lg-0">
                    <div class="widget widget-product-category">
                        <h4 class="widget-title fs-5 mb-6">Category</h4>
                        <ul class="navbar-nav navbar-nav-cate" id="widget_product_category">
                            <li class="nav-item">
                                <a href="<?php echo e(route('shop.index')); ?>" title="View All Products" class="text-reset position-relative d-block text-decoration-none text-body-emphasis-hover d-flex align-items-center text-uppercase fs-15px mb-3">
                                    All Products
                                </a>
                            </li>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="nav-item">
                                <a href="<?php echo e(route('shop.index', ['category' => $category->id])); ?>" class="text-reset d-flex align-items-center fs-15px mb-3">
                                    <?php echo e($category->name); ?>

                                </a>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>

                    <!-- Price Range Filter as List -->
                    <div class="widget widget-product-price">
                        <h4 class="widget-title fs-5 mb-6">Price Range</h4>
                        <ul class="navbar-nav navbar-nav-cate" id="widget_product_price">
                            <li class="nav-item">
                                <a href="<?php echo e(route('shop.index', ['price_range' => '0-500'])); ?>" class="text-reset d-flex align-items-center fs-15px mb-3 <?php echo e(request('price_range') == '0-500' ? 'text-body-emphasis' : ''); ?>">
                                    ₹0 - ₹500
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('shop.index', ['price_range' => '501-1000'])); ?>" class="text-reset d-flex align-items-center fs-15px mb-3 <?php echo e(request('price_range') == '501-1000' ? 'text-body-emphasis' : ''); ?>">
                                    ₹501 - ₹1000
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('shop.index', ['price_range' => '1001-5000'])); ?>" class="text-reset d-flex align-items-center fs-15px mb-3 <?php echo e(request('price_range') == '1001-5000' ? 'text-body-emphasis' : ''); ?>">
                                    ₹1001 - ₹5000
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('shop.index', ['price_range' => '5001-10000'])); ?>" class="text-reset d-flex align-items-center fs-15px mb-3 <?php echo e(request('price_range') == '5001-10000' ? 'text-body-emphasis' : ''); ?>">
                                    ₹5001 - ₹10000
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('shop.index', ['price_range' => '10001-50000'])); ?>" class="text-reset d-flex align-items-center fs-15px mb-3 <?php echo e(request('price_range') == '10001-50000' ? 'text-body-emphasis' : ''); ?>">
                                    ₹10001 - ₹50000
                                </a>
                            </li>
                        </ul>
                    </div>
                </aside>

            </div>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterForm = document.getElementById('filter-form');
        const filterFormPrice = document.getElementById('filter-form-price');
        const productList = document.getElementById('product-list');
        const pagination = document.getElementById('pagination');

        // Listen for changes in filters
        filterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            updateProductList();
        });

        filterFormPrice.addEventListener('submit', function(e) {
            e.preventDefault();
            updateProductList();
        });

        // Function to update the product list
        function updateProductList() {
            const formData = new FormData(filterForm);
            const formDataPrice = new FormData(filterFormPrice);
            const combinedData = new URLSearchParams([...formData, ...formDataPrice]);

            fetch('/shop', {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                    },
                    body: combinedData,
                })
                .then(response => response.json())
                .then(data => {
                    productList.innerHTML = data.products;
                    pagination.innerHTML = data.pagination;
                });
        }
    });
</script>
<?php echo $__env->make('website.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\mark11\resources\views/website/shop/index.blade.php ENDPATH**/ ?>