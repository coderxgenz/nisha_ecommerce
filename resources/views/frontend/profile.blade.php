@extends('layouts/frontend/main')
@section('main-section')

<main>
    <div class="mb-4 pb-4"></div>
    <section class="my-account container">
        <h2 class="page-title">My Profile</h2>
        <div class="row">
            <div class="col-lg-3">
                @include('frontend/dashboard_sidebar')
            </div>
            <div class="col-lg-9">
                <div class="page-content my-account__profile">
                  <div class="row">
                    <div class="col-lg-4">
                    <div class="profile-card text-center shadow-lg p-4 rounded-lg">
                        <div class="profile-image-wrapper">
                            <img src="{{url('assets/frontend/images/shop/1.jpg')}}" alt="User Profile" class="profile-img">
                            <div class="edit-icon">
                                <i class="fas fa-camera"></i>
                            </div>
                        </div>
                        <h3 class="mt-3" style="font-weight: 600; color: var(--bs-beige);">Nisha Rajput</h3>
                        <p style="font-size: 14px; color: #faf9f8;">Nisharajput@gmail.com</p>
                        <div class="profile-stats d-flex justify-content-center mt-3">
                            <div class="mx-3 text-center">
                                <h5 style="margin-bottom: 0; font-weight: bold; color: #faf9f8;">15</h5>
                                <p style="font-size: 12px; color: #faf9f8;">Orders</p>
                            </div>
                            <div class="mx-3 text-center">
                                <h5 style="margin-bottom: 0; font-weight: bold; color: #faf9f8;">08</h5>
                                <p style="font-size: 12px; color: #faf9f8;">Wishlist</p>
                            </div>
                            <div class="mx-3 text-center">
                                <h5 style="margin-bottom: 0; font-weight: bold; color: #faf9f8;">05</h5>
                                <p style="font-size: 12px; color: #faf9f8;">Cart</p>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-8">
                    <form action="#" method="POST" class="profile-form">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="name">Full Name</label>
                                <input type="text" id="name" name="name" value="John Doe" class="form-control">
                            </div>
                            <div class="col-lg-6">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" value="johndoe@example.com" class="form-control">
                            </div>
                            <div class="col-lg-6">
                                <label for="phone">Phone</label>
                                <input type="text" id="phone" name="phone" value="+123 456 7890" class="form-control">
                            </div>
                            <div class="col-lg-6">
                                <label for="username">Username</label>
                                <input type="text" id="username" name="username" value="johndoe" class="form-control">
                            </div>
                            <div class="col-lg-12">
                                <label for="address">Address</label>
                                <textarea id="address" name="address" class="form-control">123 Main Street, New York, NY, 10001, USA</textarea>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </div>
                    </form>
                    </div>
                  </div>
                    
                    
                </div>
            </div>
        </div>
    </section>
    <div class="mb-5 pb-xl-5"></div>
</main>



@section('javascript-section')
@endsection
@endsection