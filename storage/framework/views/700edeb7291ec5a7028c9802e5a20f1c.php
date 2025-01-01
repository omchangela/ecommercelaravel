

<?php $__env->startSection('body'); ?>

<!-- Page header -->
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-flex">
        <div class="page-title pb-3 pt-3">
            <h5 class="mb-0"><?php echo e($title); ?> - <?php echo e(!empty($record) ? "Edit" : "Create"); ?></h5>
        </div>
    </div>
</div>
<!-- /page header -->

<!-- Content area -->
<div class="content">
    <div class="col-md-8 offset-md-2">
        <?php if(!empty($record)): ?>
        <?php echo e(html()->modelForm($record, 'PUT')->route($route . 'update', $record->id)->acceptsFiles()->open()); ?>

        <?php else: ?>
        <?php echo e(html()->form('POST')->route($route . 'store')->acceptsFiles()->open()); ?>

        <?php endif; ?>
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Form details</h6>
            </div>
            <div class="card-body">
                <?php if($errors->any()): ?>
                <div id="validation-errors" class="message-section">
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <h5><i class="icon fas fa-ban"></i> Validation Error!</h5>
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Name Field -->
                <?php $__env->startComponent('admin.component.text', [
                'name' => 'name',
                'title' => 'Name',
                'value' => $record->name ?? '',
                'required' => true,
                ]); ?><?php echo $__env->renderComponent(); ?>

                <!-- Single Image Field -->
                <?php $__env->startComponent('admin.component.image', [
                'name' => 'image',
                'title' => 'Select Image',
                'value' => $record->image ?? null,
                'required' => true,
                'image_url' => $record['image_url'] ?? null,
                ]); ?><?php echo $__env->renderComponent(); ?>

                <!-- Multiple Images Field -->
                <div class="mb-2">
                    <label for="multiple_images" class="form-label">
                        More Product Images<span class="text-danger"> *</span>
                    </label>
                    <input type="file" name="multiple_images[]" id="multiple_images" class="form-control" accept="image/*" multiple>

                    <?php if(isset($record) && is_array($record->multiple_images) && !empty($record->multiple_images)): ?>
                    <div class="d-flex flex-wrap">
                        <?php $__currentLoopData = $record->multiple_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="me-2 mb-2">
                            <br>
                            <img src="<?php echo e(asset('storage/' . $image)); ?>" alt="Image" class="img-thumbnail" style="width: 100px; height: auto;">
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- Status Field -->
                <?php $__env->startComponent('admin.component.select', [
                'name' => 'status',
                'title' => 'Status',
                'value' => $record->status ?? 'Active', // Default to 'Active' for new products
                'required' => true,
                'options' => ['Active' => 'Active', 'Inactive' => 'Inactive'],
                ]); ?><?php echo $__env->renderComponent(); ?>

                <!-- Category Field -->
                <div class="mb-2">
                    <label for="category_id" class="form-label">
                        Category ID<span class="text-danger"> *</span>
                    </label>
                    <select name="category_id" class="form-select">
                        <option value="" disabled selected>Select Category</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>" <?php echo e(isset($record) && $record->category_id == $category->id ? 'selected' : ''); ?>>
                            <?php echo e($category->name); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <!-- Description Field -->
                <div class="mb-2">
                    <label for="description" class="form-label">
                        One-Line Description<span class="text-danger"> *</span>
                    </label>
                    <textarea name="description" id="description" class="form-control" rows="4" placeholder="Enter product description" required><?php echo e($record->description ?? ''); ?></textarea>
                </div>

                <!-- Price and Unit Fields -->
                <div class="mb-2">
                    <label class="form-label">Price<span class="text-danger"> *</span></label>
                    <div id="price-container">
                        <?php $__currentLoopData = $record->prices ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $priceEntry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="d-flex mb-2 price-entry">
                            <input type="number" step="0.01" name="price[]" class="form-control" value="<?php echo e($priceEntry->price); ?>" placeholder="Enter price" required>
                            <input type="text" name="unit[]" class="form-control ms-2" value="<?php echo e($priceEntry->unit); ?>" placeholder="Enter unit (e.g., ml, gram)" required>
                            <?php if(!$loop->first): ?>
                            <button type="button" class="btn btn-danger ms-2 remove-price-btn"><i class="ph-trash"></i></button>
                            <?php endif; ?>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php if(empty($record->prices)): ?>
                        <div class="d-flex mb-2 price-entry">
                            <input type="number" step="0.01" name="price[]" class="form-control" placeholder="Enter price" required>
                            <input type="text" name="unit[]" class="form-control ms-2" placeholder="Enter unit (e.g., ml, gram)" required>
                            <button type="button" class="btn btn-success ms-2 add-price-btn"><i class="ph-plus"></i></button>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Rate Field -->
                <div class="mb-2">
                    <label for="rate" class="form-label">
                        Product Rating<span class="text-danger"> *</span>
                    </label>
                    <input type="number" step="0.01" name="rate" value="<?php echo e($record->rate ?? ''); ?>" class="form-control" required>
                </div>

                <!-- Review Count Field -->
                <div class="mb-2">
                    <label for="review_count" class="form-label">
                        Review Count<span class="text-danger"> *</span>
                    </label>
                    <input type="number" name="review_count" value="<?php echo e($record->review_count ?? ''); ?>" class="form-control" required>
                </div>

            </div>
            <div class="card-footer p-2">
                <div class="d-flex justify-content-between align-items-center">
                    <a href="<?php echo e(route($route . 'index')); ?>" class="btn btn-light">Back</a>
                    <button type="submit" class="btn btn-primary">Submit <i class="ph-paper-plane-tilt ms-2"></i></button>
                </div>
            </div>
        </div>
        <?php echo e(html()->form()->close()); ?>

    </div>
</div>

<script>
    document.querySelector("#price-container").addEventListener("click", function(e) {
        if (e.target && e.target.classList.contains("add-price-btn")) {
            const newPriceEntry = document.createElement("div");
            newPriceEntry.classList.add("d-flex", "mb-2", "price-entry");
            newPriceEntry.innerHTML = `
                <input type="number" step="0.01" name="price[]" class="form-control" placeholder="Enter price" required>
                <input type="text" name="unit[]" class="form-control ms-2" placeholder="Enter unit (e.g., ml, gram)" required>
                <button type="button" class="btn btn-danger ms-2 remove-price-btn"><i class="ph-trash"></i></button>
            `;
            document.getElementById("price-container").appendChild(newPriceEntry);
        }
        if (e.target && e.target.classList.contains("remove-price-btn")) {
            e.target.closest(".price-entry").remove();
        }
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\mark11\resources\views/admin/product/form.blade.php ENDPATH**/ ?>