<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ mix('css/admin/app.css') }}" rel="stylesheet">
</head>

<body class="register-page" data-gr-c-s-loaded="true" style="min-height: 586.391px;">
    <div class="register-box" id="app">
        <div class="register-logo">
            <a href=""><b>Lista</b>Shop</a>
        </div>

        @yield('content')
    </div>
    <!-- /.register-box -->
    <script src="{{ mix('js/admin/app.js') }}"></script>

</body>

</html>
