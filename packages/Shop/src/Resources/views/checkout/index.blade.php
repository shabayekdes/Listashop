@extends('shop::layouts.master')

@section('head')
<link rel="stylesheet" type="text/css" href="/frontend/styles/checkout_styles.css">
<style>
    .mt-32 {
        margin-top: 32px;
    }
</style>

<script src="https://js.stripe.com/v3/"></script>

@endsection

@section('container')

<div class="container">

    <h1 class="checkout-heading stylish-heading">Checkout</h1>
    <div class="checkout-section">
        <div>
            <form action="{{ route('checkout.store') }}" method="POST" id="payment-form">
                @csrf
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
                    <label for="card-element">
                        Credit or debit card
                    </label>
                    <div id="card-element">
                        <!-- a Stripe Element will be inserted here. -->
                    </div>

                    <!-- Used to display form errors -->
                    <div id="card-errors" role="alert"></div>
                </div>
                <div class="spacer"></div>

                <button type="submit" id="complete-order" class="button checkout_button">Complete Order</button>


            </form>
        </div>



        <div class="checkout-table-container">
            <h2>Your Order</h2>

            <div class="checkout-table">

                @foreach( Cart::content() as $item)
                <div class="checkout-table-row">
                    <div class="checkout-table-row-left">
                        <img src="{{ url('/img/products/'.$item->model->thumb_url) }}" alt="item"
                            class="checkout-table-img">
                        <div class="checkout-item-details">
                            <div class="checkout-table-item">{{ Str::words($item->model->name, 3, '') }}</div>
                            <div class="checkout-table-description">15 inch, 1TB SSD, 32GB RAM</div>
                            <div class="checkout-table-price">${{ $item->model->price }}</div>
                        </div>
                    </div> <!-- end checkout-table -->

                    <div class="checkout-table-row-right">
                        <div class="checkout-table-quantity">{{ $item->qty }}</div>
                    </div>
                </div> <!-- end checkout-table-row -->
                @endforeach
            </div> <!-- end checkout-table -->

            <div class="checkout-totals">
                <div class="checkout-totals-left">
                    Subtotal <br>
                    {{-- Discount (10OFF - 10%) <br> --}}
                    Tax <br>
                    <span class="checkout-totals-total">Total</span>

                </div>

                <div class="checkout-totals-right">
                    $7499.97 <br>
                    {{-- -$750.00 <br> --}}
                    $975.00 <br>
                    <span class="checkout-totals-total">${{ Cart::subtotal() }}</span>

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

<script>
    // Create a Stripe client.
var stripe = Stripe('pk_test_sMKSH12Vb2yYtP7GTpMwSZn2');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Roboto" "Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element
var card = elements.create('card', {
                style: style,
                hidePostalCode: true
            });

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

            // Handle form submission
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
    event.preventDefault();
    // Disable the submit button to prevent repeated clicks
    document.getElementById('complete-order').disabled = true;
    var options = {
    name: document.getElementById('name_on_card').value,
    address_line1: document.getElementById('address').value,
    address_city: document.getElementById('city').value,
    address_state: document.getElementById('province').value,
    address_zip: document.getElementById('postalcode').value
    }
    stripe.createToken(card, options).then(function(result) {
    if (result.error) {
        // Inform the user if there was an error
        var errorElement = document.getElementById('card-errors');
        errorElement.textContent = result.error.message;
        // Enable the submit button
        document.getElementById('complete-order').disabled = false;
    } else {
        // Send the token to your server
        stripeTokenHandler(result.token);
    }
    });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
</script>
@endsection
