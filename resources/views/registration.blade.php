@extends('layout')
@section('content')
    <main class="signup-form pt-5" style="overflow-x: hidden;">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card p-5">
                    <h2 class=" text-center">Đăng Kí</h2>
                    <h6 class="text-center pb-2">Đã có tài khoản, đăng nhập <a href="{{ route('login') }}"
                            style="text-decoration: none;color: chocolate">tại đây</a></h6>
                    <div class="card-body">
                        <form action="{{ route('postsignup') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Name" id="name" class="form-control" name="name"
                                    autofocus>
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Email" id="email_address" class="form-control"
                                    name="email" autofocus>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Phone" id="email_address" class="form-control"
                                    name="phone" autofocus>
                                @if ($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
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
                                    <label><input type="checkbox" name="remember"> Remember Me</label>
                                </div>
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Sign up</button>
                            </div>
                            <p class="text-center pt-4">Hoặc đăng nhập bằng</p>
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
