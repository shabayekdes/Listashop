@extends('shop::layouts.master')

@section('head')
<link rel="stylesheet" type="text/css" href="/frontend/styles/checkout_styles.css">
@endsection

@section('container')

<div class="container">

    <h1 class="checkout-heading stylish-heading">Checkout</h1>
    <div class="checkout-section">
        <div>
            <form action="#">
                <h2>Billing Details</h2>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" value="">
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="">
                </div>

                <div class="half-form">
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="city" value="">
                    </div>
                    <div class="form-group">
                        <label for="province">Province</label>
                        <input type="text" class="form-control" id="province" name="province" value="">
                    </div>
                </div> <!-- end half-form -->

                <div class="half-form">
                    <div class="form-group">
                        <label for="postalcode">Postal Code</label>
                        <input type="text" class="form-control" id="postalcode" name="postalcode" value="">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="">
                    </div>
                </div> <!-- end half-form -->

                <div class="spacer"></div>

                <h2>Payment Details</h2>

                <div class="form-group">
                    <label for="name_on_card">Name on Card</label>
                    <input type="text" class="form-control" id="name_on_card" name="name_on_card" value="">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="">
                </div>

                <div class="form-group">
                    <label for="cc-number">Credit Card Number</label>
                    <input type="text" class="form-control" id="cc-number" name="cc-number" value="">
                </div>

                <div class="half-form">
                    <div class="form-group">
                        <label for="expiry">Expiry</label>
                        <input type="text" class="form-control" id="expiry" name="expiry" placeholder="MM/DD">
                    </div>
                    <div class="form-group">
                        <label for="cvc">CVC Code</label>
                        <input type="text" class="form-control" id="cvc" name="cvc" value="">
                    </div>
                </div> <!-- end half-form -->

                <div class="spacer"></div>

                <button type="submit" class="button-primary full-width">Complete Order</button>


            </form>
        </div>



        <div class="checkout-table-container">
            <h2>Your Order</h2>

            <div class="checkout-table">
                <div class="checkout-table-row">
                    <div class="checkout-table-row-left">
                        <img src="/img/macbook-pro.png" alt="item" class="checkout-table-img">
                        <div class="checkout-item-details">
                            <div class="checkout-table-item">MacBook Pro</div>
                            <div class="checkout-table-description">15 inch, 1TB SSD, 32GB RAM</div>
                            <div class="checkout-table-price">$2499.99</div>
                        </div>
                    </div> <!-- end checkout-table -->

                    <div class="checkout-table-row-right">
                        <div class="checkout-table-quantity">1</div>
                    </div>
                </div> <!-- end checkout-table-row -->

                <div class="checkout-table-row">
                    <div class="checkout-table-row-left">
                        <img src="/img/macbook-pro.png" alt="item" class="checkout-table-img">
                        <div class="checkout-item-details">
                            <div class="checkout-table-item">MacBook Pro</div>
                            <div class="checkout-table-description">15 inch, 1TB SSD, 32GB RAM</div>
                            <div class="checkout-table-price">$2499.99</div>
                        </div>
                    </div> <!-- end checkout-table -->

                    <div class="checkout-table-row-right">
                        <div class="checkout-table-quantity">1</div>
                    </div>
                </div> <!-- end checkout-table-row -->

                <div class="checkout-table-row">
                    <div class="checkout-table-row-left">
                        <img src="/img/macbook-pro.png" alt="item" class="checkout-table-img">
                        <div class="checkout-item-details">
                            <div class="checkout-table-item">MacBook Pro</div>
                            <div class="checkout-table-description">15 inch, 1TB SSD, 32GB RAM</div>
                            <div class="checkout-table-price">$2499.99</div>
                        </div>
                    </div> <!-- end checkout-table -->

                    <div class="checkout-table-row-right">
                        <div class="checkout-table-quantity">1</div>
                    </div>
                </div> <!-- end checkout-table-row -->

            </div> <!-- end checkout-table -->

            <div class="checkout-totals">
                <div class="checkout-totals-left">
                    Subtotal <br>
                    Discount (10OFF - 10%) <br>
                    Tax <br>
                    <span class="checkout-totals-total">Total</span>

                </div>

                <div class="checkout-totals-right">
                    $7499.97 <br>
                    -$750.00 <br>
                    $975.00 <br>
                    <span class="checkout-totals-total">$8474.97</span>

                </div>
            </div> <!-- end checkout-totals -->

        </div>

    </div> <!-- end checkout-section -->
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
