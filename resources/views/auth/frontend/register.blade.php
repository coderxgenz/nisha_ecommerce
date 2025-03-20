@extends('layouts/frontend/main')
@section('main-section')

<main>
    <div class="mb-3 pb-3 mb-md-4 pb-md-4 mb-xl-5 pb-xl-5"></div>
    <section class="login-register container">
        <h2 class="mb-4">Register</h2>
        <div class="register-form">
            <form name="register-form" action="{{ route('frontend.register_submit') }}" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <input name="name" type="text" class="form-control form-control_gray" id="name" placeholder="Full Name" value="{{ old('name') }}">
                    <label for="name">Full Name</label>
                    @error('name')
                    <div style="color:red;"><b>{{ $message }}</b></div>
                    @enderror
                </div>

                <div class="pb-3"></div>

                <div class="form-floating mb-3">
                    <input name="email" type="email" class="form-control form-control_gray" id="email" placeholder="Email address *" value="{{ old('email') }}">
                    <label for="email">Email address *</label>
                    @error('email')
                    <div style="color:red;"><b>{{ $message }}</b></div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input name="phone" type="number" class="form-control form-control_gray" id="email" placeholder="Phone Number *" value="{{ old('phone') }}">
                    <label for="phone">Phone Number *</label>
                    @error('phone')
                    <div style="color:red;"><b>{{ $message }}</b></div>
                    @enderror
                </div>

                <div class="pb-3"></div>

                <div class="form-floating mb-3">
                    <input name="password" type="password" class="form-control form-control_gray" id="password" placeholder="Password *" >
                    <label for="customerPasswodRegisterInput">Password *</label>
                    @error('password')
                    <div style="color:red;"><b>{{ $message }}</b></div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input name="password_confirmation" type="password" class="form-control form-control_gray" id="password_confirmation" placeholder="Confirm Password *" >
                    <label for="password_confirmation">Confirm Password *</label>
                    @error('password_confirmation')
                    <div style="color:red;"><b>{{ $message }}</b></div>
                    @enderror
                </div>

                <div class="d-flex align-items-center mb-3 pb-2">
                    <p class="m-0">Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy.</p>
                </div>

                <button class="btn btn-primary w-100 text-uppercase" type="submit">Register</button>
            </form>
        </div>
    </section>
    <div class="mb-3 pb-3 mb-md-4 pb-md-4 mb-xl-5 pb-xl-5"></div>
</main>


@section('javascript-section')
@endsection
@endsection