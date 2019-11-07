@extends('shop::layouts.master')

@section('head')
<link rel="stylesheet" type="text/css" href="/frontend/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="/frontend/styles/shop_styles.css">
<link rel="stylesheet" type="text/css" href="/frontend/styles/shop_responsive.css">
<link rel="stylesheet" type="text/css" href="/frontend/styles/cart_styles.css">
<link rel="stylesheet" type="text/css" href="/frontend/styles/cart_responsive.css">
@endsection

@section('container')

<div class="home">
    <div class="home_background parallax-window" data-parallax="scroll"
        data-image-src="/frontend/images/shop_background.jpg"></div>
    <div class="home_overlay"></div>
    <div class="home_content d-flex flex-column align-items-center justify-content-center">
        <h2 class="home_title">My Account</h2>
    </div>
</div>

<!-- My account -->

<div class="shop">
    <div class="container">
        <div class="row">

            <!-- Sidebar -->
            @include('shop::account.navs.sidebar')

            <div class="col-lg-9">
                <div class="cart_section">
                    <div class="container">
                        <div class="row">
                            @if (Cart::count() > 0)
                            <div class="col-lg-10 offset-lg-1">
                                <div class="cart_container">
                                    <div class="cart_title">{{ $order->item_count }} item(s) in Order #{{$order->sku}}
                                    </div>
                                    <div class="cart_items">
                                        <ul class="cart_list">
                                            @foreach( $products as $product)
                                            <li class="cart_item clearfix">
                                                <div class="cart_item_image"><img
                                                        src="{{ url('/img/products/'.$product->thumb_url) }}" alt="">
                                                </div>
                                                <div
                                                    class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                                    <div class="cart_item_name cart_info_col">
                                                        <div class="cart_item_title">Name</div>
                                                        <div class="cart_item_text">
                                                            {{ Str::words($product->name, 3, '') }}</div>
                                                    </div>
                                                    <div class="cart_item_color cart_info_col">
                                                        <div class="cart_item_title">Color</div>
                                                        <div class="cart_item_text"><span
                                                                style="background-color:#999999;"></span>Silver</div>
                                                    </div>
                                                    <div class="cart_item_quantity cart_info_col">
                                                        <div class="cart_item_title">Quantity</div>
                                                        <div class="cart_item_text">{{ $order->item_count }}</div>
                                                    </div>
                                                    <div class="cart_item_price cart_info_col">
                                                        <div class="cart_item_title">Price</div>
                                                        <div class="cart_item_text">${{ $product->price }}</div>
                                                    </div>
                                                    <div class="cart_item_total cart_info_col">
                                                        <div class="cart_item_title">Total</div>
                                                        <div class="cart_item_text">
                                                            {{-- ${{ $product->orders()->pivot->subtotal }}</div> --}}
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    <!-- Order Total -->
                                    <div class="order_total">
                                        <div class="order_total_content text-md-right">
                                            <div class="order_total_title">Order Total:</div>
                                            <div class="order_total_amount">${{ Cart::subtotal() }}</div>
                                        </div>
                                    </div>

                                    <div class="cart_buttons">
                                        <a href="{{ route('store.index') }}" class="button cart_button_clear">Continue
                                            Shopping</a>
                                        <a href="{{ route('checkout.index') }}"
                                            class="button cart_button_checkout">Proceed to
                                            Checkout</a>
                                    </div>
                                </div>
                            </div>
                            @else
                            <p>There are no items in the cart</p>

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="/frontend/plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="/frontend/plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="/frontend/plugins/parallax-js-master/parallax.min.js"></script>
<script src="/frontend/js/shop_custom.js"></script>
@endsection
