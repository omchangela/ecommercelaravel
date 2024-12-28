@extends('website.layouts.app')
<!-- Adjust path to your layout -->

@section('body')
<br><br><br><br>

<main id="content" class="wrapper layout-page">
	<section class="z-index-2 position-relative pb-2 mb-12">

		<div class="bg-body-secondary mb-3">
			<div class="container">
				<nav class="py-4 lh-30px" aria-label="breadcrumb">
					<ol class="breadcrumb justify-content-center py-1 mb-0">
						<li class="breadcrumb-item"><a title="Home" href="/">Home</a></li>
						<li class="breadcrumb-item"><a title="Shop" href="/shop">Shop</a></li>
						<li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
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

							@foreach($multipleImages as $image)
							<img src="#"
								data-src="{{ asset('storage/' . $image) }}"
								class="cursor-pointer lazy-image mx-3 mx-xl-0 px-0 mb-xl-7" width="75" height="100"
								title="" alt="">
							@endforeach

							<div class="position-relative cursor-pointer mx-3 mx-xl-0 px-0 mb-xl-7">
								<img src="#"
									data-src="{{ asset('assets/website/assets') }}/images/shop/product-gallery-08-154x205.jpg"
									class="w-100 lazy-image" alt="product gallery" width="75" height="100">
								<div
									class="card-img-overlay d-inline-flex flex-column align-items-center justify-content-center">
									<div
										class="d-flex justify-content-center align-items-center rounded-circle product-gallery-video-thumb text-body-emphasis bg-body">
										<i class="fas fa-play"></i>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xl-10 ps-xl-8 pe-xl-0 order-0 order-xl-1">
						<div id="vertical-slider-slides"
							class="slick-slider slick-slider-arrow-inside slick-slider-dots-inside slick-slider-dots-light g-0"
							data-slick-options='{&#34;arrows&#34;:false,&#34;asNavFor&#34;:&#34;#vertical-slider-thumb&#34;,&#34;dots&#34;:false,&#34;slidesToShow&#34;:1,&#34;vertical&#34;:true}'>

							@foreach($multipleImages as $image)
							<a href="{{ asset('storage/' . $image) }}" data-gallery="product-gallery" data-thumb-src="{{ asset('storage/' . $image) }}">
								<img src="#" data-src="{{ asset('storage/' . $image) }}" width="540" height="720" title="" class="h-auto lazy-image" alt="">
							</a>
							@endforeach

							<div class="position-relative">
								<img src="#" data-src="{{ asset('assets/website/assets') }}/images/shop/product-gallery-08.jpg" width="540" height="720" title="" class="h-auto lazy-image" alt="">
								<div class="card-img-overlay d-inline-flex flex-column align-items-center justify-content-center">
									<a href="https://www.youtube.com/watch?v=6v2L2UGZJAM" class="view-video d-flex justify-content-center align-items-center rounded-circle product-gallery-video btn btn-white">
										<i class="fas fa-play"></i>
									</a>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
			<div class="col-md-6 pt-md-0 pt-10">
				<div class="product-details">
					<!-- Product Name -->
					<h1 class="mb-4 pb-2 fs-4">{{ $product->name ?? 'Product Name' }}</h1>

					<!-- Product Rating -->
					<div class="d-flex align-items-center fs-15px mb-6">
						<p class="mb-0 fw-semibold text-body-emphasis">Product Rate</p>
						<div class="d-flex align-items-center fs-12px justify-content-center mb-0 px-6 rating-result">
							<div class="rating">
								<div class="empty-stars">
									@for ($i = 0; $i < 5; $i++) <span class="star">
										<svg class="icon star-o">
											<use xlink:href="#star-o"></use>
										</svg>
										</span>
										@endfor
								</div>
								<div class="filled-stars"
									style="width: {{ $product->rate ? ($product->rate * 20) : 0 }}%">
									@for ($i = 0; $i < 5; $i++) <span class="star">
										<svg class="icon star text-primary">
											<use xlink:href="#star"></use>
										</svg>
										</span>
										@endfor
								</div>
							</div>
						</div>
						<a href="#" class="border-start ps-6 text-body">
							{{ $product->reviews->count() }} Reviews
						</a>
					</div>

					<!-- Product Description -->
					<p class="fs-15px">{{ $product->description ?? 'No description available.' }}</p>
				</div>

				<!-- Price List -->

				<p class="text-body-emphasis fw-bold mb-6">Price List:</p>
				<!-- Price Cards Section -->
				<!-- Price Cards Section -->
				<div class="d-flex flex-wrap gap-3">
					@foreach ($product->prices as $price)
					<div
						class="card border-2 rounded shadow-sm text-center price-card"
						style="width: 8rem; border-radius: 10px; cursor: pointer;"
						onclick="selectPriceUnit('{{ $price->unit }}', '{{ $price->price }}', this)">
						<div class="card-body p-2" style="background: #fff;">
							<p class="mb-1" style="font-size: 0.9rem; font-weight: 600;">{{ $price->unit }}</p>
							<p class="mb-1" style="color:rgb(0, 0, 0); font-size: 1rem; font-weight: bold;">
								₹{{ number_format($price->price, 2) }}
							</p>
							<span class="badge bg-warning text-white fw-semibold" style="border-radius: 10px;">
								{{ $price->stock_status ?? 'In Stock' }}
							</span>
						</div>
					</div>
					@endforeach
				</div>

				<!-- Add to Cart Form -->
				<form action="{{ route('cart.add') }}" method="POST">
					@csrf
					<input type="hidden" name="product_id" value="{{ $product->id }}">
					<input type="hidden" name="price" value="">
					<input type="hidden" name="unit" value="">

					<button type="submit" class="btn-hover-bg-primary mt-5 btn-hover-border-primary btn btn-lg btn-dark w-100">Add to Cart</button>

				</form>

				<!-- JavaScript for Price Selection -->
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
					}
				</script>

				<!-- Styling for Active Price Card -->
				<style>
					.price-card.active {
						border-color: rgb(0, 0, 0);
						box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
						background-color: #f8f9fa;
					}
				</style>

				<!-- Wishlist Form -->
				<form action="{{ route('wishlist.store') }}" method="POST" id="wishlist-form">
					@csrf
					<!-- Hidden fields for product information -->
					<input type="hidden" name="product_id" value="{{ $product->id }}">
					<input type="hidden" name="product_name" value="{{ $product->name }}">
					<input type="hidden" name="product_image" value="{{ $product->image_url }}">
					<input type="hidden" name="price" id="wishlist-price" value="{{ $product->prices->first()->price ?? '' }}">
					<input type="hidden" name="unit" id="wishlist-unit" value="{{ $product->prices->first()->unit ?? '' }}">

					<!-- Add to Wishlist Button -->
					<button type="submit" class="btn btn-primary mt-4">
						<i class="fas fa-heart"></i> Add to Wishlist
					</button>
				</form>



				<!-- Meta Information -->
				<ul class="single-product-meta list-unstyled border-top pt-7 mt-7">
					<li class="d-flex mb-4 pb-2 align-items-center">
						<span class="text-body-emphasis fw-semibold fs-14px">Categories:</span>
						<span class="ps-4">{{ $product->category->name ?? 'Uncategorized' }}</span>
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
										<img src="{{ asset('storage/' . $detail->image) }}"
											class="w-100 lazy-image" alt="" width="470" height="540">
									</div>
									<div class="pb-3 col-12 col-lg-6 pt-12 pt-lg-0">
										<p class="fw-semibold text-body-emphasis mb-2 pb-4">{!! $detail->description !!}
										</p>

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
									@if($howtouses->count() > 0)
									@foreach($howtouses as $howtouse)
									<p class="fw-semibold text-body-emphasis mb-2 pb-4">{!! $howtouse->description !!}</p>
									@endforeach
									@else
									<p class="text-muted">No instructions available for this product.</p>
									@endif
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
											@foreach($ingredients as $ingredient)
											<tr>
												<td class="ps-0 py-5 pe-5 text-body-emphasis">{{ $ingredient->key }}
												</td>
												<td class="text-end py-5 ps-5 pe-0">
													{{ $ingredient->value }}
												</td>
											</tr>
											@endforeach
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
					<h4 class="fs-1 me-9 mb-0">{{ number_format($product->rate, 2) }}</h4>
					<div class="p-0">
						<div class="d-flex align-items-center fs-6 ls-0 mb-4">
							<div class="rating">
								<div class="filled-stars" style="width: {{ ($product->rate / 5) * 100 }}%">
									@for ($i = 0; $i < 5; $i++)
										<span class="star">
										<svg class="icon star text-primary">
											<use xlink:href="#star"></use>
										</svg>
										</span>
										@endfor
								</div>
							</div>
						</div>
						<p class="mb-0">{{ $product->reviews->count() }} Reviews</p>
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
			<form class="product-review-form" action="{{ route('reviews.store', $product->id) }}" method="POST" enctype="multipart/form-data">
				@csrf
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
						@for ($i = 5; $i >= 1; $i--)
						<input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}">
						<label for="star{{ $i }}">
							<i class="far fa-star"></i>
						</label>
						@endfor
					</div>
				</div>
				<button type="submit" class="btn btn-dark">Submit Review</button>
			</form>
		</div>

		<div class="mt-12">
			<h3 class="fs-5">{{ $product->reviews->count() }} Reviews</h3>

			@foreach ($product->reviews->sortByDesc('created_at')->take(5) as $review)
			<div class="border-bottom pb-7 pt-10">
				<!-- Review Rating -->
				<div class="d-flex align-items-center mb-6">
					<div class="d-flex align-items-center fs-15px ls-0">
						<div class="rating">
							<div class="empty-stars">
								@for ($i = 0; $i < 5; $i++)
									<span class="star">
									<svg class="icon star-o">
										<use xlink:href="#star-o"></use>
									</svg>
									</span>
									@endfor
							</div>
							<div class="filled-stars" style="width: {{ ($review->rating / 5) * 100 }}%">
								@for ($i = 0; $i < 5; $i++)
									<span class="star">
									<svg class="icon star text-primary">
										<use xlink:href="#star"></use>
									</svg>
									</span>
									@endfor
							</div>
						</div>
					</div>
					<span class="fs-3px mx-5"><i class="fas fa-circle"></i></span>
					<span class="fs-14">{{ $review->created_at->diffForHumans() }}</span>
				</div>

				<!-- Reviewer Info -->
				<div class="d-flex justify-content-start align-items-center mb-5">
					<img src=" asset('assets/website/assets/images/default-avatar.jpg') }}"
						class="me-6 lazy-image rounded-circle" width="60" height="60" alt="Avatar">
					<div class="">
						<h5 class="mt-0 mb-4 fs-14px text-uppercase ls-1">{{ $review->name }}</h5>
						<p class="mb-0">{{ $review->email }}</p>
					</div>
				</div>

				<!-- Review Title and Message -->
				<p class="fw-semibold fs-6 text-body-emphasis mb-5">{{ $review->title }}</p>
				<p class="mb-10 fs-6">{{ $review->message }}</p>

				<!-- Review Images (if any) -->

				@if ($review->images)
				<div class="mb-10">
					@foreach ($review->images as $image)
					<img src="{{ asset('storage/' . $image) }}" style="width: 100px;" class="mx-3 lazy-image" alt="Review Image">
					@endforeach
				</div>
				@endif

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
			@endforeach
		</div>



	</section>
</main>
@endsection