@extends('layouts/frontend/main')
@section('main-section')

<main>
    <div class="mb-4 pb-4"></div>
    <section class="my-account container">
        <h2 class="page-title">My Account</h2>
        <div class="row">
            <div class="col-lg-3">
                <ul class="account-nav">
                    <li><a href="account_dashboard.html" class="menu-link menu-link_us-s menu-link_active">Dashboard</a></li>
                    <li><a href="account_orders.html" class="menu-link menu-link_us-s">Orders</a></li>
                    <li><a href="account_edit_address.html" class="menu-link menu-link_us-s">Addresses</a></li>
                    <li><a href="account_edit.html" class="menu-link menu-link_us-s">Account Details</a></li>
                    <li><a href="account_wishlist.html" class="menu-link menu-link_us-s">Wishlist</a></li>
                    <li><a href="login_register.html" class="menu-link menu-link_us-s">Logout</a></li>
                </ul>
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
                  <td><button class="btn btn-primary">VIEW</button></td>
                </tr>
                <tr>
                  <td>#2417</td>
                  <td>October 2, 2023</td>
                  <td>On hold</td>
                  <td>$1,200.65 for 3 items</td>
                  <td><button class="btn btn-primary">VIEW</button></td>
                </tr>
                <tr>
                  <td>#2418</td>
                  <td>October 3, 2023</td>
                  <td>On hold</td>
                  <td>$1,200.65 for 3 items</td>
                  <td><button class="btn btn-primary">VIEW</button></td>
                </tr>
                <tr>
                  <td>#2419</td>
                  <td>October 4, 2023</td>
                  <td>On hold</td>
                  <td>$1,200.65 for 3 items</td>
                  <td><button class="btn btn-primary">VIEW</button></td>
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