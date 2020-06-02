<!DOCTYPE html>
<html lang="en">

<head>
    <title>ListaShop</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/shop/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/shop/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/shop/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="/frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="/frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="/frontend/plugins/OwlCarousel2-2.2.1/animate.css">

    @yield('head')

</head>

<body>

    <div class="super_container">

        <!-- Header -->
        @include('shop::layouts.header.index')

        <!-- Container -->
        @yield('container')

        <!-- Footer -->
        @include('shop::layouts.footer.index')

    </div>

    <script src="/frontend/plugins/greensock/TweenMax.min.js"></script>
    <script src="/frontend/plugins/greensock/TimelineMax.min.js"></script>
    <script src="/frontend/plugins/scrollmagic/ScrollMagic.min.js"></script>
    <script src="/frontend/plugins/greensock/animation.gsap.min.js"></script>
    <script src="/frontend/plugins/greensock/ScrollToPlugin.min.js"></script>
    <script src="/frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="/frontend/plugins/easing/easing.js"></script>

    @stack('scripts')

</body>

</html>
