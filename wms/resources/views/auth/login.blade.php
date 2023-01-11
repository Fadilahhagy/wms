@extends('layouts.header')

@section('content')
    <!-- Main Content -->
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="img" style="background-image: url(resources/assets/img/warehouse-vector.jpg);">
                            <img src="{{ Vite::asset('/resources/assets/img/warehouse-vector.jpg') }}" style="width:100%;">
                        </div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Sign In</h3>
                                    @error('is_active')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror

                                    @if (session('register_success'))
                                        <div class="alert alert-danger">
                                            {{ session('register_success') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="label" for="name">{{ __('Email Address') }}</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email"
                                        placeholder="Email Address" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">{{ __('Password') }}</label>
                                    <input type="password" class="form-control  @error('password') is-invalid @enderror "
                                        placeholder="Password" required name="password" autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-outline-primary rounded submit px-3">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="w-50 text-left">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">

                                                <input type="checkbox" name="agree" id="agree"
                                                    class="custom-control-input" {{ old('agree') ? 'checked' : '' }}>
                                                <label class="custom-control-label"
                                                    for="agree">{{ __('Remember Me') }}</label>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="w-50 text-md-right">
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>

                                </div>
                            </form>
                            <p class="text-center">Belum punya akun? <a href="{{ route('register') }}">Daftar</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
