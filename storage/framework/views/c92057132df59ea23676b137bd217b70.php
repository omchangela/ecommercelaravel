<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Dashboard')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <?php echo e(__("You're logged in!")); ?>

                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
   
 

    <!-- 
   <!-- <section class="container container-xxl pt-lg-18 pt-15">

        <div class="mb-12 pb-3 text-center" data-animate="fadeInUp">
            <h2 class="mb-5">Customer Favorite Beauty Essentials</h2>
            <p class="fs-18px mb-0 mw-xl-30 mw-lg-50 mw-md-75 ms-auto me-auto">Made using clean, non-toxic ingredients, our products are designed for everyone.</p>
        </div>

        <div class="row">
            <div class="col-lg-5 mb-12 mb-xl-0 order-lg-1" data-animate="fadeInUp">
                <div class="card border-0 rounded-0 hover-zoom-in hover-shine">

                    <img class="lazy-image w-100 img-fluid card-img object-fit-cover banner-02" src="#" data-src="<?php echo e(asset('assets/website/assets')); ?>/images/banner/banner-34.jpg" width="570" height="913" alt="Pamper Your Skin">
                    <div class="card-img-overlay p-12 m-2 d-inline-flex flex-column justify-content-end">
                        <h5 class="card-subtitle fw-normal font-primary text-white fs-1 mb-5">Get the Glow</h5>
                        <h3 class="card-title mb-0 fs-2 text-white">Pamper Your Skin</h3>
                        <div class="mt-10 pt-2">
                            <a href="#" class="btn btn-white">Explore More</a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-7">
                <div class="row gy-11">
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="card card-product grid-1 bg-transparent border-0" data-animate="fadeInUp">
                            <figure class="card-img-top position-relative mb-7 overflow-hidden ">
                                <a href="./shop/product-details-v1.html" class="hover-zoom-in d-block" title="Enriched Duo">
                                    <img src="#" data-src="<?php echo e(asset('assets/website/assets')); ?>/images/products/product-01-330x440.jpg" class="img-fluid lazy-image w-100" alt="Enriched Duo" width="330" height="440">
                                </a>

                                <div class="position-absolute d-flex z-index-2 product-actions  horizontal"><a class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm add_to_cart" href="#" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart">
                                        <svg class="icon icon-shopping-bag-open-light">
                                            <use xlink:href="#icon-shopping-bag-open-light"></use>
                                        </svg>
                                    </a><a class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm quick-view"
                                        href="#" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Quick View">
                                        <span data-bs-toggle="modal" data-bs-target="#quickViewModal" class="d-flex align-items-center justify-content-center">
                                            <svg class="icon icon-eye-light">
                                                <use xlink:href="#icon-eye-light"></use>
                                            </svg>
                                        </span>
                                    </a>
                                    <a class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm wishlist" href="#" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Wishlist">
                                        <svg class="icon icon-star-light">
                                            <use xlink:href="#icon-star-light"></use>
                                        </svg>
                                    </a>
                                    <a class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm compare" href="./shop/compare.html" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Compare">
                                        <svg class="icon icon-arrows-left-right-light">
                                            <use xlink:href="#icon-arrows-left-right-light"></use>
                                        </svg>
                                    </a>
                                </div>
                            </figure>
                            <div class="card-body text-center p-0">






                                <span class="d-flex align-items-center price text-body-emphasis fw-bold justify-content-center mb-3 fs-6">$29.00</span>

                                <h4 class="product-title card-title text-primary-hover text-body-emphasis fs-15px fw-500 mb-3"><a class="text-decoration-none text-reset" href="./shop/product-details-v1.html">Enriched Duo</a></h4>
                                <div class="d-flex align-items-center fs-12px justify-content-center">
                                    <div class="rating">
                                        <div class="empty-stars">
                                            <span class="star">
                                                <svg class="icon star-o">
                                                    <use xlink:href="#star-o"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star-o">
                                                    <use xlink:href="#star-o"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star-o">
                                                    <use xlink:href="#star-o"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star-o">
                                                    <use xlink:href="#star-o"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star-o">
                                                    <use xlink:href="#star-o"></use>
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="filled-stars"
                                            style="width: 100%">
                                            <span class="star">
                                                <svg class="icon star text-primary">
                                                    <use xlink:href="#star"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star text-primary">
                                                    <use xlink:href="#star"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star text-primary">
                                                    <use xlink:href="#star"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star text-primary">
                                                    <use xlink:href="#star"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star text-primary">
                                                    <use xlink:href="#star"></use>
                                                </svg>
                                            </span>
                                        </div>
                                    </div><span class="reviews ms-4 pt-3 fs-14px">2947 reviews</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="card card-product grid-1 bg-transparent border-0" data-animate="fadeInUp">
                            <figure class="card-img-top position-relative mb-7 overflow-hidden ">
                                <a href="./shop/product-details-v1.html" class="hover-zoom-in d-block" title="Shield Spray">
                                    <img src="#" data-src="./assets/images/products/product-02-330x440.jpg" class="img-fluid lazy-image w-100" alt="Shield Spray" width="330" height="440">
                                </a>

                                <div class="position-absolute d-flex z-index-2 product-actions  horizontal"><a class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm add_to_cart" href="#" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart">
                                        <svg class="icon icon-shopping-bag-open-light">
                                            <use xlink:href="#icon-shopping-bag-open-light"></use>
                                        </svg>
                                    </a><a class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm quick-view"
                                        href="#" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Quick View">
                                        <span data-bs-toggle="modal" data-bs-target="#quickViewModal" class="d-flex align-items-center justify-content-center">
                                            <svg class="icon icon-eye-light">
                                                <use xlink:href="#icon-eye-light"></use>
                                            </svg>
                                        </span>
                                    </a>
                                    <a class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm wishlist" href="#" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Wishlist">
                                        <svg class="icon icon-star-light">
                                            <use xlink:href="#icon-star-light"></use>
                                        </svg>
                                    </a>
                                    <a class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm compare" href="./shop/compare.html" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Compare">
                                        <svg class="icon icon-arrows-left-right-light">
                                            <use xlink:href="#icon-arrows-left-right-light"></use>
                                        </svg>
                                    </a>
                                </div>
                            </figure>
                            <div class="card-body text-center p-0">






                                <span class="d-flex align-items-center price text-body-emphasis fw-bold justify-content-center mb-3 fs-6">$29.00</span>

                                <h4 class="product-title card-title text-primary-hover text-body-emphasis fs-15px fw-500 mb-3"><a class="text-decoration-none text-reset" href="./shop/product-details-v1.html">Shield Spray</a></h4>
                                <div class="d-flex align-items-center fs-12px justify-content-center">
                                    <div class="rating">
                                        <div class="empty-stars">
                                            <span class="star">
                                                <svg class="icon star-o">
                                                    <use xlink:href="#star-o"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star-o">
                                                    <use xlink:href="#star-o"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star-o">
                                                    <use xlink:href="#star-o"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star-o">
                                                    <use xlink:href="#star-o"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star-o">
                                                    <use xlink:href="#star-o"></use>
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="filled-stars"
                                            style="width: 100%">
                                            <span class="star">
                                                <svg class="icon star text-primary">
                                                    <use xlink:href="#star"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star text-primary">
                                                    <use xlink:href="#star"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star text-primary">
                                                    <use xlink:href="#star"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star text-primary">
                                                    <use xlink:href="#star"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star text-primary">
                                                    <use xlink:href="#star"></use>
                                                </svg>
                                            </span>
                                        </div>
                                    </div><span class="reviews ms-4 pt-3 fs-14px">2947 reviews</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="card card-product grid-1 bg-transparent border-0" data-animate="fadeInUp">
                            <figure class="card-img-top position-relative mb-7 overflow-hidden ">
                                <a href="./shop/product-details-v1.html" class="hover-zoom-in d-block" title="Vital Eye Cream">
                                    <img src="#" data-src="./assets/images/products/product-05-330x440.jpg" class="img-fluid lazy-image w-100" alt="Vital Eye Cream" width="330" height="440">
                                </a>

                                <div class="position-absolute product-flash z-index-2 "><span class="badge badge-product-flash on-sale bg-primary">-26%</span></div>
                                <div class="position-absolute d-flex z-index-2 product-actions  horizontal"><a class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm add_to_cart" href="#" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart">
                                        <svg class="icon icon-shopping-bag-open-light">
                                            <use xlink:href="#icon-shopping-bag-open-light"></use>
                                        </svg>
                                    </a><a class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm quick-view"
                                        href="#" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Quick View">
                                        <span data-bs-toggle="modal" data-bs-target="#quickViewModal" class="d-flex align-items-center justify-content-center">
                                            <svg class="icon icon-eye-light">
                                                <use xlink:href="#icon-eye-light"></use>
                                            </svg>
                                        </span>
                                    </a>
                                    <a class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm wishlist" href="#" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Wishlist">
                                        <svg class="icon icon-star-light">
                                            <use xlink:href="#icon-star-light"></use>
                                        </svg>
                                    </a>
                                    <a class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm compare" href="./shop/compare.html" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Compare">
                                        <svg class="icon icon-arrows-left-right-light">
                                            <use xlink:href="#icon-arrows-left-right-light"></use>
                                        </svg>
                                    </a>
                                </div>
                            </figure>
                            <div class="card-body text-center p-0">






                                <span class="d-flex align-items-center price text-body-emphasis fw-bold justify-content-center mb-3 fs-6">
                                    <del class=" text-body fw-500 me-4 fs-13px">$39.00</del>
                                    <ins class="text-decoration-none">$29.00</ins></span>

                                <h4 class="product-title card-title text-primary-hover text-body-emphasis fs-15px fw-500 mb-3"><a class="text-decoration-none text-reset" href="./shop/product-details-v1.html">Vital Eye Cream</a></h4>
                                <div class="d-flex align-items-center fs-12px justify-content-center">
                                    <div class="rating">
                                        <div class="empty-stars">
                                            <span class="star">
                                                <svg class="icon star-o">
                                                    <use xlink:href="#star-o"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star-o">
                                                    <use xlink:href="#star-o"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star-o">
                                                    <use xlink:href="#star-o"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star-o">
                                                    <use xlink:href="#star-o"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star-o">
                                                    <use xlink:href="#star-o"></use>
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="filled-stars"
                                            style="width: 80%">
                                            <span class="star">
                                                <svg class="icon star text-primary">
                                                    <use xlink:href="#star"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star text-primary">
                                                    <use xlink:href="#star"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star text-primary">
                                                    <use xlink:href="#star"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star text-primary">
                                                    <use xlink:href="#star"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star text-primary">
                                                    <use xlink:href="#star"></use>
                                                </svg>
                                            </span>
                                        </div>
                                    </div><span class="reviews ms-4 pt-3 fs-14px">2947 reviews</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="card card-product grid-1 bg-transparent border-0" data-animate="fadeInUp">
                            <figure class="card-img-top position-relative mb-7 overflow-hidden ">
                                <a href="./shop/product-details-v1.html" class="hover-zoom-in d-block" title="Supreme Moisture Mask">
                                    <img src="#" data-src="./assets/images/products/product-03-330x440.jpg" class="img-fluid lazy-image w-100" alt="Supreme Moisture Mask" width="330" height="440">
                                </a>

                                <div class="position-absolute product-flash z-index-2 "><span class="badge badge-product-flash on-sale bg-primary">-26%</span></div>
                                <div class="position-absolute d-flex z-index-2 product-actions  horizontal"><a class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm add_to_cart" href="#" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart">
                                        <svg class="icon icon-shopping-bag-open-light">
                                            <use xlink:href="#icon-shopping-bag-open-light"></use>
                                        </svg>
                                    </a><a class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm quick-view"
                                        href="#" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Quick View">
                                        <span data-bs-toggle="modal" data-bs-target="#quickViewModal" class="d-flex align-items-center justify-content-center">
                                            <svg class="icon icon-eye-light">
                                                <use xlink:href="#icon-eye-light"></use>
                                            </svg>
                                        </span>
                                    </a>
                                    <a class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm wishlist" href="#" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Wishlist">
                                        <svg class="icon icon-star-light">
                                            <use xlink:href="#icon-star-light"></use>
                                        </svg>
                                    </a>
                                    <a class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm compare" href="./shop/compare.html" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Compare">
                                        <svg class="icon icon-arrows-left-right-light">
                                            <use xlink:href="#icon-arrows-left-right-light"></use>
                                        </svg>
                                    </a>
                                </div>
                            </figure>
                            <div class="card-body text-center p-0">






                                <span class="d-flex align-items-center price text-body-emphasis fw-bold justify-content-center mb-3 fs-6">
                                    <del class=" text-body fw-500 me-4 fs-13px">$39.00</del>
                                    <ins class="text-decoration-none">$29.00</ins></span>

                                <h4 class="product-title card-title text-primary-hover text-body-emphasis fs-15px fw-500 mb-3"><a class="text-decoration-none text-reset" href="./shop/product-details-v1.html">Supreme Moisture Mask</a></h4>
                                <div class="d-flex align-items-center fs-12px justify-content-center">
                                    <div class="rating">
                                        <div class="empty-stars">
                                            <span class="star">
                                                <svg class="icon star-o">
                                                    <use xlink:href="#star-o"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star-o">
                                                    <use xlink:href="#star-o"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star-o">
                                                    <use xlink:href="#star-o"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star-o">
                                                    <use xlink:href="#star-o"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star-o">
                                                    <use xlink:href="#star-o"></use>
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="filled-stars"
                                            style="width: 80%">
                                            <span class="star">
                                                <svg class="icon star text-primary">
                                                    <use xlink:href="#star"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star text-primary">
                                                    <use xlink:href="#star"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star text-primary">
                                                    <use xlink:href="#star"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star text-primary">
                                                    <use xlink:href="#star"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star text-primary">
                                                    <use xlink:href="#star"></use>
                                                </svg>
                                            </span>
                                        </div>
                                    </div><span class="reviews ms-4 pt-3 fs-14px">2947 reviews</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="card card-product grid-1 bg-transparent border-0" data-animate="fadeInUp">
                            <figure class="card-img-top position-relative mb-7 overflow-hidden ">
                                <a href="./shop/product-details-v1.html" class="hover-zoom-in d-block" title="Supreme Polishing Treatment">
                                    <img src="#" data-src="./assets/images/products/product-15-330x440.jpg" class="img-fluid lazy-image w-100" alt="Supreme Polishing Treatment" width="330" height="440">
                                </a>

                                <div class="position-absolute d-flex z-index-2 product-actions  horizontal"><a class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm add_to_cart" href="#" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart">
                                        <svg class="icon icon-shopping-bag-open-light">
                                            <use xlink:href="#icon-shopping-bag-open-light"></use>
                                        </svg>
                                    </a><a class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm quick-view"
                                        href="#" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Quick View">
                                        <span data-bs-toggle="modal" data-bs-target="#quickViewModal" class="d-flex align-items-center justify-content-center">
                                            <svg class="icon icon-eye-light">
                                                <use xlink:href="#icon-eye-light"></use>
                                            </svg>
                                        </span>
                                    </a>
                                    <a class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm wishlist" href="#" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Wishlist">
                                        <svg class="icon icon-star-light">
                                            <use xlink:href="#icon-star-light"></use>
                                        </svg>
                                    </a>
                                    <a class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm compare" href="./shop/compare.html" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Compare">
                                        <svg class="icon icon-arrows-left-right-light">
                                            <use xlink:href="#icon-arrows-left-right-light"></use>
                                        </svg>
                                    </a>
                                </div>
                            </figure>
                            <div class="card-body text-center p-0">






                                <span class="d-flex align-items-center price text-body-emphasis fw-bold justify-content-center mb-3 fs-6">$29.00</span>

                                <h4 class="product-title card-title text-primary-hover text-body-emphasis fs-15px fw-500 mb-3"><a class="text-decoration-none text-reset" href="./shop/product-details-v1.html">Supreme Polishing Treatment</a></h4>
                                <div class="d-flex align-items-center fs-12px justify-content-center">
                                    <div class="rating">
                                        <div class="empty-stars">
                                            <span class="star">
                                                <svg class="icon star-o">
                                                    <use xlink:href="#star-o"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star-o">
                                                    <use xlink:href="#star-o"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star-o">
                                                    <use xlink:href="#star-o"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star-o">
                                                    <use xlink:href="#star-o"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star-o">
                                                    <use xlink:href="#star-o"></use>
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="filled-stars"
                                            style="width: 100%">
                                            <span class="star">
                                                <svg class="icon star text-primary">
                                                    <use xlink:href="#star"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star text-primary">
                                                    <use xlink:href="#star"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star text-primary">
                                                    <use xlink:href="#star"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star text-primary">
                                                    <use xlink:href="#star"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star text-primary">
                                                    <use xlink:href="#star"></use>
                                                </svg>
                                            </span>
                                        </div>
                                    </div><span class="reviews ms-4 pt-3 fs-14px">2947 reviews</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="card card-product grid-1 bg-transparent border-0" data-animate="fadeInUp">
                            <figure class="card-img-top position-relative mb-7 overflow-hidden ">
                                <a href="./shop/product-details-v1.html" class="hover-zoom-in d-block" title="Scalp Moisturizing Cream">
                                    <img src="#" data-src="./assets/images/products/product-06-330x440.jpg" class="img-fluid lazy-image w-100" alt="Scalp Moisturizing Cream" width="330" height="440">
                                </a>

                                <div class="position-absolute d-flex z-index-2 product-actions  horizontal"><a class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm add_to_cart" href="#" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart">
                                        <svg class="icon icon-shopping-bag-open-light">
                                            <use xlink:href="#icon-shopping-bag-open-light"></use>
                                        </svg>
                                    </a><a class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm quick-view"
                                        href="#" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Quick View">
                                        <span data-bs-toggle="modal" data-bs-target="#quickViewModal" class="d-flex align-items-center justify-content-center">
                                            <svg class="icon icon-eye-light">
                                                <use xlink:href="#icon-eye-light"></use>
                                            </svg>
                                        </span>
                                    </a>
                                    <a class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm wishlist" href="#" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Wishlist">
                                        <svg class="icon icon-star-light">
                                            <use xlink:href="#icon-star-light"></use>
                                        </svg>
                                    </a>
                                    <a class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm compare" href="./shop/compare.html" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Compare">
                                        <svg class="icon icon-arrows-left-right-light">
                                            <use xlink:href="#icon-arrows-left-right-light"></use>
                                        </svg>
                                    </a>
                                </div>
                            </figure>
                            <div class="card-body text-center p-0">






                                <span class="d-flex align-items-center price text-body-emphasis fw-bold justify-content-center mb-3 fs-6">$29.00</span>

                                <h4 class="product-title card-title text-primary-hover text-body-emphasis fs-15px fw-500 mb-3"><a class="text-decoration-none text-reset" href="./shop/product-details-v1.html">Scalp Moisturizing Cream</a></h4>
                                <div class="d-flex align-items-center fs-12px justify-content-center">
                                    <div class="rating">
                                        <div class="empty-stars">
                                            <span class="star">
                                                <svg class="icon star-o">
                                                    <use xlink:href="#star-o"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star-o">
                                                    <use xlink:href="#star-o"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star-o">
                                                    <use xlink:href="#star-o"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star-o">
                                                    <use xlink:href="#star-o"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star-o">
                                                    <use xlink:href="#star-o"></use>
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="filled-stars"
                                            style="width: 100%">
                                            <span class="star">
                                                <svg class="icon star text-primary">
                                                    <use xlink:href="#star"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star text-primary">
                                                    <use xlink:href="#star"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star text-primary">
                                                    <use xlink:href="#star"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star text-primary">
                                                    <use xlink:href="#star"></use>
                                                </svg>
                                            </span>
                                            <span class="star">
                                                <svg class="icon star text-primary">
                                                    <use xlink:href="#star"></use>
                                                </svg>
                                            </span>
                                        </div>
                                    </div><span class="reviews ms-4 pt-3 fs-14px">2947 reviews</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<section id="with_client_logo_3" class="bg-section-2"> 

    <section class="py-lg-20 py-15">

        <div class="container container-xxl">
            <div class="row gx-30px gy-30px">
                <div class="col-lg-4" data-animate="fadeInUp">
                    <div class="d-flex">
                        <div class="me-9">
                            <img data-src="./assets/images/image-box/image-box-18.png" alt="Guaranteed PURE" width="90" height="90" class="lazy-image" src="#" />
                        </div>
                        <div>
                            <h3 class="fs-4 mb-6">
                                Guaranteed PURE
                            </h3>
                            <p class="mb-0 pe-lg-12">All Grace formulations adhere to strict purity standards and will never contain harsh or toxic ingredients</p>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4" data-animate="fadeInUp">
                    <div class="d-flex">
                        <div class="me-9">
                            <img data-src="./assets/images/image-box/image-box-19.png" alt="Completely Cruelty-Free" width="90" height="90" class="lazy-image" src="#" />
                        </div>
                        <div>
                            <h3 class="fs-4 mb-6">
                                Completely Cruelty-Free
                            </h3>
                            <p class="mb-0 pe-lg-12">All Grace formulations adhere to strict purity standards and will never contain harsh or toxic ingredients</p>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4" data-animate="fadeInUp">
                    <div class="d-flex">
                        <div class="me-9">
                            <img data-src="./assets/images/image-box/image-box-20.png" alt="Ingredient Sourcing" width="90" height="90" class="lazy-image" src="#" />
                        </div>
                        <div>
                            <h3 class="fs-4 mb-6">
                                Ingredient Sourcing
                            </h3>
                            <p class="mb-0 pe-lg-12">All Grace formulations adhere to strict purity standards and will never contain harsh or toxic ingredients</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section>

        <div class="container-fluid px-9">
            <div class="row gy-30px gx-30px">
                <div class="col-12 col-md-4" data-animate="fadeInUp">
                    <div class="card border-0 rounded-0 hover-zoom-in hover-shine">

                        <img class="lazy-image card-img object-fit-cover lazy-image" src="#" data-src="<?php echo e(asset('assets/website/assets')); ?>/images/banner/banner-28.jpg" width="468" height="468" alt="Autumn Skincare">
                        <div class="card-img-overlay d-inline-flex flex-column p-8 justify-content-end text-center">
                            <h3 class="card-title text-white lh-45px">Autumn Skincare</h3>
                            <div><a href="#" class="btn btn-link p-0 fw-semibold text-white text-decoration-none">Disvover Now <svg class="icon">
                                        <use xlink:href="#icon-arrow-right"></use>
                                    </svg></a></div>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-md-4" data-animate="fadeInUp">
                    <div class="card border-0 rounded-0 hover-zoom-in hover-shine">

                        <img class="lazy-image card-img object-fit-cover lazy-image" src="#" data-src="<?php echo e(asset('assets/website/assets')); ?>/images/banner/banner-26.jpg" width="468" height="468" alt="Sale 40% Off">
                        <div class="card-img-overlay d-inline-flex flex-column p-8 justify-content-end text-center">
                            <h3 class="card-title text-white lh-45px">Sale 40% Off</h3>
                            <div><a href="#" class="btn btn-link p-0 fw-semibold text-white text-decoration-none">Shop Sale <svg class="icon">
                                        <use xlink:href="#icon-arrow-right"></use>
                                    </svg></a></div>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-md-4" data-animate="fadeInUp">
                    <div class="card border-0 rounded-0 hover-zoom-in hover-shine">

                        <img class="lazy-image card-img object-fit-cover lazy-image" src="#" data-src="<?php echo e(asset('assets/website/assets')); ?>/images/banner/banner-27.jpg" width="468" height="468" alt="Save on Sets">
                        <div class="card-img-overlay d-inline-flex flex-column p-8 justify-content-end text-center">
                            <h3 class="card-title text-white lh-45px">Save on Sets</h3>
                            <div><a href="#" class="btn btn-link p-0 fw-semibold text-white text-decoration-none">Disvover Now <svg class="icon">
                                        <use xlink:href="#icon-arrow-right"></use>
                                    </svg></a></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="pt-lg-18 pt-15 mt-3 pb-lg-17 pb-16" data-animate="fadeInUp">

        <div class="container container-xxl">
            <div class="col-lg-6 offset-lg-3">
                <div class="slick-slider custom-arrow dot-lg-0" data-slick-options='{"slidesToShow": 1,"infinite":true,"autoplay":true,"dots":false,"arrows":true,"fade":false,"cssEase":"ease-in-out","speed":600, "responsive":[{"breakpoint": 992,"settings": {"slidesToShow":1,"dots":true, "arrows":false }}]}'>
                    <div class="px-6 text-center">
                        <img src="#" data-src="<?php echo e(asset('assets/website/assets')); ?>/images/testimonial/testimonial-10.png" alt="Amazing product. The results are so transformative in texture." class="lazy-image mx-auto mb-11" style="width: 80px; height: 80px">
                        <p class="text-primary fs-3 mb-12 pb-2">“Amazing product. The results are so transformative in texture and my face feels plump and healthy.“</p>
                        <h4 class="fs-15px fw-bold text-uppercase mb-4">Kathleen C.</h4>
                    </div>


                    <div class="px-6 text-center">
                        <img src="#" data-src="<?php echo e(asset('assets/website/assets')); ?>/images/testimonial/testimonial-11.png" alt="Amazing product. The results are so transformative in texture." class="lazy-image mx-auto mb-11" style="width: 80px; height: 80px">
                        <p class="text-primary fs-3 mb-12 pb-2">“Amazing product. The results are so transformative in texture and my face feels plump and healthy.“</p>
                        <h4 class="fs-15px fw-bold text-uppercase mb-4">Kathleen C.</h4>
                    </div>


                    <div class="px-6 text-center">
                        <img src="#" data-src="<?php echo e(asset('assets/website/assets')); ?>/images/testimonial/testimonial-12.png" alt="Amazing product. The results are so transformative in texture." class="lazy-image mx-auto mb-11" style="width: 80px; height: 80px">
                        <p class="text-primary fs-3 mb-12 pb-2">“Amazing product. The results are so transformative in texture and my face feels plump and healthy.“</p>
                        <h4 class="fs-15px fw-bold text-uppercase mb-4">Kathleen C.</h4>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="bg-section-2 pb-lg-18 pb-16 pt-lg-17 pt-15 mb-4">

        <div class="container container-xxl">
            <div class="row align-items-center">
                <div class="col-md-6 mb-md-9" data-animate="fadeInUp">
                    <h2 class="fs-3 mb-0">On the Gram</h2>
                </div>
                <div class="col-md-6 mb-10 mb-md-9" data-animate="fadeInUp">
                    <p class="fs-18px fw-semibold text-primary text-md-end mb-0">@Glowing_cosmetics</p>
                </div>
            </div>
            <div class="mx-n6 slick-slider" data-slick-options='{"slidesToShow": 5,"infinite":false,"autoplay":false,"dots":false,"arrows":false,"responsive":[{"breakpoint": 1366,"settings": {"slidesToShow":5 }},{"breakpoint": 992,"settings": {"slidesToShow":3}},{"breakpoint": 768,"settings": {"slidesToShow": 2}},{"breakpoint": 576,"settings": {"slidesToShow": 2}}]}'>

                <div class="px-6" data-animate="fadeInUp">
                    <a href="<?php echo e(asset('assets/website/assets')); ?>/images/instagram/instagram-01.jpg" title="instagram-01" data-gallery="instagram" class=" hover-zoom-in hover-shine  card-img-overlay-hover hover-zoom-in hover-shine d-block">
                        <img class="lazy-image img-fluid w-100" width="314" height="314" data-src="./assets/images/instagram/instagram-01-320x320.jpg" alt="instagram-01" src="#">
                        <span class="card-img-overlay bg-dark bg-opacity-30"></span>
                    </a>
                </div>

                <div class="px-6" data-animate="fadeInUp">
                    <a href="<?php echo e(asset('assets/website/assets')); ?>/images/instagram/instagram-02.jpg" title="instagram-02" data-gallery="instagram" class=" hover-zoom-in hover-shine  card-img-overlay-hover hover-zoom-in hover-shine d-block">
                        <img class="lazy-image img-fluid w-100" width="314" height="314" data-src="./assets/images/instagram/instagram-02-320x320.jpg" alt="instagram-02" src="#">
                        <span class="card-img-overlay bg-dark bg-opacity-30"></span>
                    </a>
                </div>

                <div class="px-6" data-animate="fadeInUp">
                    <a href="<?php echo e(asset('assets/website/assets')); ?>/images/instagram/instagram-03.jpg" title="instagram-03" data-gallery="instagram" class=" hover-zoom-in hover-shine  card-img-overlay-hover hover-zoom-in hover-shine d-block">
                        <img class="lazy-image img-fluid w-100" width="314" height="314" data-src="./assets/images/instagram/instagram-03-320x320.jpg" alt="instagram-03" src="#">
                        <span class="card-img-overlay bg-dark bg-opacity-30"></span>
                    </a>
                </div>

                <div class="px-6" data-animate="fadeInUp">
                    <a href="<?php echo e(asset('assets/website/assets')); ?>/images/instagram/instagram-04.jpg" title="instagram-04" data-gallery="instagram" class=" hover-zoom-in hover-shine  card-img-overlay-hover hover-zoom-in hover-shine d-block">
                        <img class="lazy-image img-fluid w-100" width="314" height="314" data-src="./assets/images/instagram/instagram-04-320x320.jpg" alt="instagram-04" src="#">
                        <span class="card-img-overlay bg-dark bg-opacity-30"></span>
                    </a>
                </div>

                <div class="px-6" data-animate="fadeInUp">
                    <a href="<?php echo e(asset('assets/website/assets')); ?>/images/instagram/instagram-05.jpg" title="instagram-05" data-gallery="instagram" class=" hover-zoom-in hover-shine  card-img-overlay-hover hover-zoom-in hover-shine d-block">
                        <img class="lazy-image img-fluid w-100" width="314" height="314" data-src="./assets/images/instagram/instagram-05-320x320.jpg" alt="instagram-05" src="#">
                        <span class="card-img-overlay bg-dark bg-opacity-30"></span>
                    </a>
                </div>

                <div class="px-6" data-animate="fadeInUp">
                    <a href="<?php echo e(asset('assets/website/assets')); ?>/images/instagram/instagram-06.jpg" title="instagram-06" data-gallery="instagram" class=" hover-zoom-in hover-shine  card-img-overlay-hover hover-zoom-in hover-shine d-block">
                        <img class="lazy-image img-fluid w-100" width="314" height="314" data-src="./assets/images/instagram/instagram-06-320x320.jpg" alt="instagram-06" src="#">
                        <span class="card-img-overlay bg-dark bg-opacity-30"></span>
                    </a>
                </div>
            </div>


        </div>
    </section>   -->
<?php /**PATH C:\Users\ASUS\Downloads\mark11\resources\views/dashboard.blade.php ENDPATH**/ ?>