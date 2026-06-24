@extends('layout')

@section('title')
Đăng nhập | Võ lâm 2 MVP
@endsection

@section('content')
<div class="main">
       <!-- Sing in  Form -->
       <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="{{ asset('fontend/images/test.png')}}" alt="sing up image"></figure>
                    <a href="#" class="signup-image-link">Tạo tài khoản</a>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">Đăng nhập</h2>
                    @if (\Session::has('message'))
                        <div class="alert alert-info">
                            {{\Session::get('message')}}
                        </div>
                    @endif
                    <form method="POST" class="register-form" id="login-form" action="{{ route('postlogin')}}">
                        @csrf
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="email" id="email" placeholder="Tài khoản"/>
                        </div>
                        @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email')}}</span>
                        @endif
                        <div class="form-group">
                            <label for="password"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="password" placeholder="Mật khẩu"/>
                        </div>
                        @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password')}}</span>
                        @endif
                        <div class="form-group">
                            <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                            <label for="remember-me" class="label-agree-term"><span><span></span></span>Ghi nhớ đăng nhập</label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Đăng nhập"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
