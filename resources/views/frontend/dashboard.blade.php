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
                                <span>{{ $total_product_in_cart }}</span>
                                <p>
                                    Total Products in Your Cart
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-4">
                            <div class="dashboard_card">
                                <span>{{ $total_order }}</span>
                                <p>
                                    Total Orders
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="page-content my-account__orders-list">
                          @if(count($orders) > 0)
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
                @foreach($orders as $order) 
                <tr>
                  <td>#{{ $order->order_number }}</td>
                  <td>{{ Carbon\Carbon::parse($order->order_date)->format('d M, Y') }}</td>
                  <td>{{ strtoupper($order->delivery_status) }}</td>
                  <td>Rs. {{ $order->total_amount }} for {{ count($order->getOrderProducts) ?? 0 }} items</td>
                  <td><a href="{{ route('frontend.view_single_order', [Crypt::encrypt($order->id)]) }}" class="btn btn-primary">VIEW</a></td>
                </tr>
                @endforeach
                 
                  
              </tbody>
            </table>
            @else
            <div class="alert alert-info">
                <strong>Info!</strong> No orders found.
                </div>
                @endif
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