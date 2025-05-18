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
                                            <th>Name</th> 
                                            <th>Charge</th>
                                            <th>Free Shipping</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $sn = 1;
                                        @endphp
                                        @foreach($shipping_methods as $s_m)
                                    <tr>
                                            <td>{{ $sn++ }}</td>
                                            <td>{{ $s_m->name }}</td>
                                            <td>₹{{ $s_m->rate }}</td>
                                            <td>
                                                <input type="checkbox" class="toggle-switch" id="switch_1" switch="bool" 
                                                    data-id="1" {{ $s_m->status == 1 ? 'checked':'' }} />
                                                <label for="switch_1" data-on-label="Active" data-off-label="Inactive"></label>
                                            </td>
                                            <td>
                                                <button class="btn btn-success btn-sm"><i class="fas fa-edit"></i></button>
                                             </td>
                                        </tr>
                                        @endforeach
                                         
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
