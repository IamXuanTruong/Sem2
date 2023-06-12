@extends('layout')
@section('content')
    <main class="login-form pt-5" style="overflow-x: hidden;">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card p-5">
                    <h2 class=" text-center">Đăng Nhập</h2>
                    <h6 class="text-center pb-2">Chưa có tài khoản, đăng ký <a href="{{ route('register-user') }}"
                            style="text-decoration: none;color: chocolate">tại đây</a></h6>
                    @if (\Session::has('message'))
                        <div class="alert alert-info">
                            {{ \Session::get('message') }}
                        </div>
                    @endif
                    <div class="card-body pt-5">
                        <form method="POST" action="{{ route('postlogin') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Email" id="email" class="form-control" name="email"
                                    autofocus>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" placeholder="Password" id="password" class="form-control"
                                    name="password">
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Signin</button>
                            </div>
                            <a href="">
                                <p class="pt-3">Quên mật khẩu</p>
                            </a>
                            <p class="text-center pt-2">Hoặc đăng nhập bằng</p>
                            <div class="mxh text-center" style="font-size: 40px">
                                <i class="fab fa-facebook-square p-4" style="color: blue"></i>
                                <i class="fab fa-google-plus-square p-4" style="color: red"></i>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
