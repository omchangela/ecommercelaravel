@extends('website.layouts.app')

@section('body')
<br><br><br><br>
<main id="content" class="wrapper layout-page">
    <section class="z-index-2 position-relative pb-2 mb-12">
        <div class="bg-body-secondary mb-3">
            <div class="container">
                <nav class="py-4 lh-30px" aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center py-1 mb-0">
                        <li class="breadcrumb-item"><a title="Home" href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a title="Shop" href="/">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <section class="container container-xxl mb-13 mb-lg-15">
        <div class="text-center">
            <h2 class="mb-13">Wishlist</h2>
            @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif
        </div>

        @if ($wishlists->isEmpty())
        <div class="text-center">
            <p class="text-muted">Your wishlist is empty.</p>
            <a href="/" class="btn btn-dark">Continue Shopping</a>
        </div>
        @else
        <form class="table-responsive-md">
            <table class="table" style="min-width: 710px">
                <tbody>
                    @foreach ($wishlists as $wishlist)
                    <tr class="border">
                        <th scope="row" class="ps-xl-10 py-6 d-flex align-items-center border-0">
                            <!-- Delete button -->
                            <a href="#" class="d-block text-muted fw-lighter"
                                onclick="event.preventDefault(); document.getElementById('delete-wishlist-{{ $wishlist->id }}').submit();">
                                <i class="fas fa-times"></i>
                            </a>
                            <form id="delete-wishlist-{{ $wishlist->id }}"
                                action="{{ route('wishlist.destroy', $wishlist->id) }}?return={{ request()->fullUrl() }}"
                                method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>


                            <!-- Product details -->
                            <div class="d-flex align-items-center">
                                <div class="ms-6 me-7">
                                    <img src="{{ asset($wishlist->product_image ?? 'path/to/default-image.jpg') }}" class="img-fluid lazy-image" height="100" width="75" alt="{{ $wishlist->product_name }}">
                                </div>
                                <div>
                                    <p class="text-body-emphasis fw-semibold mb-5">{{ $wishlist->product_name }}</p>
                                    <p class="fw-bold fs-14px mb-4 text-body-emphasis">
                                        <span>₹ {{ $wishlist->price }}</span>
                                    </p>
                                </div>
                            </div>
                        </th>
                        <td class="align-middle text-end pe-10">
                            <span class="me-6 text-success">In stock</span>
                            <!-- Add to Cart Button -->
                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $wishlist->product_id }}">
                                <input type="hidden" name="product_name" value="{{ $wishlist->product_name }}">
                                <input type="hidden" name="product_image" value="{{ $wishlist->product_image }}">
                                <input type="hidden" name="price" value="{{ $wishlist->price }}">
                                <input type="hidden" name="unit" value="{{ $wishlist->unit }}"> <!-- Pass the unit -->

                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-cart-plus"></i> Add to Cart
                                </button>
                            </form>

                        </td>
                    </tr>
                    @endforeach

                    <tr>
                        <td class="border-0 py-8 px-0"></td>
                        <td class="border-0 text-end py-8 px-0">
                            <a href="/" class="btn btn-dark btn-hover-bg-primary btn-hover-border-primary text-light">Continue Shopping</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
        @endif
    </section>
</main>
@endsection