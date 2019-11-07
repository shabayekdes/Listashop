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
                <h4>welcome, {{ auth()->user()->name }}</h4>
                <div class="card">
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
