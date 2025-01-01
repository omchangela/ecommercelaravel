<div class="row gy-11">
    <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
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
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <p class="text-center">No products found.</p>
    <?php endif; ?>
</div>
<?php /**PATH C:\Users\ASUS\Downloads\mark11\resources\views/website/shop/products.blade.php ENDPATH**/ ?>