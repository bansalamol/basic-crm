@extends('layouts/blankLayout')

@section('title', 'Register Basic - Pages')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection


@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">

      <!-- Register Card -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <a href="{{url('/')}}" class="app-brand-link gap-2">
              <img class="app-brand-logo demo w-px-40 h-auto rounded-circle" src="{{ asset('assets/img/logo.jpeg') }}" />
              <span class="app-brand-text demo text-body fw-bolder">{{config('variables.templateName')}}</span>
            </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-2">Create an account</h4>
          <p class="mb-4"></p>

          <form id="formAuthentication" class="mb-3" action="{{ route('register-perform') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            @if(isset ($errors) && count($errors) > 0)
                <div class="alert alert-warning" role="alert">
                    <ul class="list-unstyled mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              @if ($errors->has('name'))
                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
              @endif
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" value="{{ old('name') }}"  required="required" autofocus>
            </div>
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              @if ($errors->has('name'))
                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
              @endif
              <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" value="{{ old('username') }}"  required="required">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
              @endif
              <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}"  required="required">
            </div>
            <div class="mb-3 form-password-toggle">
              <label class="form-label" for="password">Password</label>
              @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
              @endif
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password"  required="required"/>
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>
            <div class="mb-3 form-password-toggle">
              <label class="form-label" for="confirmPassword">Confirm Password</label>
              @if ($errors->has('password_confirmation'))
                <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
              @endif
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password" required="required" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>

            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms">
                <label class="form-check-label" for="terms-conditions">
                  I agree to
                  <a href="javascript:void(0);">privacy policy & terms</a>
                </label>
              </div>
            </div>
            <button class="btn btn-primary d-grid w-100">
              Sign up
            </button>
          </form>

          <p class="text-center">
            <span>Already have an account?</span>
            <a href="{{ route('login-show') }}">
              <span>Sign in instead</span>
            </a>
          </p>
        </div>
      </div>
    </div>
    <!-- Register Card -->
  </div>
</div>
</div>
@endsection
