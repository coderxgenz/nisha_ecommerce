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
                        <h4 class="mb-sm-0 font-size-18">Coupons List</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Coupons List</li>
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
                            <h5 class="mb-0 fw-bold"><i class="fas fa-tags"></i> Coupon List</h5>
                            <a href="{{ route('backend.coupons.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fas fa-plus"></i> Add New Coupon</a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle text-center">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Coupon Code</th>
                                            <th>Discount</th>
                                            <th>Expiry Date</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>LV50OFF</td>
                                            <td>50%</td>
                                            <td>2025-12-31</td>
                                            <td>
                                                <input type="checkbox" class="toggle-switch" id="switch_1" switch="bool" data-id="1" checked />
                                                <label for="switch_1" data-on-label="Active" data-off-label="Inactive"></label>
                                            </td>
                                            <td>
                                                <button class="btn btn-success btn-sm"><i class="fas fa-edit"></i> </button>
                                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>SUMMER25</td>
                                            <td>25%</td>
                                            <td>2025-06-30</td>
                                            <td>
                                                <input type="checkbox" class="toggle-switch" id="switch_2" switch="bool" data-id="2" checked />
                                                <label for="switch_2" data-on-label="Active" data-off-label="Inactive"></label>
                                            </td>
                                            <td>
                                                <button class="btn btn-success btn-sm"><i class="fas fa-edit"></i> </button>
                                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>WINTER10</td>
                                            <td>10%</td>
                                            <td>2025-01-31</td>
                                            <td>
                                                <input type="checkbox" class="toggle-switch" id="switch_3" switch="bool" data-id="3" />
                                                <label for="switch_3" data-on-label="Active" data-off-label="Inactive"></label>
                                            </td>
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