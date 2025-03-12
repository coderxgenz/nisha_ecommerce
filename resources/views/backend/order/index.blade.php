@extends('layouts/backend/main')
@section('main-section')


<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Orders</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Orders</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-header">
                            <a href="{{ route('backend.main_category.create') }}" class="btn btn-success waves-effect waves-light">Add New Orders</a>
                        </div>

                        <div class="card-body">

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>INVOICE NO</th>
                                        <th>ORDER TIME</th>
                                        <th>CUSTOMER NAME</th>
                                        <th>METHOD</th>
                                        <th>AMOUNT</th>
                                        <th>STATUS</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>11703</td>
                                        <td>11 Mar, 2025 1:45 PM</td>
                                        <td>Rohit Kumar</td>
                                        <td>Cash</td>
                                        <td>₹1499</td>
                                        <td><span class="badge bg-info rounded-pill">Pending</span></td>
                                        <td>
                                            <button class="btn btn-primary btn-sm">Edit</button>
                                            <button class="btn btn-danger btn-sm">View Order</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>11703</td>
                                        <td>11 Mar, 2025 1:45 PM</td>
                                        <td>Rohit Kumar</td>
                                        <td>Cash</td>
                                        <td>₹1499</td>
                                        <td><span class="badge bg-warning rounded-pill">Processing</span></td>
                                        <td>
                                            <button class="btn btn-primary btn-sm">Edit</button>
                                            <button class="btn btn-danger btn-sm">View Order</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>11703</td>
                                        <td>11 Mar, 2025 1:45 PM</td>
                                        <td>Rohit Kumar</td>
                                        <td>Cash</td>
                                        <td>₹1499</td>
                                        <td ><span class="badge bg-success rounded-pill"> Delivered </span></td>
                                        <td>
                                            <button class="btn btn-primary btn-sm">Edit</button>
                                            <button class="btn btn-danger btn-sm">View Order</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>11703</td>
                                        <td>11 Mar, 2025 1:45 PM</td>
                                        <td>Rohit Kumar</td>
                                        <td>Cash</td>
                                        <td>₹1499</td>
                                        <td><span class="badge bg-danger rounded-pill">Cancel</span></td>
                                        <td>
                                            <button class="btn btn-primary btn-sm">Edit</button>
                                            <button class="btn btn-danger btn-sm">View Order</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>




        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © Nisha Rajput Coaching.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Design & Develop by <a href="#!" class="text-decoration-underline">Anil</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>


@section('javascript-section')

@endsection
@endsection