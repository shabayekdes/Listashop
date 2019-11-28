@extends('shop::layouts.master')


@section('head')
<link rel="stylesheet" type="text/css" href="frontend/plugins/slick-1.8.0/slick.css">

<link rel="stylesheet" type="text/css" href="frontend/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="frontend/styles/responsive.css">
@endsection

@section('container')

<!-- Banner -->
@include('shop::partials.home.banner')


<!-- Characteristics -->
@include('shop::partials.home.Characteristics')



<!-- Deals of the week -->
@include('shop::partials.home.deal')



<!-- Popular Categories -->
<div class="popular_categories">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="popular_categories_content">
                    <div class="popular_categories_title">Popular Categories</div>
                    <div class="popular_categories_slider_nav">
                        <div class="popular_categories_prev popular_categories_nav"><i
                                class="fas fa-angle-left ml-auto"></i></div>
                        <div class="popular_categories_next popular_categories_nav"><i
                                class="fas fa-angle-right ml-auto"></i></div>
                    </div>
                    <div class="popular_categories_link"><a href="#">full catalog</a></div>
                </div>
            </div>

            <!-- Popular Categories Slider -->

            <div class="col-lg-9">
                <div class="popular_categories_slider_container">
                    <div class="owl-carousel owl-theme popular_categories_slider">

                        @foreach ($categories as $category)
                        <!-- Popular Categories Item -->

                        <div class="owl-item">
                            <div class="popular_category d-flex flex-column align-items-center justify-content-center">
                                <div class="popular_category_image">
                                    <img src="{{ url( 'storage/' . $category->image) }}" alt="">
                                </div>
                                <div class="popular_category_text">{{ $category->name }}</div>
                            </div>
                        </div>
                        @endforeach



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Banner -->

<div class="banner_2">
    <div class="banner_2_background" style="background-image:url(frontend/images/banner_2_background.jpg)"></div>
    <div class="banner_2_container">
        <div class="banner_2_dots"></div>
        <!-- Banner 2 Slider -->

        <div class="owl-carousel owl-theme banner_2_slider">

            <!-- Banner 2 Slider Item -->
            <div class="owl-item">
                <div class="banner_2_item">
                    <div class="container fill_height">
                        <div class="row fill_height">
                            <div class="col-lg-4 col-md-6 fill_height">
                                <div class="banner_2_content">
                                    <div class="banner_2_category">Laptops</div>
                                    <div class="banner_2_title">MacBook Air 13</div>
                                    <div class="banner_2_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Maecenas fermentum laoreet.</div>
                                    <div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i>
                                    </div>
                                    <div class="button banner_2_button"><a href="#">Explore</a></div>
                                </div>

                            </div>
                            <div class="col-lg-8 col-md-6 fill_height">
                                <div class="banner_2_image_container">
                                    <div class="banner_2_image"><img src="frontend/images/banner_2_product.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Banner 2 Slider Item -->
            <div class="owl-item">
                <div class="banner_2_item">
                    <div class="container fill_height">
                        <div class="row fill_height">
                            <div class="col-lg-4 col-md-6 fill_height">
                                <div class="banner_2_content">
                                    <div class="banner_2_category">Laptops</div>
                                    <div class="banner_2_title">MacBook Air 13</div>
                                    <div class="banner_2_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Maecenas fermentum laoreet.</div>
                                    <div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i>
                                    </div>
                                    <div class="button banner_2_button"><a href="#">Explore</a></div>
                                </div>

                            </div>
                            <div class="col-lg-8 col-md-6 fill_height">
                                <div class="banner_2_image_container">
                                    <div class="banner_2_image"><img src="frontend/images/banner_2_product.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Banner 2 Slider Item -->
            <div class="owl-item">
                <div class="banner_2_item">
                    <div class="container fill_height">
                        <div class="row fill_height">
                            <div class="col-lg-4 col-md-6 fill_height">
                                <div class="banner_2_content">
                                    <div class="banner_2_category">Laptops</div>
                                    <div class="banner_2_title">MacBook Air 13</div>
                                    <div class="banner_2_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Maecenas fermentum laoreet.</div>
                                    <div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i>
                                    </div>
                                    <div class="button banner_2_button"><a href="#">Explore</a></div>
                                </div>

                            </div>
                            <div class="col-lg-8 col-md-6 fill_height">
                                <div class="banner_2_image_container">
                                    <div class="banner_2_image"><img src="frontend/images/banner_2_product.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Hot New Arrivals -->

