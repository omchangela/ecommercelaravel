<!-- resources/views/home.blade.php -->
@extends('website.layouts.app') <!-- Adjust path to your layout -->

@section('body')
<main id="content" class="wrapper layout-page">

    <!-- banner data -->
    <section>
        <div class="slick-slider hero hero-header-09"
            data-slick-options='{&#34;arrows&#34;:false,&#34;autoplay&#34;:true,&#34;cssEase&#34;:&#34;ease-in-out&#34;,&#34;dots&#34;:false,&#34;fade&#34;:true,&#34;infinite&#34;:true,&#34;slidesToShow&#34;:1,&#34;speed&#34;:600}'>

            @foreach ($banners->reverse()->take(3) as $banner)
            <div class="vh-100 d-flex align-items-center">
                <div class="lazy-bg bg-overlay position-absolute z-index-1 w-100 h-100   light-mode-img" data-bg-src="{{ asset('storage/' . $banner->image) }}">
                </div>
                <div class="lazy-bg bg-overlay dark-mode-img position-absolute z-index-1 w-100 h-100" data-bg-src="{{ asset('storage/' . $banner->image) }}">
                </div>

                <div class="position-relative z-index-2 container container-xxl pt-22 pb-15 pt-xl-13 pb-xl-11">
                    <div class="border-0 ps-lg-1 mx-md-0 mx-auto hero-card text-center">
                        <div class="text-start text-xl-center">
                            <div data-animate="fadeInDown">
                                <p class="text-primary mb-8 hero-title font-primary">{{ $banner->text_input_1 }}</p>
                                <h1 class="mb-7 hero-title">{{ $banner->text_input_2 }}</h1>
                                <p class="hero-desc fs-18px mb-11 text-body-calculate">{{ $banner->text_input_3 }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </section>

    <!-- product data  -->
    <section id="shop_our_feature_products">
        <div class="container-xxl py-lg-18 pt-14 pb-15 mb-3 mt-1">
            <div class="mb-12 pb-3 text-center" data-animate="fadeInUp">
                <h2 class="mb-5">Shop our Feature products</h2>
                <p class="fs-18px mb-0 mw-xl-30 mw-lg-50 mw-md-75 ms-auto me-auto">Made using clean, non-toxic ingredients, our products are designed for everyone.</p>
            </div>

            <div class="row">
                @foreach ($productBanners->reverse()->take(1) as $productBanner)
                <div class="col-lg-5 mb-10 mb-lg-0" data-animate="fadeInUp">
                    <div class="card border-0 rounded-0 hover-zoom-in hover-shine">
                        <img
                            class="lazy-image w-100 img-fluid card-img object-fit-cover banner-02"
                            src="#"
                            data-src="{{ asset('storage/' . $productBanner->image_path) }}"
                            width="570"
                            height="913"
                            alt="Product Banner Image">
                    </div>
                </div>
                @endforeach

                <div class="col-lg-7">
                    <div class="row gy-11">
                        @foreach ($products->reverse()->take(6) as $product)
                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="card card-product grid-1 bg-transparent border-0" data-animate="fadeInUp">
                                <figure class="card-img-top position-relative mb-7 overflow-hidden">
                                    <a href="{{ route('product.detail', ['id' => $product->id]) }}" class="hover-zoom-in d-block" title="{{ $product->name }}">
                                        <img src="{{ $product->image_url }}" class="img-fluid lazy-image w-100" alt="{{ $product->name }}" width="330" height="440">
                                    </a>
                                </figure>
                                <div class="card-body text-center p-0">
                                    <!-- Updated Price Display -->
                                    @if ($product->prices->isNotEmpty())
                                    @php
                                    $minPrice = $product->prices->min('price');
                                    @endphp
                                    <span class="d-flex align-items-center price text-body-emphasis fw-bold justify-content-center mb-3 fs-6">
                                        Starting From ₹ {{ number_format($minPrice) }}
                                    </span>
                                    @else
                                    <span class="d-flex align-items-center price text-body-emphasis fw-bold justify-content-center mb-3 fs-6">
                                        Price Not Available
                                    </span>
                                    @endif

                                    <h4 class="product-title card-title text-primary-hover text-body-emphasis fs-15px fw-500 mb-3">
                                        <a class="text-decoration-none text-reset" href="{{ route('product.detail', ['id' => $product->id]) }}">{{ $product->name }}</a>
                                    </h4>
                                    <div class="d-flex align-items-center fs-12px justify-content-center">
                                        <div class="rating">
                                            <div class="empty-stars">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <span class="star">
                                                    <svg class="icon star-o">
                                                        <use xlink:href="#star-o"></use>
                                                    </svg>
                                                    </span>
                                                    @endfor
                                            </div>
                                            <div class="filled-stars" style="width: {{ ($product->reviews->avg('rating') / 5) * 100 }}%">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <span class="star">
                                                    <svg class="icon star text-primary">
                                                        <use xlink:href="#star"></use>
                                                    </svg>
                                                    </span>
                                                    @endfor
                                            </div>
                                        </div>
                                        <span class="reviews ms-4 pt-3 fs-14px">{{ $product->reviews->count() }} reviews</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- static company data  -->
    <section id="with_client_logo_3" class="bg-section  -2">

        <div class="container py-lg-20 pt-14 pb-16">
            <div class="row mt-5 mb-15">
                <div class="col-lg-9 offset-lg-1 col-xl-8 offset-xl-2">
                    <div class="slick-slider main" data-slick-options='{"slidesToShow": 1,"dots":false,"arrows":false, "asNavFor": "#with_client_logo_3 .thumb"}'>

                        <div class="text-center" data-animate="fadeInUp">
                            <h4 class="mb-0">"Millions of combinations, meaning you get a totally unique piece of furniture exactly the way you want it."</h4>
                        </div>
                        <div class="text-center" data-animate="fadeInUp">
                            <h4 class="mb-0">"Great tags, Millie has got used to it, nothing like the old tin tags of years gone by. Light weight and great colours available."</h4>
                        </div>
                        <div class="text-center" data-animate="fadeInUp">
                            <h4 class="mb-0">"Amazing product. The results are so transformative in texture and my face feels plump and healthy. Highly recommend!"</h4>
                        </div>
                        <div class="text-center" data-animate="fadeInUp">
                            <h4 class="mb-0">"Millions of combinations, meaning you get a totally unique piece of furniture exactly the way you want it."</h4>
                        </div>
                        <div class="text-center" data-animate="fadeInUp">
                            <h4 class="mb-0">"Great tags, Millie has got used to it, nothing like the old tin tags of years gone by. Light weight and great colours available."</h4>
                        </div>
                        <div class="text-center" data-animate="fadeInUp">
                            <h4 class="mb-0">"Millions of combinations, meaning you get a totally unique piece of furniture exactly the way you want it."</h4>
                        </div>
                        <div class="text-center" data-animate="fadeInUp">
                            <h4 class="mb-0">"Millions of combinations, meaning you get a totally unique piece of furniture exactly the way you want it."</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="slick-slider thumb" data-slick-options='{"slidesToShow": 6,"focusOnSelect": true,"arrows": false, "dots": false, "asNavFor": "#with_client_logo_3 .main", "responsive":[{"breakpoint":992,"settings":{"dots":true,"slidesToShow":4}},{"breakpoint":768,"settings":{"dots":true,"slidesToShow":3}},{"breakpoint":576,"settings":{"dots":true,"slidesToShow":2}}] }'>

                <div class="client-logo-item" data-animate="fadeInUp">


                    <img class="lazy-image w-auto mx-auto opacity-30 light-mode-img" src="#" data-src="{{ asset('assets/website/assets') }}/images/client-logo/client-logo-01.png" width="150" height="82" alt="goodness">
                    <img class="lazy-image dark-mode-img w-auto mx-auto opacity-30" src="#" data-src="{{ asset('assets/website/assets') }}/images/client-logo/client-logo-white-01.png" width="150" height="82" alt="goodness">
                </div>
                <div class="client-logo-item" data-animate="fadeInUp">


                    <img class="lazy-image w-auto mx-auto opacity-30 light-mode-img" src="#" data-src="{{ asset('assets/website/assets') }}/images/client-logo/client-logo-02.png" width="150" height="82" alt="grandgolden">
                    <img class="lazy-image dark-mode-img w-auto mx-auto opacity-30" src="#" data-src="{{ asset('assets/website/assets') }}/images/client-logo/client-logo-white-02.png" width="150" height="82" alt="grandgolden">
                </div>
                <div class="client-logo-item" data-animate="fadeInUp">


                    <img class="lazy-image w-auto mx-auto opacity-30 light-mode-img" src="#" data-src="{{ asset('assets/website/assets') }}/images/client-logo/client-logo-03.png" width="150" height="82" alt="parker">
                    <img class="lazy-image dark-mode-img w-auto mx-auto opacity-30" src="#" data-src="{{ asset('assets/website/assets') }}/images/client-logo/client-logo-white-03.png" width="150" height="82" alt="parker">
                </div>
                <div class="client-logo-item" data-animate="fadeInUp">


                    <img class="lazy-image w-auto mx-auto opacity-30 light-mode-img" src="#" data-src="{{ asset('assets/website/assets') }}/images/client-logo/client-logo-04.png" width="150" height="82" alt="thebeast">
                    <img class="lazy-image dark-mode-img w-auto mx-auto opacity-30" src="#" data-src="{{ asset('assets/website/assets') }}/images/client-logo/client-logo-white-04.png" width="150" height="82" alt="thebeast">
                </div>
                <div class="client-logo-item" data-animate="fadeInUp">


                    <img class="lazy-image w-auto mx-auto opacity-30 light-mode-img" src="#" data-src="{{ asset('assets/website/assets') }}/images/client-logo/client-logo-05.png" width="150" height="82" alt="hayden">
                    <img class="lazy-image dark-mode-img w-auto mx-auto opacity-30" src="#" data-src="{{ asset('assets/website/assets') }}/images/client-logo/client-logo-white-05.png" width="150" height="82" alt="hayden">
                </div>
                <div class="client-logo-item" data-animate="fadeInUp">


                    <img class="lazy-image w-auto mx-auto opacity-30 light-mode-img" src="#" data-src="{{ asset('assets/website/assets') }}/images/client-logo/client-logo-06.png" width="150" height="82" alt="goodmood">
                    <img class="lazy-image dark-mode-img w-auto mx-auto opacity-30" src="#" data-src="{{ asset('assets/website/assets') }}/images/client-logo/client-logo-white-06.png" width="150" height="82" alt="goodmood">
                </div>
                <div class="client-logo-item" data-animate="fadeInUp">


                    <img class="lazy-image w-auto mx-auto opacity-30 light-mode-img" src="#" data-src="{{ asset('assets/website/assets') }}/images/client-logo/client-logo-01.png" width="150" height="82" alt="goodness">
                    <img class="lazy-image dark-mode-img w-auto mx-auto opacity-30" src="#" data-src="{{ asset('assets/website/assets') }}/images/client-logo/client-logo-white-01.png" width="150" height="82" alt="goodness">
                </div>
            </div>

        </div>
    </section>

    <!-- Dummy data -->
    <section class="py-lg-20 py-15">
        <div class="container container-xxl">
            <div class="row gx-30px gy-30px">
                <div class="col-lg-3" data-animate="fadeInUp">
                    <div class="d-flex">
                        <div class="me-9">
                            <img data-src="{{ asset('assets/website/assets') }}/images/image-box/image-box-18.png" alt="Guaranteed PURE"
                                width="90" height="90" class="lazy-image" src="#" />
                        </div>
                        <div>
                            <h3 class="fs-4 mb-6">
                                Guaranteed PURE
                            </h3>
                            <p class="mb-0 pe-lg-12">All Grace formulations adhere to strict purity standards and
                                will never contain harsh or toxic ingredients</p>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3" data-animate="fadeInUp">
                    <div class="d-flex">
                        <div class="me-9">
                            <img data-src="{{ asset('assets/website/assets') }}/images/image-box/image-box-19.png" alt="Completely Cruelty-Free"
                                width="90" height="90" class="lazy-image" src="#" />
                        </div>
                        <div>
                            <h3 class="fs-4 mb-6">
                                Completely Cruelty-Free
                            </h3>
                            <p class="mb-0 pe-lg-12">All Grace formulations adhere to strict purity standards and
                                will never contain harsh or toxic ingredients</p>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3" data-animate="fadeInUp">
                    <div class="d-flex">
                        <div class="me-9">
                            <img data-src="{{ asset('assets/website/assets') }}/images/image-box/image-box-20.png" alt="Ingredient Sourcing"
                                width="90" height="90" class="lazy-image" src="#" />
                        </div>
                        <div>
                            <h3 class="fs-4 mb-6">
                                Ingredient Sourcing
                            </h3>
                            <p class="mb-0 pe-lg-12">All Grace formulations adhere to strict purity standards and
                                will never contain harsh or toxic ingredients</p>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3" data-animate="fadeInUp">
                    <div class="d-flex">
                        <div class="me-9">
                            <img data-src="{{ asset('assets/website/assets') }}/images/image-box/image-box-19.png" alt="Completely Cruelty-Free"
                                width="90" height="90" class="lazy-image" src="#" />
                        </div>
                        <div>
                            <h3 class="fs-4 mb-6">
                                Completely Cruelty-Free
                            </h3>
                            <p class="mb-0 pe-lg-12">All Grace formulations adhere to strict purity standards and
                                will never contain harsh or toxic ingredients</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Category Section -->
    <section>

        <div class="container-fluid px-9">
            <div class="row gy-30px gx-30px">
                @foreach ($categories->reverse()->take(3) as $category)
                <div class="col-12 col-md-4" data-animate="fadeInUp">
                    <div class="card border-0 rounded-0 hover-zoom-in hover-shine">

                        <img class="lazy-image card-img object-fit-cover lazy-image"
                            src="{{ asset('storage/' . $category->image) }}" width="468" height="468"
                            alt="{{ $category->name }}">
                        <div class="card-img-overlay d-inline-flex flex-column p-8 justify-content-end text-center">
                            <h3 class="card-title text-white lh-45px">{{ $category->name }}</h3>
                            <div>
                                <a href="/shop"
                                    class="btn btn-link p-0 fw-semibold text-white text-decoration-none">Disvover
                                    Now <svg class="icon">
                                        <use xlink:href="#icon-arrow-right"></use>
                                    </svg></a>
                            </div>
                        </div>
                    </div>

                </div>
                @endforeach

            </div>
        </div>
    </section>

    <!-- testimonial data -->
    <section class="pt-lg-18 pt-15 mt-3 pb-lg-17 pb-16" data-animate="fadeInUp">

        <div class="container container-xxl">
            <div class="col-lg-6 offset-lg-3">
                <div class="slick-slider custom-arrow dot-lg-0"
                    data-slick-options='{"slidesToShow": 1,"infinite":true,"autoplay":true,"dots":false,"arrows":true,"fade":false,"cssEase":"ease-in-out","speed":600, "responsive":[{"breakpoint": 992,"settings": {"slidesToShow":1,"dots":true, "arrows":false }}]}'>
                    <div class="px-6 text-center">
                        <img src="#" data-src="{{ asset('assets/website/assets') }}/images/testimonial/testimonial-10.png"
                            alt="Amazing product. The results are so transformative in texture."
                            class="lazy-image mx-auto mb-11" style="width: 80px; height: 80px">
                        <p class="text-primary fs-3 mb-12 pb-2">“Amazing product. The results are so transformative
                            in texture and my face feels plump and healthy.“</p>
                        <h4 class="fs-15px fw-bold text-uppercase mb-4">Kathleen C.</h4>
                    </div>


                    <div class="px-6 text-center">
                        <img src="#" data-src="{{ asset('assets/website/assets') }}/images/testimonial/testimonial-11.png"
                            alt="Amazing product. The results are so transformative in texture."
                            class="lazy-image mx-auto mb-11" style="width: 80px; height: 80px">
                        <p class="text-primary fs-3 mb-12 pb-2">“Amazing product. The results are so transformative
                            in texture and my face feels plump and healthy.“</p>
                        <h4 class="fs-15px fw-bold text-uppercase mb-4">Kathleen C.</h4>
                    </div>


                    <div class="px-6 text-center">
                        <img src="#" data-src="{{ asset('assets/website/assets') }}/images/testimonial/testimonial-12.png"
                            alt="Amazing product. The results are so transformative in texture."
                            class="lazy-image mx-auto mb-11" style="width: 80px; height: 80px">
                        <p class="text-primary fs-3 mb-12 pb-2">“Amazing product. The results are so transformative
                            in texture and my face feels plump and healthy.“</p>
                        <h4 class="fs-15px fw-bold text-uppercase mb-4">Kathleen C.</h4>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- instagram page  -->
    <section class="bg-section-2 pb-lg-18 pb-16 pt-lg-17 pt-15 mb-4">
        <div class="container container-xxl">
            <div class="row align-items-center">
                <div class="col-md-6 mb-md-9" data-animate="fadeInUp">
                    <h2 class="fs-3 mb-0">On the Instagram</h2>
                </div>
                <div class="col-md-6 mb-10 mb-md-9" data-animate="fadeInUp">
                    <p class="fs-18px fw-semibold text-primary text-md-end mb-0">@Glowing_cosmetics</p>
                </div>
            </div>
            <div class="mx-n6 slick-slider"
                data-slick-options='{"slidesToShow": 5,"infinite":false,"autoplay":false,"dots":false,"arrows":false,"responsive":[{"breakpoint": 1366,"settings": {"slidesToShow":5 }},{"breakpoint": 992,"settings": {"slidesToShow":3}},{"breakpoint": 768,"settings": {"slidesToShow": 2}},{"breakpoint": 576,"settings": {"slidesToShow": 2}}]}'>

                @foreach ($instagramImages as $image)
                <div class="px-6" data-animate="fadeInUp">
                    <a href="{{ asset('storage/'.$image->image) }}" title="instagram-{{ $loop->index + 1 }}" data-gallery="instagram"
                        class="hover-zoom-in hover-shine card-img-overlay-hover hover-zoom-in hover-shine d-block">
                        <img class="lazy-image img-fluid w-100" width="314" height="314"
                            data-src="{{ asset('storage/'.$image->image) }}" alt="instagram-{{ $loop->index + 1 }}" src="#">
                        <span class="card-img-overlay bg-dark bg-opacity-30"></span>
                    </a>
                </div>
                @endforeach

            </div>
        </div>
    </section>

</main>
@endsection