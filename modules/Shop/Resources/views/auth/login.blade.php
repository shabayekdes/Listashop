@extends('shop::layouts.master')

@section('head')
<link rel="stylesheet" type="text/css" href="/frontend/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="/frontend/styles/shop_styles.css">
<link rel="stylesheet" type="text/css" href="/frontend/styles/shop_responsive.css">

@endsection

@section('container')

<!-- Home -->

<div class="home">
    <div class="home_background parallax-window" data-parallax="scroll"
        data-image-src="/frontend/images/shop_background.jpg"></div>
    <div class="home_overlay"></div>
    <div class="home_content d-flex flex-column align-items-center justify-content-center">
        <h2 class="home_title">{{ __('Login') }}</h2>
    </div>
</div>
<!-- Shop -->

<div class="shop">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">
                        <form method="POST" action="{{ route('customer.login') }}" aria-label="{{ __('Login') }}">
                            @csrf
                            <div class="input-group mb-3">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>

                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif

                            </div>
                            <div class="input-group mb-3">
                                <input id="password" type="password"
                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                    placeholder="Password" required>

                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif

                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <div class="icheck-primary">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>

                        {{-- <div class="social-auth-links text-center mb-3">
                            <p>- OR -</p>
                            <a href="#" class="btn btn-block btn-primary">
                                <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                            </a>
                            <a href="#" class="btn btn-block btn-danger">
                                <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                            </a>
                        </div> --}}
                        <!-- /.social-auth-links -->

                        <p class="mb-1">
                            {{-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a> --}}
                        </p>
                        <p class="mb-0">
                            {{-- <a href="{{ route('register') }}" class="text-center">Register a new membership</a> --}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
