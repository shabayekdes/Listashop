@extends('shop::layouts.master')

@section('head')
<link rel="stylesheet" type="text/css" href="/frontend/styles/cart_styles.css">
<link rel="stylesheet" type="text/css" href="/frontend/styles/cart_responsive.css">
@endsection

@section('container')

<!-- Cart -->

<div class="cart_section">
    <div class="container">
        <div class="row">
            @if (Cart::count() > 0)
            <div class="col-lg-10 offset-lg-1">
                <div class="cart_container">
                    <div class="cart_title">{{ Cart::count() }} item(s) in Shopping Cart</div>
                    <div class="cart_items">
                        <ul class="cart_list">
                            @foreach( Cart::content() as $item)
                            <li class="cart_item clearfix">
                                <div class="cart_item_image">
                                    @if (empty($item->model->thumbnail))
                                    <img src="{{ url( 'img/products/default.png') }}" alt="">
                                    @else
                                    <img src="{{ url( 'storage/' . $item->model->thumbnail) }}" alt="">
                                    @endif
                                </div>
                                <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                    <div class="cart_item_name cart_info_col">
                                        <div class="cart_item_title">Name</div>
                                        <div class="cart_item_text">{{ Str::words($item->model->name, 3, '') }}
                                        </div>
                                    </div>
                                    <div class="cart_item_color cart_info_col">
                                        <div class="cart_item_title">Color</div>
                                        <div class="cart_item_text"><span
                                                style="background-color:#999999;"></span>Silver</div>
                                    </div>
                                    <div class="cart_item_quantity cart_info_col">
                                        <div class="cart_item_title">Quantity</div>
                                        <div class="cart_item_text">{{ $item->qty }}</div>
                                    </div>
                                    <div class="cart_item_price cart_info_col">
                                        <div class="cart_item_title">Price</div>
                                        <div class="cart_item_text">${{ $item->model->price }}</div>
                                    </div>
                                    <div class="cart_item_total cart_info_col">
                                        <div class="cart_item_title">Total</div>
                                        <div class="cart_item_text">${{ $item->subtotal }}</div>
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
                        <a href="{{ route('store.index') }}" class="button cart_button_clear">Continue Shopping</a>
                        <a href="{{ route('checkout.index') }}" class="button cart_button_checkout">Proceed to
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

@endsection

@section('scripts')

<script src="/frontend/plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="/frontend/plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="/frontend/plugins/parallax-js-master/parallax.min.js"></script>
<script src="/frontend/js/shop_custom.js"></script>
@endsection
