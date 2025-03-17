@extends('layouts/backend/main')
@section('main-section')


<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Customers</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Customers</li>
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
                        <h5 class="mb-0 fw-bold"><i class="fas fa-users"></i> Customers List</h5>
                            <a href="{{ route('backend.main_category.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fas fa-plus"></i> Add New Customers</a>
                        </div>

                        <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle text-center">
                                <thead class="table-dark" >
                                    <tr>
                                        <th>#</th>
                                        <th>CUSTOMER NAME</th>
                                        <th>EMAIL</th>
                                        <th>PHONE</th>
                                        <th>JOINING DATE</th>
                                        <th>ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Gold Necklace</td>
                                        <td>Jewelry</td>
                                        <td>Necklaces</td>
                                        <td>2025-02-26</td>
                                        <td>
                                        <button class="btn btn-success btn-sm"><i class="fas fa-edit"></i> </button>
                                        <button class="btn btn-info btn-sm"><i class="fas fa-eye"></i> </button>
                                        <button class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i>  </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Gold Necklace</td>
                                        <td>Jewelry</td>
                                        <td>Necklaces</td>
                                        <td>2025-02-26</td>
                                        <td>
                                            <button class="btn btn-success btn-sm"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-info btn-sm"><i class="fas fa-eye"></i> </button>
                                            <button class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i> </button>
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