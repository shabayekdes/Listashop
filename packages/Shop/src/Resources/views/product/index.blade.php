@extends('shop::layouts.master')

@section('head')
<link rel="stylesheet" type="text/css" href="/frontend/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">

<link rel="stylesheet" type="text/css" href="/frontend/styles/product_styles.css">
<link rel="stylesheet" type="text/css" href="/frontend/styles/product_responsive.css">
@endsection

@section('container')


<!-- Single Product -->

<div class="single_product">
    <div class="container">
        <div class="row">

            <!-- Images -->
            <div class="col-lg-2 order-lg-1 order-2">
                <ul class="image_list">
                    @foreach ($product->images()->limit(3)->get() as $image)
                    <li data-image="{{ url('storage/'.$image->path) }}"><img src="{{ url('storage/'.$image->path) }}"
                            alt=""></li>
                    @endforeach

                </ul>
            </div>

            <!-- Selected Image -->
            <div class="col-lg-5 order-lg-2 order-1">
                <div class="image_selected">
                    @if (empty($product->thumbnail))
                    <img src="{{ url( 'img/products/default.png') }}" alt="">
                    @else
                    <img src="{{ url( 'storage/' . $product->thumbnail) }}" alt="">
                    @endif
                </div>
            </div>

            <!-- Description -->
            <div class="col-lg-5 order-3">
                <div class="product_description">
                    <div class="product_category">Laptops</div>
                    <div class="product_name">{{ $product->name }}</div>
                    <div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
                    <div class="product_text">
                        <p>{{ $product->description }}</p>
                    </div>
                    <div class="order_info d-flex flex-row">
                        <form action="#">
                            <div class="clearfix" style="z-index: 1000;">

                                <!-- Product Quantity -->
                                <div class="product_quantity clearfix">
                                    <span>Quantity: </span>
                                    <input id="quantity_input" type="text" pattern="[0-9]*" value="1">
                                    <div class="quantity_buttons">
                                        <div id="quantity_inc_button" class="quantity_inc quantity_control"><i
                                                class="fas fa-chevron-up"></i></div>
                                        <div id="quantity_dec_button" class="quantity_dec quantity_control"><i
                                                class="fas fa-chevron-down"></i></div>
                                    </div>
                                </div>

                                <!-- Product Color -->
                                <ul class="product_color">
                                    <li>
                                        <span>Color: </span>
                                        <div class="color_mark_container">
                                            <div id="selected_color" class="color_mark"></div>
                                        </div>
                                        <div class="color_dropdown_button"><i class="fas fa-chevron-down"></i></div>

                                        <ul class="color_list">
                                            <li>
                                                <div class="color_mark" style="background: #999999;"></div>
                                            </li>
                                            <li>
                                                <div class="color_mark" style="background: #b19c83;"></div>
                                            </li>
                                            <li>
                                                <div class="color_mark" style="background: #000000;"></div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>

                            </div>

                            <div class="product_price">{{ $product->price }}</div>
                            <div class="button_container">
                                <a href="{{ route('cart.store',$product)}}" class="button cart_button">Add to Cart</a>
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                            </div>

                        </form>
                    </div>
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

<script src="/frontend/js/product_custom.js"></script>

@endsection
