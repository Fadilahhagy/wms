@extends('layouts.header')

@section('content')
<!-- Main Content -->
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="wrap d-md-flex">
                    <div class="img" style="background-image: url(resources/assets/img/warehouse-vector.jpg);">
                        <img src="{{ Vite::asset('resources/assets/img/warehouse-vector.jpg') }}" style="width:100%;">
                    </div>
                    <div class="login-wrap p-4 p-md-5">
                    <div class="d-flex">
                        <div class="w-100">
                            <h3 class="mb-4">Sign In</h3>
                        </div>
                    </div>
                    <form action="" method="" class="signin-form">
                        <div class="form-group mb-3">
                            <label class="label" for="name">Username</label>
                            <input type="text" class="form-control" placeholder="Username" required autofocus>
                        </div>
                        <div class="form-group mb-3">
                            <label class="label" for="password">Password</label>
                        <input type="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-outline-primary rounded submit px-3">Masuk</button>
                        </div>
                        <div class="form-group d-md-flex">
                            <div class="w-50 text-left">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                      <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                                      <label class="custom-control-label" for="agree">Ingat saya</label>
                                    </div>
                                  </div>
                            </div>
                                <div class="w-50 text-md-right">
                                    <a href="{{ url('forgot_password') }}">Lupa Password?</a>
                            </div>
                        </div>
                    </form>
                    <p class="text-center">Belum punya akun? <a href="{{ url('register') }}">Daftar</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection