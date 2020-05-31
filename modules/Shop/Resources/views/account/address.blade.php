@extends('shop::layouts.master')

@section('head')
<link rel="stylesheet" type="text/css" href="/frontend/styles/shop_styles.css">
<link rel="stylesheet" type="text/css" href="/frontend/styles/shop_responsive.css">
@endsection

@section('container')

<div class="home">
    <div class="home_background parallax-window" data-parallax="scroll"
        data-image-src="/frontend/images/shop_background.jpg"></div>
    <div class="home_overlay"></div>
    <div class="home_content d-flex flex-column align-items-center justify-content-center">
        <h2 class="home_title">My Addresses</h2>
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
                            @if ($addresses->count() > 0)
                            <h3>( {{ $addresses->count() }} ) address(es) registered</h3>

                            <div class="col-lg-10 offset-lg-1">
                                @foreach ($addresses as $address)
                                <div class="card mb-3 mt-2">
                                    <div class="card-body">
                                        <div class="d-flex bd-highlight">
                                            <div class="p-2 flex-grow-1 bd-highlight">
                                                <div>
                                                    {{ $address->address }}
                                                </div>
                                                <div>
                                                    {{ $address->state }}, {{ $address->city }},
                                                    {{ $address->postcode }}
                                                </div>
                                            </div>
                                            <div class="p-2 bd-highlight"><a href="#" data-toggle="modal"
                                                    data-target="#editAddressModal{{ $address->id }}"
                                                    class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                            </div>
                                            <div class="p-2 bd-highlight">
                                                <a href="{{ route('address.destroy', ['address' => $address->id]) }}" class="btn btn-danger btn-sm" onclick="event.preventDefault();
                                                                                                 document.getElementById('delete-address-form-{{$address->id}}').submit();"><i
                                                        class="fas fa-trash"></i></a>

                                                <form id="delete-address-form-{{$address->id}}" action="{{ route('address.destroy', ['address' => $address->id]) }}" method="POST"
                                                    style="display: none;">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    </div><!-- Card Body -->
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="editAddressModal{{ $address->id }}" tabindex="-1" role="dialog" aria-labelledby="editAddressModalLabel{{ $address->id }}"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editAddressModalLabel{{ $address->id }}">Edit Address</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('address.update', ['address' => $address->id ]) }}" method="POST">
                                                @method('PUT')
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="address">Address</label>
                                                        <input type="text" class="form-control" id="address" name="address"
                                                            value="{{ $address->address }}">
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label for="city">City</label>
                                                            <input type="text" class="form-control" id="city" name="city" value="{{ $address->city }}">
                                                        </div>
                                                        <div class="form-group col-md-4"><label for="state">State</label>
                                                            <input type="text" class="form-control" id="state" name="state"
                                                                value="{{ $address->state }}"></div>
                                                        <div class="form-group col-md-4"><label for="postcode">Postal
                                                                Code</label>
                                                            <input type="text" class="form-control" id="postcode" name="postcode"
                                                                value="{{ $address->postcode }}"></div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="address_lat">Latitude</label>
                                                            <input type="text" class="form-control" id="address_lat" name="address_lat"
                                                                value="{{ $address->address_lat }}">
                                                        </div>
                                                        <div class="form-group col-md-6"><label for="address_lng">Longitude</label>
                                                            <input type="text" class="form-control" id="address_lng" name="address_lng"
                                                                value="{{ $address->address_lng }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                @endforeach

                            </div>
                            <a href="#" data-toggle="modal" data-target="#createAddressModal" class="btn btn-primary btn-sm"><i
                                    class="fas fa-pencil-alt"></i> Add new address</a>

                            <!-- Modal -->
                            <div class="modal fade" id="createAddressModal" tabindex="-1" role="dialog"
                                aria-labelledby="createAddressModalLabel" aria-hidden="true">
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
                                                    <input type="text" class="form-control" id="address" name="address"
                                                        placeholder="Enter address" value="">
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label for="city">City</label>
                                                        <input type="text" class="form-control" id="city" name="city" value="">
                                                    </div>
                                                    <div class="form-group col-md-4"><label for="state">State</label>
                                                        <input type="text" class="form-control" id="state" name="state"
                                                            value=""></div>
                                                    <div class="form-group col-md-4"><label for="postcode">Postal
                                                            Code</label>
                                                        <input type="text" class="form-control" id="postcode" name="postcode"
                                                            value=""></div>
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