<div class="new_arrivals">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="tabbed_container">
                    <div class="tabs clearfix tabs-right">
                        <div class="new_arrivals_title">Hot New Arrivals</div>
                        <ul class="clearfix">
                            <li class="active">Featured</li>
                            <li>Audio & Video</li>
                            <li>Laptops & Computers</li>
                        </ul>
                        <div class="tabs_line"><span></span></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-9" style="z-index:1;">


                            <div class="product_panel panel active">
                                <div class="featured_slider slider">
                                    @foreach ($products as $product)
                                    <!-- Slider Item -->
                                    <div class="featured_slider_item">
                                        <div class="border_active"></div>
                                        @include('shop::partials.loop.feature')
                                        @endforeach

                                    </div>
                                    <div class="featured_slider_dots_cover"></div>
                                </div>

                                <div class="product_panel panel">
                                    <div class="featured_slider slider">
                                        @foreach ($products as $product)
                                        <!-- Slider Item -->
                                        <div class="featured_slider_item">
                                            <div class="border_active"></div>
                                            @include('shop::partials.loop.feature')
                                            @endforeach

                                        </div>
                                        <div class="featured_slider_dots_cover"></div>
                                    </div>

                                    <div class="product_panel panel">
                                        <div class="featured_slider slider">
                                            @foreach ($products as $product)
                                            <!-- Slider Item -->
                                            <div class="featured_slider_item">
                                                <div class="border_active"></div>
                                                @include('shop::partials.loop.feature')
                                                @endforeach

                                            </div>
                                            <div class="featured_slider_dots_cover"></div>
                                        </div>

                                    </div>

                                    <div class="col-lg-3">
                                        <div class="arrivals_single clearfix">
                                            <div class="d-flex flex-column align-items-center justify-content-center">
                                                <div class="arrivals_single_image"><img
                                                        src="frontend/images/new_single.png" alt="">
                                                </div>
                                                <div class="arrivals_single_content">
                                                    <div class="arrivals_single_category"><a href="#">Smartphones</a>
                                                    </div>
                                                    <div class="arrivals_single_name_container clearfix">
                                                        <div class="arrivals_single_name"><a href="#">LUNA
                                                                Smartphone</a></div>
                                                        <div class="arrivals_single_price text-right">$379</div>
                                                    </div>
                                                    <div class="rating_r rating_r_4 arrivals_single_rating">
                                                        <i></i><i></i><i></i><i></i><i></i></div>
                                                    <form action="#"><button class="arrivals_single_button">Add to
                                                            Cart</button>
                                                    </form>
                                                </div>
                                                <div class="arrivals_single_fav product_fav active"><i
                                                        class="fas fa-heart"></i>
                                                </div>
                                                <ul class="arrivals_single_marks product_marks">
                                                    <li class="arrivals_single_mark product_mark product_new">new</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Best Sellers -->

            <div class="best_sellers">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="tabbed_container">
                                <div class="tabs clearfix tabs-right">
                                    <div class="new_arrivals_title">Hot Best Sellers</div>
                                    <ul class="clearfix">
                                        <li class="active">Top 20</li>
                                        <li>Audio & Video</li>
                                        <li>Laptops & Computers</li>
                                    </ul>
                                    <div class="tabs_line"><span></span></div>
                                </div>

                                <div class="bestsellers_panel panel active">

                                    <!-- Best Sellers Slider -->

                                    <div class="bestsellers_slider slider">

                                        @foreach ($products as $product)
                                        <!-- Best Sellers Item -->
                                        @if ($product->flat->new)
                                        <div class="bestsellers_item discount">

                                            @elseif($product->flat->special_price != null)
                                            <div class="bestsellers_item is_new">

                                                @else
                                                <div class="bestsellers_item">

                                                    @endif
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image">
                                                            @if (empty($product->flat->thumbnail))
                                                            <img src="{{ url( 'img/products/default.png') }}" alt="">
                                                            @else
                                                            <img src="{{ url( 'storage/' . $product->flat->thumbnail) }}"
                                                                alt="">
                                                            @endif
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a
                                                                    href="{{ url('store/'.$product->slug) }}">{{ Str::words($product->flat->name, 3, '') }}</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i></div>

                                                            @if (empty($product->flat->special_price))
                                                            <div class="bestsellers_price">
                                                                {{ $product->flat->present_price }}</div>

                                                            @else
                                                            <div class="bestsellers_price discount">
                                                                {{ presentPrice($product->flat->special_price) }}<span>{{ $product->flat->present_price }}</span>
                                                            </div>

                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i>
                                                    </div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>
                                                @endforeach

                                            </div>
                                        </div>

                                        <div class="bestsellers_panel panel">

                                            <!-- Best Sellers Slider -->

                                            <div class="bestsellers_slider slider">

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item discount">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="frontend/images/best_1.png" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi
                                                                    Note 4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i></div>
                                                            <div class="bestsellers_price discount">
                                                                $225<span>$300</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i>
                                                    </div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item discount">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="frontend/images/best_2.png" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi
                                                                    Note 4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i></div>
                                                            <div class="bestsellers_price discount">
                                                                $225<span>$300</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="frontend/images/best_3.png" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi
                                                                    Note 4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i></div>
                                                            <div class="bestsellers_price discount">
                                                                $225<span>$300</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="frontend/images/best_4.png" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi
                                                                    Note 4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i></div>
                                                            <div class="bestsellers_price discount">
                                                                $225<span>$300</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item discount">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="frontend/images/best_5.png" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi
                                                                    Note 4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i></div>
                                                            <div class="bestsellers_price discount">
                                                                $225<span>$300</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i>
                                                    </div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="frontend/images/best_6.png" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi
                                                                    Note 4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i></div>
                                                            <div class="bestsellers_price discount">
                                                                $225<span>$300</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i>
                                                    </div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item discount">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="frontend/images/best_1.png" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi
                                                                    Note 4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i></div>
                                                            <div class="bestsellers_price discount">
                                                                $225<span>$300</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i>
                                                    </div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item discount">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="frontend/images/best_2.png" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi
                                                                    Note 4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i></div>
                                                            <div class="bestsellers_price discount">
                                                                $225<span>$300</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="frontend/images/best_3.png" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi
                                                                    Note 4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i></div>
                                                            <div class="bestsellers_price discount">
                                                                $225<span>$300</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="frontend/images/best_4.png" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi
                                                                    Note 4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i></div>
                                                            <div class="bestsellers_price discount">
                                                                $225<span>$300</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item discount">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="frontend/images/best_5.png" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi
                                                                    Note 4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i></div>
                                                            <div class="bestsellers_price discount">
                                                                $225<span>$300</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i>
                                                    </div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="frontend/images/best_6.png" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi
                                                                    Note 4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i></div>
                                                            <div class="bestsellers_price discount">
                                                                $225<span>$300</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i>
                                                    </div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="bestsellers_panel panel">

                                            <!-- Best Sellers Slider -->

                                            <div class="bestsellers_slider slider">

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item discount">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="frontend/images/best_1.png" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi
                                                                    Note 4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i></div>
                                                            <div class="bestsellers_price discount">
                                                                $225<span>$300</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i>
                                                    </div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item discount">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="frontend/images/best_2.png" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi
                                                                    Note 4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i></div>
                                                            <div class="bestsellers_price discount">
                                                                $225<span>$300</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="frontend/images/best_3.png" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi
                                                                    Note 4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i></div>
                                                            <div class="bestsellers_price discount">
                                                                $225<span>$300</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="frontend/images/best_4.png" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi
                                                                    Note 4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i></div>
                                                            <div class="bestsellers_price discount">
                                                                $225<span>$300</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item discount">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="frontend/images/best_5.png" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi
                                                                    Note 4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i></div>
                                                            <div class="bestsellers_price discount">
                                                                $225<span>$300</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i>
                                                    </div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="frontend/images/best_6.png" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi
                                                                    Note 4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i></div>
                                                            <div class="bestsellers_price discount">
                                                                $225<span>$300</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i>
                                                    </div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item discount">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="frontend/images/best_1.png" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi
                                                                    Note 4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i></div>
                                                            <div class="bestsellers_price discount">
                                                                $225<span>$300</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i>
                                                    </div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item discount">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="frontend/images/best_2.png" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi
                                                                    Note 4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i></div>
                                                            <div class="bestsellers_price discount">
                                                                $225<span>$300</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="frontend/images/best_3.png" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi
                                                                    Note 4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i></div>
                                                            <div class="bestsellers_price discount">
                                                                $225<span>$300</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="frontend/images/best_4.png" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi
                                                                    Note 4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i></div>
                                                            <div class="bestsellers_price discount">
                                                                $225<span>$300</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item discount">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="frontend/images/best_5.png" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi
                                                                    Note 4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i></div>
                                                            <div class="bestsellers_price discount">
                                                                $225<span>$300</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i>
                                                    </div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="frontend/images/best_6.png" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi
                                                                    Note 4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i></div>
                                                            <div class="bestsellers_price discount">
                                                                $225<span>$300</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i>
                                                    </div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Adverts -->

                    <div class="adverts">
                        <div class="container">
                            <div class="row">

                                <div class="col-lg-4 advert_col">

                                    <!-- Advert Item -->

                                    <div class="advert d-flex flex-row align-items-center justify-content-start">
                                        <div class="advert_content">
                                            <div class="advert_title"><a href="#">Trends 2018</a></div>
                                            <div class="advert_text">Lorem ipsum dolor sit amet, consectetur adipiscing
                                                Donec
                                                et.</div>
                                        </div>
                                        <div class="ml-auto">
                                            <div class="advert_image"><img src="frontend/images/adv_1.png" alt=""></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 advert_col">

                                    <!-- Advert Item -->

                                    <div class="advert d-flex flex-row align-items-center justify-content-start">
                                        <div class="advert_content">
                                            <div class="advert_subtitle">Trends 2018</div>
                                            <div class="advert_title_2"><a href="#">Sale -45%</a></div>
                                            <div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
                                        </div>
                                        <div class="ml-auto">
                                            <div class="advert_image"><img src="frontend/images/adv_2.png" alt=""></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 advert_col">

                                    <!-- Advert Item -->

                                    <div class="advert d-flex flex-row align-items-center justify-content-start">
                                        <div class="advert_content">
                                            <div class="advert_title"><a href="#">Trends 2018</a></div>
                                            <div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
                                        </div>
                                        <div class="ml-auto">
                                            <div class="advert_image"><img src="frontend/images/adv_3.png" alt=""></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Trends -->

                    <div class="trends">
                        <div class="trends_background"
                            style="background-image:url(frontend/images/trends_background.jpg)">
                        </div>
                        <div class="trends_overlay"></div>
                        <div class="container">
                            <div class="row">

                                <!-- Trends Content -->
                                <div class="col-lg-3">
                                    <div class="trends_container">
                                        <h2 class="trends_title">Trends 2018</h2>
                                        <div class="trends_text">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing Donec et.</p>
                                        </div>
                                        <div class="trends_slider_nav">
                                            <div class="trends_prev trends_nav"><i
                                                    class="fas fa-angle-left ml-auto"></i>
                                            </div>
                                            <div class="trends_next trends_nav"><i
                                                    class="fas fa-angle-right ml-auto"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Trends Slider -->
                                <div class="col-lg-9">
                                    <div class="trends_slider_container">

                                        <!-- Trends Slider -->

                                        <div class="owl-carousel owl-theme trends_slider">

                                            <!-- Trends Slider Item -->
                                            <div class="owl-item">
                                                <div class="trends_item is_new">
                                                    <div
                                                        class="trends_image d-flex flex-column align-items-center justify-content-center">
                                                        <img src="frontend/images/trends_1.jpg" alt=""></div>
                                                    <div class="trends_content">
                                                        <div class="trends_category"><a href="#">Smartphones</a></div>
                                                        <div class="trends_info clearfix">
                                                            <div class="trends_name"><a href="product.html">Jump
                                                                    White</a></div>
                                                            <div class="trends_price">$379</div>
                                                        </div>
                                                    </div>
                                                    <ul class="trends_marks">
                                                        <li class="trends_mark trends_discount">-25%</li>
                                                        <li class="trends_mark trends_new">new</li>
                                                    </ul>
                                                    <div class="trends_fav"><i class="fas fa-heart"></i></div>
                                                </div>
                                            </div>

                                            <!-- Trends Slider Item -->
                                            <div class="owl-item">
                                                <div class="trends_item">
                                                    <div
                                                        class="trends_image d-flex flex-column align-items-center justify-content-center">
                                                        <img src="frontend/images/trends_2.jpg" alt=""></div>
                                                    <div class="trends_content">
                                                        <div class="trends_category"><a href="#">Smartphones</a></div>
                                                        <div class="trends_info clearfix">
                                                            <div class="trends_name"><a href="product.html">Samsung
                                                                    Charm...</a>
                                                            </div>
                                                            <div class="trends_price">$379</div>
                                                        </div>
                                                    </div>
                                                    <ul class="trends_marks">
                                                        <li class="trends_mark trends_discount">-25%</li>
                                                        <li class="trends_mark trends_new">new</li>
                                                    </ul>
                                                    <div class="trends_fav"><i class="fas fa-heart"></i></div>
                                                </div>
                                            </div>

                                            <!-- Trends Slider Item -->
                                            <div class="owl-item">
                                                <div class="trends_item is_new">
                                                    <div
                                                        class="trends_image d-flex flex-column align-items-center justify-content-center">
                                                        <img src="frontend/images/trends_3.jpg" alt=""></div>
                                                    <div class="trends_content">
                                                        <div class="trends_category"><a href="#">Smartphones</a></div>
                                                        <div class="trends_info clearfix">
                                                            <div class="trends_name"><a href="product.html">DJI Phantom
                                                                    3...</a>
                                                            </div>
                                                            <div class="trends_price">$379</div>
                                                        </div>
                                                    </div>
                                                    <ul class="trends_marks">
                                                        <li class="trends_mark trends_discount">-25%</li>
                                                        <li class="trends_mark trends_new">new</li>
                                                    </ul>
                                                    <div class="trends_fav"><i class="fas fa-heart"></i></div>
                                                </div>
                                            </div>

                                            <!-- Trends Slider Item -->
                                            <div class="owl-item">
                                                <div class="trends_item is_new">
                                                    <div
                                                        class="trends_image d-flex flex-column align-items-center justify-content-center">
                                                        <img src="frontend/images/trends_1.jpg" alt=""></div>
                                                    <div class="trends_content">
                                                        <div class="trends_category"><a href="#">Smartphones</a></div>
                                                        <div class="trends_info clearfix">
                                                            <div class="trends_name"><a href="product.html">Jump
                                                                    White</a></div>
                                                            <div class="trends_price">$379</div>
                                                        </div>
                                                    </div>
                                                    <ul class="trends_marks">
                                                        <li class="trends_mark trends_discount">-25%</li>
                                                        <li class="trends_mark trends_new">new</li>
                                                    </ul>
                                                    <div class="trends_fav"><i class="fas fa-heart"></i></div>
                                                </div>
                                            </div>

                                            <!-- Trends Slider Item -->
                                            <div class="owl-item">
                                                <div class="trends_item">
                                                    <div
                                                        class="trends_image d-flex flex-column align-items-center justify-content-center">
                                                        <img src="frontend/images/trends_2.jpg" alt=""></div>
                                                    <div class="trends_content">
                                                        <div class="trends_category"><a href="#">Smartphones</a></div>
                                                        <div class="trends_info clearfix">
                                                            <div class="trends_name"><a href="product.html">Jump
                                                                    White</a></div>
                                                            <div class="trends_price">$379</div>
                                                        </div>
                                                    </div>
                                                    <ul class="trends_marks">
                                                        <li class="trends_mark trends_discount">-25%</li>
                                                        <li class="trends_mark trends_new">new</li>
                                                    </ul>
                                                    <div class="trends_fav"><i class="fas fa-heart"></i></div>
                                                </div>
                                            </div>

                                            <!-- Trends Slider Item -->
                                            <div class="owl-item">
                                                <div class="trends_item is_new">
                                                    <div
                                                        class="trends_image d-flex flex-column align-items-center justify-content-center">
                                                        <img src="frontend/images/trends_3.jpg" alt=""></div>
                                                    <div class="trends_content">
                                                        <div class="trends_category"><a href="#">Smartphones</a></div>
                                                        <div class="trends_info clearfix">
                                                            <div class="trends_name"><a href="product.html">Jump
                                                                    White</a></div>
                                                            <div class="trends_price">$379</div>
                                                        </div>
                                                    </div>
                                                    <ul class="trends_marks">
                                                        <li class="trends_mark trends_discount">-25%</li>
                                                        <li class="trends_mark trends_new">new</li>
                                                    </ul>
                                                    <div class="trends_fav"><i class="fas fa-heart"></i></div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Reviews -->

                    <div class="reviews">
                        <div class="container">
                            <div class="row">
                                <div class="col">

                                    <div class="reviews_title_container">
                                        <h3 class="reviews_title">Latest Reviews</h3>
                                        <div class="reviews_all ml-auto"><a href="#">view all <span>reviews</span></a>
                                        </div>
                                    </div>

                                    <div class="reviews_slider_container">

                                        <!-- Reviews Slider -->
                                        <div class="owl-carousel owl-theme reviews_slider">

                                            <!-- Reviews Slider Item -->
                                            <div class="owl-item">
                                                <div
                                                    class="review d-flex flex-row align-items-start justify-content-start">
                                                    <div>
                                                        <div class="review_image"><img
                                                                src="frontend/images/review_1.jpg" alt=""></div>
                                                    </div>
                                                    <div class="review_content">
                                                        <div class="review_name">Roberto Sanchez</div>
                                                        <div class="review_rating_container">
                                                            <div class="rating_r rating_r_4 review_rating">
                                                                <i></i><i></i><i></i><i></i><i></i></div>
                                                            <div class="review_time">2 day ago</div>
                                                        </div>
                                                        <div class="review_text">
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                                Maecenas
                                                                fermentum
                                                                laoreet.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Reviews Slider Item -->
                                            <div class="owl-item">
                                                <div
                                                    class="review d-flex flex-row align-items-start justify-content-start">
                                                    <div>
                                                        <div class="review_image"><img
                                                                src="frontend/images/review_2.jpg" alt=""></div>
                                                    </div>
                                                    <div class="review_content">
                                                        <div class="review_name">Brandon Flowers</div>
                                                        <div class="review_rating_container">
                                                            <div class="rating_r rating_r_4 review_rating">
                                                                <i></i><i></i><i></i><i></i><i></i></div>
                                                            <div class="review_time">2 day ago</div>
                                                        </div>
                                                        <div class="review_text">
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                                Maecenas
                                                                fermentum
                                                                laoreet.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Reviews Slider Item -->
                                            <div class="owl-item">
                                                <div
                                                    class="review d-flex flex-row align-items-start justify-content-start">
                                                    <div>
                                                        <div class="review_image"><img
                                                                src="frontend/images/review_3.jpg" alt=""></div>
                                                    </div>
                                                    <div class="review_content">
                                                        <div class="review_name">Emilia Clarke</div>
                                                        <div class="review_rating_container">
                                                            <div class="rating_r rating_r_4 review_rating">
                                                                <i></i><i></i><i></i><i></i><i></i></div>
                                                            <div class="review_time">2 day ago</div>
                                                        </div>
                                                        <div class="review_text">
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                                Maecenas
                                                                fermentum
                                                                laoreet.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Reviews Slider Item -->
                                            <div class="owl-item">
                                                <div
                                                    class="review d-flex flex-row align-items-start justify-content-start">
                                                    <div>
                                                        <div class="review_image"><img
                                                                src="frontend/images/review_1.jpg" alt=""></div>
                                                    </div>
                                                    <div class="review_content">
                                                        <div class="review_name">Roberto Sanchez</div>
                                                        <div class="review_rating_container">
                                                            <div class="rating_r rating_r_4 review_rating">
                                                                <i></i><i></i><i></i><i></i><i></i></div>
                                                            <div class="review_time">2 day ago</div>
                                                        </div>
                                                        <div class="review_text">
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                                Maecenas
                                                                fermentum
                                                                laoreet.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Reviews Slider Item -->
                                            <div class="owl-item">
                                                <div
                                                    class="review d-flex flex-row align-items-start justify-content-start">
                                                    <div>
                                                        <div class="review_image"><img
                                                                src="frontend/images/review_2.jpg" alt=""></div>
                                                    </div>
                                                    <div class="review_content">
                                                        <div class="review_name">Brandon Flowers</div>
                                                        <div class="review_rating_container">
                                                            <div class="rating_r rating_r_4 review_rating">
                                                                <i></i><i></i><i></i><i></i><i></i></div>
                                                            <div class="review_time">2 day ago</div>
                                                        </div>
                                                        <div class="review_text">
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                                Maecenas
                                                                fermentum
                                                                laoreet.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Reviews Slider Item -->
                                            <div class="owl-item">
                                                <div
                                                    class="review d-flex flex-row align-items-start justify-content-start">
                                                    <div>
                                                        <div class="review_image"><img
                                                                src="frontend/images/review_3.jpg" alt=""></div>
                                                    </div>
                                                    <div class="review_content">
                                                        <div class="review_name">Emilia Clarke</div>
                                                        <div class="review_rating_container">
                                                            <div class="rating_r rating_r_4 review_rating">
                                                                <i></i><i></i><i></i><i></i><i></i></div>
                                                            <div class="review_time">2 day ago</div>
                                                        </div>
                                                        <div class="review_text">
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                                Maecenas
                                                                fermentum
                                                                laoreet.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="reviews_dots"></div>
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



                    @section('scripts')


                    <script src="frontend/plugins/slick-1.8.0/slick.js"></script>
                    <script src="frontend/js/custom.js"></script>
                    @endsection
