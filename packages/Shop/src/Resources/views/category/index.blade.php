@extends('shop::layouts.master')

@section('head')
<link rel="stylesheet" type="text/css" href="/frontend/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="/frontend/styles/shop_styles.css">
<link rel="stylesheet" type="text/css" href="/frontend/styles/shop_responsive.css">
@endsection

@section('container')

<!-- Home -->

<div class="home">
    <div class="home_background parallax-window" data-parallax="scroll"
        data-image-src="/frontend/images/shop_background.jpg"></div>
    <div class="home_overlay"></div>
    <div class="home_content d-flex flex-column align-items-center justify-content-center">
        <h2 class="home_title">{{ $categoryName }}</h2>
    </div>
</div>

<!-- Shop -->

<div class="shop">
    <div class="container">
        <div class="row">

            <!-- Sidebar -->
            @include('shop::category.navs.sidebar')

            <div class="col-lg-9">

                <!-- Shop Content -->

                <div class="shop_content">
                    <div class="shop_bar clearfix">
                        <div class="shop_product_count"><span>186</span> products found</div>
                        <div class="shop_sorting">
                            <span>Sort by:</span>
                            <ul>
                                <li>
                                    <span class="sorting_text">highest rated<i class="fas fa-chevron-down"></span></i>
                                    <ul>
                                        <li class="shop_sorting_button"
                                            data-isotope-option='{ "sortBy": "original-order" }'>highest rated</li>
                                        <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>name
                                        </li>
                                        <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "price" }'>
                                            price</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="product_grid">
                        <div class="product_grid_border"></div>

                        @forelse ($products as $product)
                        <!-- Product Item -->
                        <div class="product_item is_new">

                            <div class="product_border"></div>
                            <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                @if (empty($product->thumbnail))
                                <img src="{{ url( 'img/products/default.png') }}" alt="">
                                @else
                                <img src="{{ url( $product->thumbnail) }}" alt="">
                                @endif
                            </div>
                            <div class="product_content">
                                <div class="product_price">{{ $product->price }}</div>
                                <div class="product_name">
                                    <div><a href="#" tabindex="0">{{ $product->name }}</a></div>
                                </div>
                            </div>
                            <div class="product_fav"><i class="fas fa-heart"></i></div>
                            <ul class="product_marks">
                                <li class="product_mark product_discount">-25%</li>
                                <li class="product_mark product_new">new</li>
                            </ul>

                        </div>
                        @empty
                        <div style="text-align: left">No items found</div>
                        @endforelse
                    </div>

                    <!-- Shop Page Navigation -->
                    {{ $products->appends(request()->input())->links() }}

                </div>

            </div>
        </div>
    </div>
</div>

<!-- Recently Viewed -->
@include('shop::partials.viewed')

<!-- Brands -->
@include('shop::partials.brands')

@endsection

@push('scripts')

<script src="/frontend/plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="/frontend/plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="/frontend/plugins/parallax-js-master/parallax.min.js"></script>
<script src="/frontend/js/shop_custom.js"></script>
@endpush
