@extends('layouts/backend/main')
@section('main-section')

<div class="main-content">

        <div class="page-content">
                <div class="container-fluid">
                        <div class="row">
                                <div class="col-lg-12">
                                        <div class="card">
                                                <div class="card-header">
                                                        <h4 class="card-title">PristineJS Validation</h4>
                                                        <p class="card-title-desc">PristineJS Vanilla javascript form validation library</p>
                                                </div>
                                                <!-- end card header -->

                                                <div class="card-body">
                                                        <div>
                                                                <h5 class="card-title mb-4">Validation Examples</h5>
                                                                <form id="pristine-valid-example" novalidate method="post">
                                                                        <input type="hidden" />
                                                                        <div class="row">
                                                                                <div class="col-xl-4 col-md-6">
                                                                                        <div class="form-group mb-3">
                                                                                                <label>Username</label>
                                                                                                <input type="text" required data-pristine-required-message="Please Enter a username" class="form-control" placeholder="First name" />
                                                                                        </div>
                                                                                </div>
                                                                                <div class="col-xl-4 col-md-6">
                                                                                        <div class="form-group mb-3">
                                                                                                <label>Email</label>
                                                                                                <input type="email" required data-pristine-required-message="Please Enter a Email" class="form-control" placeholder="Enter your Email" />
                                                                                        </div>
                                                                                </div>
                                                                                <div class="col-xl-4 col-md-6">
                                                                                        <div class="form-group mb-3">
                                                                                                <label>Your age (required, min. 14)</label>
                                                                                                <input type="number" min="14" data-pristine-min-message="You must be at least 14-years-old" required class="form-control" value="10" placeholder="Enter your age" />
                                                                                        </div>
                                                                                </div>
                                                                                <div class="col-xl-4 col-md-6">
                                                                                        <div class="form-group mb-3">
                                                                                                <label>Password (required)</label>
                                                                                                <input type="password" id="pwd" required data-pristine-required-message="Please Enter a password" data-pristine-pattern="/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,}$/" data-pristine-pattern-message="Minimum 8 characters, at least one uppercase letter, one lowercase letter and one number" class="form-control" placeholder="Enter your password" />
                                                                                        </div>
                                                                                </div>
                                                                                <div class="col-xl-4 col-md-6">
                                                                                        <div class="form-group mb-3">
                                                                                                <label>Retype password</label>
                                                                                                <input type="password" data-pristine-equals="#pwd" data-pristine-equals-message="Passwords don't match" class="form-control" placeholder="Re-Enter your password" />
                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                                        <!-- end row -->

                                                                        <div class="form-group mb-3 form-check">
                                                                                <input id="term-check01" type="checkbox" class="form-check-input" name="future" required data-pristine-required-message="You must accept the terms and conditions" />
                                                                                <label class="form-check-label" for="term-check01">I accept the terms and conditions</label><br />
                                                                        </div>
                                                                        <div class="form-group">
                                                                                <button type="submit" class="btn btn-primary">Submit form</button>
                                                                        </div>
                                                                </form>
                                                        </div>

                                                </div>
                                        </div>
                                        <!-- end card -->
                                </div>
                                <!-- end col -->
                        </div>
                </div>
        </div>

</div>





@section('javascript-section')
@endsection
@endsection