@extends('layouts/backend/main')
@section('main-section')



<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Page Title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h2 class="mb-sm-0 font-size-24">Invoice Details</h2>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="orders.html">Orders</a></li>
                                <li class="breadcrumb-item active">Invoice</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Page Title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow-lg border-0">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title mb-0">Invoice #11703</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Billing Details</h4>
                                    <p class="mb-sm-1 font-size-14"><strong>Customer Name:</strong> Rohit Kumar</p>
                                    <p class="mb-sm-1 font-size-14" ><strong>Phone:</strong> +91 9876543210</p>
                                    <p class="mb-sm-1 font-size-14" ><strong>Email:</strong> rohit.kumar@example.com</p>
                                    <p class="mb-sm-1 font-size-14" ><strong>Shipping Address:</strong> 123, Delhi, India</p>
                                </div>
                                <div class="col-md-6 text-end">
                                    <h4>Order Details</h4>
                                    <p class="mb-sm-1 font-size-14" ><strong>Invoice No:</strong> 11703</p>
                                    <p class="mb-sm-1 font-size-14" ><strong>Order Time:</strong> 11 Mar, 2025 1:45 PM</p>
                                    <p class="mb-sm-1 font-size-14" ><strong>Payment Method:</strong> Cash</p>
                                    <p class="mb-sm-1 font-size-14" ><strong>Status:</strong> <span class="badge bg-info">Pending</span></p>
                                    <p class="mb-sm-1 font-size-14" ><strong>Tracking ID:</strong> #TRK123456</p>
                                    <p class="mb-sm-1 font-size-14" ><strong>Estimated Delivery:</strong> 15 Mar, 2025</p>
                                </div>
                            </div>
                            
                            <h6 class="mt-4">Products</h6>
                            <table class="table table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>GST (18%)</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Gold Necklace</td>
                                        <td>1</td>
                                        <td>₹1499</td>
                                        <td>₹269.82</td>
                                        <td>₹1768.82</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Silver Earrings</td>
                                        <td>2</td>
                                        <td>₹499</td>
                                        <td>₹89.82</td>
                                        <td>₹1187.82</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5" class="text-end">Subtotal:</th>
                                        <th>₹2956.64</th>
                                    </tr>
                                    <tr>
                                        <th colspan="5" class="text-end">GST Total (18%):</th>
                                        <th>₹359.64</th>
                                    </tr>
                                    <tr>
                                        <th colspan="5" class="text-end">Grand Total:</th>
                                        <th>₹3316.28</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-primary"><i class="fas fa-download"></i> Download Invoice</button>
                            <button class="btn btn-success"><i class="fas fa-print"></i> Print Invoice</button>
                            <button class="btn btn-warning"><i class="fas fa-envelope"></i> Mail Invoice</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


@section('javascript-section')

@endsection
@endsection