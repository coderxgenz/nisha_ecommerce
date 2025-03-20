@extends('layouts/frontend/main')
@section('main-section')

<main>
<div class="mb-3 pb-3 mb-md-4 pb-md-4 mb-xl-5 pb-xl-5"></div>
    <section class="login-register container">
    <h2 class="mb-4">Login</h2>
          <div class="login-form">
            <form name="login-form" action="{{ route('frontend.login_submit') }}" method="POST">
              @csrf
              <div class="form-floating mb-3">
                <input name="email" type="email" class="form-control form-control_gray" id="email" placeholder="Email address *">
                <label for="email">Email address *</label>
                @error('email')
                <div style="color:red;"><b>{{ $message }}</b></div>
                @enderror
              </div>
    
              <div class="pb-3"></div>
    
              <div class="form-floating mb-3">
                <input name="password" type="password" class="form-control form-control_gray" id="password" placeholder="Password *">
                <label for="password">Password *</label>
                @error('password')
                <div style="color:red;"><b>{{ $message }}</b></div>
                @enderror
              </div>
    
              <div class="d-flex align-items-center mb-3 pb-2">
                <div class="form-check mb-0">
                  <input name="remember" class="form-check-input form-check-input_fill" type="checkbox" value="" id="flexCheckDefault1">
                  <label class="form-check-label text-secondary" for="flexCheckDefault1">Remember me</label>
                </div>
                <a href="reset_password.html" class="btn-text ms-auto">Lost password?</a>
              </div>
    
              <button class="btn btn-primary w-100 text-uppercase" type="submit">Log In</button>
    
              <div class="customer-option mt-4 text-center">
                <span class="text-secondary">No account yet?</span>
                <a href="#register-tab" class="btn-text js-show-register">Create Account</a>
              </div>
            </form>
          </div>
    </section>
    <div class="mb-3 pb-3 mb-md-4 pb-md-4 mb-xl-5 pb-xl-5"></div>
  </main>


  @section('javascript-section')
@endsection
@endsection