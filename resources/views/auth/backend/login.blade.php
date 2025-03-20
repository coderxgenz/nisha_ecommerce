<!doctype html>
<html lang="en">


<head>

    <meta charset="utf-8" />
    <title>Login | Nisha Rajput Coaching - Minimal Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{url('assets/backend/images/favicon.ico')}}">

    <!-- preloader css -->
    <link rel="stylesheet" href="{{url('assets/backend/css/preloader.min.css')}}" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{url('assets/backend/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{url('assets/backend/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{url('assets/backend/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    <style>
        .auth-full-page-content{
            background-color: #fff;
            min-height: auto !important;
        }
        .auth-bg {
            height: 100vh;
        }
      
    </style>

</head>

<body>

    <!-- <body data-layout="horizontal"> -->
    <div class="auth-page">
        <div class="container-fluid p-0">
            <div class="row g-0">

                <!-- end col -->
                <div class="col-xxl-12 col-lg-12 col-md-12">
                    <div class="auth-bg pt-md-5 p-4 d-flex">
                        <div class="bg-overlay bg-primary"></div>
                        <ul class="bg-bubbles">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <!-- end bubble effect -->
                        <div class="row justify-content-center align-items-center m-auto">
                            <div class="col-xl-12">
                                <div class="auth-full-page-content d-flex p-sm-5 p-4">
                                    <div class="w-100">
                                        <div class="d-flex flex-column h-100">
                                            <div class="mb-4 mb-md-5 text-center">
                                                <a href="index.html" class="d-block auth-logo">
                                                    <img src="{{url('assets/backend/images/logo-sm.svg')}}" alt="" height="28"> <span class="logo-txt">Nisha Rajput Coaching</span>
                                                </a>
                                            </div>
                                            <div class="auth-content my-auto">
                                                <div class="text-center">
                                                    <h5 class="mb-0">Welcome Back !</h5>
                                                    <p class="text-muted mt-2">Sign in to continue to Nisha Rajput Coaching.</p>
                                                </div>
                                                <form class="mt-4 pt-2" method="POST" action="{{ route('backend.admin.login_submit') }}">
                                                  @csrf
                                                    <div class="mb-3">
                                                        <label class="form-label">Email</label>
                                                        <input type="email" name="email" class="form-control" id="username" placeholder="Enter username">
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="d-flex align-items-start">
                                                            <div class="flex-grow-1">
                                                                <label class="form-label">Password</label>
                                                            </div>
                                                            <div class="flex-shrink-0">
                                                                <div class="">
                                                                    <a href="auth-recoverpw.html" class="text-muted">Forgot password?</a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="input-group auth-pass-inputgroup">
                                                            <input type="password" name="password" class="form-control" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                                                            <button class="btn btn-light shadow-none ms-0" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <div class="col">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="remember-check">
                                                                <label class="form-check-label" for="remember-check">
                                                                    Remember me
                                                                </label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="mb-3">
                                                        <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Log In</button>
                                                    </div>
                                                </form>

                                                

                                                
                                            </div>
                                            <!-- <div class="mt-4 mt-md-5 text-center">
                                                <p class="mb-0">© <script>
                                                        document.write(new Date().getFullYear())
                                                    </script> Nisha Rajput Coaching . Crafted with <i class="mdi mdi-heart text-danger"></i> by Anil</p>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container fluid -->
    </div>

 <!-- JAVASCRIPT -->
 <script src="{{url('assets/backend/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{url('assets/backend/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{url('assets/backend/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{url('assets/backend/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{url('assets/backend/libs/node-waves/waves.min.js')}}"></script>
        <script src="{{url('assets/backend/libs/feather-icons/feather.min.js')}}"></script>
        <!-- pace js -->
        <script src="{{url('assets/backend/libs/pace-js/pace.min.js')}}"></script>
        <!-- password addon init -->
        <script src="{{url('assets/backend/js/pages/pass-addon.init.js')}}"></script>

    </body>

</html>