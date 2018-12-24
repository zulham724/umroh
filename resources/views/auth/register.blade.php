@extends('layouts.bookify')
@section('css')

@endsection
@section('content')
<div class="theme-hero-area">
  <div class="theme-hero-area-bg-wrap">
    <div class="theme-hero-area-bg" style="background-image:url(img/adult-book-business-cactus-297755_1500x800.jpg);"></div>
    <div class="theme-hero-area-mask theme-hero-area-mask-strong"></div>
  </div>
  <div class="theme-hero-area-body">
    <div class="theme-page-section _pt-100 theme-page-section-xl">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <div class="theme-login theme-login-white">
              <div class="theme-login-header">
                <h1 class="theme-login-title">Sign Up</h1>
                <p class="theme-login-subtitle">Create new Bookify account</p>
              </div>
              <div class="theme-login-box">
                <div class="theme-login-box-inner">
                  <form class="theme-login-form" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group theme-login-form-group">
                      <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Username" required autofocus>

                      @if ($errors->has('name'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('name') }}</strong>
                          </span>
                      @endif
                    </div>
                    <div class="form-group theme-login-form-group">
                      <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required>

                      @if ($errors->has('email'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                      @endif
                    </div>
                    <div class="form-group theme-login-form-group">
                      <input id="password-confirm" type="password" placeholder="Password" class="form-control" name="password_confirmation" required>
                    </div>
                    <button class="btn btn-uc btn-dark btn-block btn-lg" type="submit">Create Account</button>
                  </form>
                  {{-- <div class="theme-login-social-separator">
                    <p>or sign up with social media</p>
                  </div>
                  <div class="theme-login-social-login">
                    <div class="row" data-gutter="10">
                      <div class="col-xs-6">
                        <a class="theme-login-social-login-facebook" href="#">
                          <i class="fa fa-facebook-square"></i>
                          <span>Sign up with
                            <br/>
                            <b>Facebook</b>
                          </span>
                        </a>
                      </div>
                      <div class="col-xs-6">
                        <a class="theme-login-social-login-google" href="#">
                          <i class="fa fa-google-plus-circle"></i>
                          <span>Sign up with
                            <br/>
                            <b>Google</b>
                          </span>
                        </a>
                      </div>
                    </div>
                  </div> --}}
                </div>
                <div class="theme-login-box-alt">
                  <p>Already have an account? &nbsp;
                    <a href="{{ url('login') }}">Sign in.</a>
                  </p>
                </div>
              </div>
              <p class="theme-login-terms">By signing up you accept our
                <a href="#">terms of use</a>
                <br/>and
                <a href="#">privacy policy</a>.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')

@endsection