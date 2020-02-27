<!DOCTYPE html>
<html lang="en">

<head>
    <title>ListaShop</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" type="text/css" href="/frontend/styles/bootstrap4/bootstrap.min.css">
    <link href="/frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
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


    @yield('scripts')

</body>

</html>
