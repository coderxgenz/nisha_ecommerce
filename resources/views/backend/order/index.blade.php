@extends('layouts/backend/main')
@section('main-section')
<style>
    .badge {
    font-size: 12px;
    padding: 5px 10px;
}
</style>

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
                                                
                        <h5 class="mb-0 fw-bold"><i class="fas fa-box"></i> Order List</h5>
                        
                            <a href="{{ route('backend.main_category.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fas fa-plus"></i> Add New Orders</a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle text-center">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>INVOICE NO</th>
                                            <th>ORDER TIME</th>
                                            <th>CUSTOMER NAME</th>
                                            <th>METHOD</th>
                                            <th>AMOUNT</th>
                                            <th>STATUS</th>
                                            <th>ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>11703</td>
                                            <td>11 Mar, 2025 1:45 PM</td>
                                            <td>Rohit Kumar</td>
                                            <td><span class="badge bg-success text-dark">Cash</span></td>
                                            <td>₹1499</td>
                                            <td><span class="badge bg-info text-dark">Pending</span></td>
                                            <td>
                                                <button class="btn btn-success btn-sm"><i class="fas fa-edit"></i> </button>
                                                <button class="btn btn-info btn-sm"><i class="fas fa-eye"></i> </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>11703</td>
                                            <td>11 Mar, 2025 1:45 PM</td>
                                            <td>Rohit Kumar</td>
                                            <td><span class="badge bg-warning text-dark">UPI</span></td>
                                            <td>₹1499</td>
                                            <td><span class="badge bg-warning text-dark">Processing</span></td>
                                            <td>
                                                <button class="btn btn-success btn-sm"><i class="fas fa-edit"></i> </button>
                                                <button class="btn btn-info btn-sm"><i class="fas fa-eye"></i> </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>11703</td>
                                            <td>11 Mar, 2025 1:45 PM</td>
                                            <td>Rohit Kumar</td>
                                            <td><span class="badge bg-success text-dark">Cash</span></td>
                                            <td>₹1499</td>
                                            <td><span class="badge bg-success text-dark"> Delivered </span></td>
                                            <td>
                                                <button class="btn btn-success btn-sm"><i class="fas fa-edit"></i> </button>
                                                <button class="btn btn-info btn-sm"><i class="fas fa-eye"></i> </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>11703</td>
                                            <td>11 Mar, 2025 1:45 PM</td>
                                            <td>Rohit Kumar</td>
                                            <td><span class="badge bg-warning text-dark">UPI</span></td>
                                            <td>₹1499</td>
                                            <td><span class="badge bg-danger text-dark">Cancel</span></td>
                                            <td>
                                                <button class="btn btn-success btn-sm"><i class="fas fa-edit"></i> </button>
                                                <button class="btn btn-info btn-sm"><i class="fas fa-eye"></i> </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->



</div>


@section('javascript-section')

@endsection
@endsection