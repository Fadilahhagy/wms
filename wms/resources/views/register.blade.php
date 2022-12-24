@extends('layouts.header')

@section('content')
<!-- Main Content -->
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="wrap d-md-flex">
                    <div class="img" style="background-image: url(resources/assets/img/warehouse-vector2.jpg);">
                        <img src="{{ Vite::asset('resources/assets/img/warehouse-vector2.jpg') }}" style="width:100%;">
                    </div>
                    <div class="login-wrap p-4 p-md-5">
                    <div class="d-flex">
                        <div class="w-100">
                            <h3 class="mb-4">Daftar</h3>
                        </div>
                    </div>
                    <form action="" method="" class="signin-form">
                        <div class="form-group mb-3">
                            <label class="label" for="name">E-mail</label>
                            <input type="text" name="" class="form-control" placeholder="E-mail" required autofocus>
                        </div>
                        <div class="form-group mb-3">
                            <label class="label" for="name">Username</label>
                            <input type="text" name="" class="form-control" placeholder="Username" required>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                              <label for="frist_name">Password</label>
                              <input id="frist_name" type="text" name="" class="form-control">
                            </div>
                            <div class="form-group col-6">
                              <label for="last_name">Confirm Password</label>
                              <input id="last_name" name="" type="text" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                              <label class="custom-control-label" for="agree">Saya setuju dengan syarat dan ketentuan</label>
                            </div>
                          </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-outline-primary rounded submit px-3">Daftar</button>
                        </div>
                    </form>
                    <p class="text-center">Sudah punya akun? <a href="{{ url('login') }}">Masuk</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection