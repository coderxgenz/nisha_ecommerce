@extends('layouts/frontend/main')
@section('main-section')

<main>
    <div class="mb-4 pb-4"></div>
    <section class="my-account container">
        <h2 class="page-title">My Account</h2>
        <div class="row">
            <div class="col-lg-3">
                @include('frontend/dashboard_sidebar')
            </div>
            <div class="col-lg-9">
                <div class="page-content my-account__dashboard">
                    <!-- <h2 class="mb-4">Account Details</h2> -->
                    <div class="row">
                        <div class="col-lg-4 col-4">
                            <div class="dashboard_card">
                                <span>05</span>
                                <p>
                                    Total Products in Your Wishlist
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-4">
                            <div class="dashboard_card">
                                <span>05</span>
                                <p>
                                    Total Products in Your Cart
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-4">
                            <div class="dashboard_card">
                                <span>05</span>
                                <p>
                                    Total Products in Your Order List
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="page-content my-account__orders-list">
            <table class="orders-table">
              <thead>
                <tr>
                  <th>Order</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Total</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>#2416</td>
                  <td>October 1, 2023</td>
                  <td>On hold</td>
                  <td>$1,200.65 for 3 items</td>
                  <td><a href="{{ route('frontend.view_single_order') }}" class="btn btn-primary">VIEW</a></td>

                </tr>
                <tr>
                  <td>#2417</td>
                  <td>October 2, 2023</td>
                  <td>On hold</td>
                  <td>$1,200.65 for 3 items</td>
                  <td><a href="{{ route('frontend.view_single_order') }}" class="btn btn-primary">VIEW</a></td>

                </tr>
                <tr>
                  <td>#2418</td>
                  <td>October 3, 2023</td>
                  <td>On hold</td>
                  <td>$1,200.65 for 3 items</td>
                  <td><a href="{{ route('frontend.view_single_order') }}" class="btn btn-primary">VIEW</a></td>

                </tr>
                <tr>
                  <td>#2419</td>
                  <td>October 4, 2023</td>
                  <td>On hold</td>
                  <td>$1,200.65 for 3 items</td>
                  <td><a href="{{ route('frontend.view_single_order') }}" class="btn btn-primary">VIEW</a></td>

                </tr>
              </tbody>
            </table>
          </div>
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