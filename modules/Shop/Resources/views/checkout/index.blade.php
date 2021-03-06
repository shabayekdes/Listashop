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

    @if (session()->has('success_message'))
    <div class="spacer"></div>
    <div class="alert alert-success">
        {{ session()->get('success_message') }}
    </div>
    @endif


    @if($errors->any())
    <div class="spacer"></div>
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <h1 class="checkout-heading stylish-heading">Checkout</h1>
    <div class="checkout-section">
        <div>
            <form action="{{ route('checkout.store') }}" method="POST" id="payment-form">
                @csrf
                <h2>Address Details</h2>

                <div class="half-form">
                    @if ($addresses->count() > 0)
                    <div class="form-group">
                        <label for="addressFormControlSelect">Select your address</label>
                        <select class="form-control" id="addressFormControlSelect" name="customer_address_id">
                            <option selected>Select one address</option>
                            @foreach ($addresses as $address)
                            <option value="{{ $address->id }}">{{ $address->address }}</option>
                            @endforeach
                        </select>
                    </div>
                    @else
                    <p>don't have any address please add new</p>
                    @endif
                    <a href="#" data-toggle="modal" data-target="#createAddressModal" class="btn btn-primary btn-sm"><i
                            class="fas fa-pencil-alt"></i> Add new address</a>

                </div> <!-- end half-form -->



                {{-- <div class="form-group">
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
                </div> <!-- end half-form --> --}}

                <div class="spacer"></div>

                <h2>Payment Details</h2>

                <div class="custom-control custom-radio">
                    <input type="radio" id="cod" name="payment_method" value="cod" class="custom-control-input" checked>
                    <label class="custom-control-label" for="cod">Cash on Delivery ( COD )</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="credit_card" name="payment_method" value="credit_card"
                        class="custom-control-input">
                    <label class="custom-control-label" for="credit_card">Credit card</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="paypal" name="payment_method" value="paypal" class="custom-control-input">
                    <label class="custom-control-label" for="paypal">PayPal</label>
                </div>

                <div class="spacer"></div>

                <div class="card mt-3 d-none payment_method" id="credit_card_input">
                    <div class="card-body">
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
                    </div>
                </div>
                <div class="card mt-3 d-none payment_method" id="paypal_input">
                    <div class="card-body">
                        test
                    </div>
                </div>

                <button type="submit" id="complete-order" class="button checkout_button mt-3">Complete Order</button>

            </form>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="createAddressModal" tabindex="-1" role="dialog" aria-labelledby="createAddressModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createAddressModalLabel">Edit Address</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('address.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Enter address"
                                    value="">
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" id="city" name="city" value="">
                                </div>
                                <div class="form-group col-md-4"><label for="state">State</label>
                                    <input type="text" class="form-control" id="state" name="state" value=""></div>
                                <div class="form-group col-md-4"><label for="postcode">Postal
                                        Code</label>
                                    <input type="text" class="form-control" id="postcode" name="postcode" value=""></div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="address_lat">Latitude</label>
                                    <input type="text" class="form-control" id="address_lat" name="address_lat"
                                        placeholder="Enter address latitude" value="">
                                </div>
                                <div class="form-group col-md-6"><label for="address_lng">Longitude</label>
                                    <input type="text" class="form-control" id="address_lng" name="address_lng"
                                        placeholder="Enter address longitude" value="">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Add New</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="checkout-table-container">
            <h2>Your Order</h2>

            <div class="checkout-table">

                @foreach( Cart::content() as $item)
                <div class="checkout-table-row">
                    <div class="checkout-table-row-left">
                        @if (empty($item->model->thumbnail))
                        <img src="{{ url( 'img/products/default.png') }}" alt="item" class="checkout-table-img">
                        @else
                        <img src="{{ url( $item->model->thumbnail) }}" alt="item" class="checkout-table-img">
                        @endif
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
</div>

@endsection

@push('scripts')
<script src="/frontend/plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="/frontend/plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="/frontend/plugins/parallax-js-master/parallax.min.js"></script>
<script src="/frontend/js/shop_custom.js"></script>

<script>
    $(document).ready(function(){
        console.log($('input[type=radio][name="payment_method"]:checked').val())
        $('input[type=radio][name="payment_method"]').on('change', function() {

            $(`.payment_method`).hide()
            $(`.payment_method`).removeClass('d-none')

            $(`#${this.id}_input`).show("slow");

        });
    });

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
        let payment_method = $('input[type=radio][name="payment_method"]:checked').val();

        if(payment_method == "credit_card"){
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
        }else{
            // Submit the form
            form.submit();
        }



    });

    // Submit the form with the token ID.
    function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripe_token');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
    }
</script>
@endpush