@extends('layouts/backend/main')
@section('main-section')



<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Page Title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Customer Details</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('backend.admin.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('backend.customer.index') }}">Customers</a></li>
                                <li class="breadcrumb-item active">Customer Details</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Page Title -->


            <div class="row">
                <!-- Customer Profile Card -->
                <div class="col-lg-3">
                    <div class="card custom-card">
                        <div class="card-body text-center">
                            <img src="{{url('assets/frontend/images/products/1.jpg')}}" alt="Customer Image" class="avatar-lg rounded-circle shadow">
                            <h5 class="mt-3">{{ $customer->name ?? '' }}</h5>
                            <p class="text-muted">{{ $customer->email ?? '' }}</p>
                            @if($customer->phone != '')
                            <p><i class="fas fa-phone"></i> +91 {{ $customer->phone ?? '' }} </p> 
                            @endif
                            <button class="btn btn-dark mt-2">Edit Profile</button>
                        </div>
                    </div>
                </div>

                <!-- Order History Section -->
                <div class="col-lg-9">
                    <div class="row mb-4">
                        <div class="col-lg-4 col-12 mb-4">
                            <div class="dashboard_card">
                                <div class="text-start">
                                    <span>05</span>
                                    <p>Total Orders</p>
                                </div>
                                <div>
                                    <i class="fas fa-shopping-cart"></i>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-4 col-12 mb-4">
                            <div class="dashboard_card">
                                <div class="text-start">
                                    <span>05</span>
                                    <p>Total Products in Your Cart</p>
                                </div>
                                <div>
                                    <i class="fas fa-box"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12 mb-4">
                            <div class="dashboard_card">
                                <div class="text-start">
                                    <span>₹5000</span>
                                    <p>Total Expense</p>
                                </div>

                                <div>
                                    <i class="fas fa-wallet"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card custom-card">
                        <div class="card-header bg-dark">
                            <h5 class="mb-0 text-white">Transaction History</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle text-center">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Order ID</th>
                                            <th>Product</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>#12345</td>
                                            <td>Gold Necklace</td>
                                            <td>$500</td>
                                            <td><span class="badge bg-success">Completed</span></td>
                                            <td>2025-02-26</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>#12346</td>
                                            <td>Diamond Ring</td>
                                            <td>$1,200</td>
                                            <td><span class="badge bg-warning text-dark">Pending</span></td>
                                            <td>2025-03-01</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


</div>

<style>
    .avatar-lg {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border: 4px solid #fff;
    }

    .dashboard_card {
        background-color: #000;
        padding: 26px;
        border-radius: 12px;
        text-align: center;
        box-shadow: 0px 4px 10px rgba(255, 255, 255, 0.1);
        display: flex;
        justify-content: space-around;
        box-shadow: 0px 4px 10px rgba(255, 255, 255, 0.1);
        align-items: center;
    }

    .dashboard_card i {
        font-size: 40px;
        color: #b9a16b;
        margin-bottom: 10px;
    }

    .dashboard_card span {
        font-size: 42px;
        font-weight: 600;
        color: #b9a16b;
        display: block;
    }

    .dashboard_card p {
        font-size: 18px;
        color: #fff;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .dashboard_card i {
            font-size: 32px;
        }

        .dashboard_card span {
            font-size: 36px;
        }

        .dashboard_card p {
            font-size: 16px;
        }
    }
</style>
@section('javascript-section')

@endsection
@endsection