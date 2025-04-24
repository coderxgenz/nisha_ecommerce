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
                        <h4 class="mb-sm-0 font-size-18">Shipping Management</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Shipping Management</li>
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
                            <h5 class="mb-0 fw-bold"><i class="fas fa-truck"></i> Shipping Zones & Charges</h5>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle text-center">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Shipping Zone</th>
                                            <th>Delivery Time</th>
                                            <th>Charge</th>
                                            <th>Free Shipping</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Delhi / NCR</td>
                                            <td>2-3 Days</td>
                                            <td>₹49</td>
                                            <td>
                                                <input type="checkbox" class="toggle-switch" id="switch_1" switch="bool" 
                                                    data-id="1" checked />
                                                <label for="switch_1" data-on-label="Free" data-off-label="Paid"></label>
                                            </td>
                                            <td><span class="badge bg-success">Active</span></td>
                                            <td>
                                                <button class="btn btn-success btn-sm"><i class="fas fa-edit"></i></button>
                                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Rest of India</td>
                                            <td>4-7 Days</td>
                                            <td>₹99</td>
                                            <td><input type="checkbox" class="toggle-switch"></td>
                                            <td><span class="badge bg-warning text-dark">Pending</span></td>
                                            <td>
                                                <button class="btn btn-success btn-sm"><i class="fas fa-edit"></i></button>
                                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>International</td>
                                            <td>10-15 Days</td>
                                            <td>₹599</td>
                                            <td><input type="checkbox" class="toggle-switch"></td>
                                            <td><span class="badge bg-danger">Inactive</span></td>
                                            <td>
                                                <button class="btn btn-success btn-sm"><i class="fas fa-edit"></i></button>
                                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
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
