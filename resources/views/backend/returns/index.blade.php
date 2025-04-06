@extends('layouts/backend/main')
@section('main-section')
<style>
    .badge {
        font-size: 12px;
        padding: 5px 10px;
    }
    .toggle-switch {
        cursor: pointer;
    }
</style>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Return Management</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Return Management</li>
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
                            <h5 class="mb-0 fw-bold"><i class="fas fa-undo-alt"></i> Return Requests</h5>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle text-center">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Order ID</th>
                                            <th>Customer</th>
                                            <th>Email</th>
                                            <th>Product</th>
                                            <th>Purchase Date</th>
                                            <th>Return Date</th>
                                            <th>Refund Amount</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>ORD12345</td>
                                            <td>John Doe</td>
                                            <td>naveentanwar3011@gmail.com</td>
                                            <td>Silver Bracelet</td>
                                            <td>2025-03-10</td>
                                            <td>2025-03-10</td>
                                            <td>₹5499</td>
                                            <td><span class="badge bg-warning text-dark">Processing</span></td>
                                            <td>
                                                <button class="btn btn-success btn-sm"><i class="fas fa-edit"></i> </button>
                                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>ORD67890</td>
                                            <td>Jane Smith</td>
                                            <td>naveentanwar3011@gmail.com</td>
                                            <td>Silver Bracelet</td>
                                            <td>2025-03-12</td>
                                            <td>2025-03-12</td>
                                            <td>₹5499</td>
                                            <td><span class="badge bg-info text-dark">Pending</span></td>
                                            <td>
                                                <button class="btn btn-success btn-sm"><i class="fas fa-edit"></i> </button>
                                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> </button>
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