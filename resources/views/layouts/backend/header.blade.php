<!doctype html>
<html lang="en">


<head>

    <meta charset="utf-8" />
    <title>Dashboard | Nisha Rajput</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{url('assets/backend/images/favicon.ico')}}">
     <!-- choices css -->
     <link href="{{url('assets/backend/libs/choices.js/public/assets/styles/choices.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- plugin css -->
    <link href="{{url('assets/backend/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" />

    <!-- preloader css -->
    <link rel="stylesheet" href="{{url('assets/backend/css/preloader.min.css')}}" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{url('assets/backend/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{url('assets/backend/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
  <!-- dropzone css -->
    <link href="{{url('assets/backend/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Sweet Alert-->
    <link href="{{url('assets/backend/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{url('assets/backend/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body>


    <!-- Begin page -->
    <div id="layout-wrapper">


        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="index.html" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{url('assets/backend/images/logo-sm.svg')}}" alt="" height="24">
                            </span>
                            <span class="logo-lg">
                                <img src="{{url('assets/backend/images/logo-sm.svg')}}" alt="" height="24"> <span class="logo-txt">Nisha Rajput</span>
                            </span>
                        </a>

                        <a href="index.html" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{url('assets/backend/images/logo-sm.svg')}}" alt="" height="24">
                            </span>
                            <span class="logo-lg">
                                <img src="{{url('assets/backend/images/logo-sm.svg')}}" alt="" height="24"> <span class="logo-txt">Nisha Rajput</span>
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>

                    <!-- App Search-->
                    <form class="app-search d-none d-lg-block">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Search...">
                            <button class="btn btn-primary" type="button"><i class="bx bx-search-alt align-middle"></i></button>
                        </div>
                    </form>
                </div>

                <div class="d-flex">

                    <div class="dropdown d-inline-block d-lg-none ms-2">
                        <button type="button" class="btn header-item" id="page-header-search-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i data-feather="search" class="icon-lg"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                            aria-labelledby="page-header-search-dropdown">

                            <form class="p-3">
                                <div class="form-group m-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search ..." aria-label="Search Result">

                                        <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>



                    <div class="dropdown d-none d-sm-inline-block">
                        <button type="button" class="btn header-item" id="mode-setting-btn">
                            <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
                            <i data-feather="sun" class="icon-lg layout-mode-light"></i>
                        </button>
                    </div>



                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon position-relative" id="page-header-notifications-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i data-feather="bell" class="icon-lg"></i>
                            <span class="badge bg-danger rounded-pill">5</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                            aria-labelledby="page-header-notifications-dropdown">
                            <div class="p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-0"> Notifications </h6>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#!" class="small text-reset text-decoration-underline"> Unread (3)</a>
                                    </div>
                                </div>
                            </div>
                            <div data-simplebar style="max-height: 230px;">
                                <a href="#!" class="text-reset notification-item">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <img src="{{url('assets/backend/images/users/avatar-3.jpg')}}" class="rounded-circle avatar-sm" alt="user-pic">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">James Lemire</h6>
                                            <div class="font-size-13 text-muted">
                                                <p class="mb-1">It will seem like simplified English.</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>1 hour ago</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="#!" class="text-reset notification-item">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-sm me-3">
                                            <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                <i class="bx bx-cart"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">Your order is placed</h6>
                                            <div class="font-size-13 text-muted">
                                                <p class="mb-1">If several languages coalesce the grammar</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>3 min ago</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="#!" class="text-reset notification-item">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-sm me-3">
                                            <span class="avatar-title bg-success rounded-circle font-size-16">
                                                <i class="bx bx-badge-check"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">Your item is shipped</h6>
                                            <div class="font-size-13 text-muted">
                                                <p class="mb-1">If several languages coalesce the grammar</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>3 min ago</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a href="#!" class="text-reset notification-item">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <img src="{{url('assets/backend/images/users/avatar-6.jpg')}}" class="rounded-circle avatar-sm" alt="user-pic">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">Salena Layfield</h6>
                                            <div class="font-size-13 text-muted">
                                                <p class="mb-1">As a skeptical Cambridge friend of mine occidental.</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>1 hour ago</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2 border-top d-grid">
                                <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                    <i class="mdi mdi-arrow-right-circle me-1"></i> <span>View More..</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item right-bar-toggle me-2">
                            <i data-feather="settings" class="icon-lg"></i>
                        </button>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item bg-light-subtle border-start border-end" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="{{url('assets/backend/images/users/avatar-1.jpg')}}"
                                alt="Header Avatar">
                            <span class="d-none d-xl-inline-block ms-1 fw-medium">Shawn L.</span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a class="dropdown-item" href="apps-contacts-profile.html"><i class="mdi mdi mdi-face-man font-size-16 align-middle me-1"></i> Profile</a>
                            <a class="dropdown-item" href="auth-lock-screen.html"><i class="mdi mdi-lock font-size-16 align-middle me-1"></i> Lock Screen</a>
                            <div class="dropdown-divider"></div>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                            <a class="dropdown-item"  href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();"><i class="mdi mdi-logout font-size-16 align-middle me-1"></i> Log Out</a>
                        </form> 
                        </div>
                    </div>

                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
    <li class="menu-title" data-key="t-menu">Menu</li>

    <!-- Dashboard -->
    <li>
        <a href="{{ route('backend.admin.dashboard') }}">
            <i data-feather="home"></i>
            <span data-key="t-dashboard">Dashboard</span>
        </a>
    </li>

    <!-- Category -->
    <li>
        <a href="javascript: void(0);" class="has-arrow">
            <i data-feather="grid"></i>
            <span data-key="t-apps">Category</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{ route('backend.main_category.index') }}">Main Category</a></li>
            <li><a href="{{ route('backend.sub_category.index') }}">Sub Category</a></li>
        </ul>
    </li>

    <!-- Product -->
    <li>
        <a href="javascript: void(0);" class="has-arrow">
            <i data-feather="shopping-bag"></i>
            <span data-key="t-apps">Product</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="product-list.php">Product List</a></li>
            <li><a href="add-product.html">Add Product</a></li>
        </ul>
    </li>

    <!-- Customers -->
    <li>
        <a href="javascript: void(0);" class="has-arrow">
            <i data-feather="users"></i>
            <span data-key="t-apps">Customers</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="customer-list.php">Customers List</a></li>
            <li><a href="customer-details.html">Customers Details</a></li>
        </ul>
    </li>

    <!-- Orders -->
    <li>
        <a href="javascript: void(0);" class="has-arrow">
            <i data-feather="shopping-cart"></i>
            <span data-key="t-apps">Orders</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="orders-list.php">Orders List</a></li>
            <li><a href="order-details.html">Order Details</a></li>
        </ul>
    </li>

    <!-- Refund & Returns -->
    <li>
        <a href="refund-returns.html">
            <i data-feather="rotate-ccw"></i>
            <span>Refund & Returns</span>
        </a>
    </li>

    <!-- Coupons -->
    <li>
        <a href="javascript: void(0);" class="has-arrow">
            <i data-feather="tag"></i>
            <span>Coupons</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="coupon-list.php">Coupon List</a></li>
            <li><a href="add-coupon.html">Create Coupon</a></li>
        </ul>
    </li>

  

    <!-- Website Management -->
    <li>
        <a href="javascript: void(0);" class="has-arrow">
            <i data-feather="settings"></i>
            <span>Website Management</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="general-settings.html">General Settings</a></li>
            <li><a href="seo-settings.html">SEO Settings</a></li>
            <li><a href="social-links.html">Social Media Links</a></li>
            <li><a href="payment-settings.html">Payment Gateway</a></li>
        </ul>
    </li>

    <!-- CMS -->
    <li>
        <a href="javascript: void(0);" class="has-arrow">
            <i data-feather="file-text"></i>
            <span>CMS</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="banners.html">Banners Management</a></li>
            <li><a href="pages.html">Pages Management</a></li>
            <li><a href="blogs.html">Blog Management</a></li>
            <li><a href="media-library.html">Media Library</a></li>
        </ul>
    </li>

    <!-- Enquiry -->
    <li>
        <a href="enquiry.html">
            <i data-feather="mail"></i>
            <span>Enquiry</span>
        </a>
    </li>

    <!-- Reviews & Ratings -->
    <li>
        <a href="reviews.php">
            <i data-feather="star"></i>
            <span>Reviews & Ratings</span>
        </a>
    </li>
</ul>



                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->