<?php if($paginator->hasPages()): ?>
    <nav class="d-flex mt-13 pt-3 justify-content-center my-4" aria-label="pagination" data-animate="fadeInUp">
        <ul class="pagination m-0">
            
            <?php if($paginator->onFirstPage()): ?>
                <li class="page-item disabled mx-2" aria-disabled="true">
                    <span class="page-link rounded-circle d-flex align-items-center justify-content-center" aria-label="Previous">
                        <svg class="icon">
                            <use xlink:href="#icon-angle-double-left"></use>
                        </svg>
                    </span>
                </li>
            <?php else: ?>
                <li class="page-item mx-2">
                    <a class="page-link rounded-circle d-flex align-items-center justify-content-center" href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev" aria-label="Previous">
                        <svg class="icon">
                            <use xlink:href="#icon-angle-double-left"></use>
                        </svg>
                    </a>
                </li>
            <?php endif; ?>

            
            <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <?php if(is_string($element)): ?>
                    <li class="page-item disabled mx-2" aria-disabled="true"><span class="page-link"><?php echo e($element); ?></span></li>
                <?php endif; ?>

                
                <?php if(is_array($element)): ?>
                    <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($page == $paginator->currentPage()): ?>
                            <li class="page-item active mx-2" aria-current="page"><span class="page-link"><?php echo e($page); ?></span></li>
                        <?php else: ?>
                            <li class="page-item mx-2"><a class="page-link" href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            
            <?php if($paginator->hasMorePages()): ?>
                <li class="page-item mx-2">
                    <a class="page-link rounded-circle d-flex align-items-center justify-content-center" href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next" aria-label="Next">
                        <svg class="icon">
                            <use xlink:href="#icon-angle-double-right"></use>
                        </svg>
                    </a>
                </li>
            <?php else: ?>
                <li class="page-item disabled mx-2" aria-disabled="true">
                    <span class="page-link rounded-circle d-flex align-items-center justify-content-center" aria-label="Next">
                        <svg class="icon">
                            <use xlink:href="#icon-angle-double-right"></use>
                        </svg>
                    </span>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
<?php endif; ?>
<?php /**PATH C:\Users\ASUS\Downloads\mark11\resources\views/vendor/pagination/bootstrap-5.blade.php ENDPATH**/ ?>