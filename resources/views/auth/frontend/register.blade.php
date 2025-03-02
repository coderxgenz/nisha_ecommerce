@extends('layouts/frontend/main')
@section('main-section')

<main>
    <div class="mb-3 pb-3 mb-md-4 pb-md-4 mb-xl-5 pb-xl-5"></div>
    <section class="login-register container">
        <h2 class="mb-4">Register</h2>
        <div class="register-form">
            <form name="register-form" class="needs-validation" novalidate>
                <div class="form-floating mb-3">
                    <input name="register_username" type="text" class="form-control form-control_gray" id="customerNameRegisterInput" placeholder="Username" required>
                    <label for="customerNameRegisterInput">Username</label>
                </div>

                <div class="pb-3"></div>

                <div class="form-floating mb-3">
                    <input name="register_email" type="email" class="form-control form-control_gray" id="customerEmailRegisterInput" placeholder="Email address *" required>
                    <label for="customerEmailRegisterInput">Email address *</label>
                </div>

                <div class="pb-3"></div>

                <div class="form-floating mb-3">
                    <input name="register_password" type="password" class="form-control form-control_gray" id="customerPasswodRegisterInput" placeholder="Password *" required>
                    <label for="customerPasswodRegisterInput">Password *</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="register_password" type="password" class="form-control form-control_gray" id="customerConfirmPasswodRegisterInput" placeholder="Confirm Password *" required>
                    <label for="customerPasswodRegisterInput">Confirm Password *</label>
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