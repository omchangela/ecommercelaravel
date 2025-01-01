
<!-- Adjust path to your layout -->

<?php $__env->startSection('body'); ?>
<br><br><br><br>

<main id="content" class="wrapper layout-page">
	<section class="z-index-2 position-relative pb-2 mb-12">

		<div class="bg-body-secondary mb-3">
			<div class="container">
				<nav class="py-4 lh-30px" aria-label="breadcrumb">
					<ol class="breadcrumb justify-content-center py-1 mb-0">
						<li class="breadcrumb-item"><a title="Home" href="/">Home</a></li>
						<li class="breadcrumb-item"><a title="Shop" href="/shop">Shop</a></li>
						<li class="breadcrumb-item active" aria-current="page"><?php echo e($product->name); ?></li>
					</ol>
				</nav>
			</div>
		</div>
	</section>
	<section class="container pt-6 pb-13 pb-lg-20">
		<div class="row ">
			<div class="col-md-6 pe-lg-13">
				<div class="row">
					<!-- multiple_images -->
					<div class="col-xl-2 pe-xl-0 order-1 order-xl-0 mt-5 mt-xl-0">
						<div id="vertical-slider-thumb" class="slick-slider slick-slider-thumb ps-1 ms-n3 me-n4 mx-xl-0"
							data-slick-options='{&#34;arrows&#34;:false,&#34;asNavFor&#34;:&#34;#vertical-slider-slides&#34;,&#34;dots&#34;:false,&#34;focusOnSelect&#34;:true,&#34;responsive&#34;:[{&#34;breakpoint&#34;:1260,&#34;settings&#34;:{&#34;vertical&#34;:false}}],&#34;slidesToShow&#34;:4,&#34;vertical&#34;:true}'>

							<?php $__currentLoopData = $multipleImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<img src="#"
								data-src="<?php echo e(asset('storage/' . $image)); ?>"
								class="cursor-pointer lazy-image mx-3 mx-xl-0 px-0 mb-xl-7" width="75" height="100"
								title="" alt="">
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

							
						</div>
					</div>

					<div class="col-xl-10 ps-xl-8 pe-xl-0 order-0 order-xl-1">
						<div id="vertical-slider-slides"
							class="slick-slider slick-slider-arrow-inside slick-slider-dots-inside slick-slider-dots-light g-0"
							data-slick-options='{&#34;arrows&#34;:false,&#34;asNavFor&#34;:&#34;#vertical-slider-thumb&#34;,&#34;dots&#34;:false,&#34;slidesToShow&#34;:1,&#34;vertical&#34;:true}'>

							<?php $__currentLoopData = $multipleImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<a href="<?php echo e(asset('storage/' . $image)); ?>" data-gallery="product-gallery" data-thumb-src="<?php echo e(asset('storage/' . $image)); ?>">
								<img src="#" data-src="<?php echo e(asset('storage/' . $image)); ?>" width="540" height="720" title="" class="h-auto lazy-image" alt="">
							</a>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
					</div>

				</div>
			</div>
			<div class="col-md-6 pt-md-0 pt-10">
				<div class="product-details">
					<!-- Product Name -->
					<h1 class="mb-4 pb-2 fs-4"><?php echo e($product->name ?? 'Product Name'); ?></h1>

					<!-- Product Rating -->
					<div class="d-flex align-items-center fs-15px mb-6">
						<p class="mb-0 fw-semibold text-body-emphasis">Product Rate</p>
						<div class="d-flex align-items-center fs-12px justify-content-center mb-0 px-6 rating-result">
							<div class="rating">
								<div class="empty-stars">
									<?php for($i = 0; $i < 5; $i++): ?> <span class="star">
										<svg class="icon star-o">
											<use xlink:href="#star-o"></use>
										</svg>
										</span>
										<?php endfor; ?>
								</div>
								<div class="filled-stars"
									style="width: <?php echo e($product->rate ? ($product->rate * 20) : 0); ?>%">
									<?php for($i = 0; $i < 5; $i++): ?> <span class="star">
										<svg class="icon star text-primary">
											<use xlink:href="#star"></use>
										</svg>
										</span>
										<?php endfor; ?>
								</div>
							</div>
						</div>
						<a href="#" class="border-start ps-6 text-body">
							<?php echo e($product->reviews->count()); ?> Reviews
						</a>
					</div>

					<!-- Product Description -->
					<p class="fs-15px"><?php echo e($product->description ?? 'No description available.'); ?></p>
				</div>

				<!-- Price List -->

				<p class="text-body-emphasis fw-bold mb-6">Price List:</p>
				<!-- Price Cards Section -->
				<!-- Price Cards Section -->
				<div class="d-flex flex-wrap gap-3">
					<?php $__currentLoopData = $product->prices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div
						class="card border-2 rounded shadow-sm text-center price-card"
						style="width: 8rem; border-radius: 10px; cursor: pointer;"
						onclick="selectPriceUnit('<?php echo e($price->unit); ?>', '<?php echo e($price->price); ?>', this)">
						<div class="card-body p-2" style="background: #fff;">
							<p class="mb-1" style="font-size: 0.9rem; font-weight: 600;"><?php echo e($price->unit); ?></p>
							<p class="mb-1" style="color:rgb(0, 0, 0); font-size: 1rem; font-weight: bold;">
								₹<?php echo e(number_format($price->price, 2)); ?>

							</p>
							<span class="badge bg-warning text-white fw-semibold" style="border-radius: 10px;">
								<?php echo e($price->stock_status ?? 'In Stock'); ?>

							</span>
						</div>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>

				<!-- Check if the product is already in the wishlist -->
				<?php
				$user = Auth::user();
				$isInWishlist = \App\Models\Wishlist::where('user_id', $user->id)->where('product_id', $product->id)->exists();
				?>

				<!-- Add to Cart Form -->
				<form id="add-to-cart-form" action="<?php echo e(route('cart.add')); ?>" method="POST" onsubmit="return validatePriceSelection()">
					<?php echo csrf_field(); ?>
					<input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
					<input type="hidden" name="price" value="">
					<input type="hidden" name="unit" value="">

					<!-- Validation Message -->
					<div id="validation-message" class="text-danger fw-bold mb-3" style="display: none;">
						Please select a price before adding to the cart.
					</div>

					<button type="submit" class="btn-hover-bg-primary mt-5 btn-hover-border-primary btn btn-lg btn-dark w-100">
						Add to Cart
					</button>
				</form>

				<!-- JavaScript for Price Selection and Validation -->
				<script>
					function selectPriceUnit(unit, price, selectedCard) {
						// Update hidden input fields
						document.querySelector('input[name="price"]').value = price;
						document.querySelector('input[name="unit"]').value = unit;

						// Highlight the selected card
						document.querySelectorAll('.price-card').forEach(card => {
							card.classList.remove('active');
						});
						selectedCard.classList.add('active');

						// Hide validation message
						document.getElementById('validation-message').style.display = 'none';
					}

					function validatePriceSelection() {
						const price = document.querySelector('input[name="price"]').value;
						const unit = document.querySelector('input[name="unit"]').value;

						if (!price || !unit) {
							const validationMessage = document.getElementById('validation-message');
							validationMessage.style.display = 'block'; // Show validation message
							return false; // Prevent form submission
						}

						return true; // Allow form submission
					}
				</script>

				<!-- Styling for Active Price Card -->
				<style>
					.price-card.active {
						border-color: rgb(0, 0, 0);
						box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
						background-color: #f8f9fa;
					}

					.wishlist-button-added {
						background-color: #28a745;
						/* Green background for added state */
						border-color: #28a745;
						/* Green border for added state */
						color: white;
					}

					.wishlist-button-added i {
						color: white;
					}
				</style>

				<!-- Wishlist Form -->
				<?php if($isInWishlist): ?>
				<!-- If the product is already in the wishlist, show "Product Added" button with new color -->
				<button type="button" class="btn wishlist-button-added mt-4" id="remove-from-wishlist-btn">
					<i class="fas fa-heart"></i> Added to Wishlist
				</button>

				<!-- Hidden Form for Removing from Wishlist -->
				<form id="remove-from-wishlist-form" action="<?php echo e(route('wishlist.remove')); ?>" method="POST" style="display: none;">
					<?php echo csrf_field(); ?>
					<?php echo method_field('DELETE'); ?>
					<input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
				</form>
				<?php else: ?>
				<!-- If the product is not in the wishlist, show the "Add to Wishlist" button -->
				<form action="<?php echo e(route('wishlist.store')); ?>" method="POST" id="wishlist-form">
					<?php echo csrf_field(); ?>
					<!-- Hidden fields for product information -->
					<input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
					<input type="hidden" name="product_name" value="<?php echo e($product->name); ?>">
					<input type="hidden" name="product_image" value="<?php echo e($product->image_url); ?>">
					<input type="hidden" name="price" id="wishlist-price" value="<?php echo e($product->prices->first()->price ?? ''); ?>">
					<input type="hidden" name="unit" id="wishlist-unit" value="<?php echo e($product->prices->first()->unit ?? ''); ?>">

					<!-- Add to Wishlist Button -->
					<button type="submit" class="btn btn-primary mt-4">
						<i class="fas fa-heart"></i> Add to Wishlist
					</button>
				</form>
				<?php endif; ?>

				<!-- JavaScript for Handling Removal from Wishlist with Confirmation -->
				<script>
					document.getElementById('remove-from-wishlist-btn').addEventListener('click', function() {
						const userConfirmed = confirm("Are you sure you want to remove this product from your wishlist?");

						if (userConfirmed) {
							// Submit the form to remove the product from the wishlist
							document.getElementById('remove-from-wishlist-form').submit();
						}
					});
				</script>

				<!-- JavaScript for Refreshing Page After Adding to Wishlist -->
				<?php if(session('reload')): ?>
				<script>
					// Reload the page after adding to wishlist
					window.location.reload();
				</script>
				<?php endif; ?>



				<!-- Meta Information -->
				<ul class="single-product-meta list-unstyled border-top pt-7 mt-7">
					<li class="d-flex mb-4 pb-2 align-items-center">
						<span class="text-body-emphasis fw-semibold fs-14px">Categories:</span>
						<span class="ps-4"><?php echo e($product->category->name ?? 'Uncategorized'); ?></span>
					</li>
					<li class="d-flex mb-4 pb-2 align-items-center">
						<span class="text-body-emphasis fw-semibold fs-14px">Share:</span>
						<ul class="list-inline d-flex align-items-center mb-0 col-8 col-lg-10 ps-4">
							<li class="list-inline-item me-7">
								<a href="#" class="fs-14px text-body product-info-share" data-bs-toggle="tooltip"
									data-bs-title="Twitter">
									<i class="fab fa-twitter"></i>
								</a>
							</li>
							<li class="list-inline-item me-7">
								<a href="#" class="fs-14px text-body product-info-share" data-bs-toggle="tooltip"
									data-bs-title="Facebook">
									<i class="fab fa-facebook-f"></i>
								</a>
							</li>
							<li class="list-inline-item me-7">
								<a href="#" class="fs-14px text-body product-info-share" data-bs-toggle="tooltip"
									data-bs-title="Instagram">
									<i class="fab fa-instagram"></i>
								</a>
							</li>
							<li class="list-inline-item">
								<a href="#" class="fs-14px text-body product-info-share" data-bs-toggle="tooltip"
									data-bs-title="YouTube">
									<i class="fab fa-youtube"></i>
								</a>
							</li>
						</ul>
					</li>
				</ul>
	</section>
	<section class="container pt-15 pb-12 pt-lg-17 pb-lg-20">
		<div class="collapse-tabs">
			<ul class="nav nav-tabs border-0 justify-content-center pb-12 d-none d-md-flex" id="productTabs"
				role="tablist">
				<li class="nav-item" role="presentation">
					<button
						class="nav-link m-auto fw-semibold py-0 px-8 fs-4 fs-lg-3 border-0 text-body-emphasis active"
						id="product-details-tab" data-bs-toggle="tab" data-bs-target="#product-details"
						type="button" role="tab" aria-controls="product-details" aria-selected="true">Product
						Details
					</button>
				</li>
				<li class="nav-item" role="presentation">
					<button class="nav-link m-auto fw-semibold py-0 px-8 fs-4 fs-lg-3 border-0 text-body-emphasis"
						id="how-to-use-tab" data-bs-toggle="tab" data-bs-target="#how-to-use" type="button"
						role="tab" aria-controls="how-to-use" aria-selected="false">How To Use
					</button>
				</li>
				<li class="nav-item" role="presentation">
					<button class="nav-link m-auto fw-semibold py-0 px-8 fs-4 fs-lg-3 border-0 text-body-emphasis"
						id="ingredients-tab" data-bs-toggle="tab" data-bs-target="#ingredients" type="button"
						role="tab" aria-controls="ingredients" aria-selected="false">Ingredients
					</button>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-inner">
					<div class="tab-pane fade active show" id="product-details" role="tabpanel"
						aria-labelledby="product-details-tab" tabindex="0">
						<div class="card border-0 bg-transparent">
							<div
								class="card-header border-0 bg-transparent px-0 py-4 product-tabs-mobile d-block d-md-none">
								<h5 class="mb-0">
									<button class="btn lh-2 fs-5 py-3 px-6 shadow-none w-100 border text-primary"
										type="button" data-bs-toggle="collapse"
										data-bs-target="#collapse-product-detail" aria-expanded="false"
										aria-controls="collapse-product-detail">
										Product Detail
									</button>
								</h5>
							</div>
							<div class="collapse show border-md-0 border p-md-0 p-6" id="collapse-product-detail">
								<div class="row">
									<div class="col-12 col-lg-6 pe-lg-10 pe-xl-20">
										<?php if(!empty($detail->image) && file_exists(public_path('storage/' . $detail->image))): ?>
										<img src="<?php echo e(asset('storage/' . $detail->image)); ?>" class="w-100 lazy-image" alt="Image" width="470" height="540">
										<?php else: ?>
										<div class="placeholder-image" style="width: 470px; height: 540px; background: #f0f0f0; display: flex; align-items: center; justify-content: center;">
											<span>No Image Available</span>
										</div>
										<?php endif; ?>
									</div>

									<div class="pb-3 col-12 col-lg-6 pt-12 pt-lg-0">
										<?php if(!empty($detail->description)): ?>
										<p class="fw-semibold text-body-emphasis mb-2 pb-4"><?php echo $detail->description; ?></p>
										<?php else: ?>
										<p class="fw-semibold text-muted mb-2 pb-4">No description available.</p>
										<?php endif; ?>
									</div>

								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="how-to-use" role="tabpanel" aria-labelledby="how-to-use-tab"
						tabindex="0">
						<div class="card border-0 bg-transparent">
							<div
								class="card-header border-0 bg-transparent px-0 py-4 product-tabs-mobile d-block d-md-none">
								<h5 class="mb-0">
									<button class="btn lh-2 fs-5 py-3 px-6 shadow-none w-100 border text-primary"
										type="button" data-bs-toggle="collapse" data-bs-target="#collapse-to-use"
										aria-expanded="false" aria-controls="collapse-to-use">How To Use
									</button>
								</h5>
							</div>
							<div class="collapse border-md-0 border p-md-0 p-6" id="collapse-to-use">
								<div class="pb-3">
									<?php if($howtouses->count() > 0): ?>
									<?php $__currentLoopData = $howtouses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $howtouse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<p class="fw-semibold text-body-emphasis mb-2 pb-4"><?php echo $howtouse->description; ?></p>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php else: ?>
									<p class="text-muted">No instructions available for this product.</p>
									<?php endif; ?>
								</div>
							</div>

						</div>
					</div>
					<div class="tab-pane fade" id="ingredients" role="tabpanel" aria-labelledby="ingredients-tab"
						tabindex="0">

						<div class="collapse border-md-0 border p-md-0 p-6" id="collapse-ingredients">
							<div class="pb-3">
								<div class="table-responsive mb-5">
									<table class="table table-borderless mb-0">
										<tbody>
											<?php if($ingredients->count() > 0): ?>
											<?php $__currentLoopData = $ingredients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ingredient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr>
												<td class="ps-0 py-5 pe-5 text-body-emphasis"><?php echo e($ingredient->key); ?>

												</td>
												<td class="text-end py-5 ps-5 pe-0">
													<?php echo e($ingredient->value); ?>

												</td>
											</tr>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php else: ?>
											<p class="text-muted">No Ingredients details available for this product.</p>
											<?php endif; ?>
										</tbody>
									</table>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- customer review part -->

	<section class="container pt-15 pb-15 pt-lg-17 pb-lg-20">
		<div class="text-center">
			<h3 class="mb-12">Customer Reviews</h3>
		</div>

		<div class="mb-11">
			<div class="d-md-flex justify-content-between align-items-center">
				<div class="d-flex align-items-center">
					<h4 class="fs-1 me-9 mb-0"><?php echo e(number_format($product->rate, 2)); ?></h4>
					<div class="p-0">
						<div class="d-flex align-items-center fs-6 ls-0 mb-4">
							<div class="rating">
								<div class="filled-stars" style="width: <?php echo e(($product->rate / 5) * 100); ?>%">
									<?php for($i = 0; $i < 5; $i++): ?>
										<span class="star">
										<svg class="icon star text-primary">
											<use xlink:href="#star"></use>
										</svg>
										</span>
										<?php endfor; ?>
								</div>
							</div>
						</div>
						<p class="mb-0"><?php echo e($product->reviews->count()); ?> Reviews</p>
					</div>
				</div>
				<div class="text-md-end mt-md-0 mt-7">
					<a href="#customer-review" class="btn btn-outline-dark" data-bs-toggle="collapse" role="button"
						aria-expanded="false" aria-controls="customer-review"><svg class="icon">
							<use xlink:href="#icon-Pencil"></use>
						</svg>
						Write A Review
					</a>
				</div>
			</div>
		</div>

		<div class="collapse mb-14" id="customer-review">
			<form class="product-review-form" action="<?php echo e(route('reviews.store', $product->id)); ?>" method="POST" enctype="multipart/form-data">
				<?php echo csrf_field(); ?>
				<!-- Form fields (same as your existing form) -->
				<div class="form-group mb-7">
					<label for="reviewName">Name</label>
					<input id="reviewName" class="form-control" type="text" name="name">
				</div>
				<div class="form-group mb-7">
					<label for="reviewEmail">Email</label>
					<input id="reviewEmail" class="form-control" type="email" name="email">
				</div>
				<div class="form-group mb-7">
					<label for="reviewTitle">Review Title</label>
					<input id="reviewTitle" class="form-control" type="text" name="title">
				</div>
				<div class="form-group mb-7">
					<label for="reviewMessage">Your Experience</label>
					<textarea id="reviewMessage" class="form-control" name="message" rows="4"></textarea>
				</div>
				<div class="form-group mb-7">
					<label for="reviewImage">Upload Images</label>
					<input type="file" name="images[]" class="form-control" id="reviewImage" multiple>
				</div>

				<div class="form-group">
					<label>Your Rating</label>
					<div class="rate-input">
						<?php for($i = 5; $i >= 1; $i--): ?>
						<input type="radio" id="star<?php echo e($i); ?>" name="rating" value="<?php echo e($i); ?>">
						<label for="star<?php echo e($i); ?>">
							<i class="far fa-star"></i>
						</label>
						<?php endfor; ?>
					</div>
				</div>
				<button type="submit" class="btn btn-dark">Submit Review</button>
			</form>
		</div>

		<div class="mt-12">
			<h3 class="fs-5"><?php echo e($product->reviews->count()); ?> Reviews</h3>

			<?php $__currentLoopData = $product->reviews->sortByDesc('created_at')->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="border-bottom pb-7 pt-10">
				<!-- Review Rating -->
				<div class="d-flex align-items-center mb-6">
					<div class="d-flex align-items-center fs-15px ls-0">
						<div class="rating">
							<div class="empty-stars">
								<?php for($i = 0; $i < 5; $i++): ?>
									<span class="star">
									<svg class="icon star-o">
										<use xlink:href="#star-o"></use>
									</svg>
									</span>
									<?php endfor; ?>
							</div>
							<div class="filled-stars" style="width: <?php echo e(($review->rating / 5) * 100); ?>%">
								<?php for($i = 0; $i < 5; $i++): ?>
									<span class="star">
									<svg class="icon star text-primary">
										<use xlink:href="#star"></use>
									</svg>
									</span>
									<?php endfor; ?>
							</div>
						</div>
					</div>
					<span class="fs-3px mx-5"><i class="fas fa-circle"></i></span>
					<span class="fs-14"><?php echo e($review->created_at->diffForHumans()); ?></span>
				</div>

				<!-- Reviewer Info -->
				<div class="d-flex justify-content-start align-items-center mb-5">
					<img src=" asset('assets/website/assets/images/default-avatar.jpg') }}"
						class="me-6 lazy-image rounded-circle" width="60" height="60" alt="Avatar">
					<div class="">
						<h5 class="mt-0 mb-4 fs-14px text-uppercase ls-1"><?php echo e($review->name); ?></h5>
						<p class="mb-0"><?php echo e($review->email); ?></p>
					</div>
				</div>

				<!-- Review Title and Message -->
				<p class="fw-semibold fs-6 text-body-emphasis mb-5"><?php echo e($review->title); ?></p>
				<p class="mb-10 fs-6"><?php echo e($review->message); ?></p>

				<!-- Review Images (if any) -->

				<?php if($review->images): ?>
				<div class="mb-10">
					<?php $__currentLoopData = $review->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<img src="<?php echo e(asset('storage/' . $image)); ?>" style="width: 100px;" class="mx-3 lazy-image" alt="Review Image">
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
				<?php endif; ?>

				<!-- Helpful Section -->
				<div class="d-flex justify-content-end align-items-center">
					<a href="#" class="fs-14px mb-0 text-secondary">Was This Review Helpful?</a>
					<p class="mb-0 ms-7 text-body-emphasis">
						<svg class="icon icon-like align-baseline">
							<use xlink:href="#icon-like"></use>
						</svg>
						10
					</p>
					<p class="mb-0 ms-6 text-body-emphasis">
						<svg class="icon icon-unlike align-baseline">
							<use xlink:href="#icon-unlike"></use>
						</svg>
						1
					</p>
				</div>


			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>



	</section>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('website.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\mark11\resources\views/website/productdetails.blade.php ENDPATH**/ ?>