@extends('shop::layouts.master')

@section('head')
<link rel="stylesheet" type="text/css" href="/frontend/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="/frontend/styles/shop_styles.css">
<link rel="stylesheet" type="text/css" href="/frontend/styles/shop_responsive.css">
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
                <div class="products-section my-orders container">
                    <div class="my-profile">
                        <div class="products-header">
                            <h1 class="stylish-heading">Order ID: {{ $order->id }}</h1>
                        </div>

                        <div>
                            <div class="order-container">
                                <div class="order-header">
                                    <div class="order-header-items">
                                        <div>
                                            <div class="uppercase font-bold">Order Placed</div>
                                            <div>{{ $order->created_at }}</div>
                                        </div>
                                        <div>
                                            <div class="uppercase font-bold">Order ID</div>
                                            <div>{{ $order->id }}</div>
                                        </div>
                                        <div>
                                            <div class="uppercase font-bold">Total</div>
                                            <div>{{ presentPrice($order->billing_total) }}</div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="order-header-items">
                                            <div><a href="#">Invoice</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-products">
                                    <table class="table" style="width:50%">
                                        <tbody>
                                            <tr>
                                                <td>Name</td>
                                                <td>{{ $order->user->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Address</td>
                                                <td>{{ $order->billing_address }}</td>
                                            </tr>
                                            <tr>
                                                <td>City</td>
                                                <td>{{ $order->billing_city }}</td>
                                            </tr>
                                            <tr>
                                                <td>Subtotal</td>
                                                <td>{{ presentPrice($order->billing_subtotal) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Tax</td>
                                                <td>{{ presentPrice($order->billing_tax) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Total</td>
                                                <td>{{ presentPrice($order->billing_total) }}</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div> <!-- end order-container -->

                            <div class="order-container">
                                <div class="order-header">
                                    <div class="order-header-items">
                                        <div>
                                            Order Items
                                        </div>

                                    </div>
                                </div>
                                <div class="order-products">
                                    @foreach ($products as $product)
                                    <div class="order-product-item">
                                        <div><img src="{{ asset($product->image) }}" alt="Product Image"></div>
                                        <div>
                                            <div>
                                                <a
                                                    href="{{ route('store.show', $product->slug) }}">{{ $product->name }}</a>
                                            </div>
                                            <div>{{ presentPrice($product->price) }}</div>
                                            <div>Quantity: {{ $product->pivot->quantity }}</div>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                            </div> <!-- end order-container -->
                        </div>

                        <div class="spacer"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="/frontend/js/jquery-3.3.1.min.js"></script>
<script src="/frontend/styles/bootstrap4/popper.js"></script>
<script src="/frontend/styles/bootstrap4/bootstrap.min.js"></script>
<script src="/frontend/plugins/greensock/TweenMax.min.js"></script>
<script src="/frontend/plugins/greensock/TimelineMax.min.js"></script>
<script src="/frontend/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="/frontend/plugins/greensock/animation.gsap.min.js"></script>
<script src="/frontend/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="/frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="/frontend/plugins/easing/easing.js"></script>
<script src="/frontend/plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="/frontend/plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="/frontend/plugins/parallax-js-master/parallax.min.js"></script>
<script src="/frontend/js/shop_custom.js"></script>
@endsection
