@extends('layouts/backend/main')
@section('main-section')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Sub Category</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Sub Category</li>
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
                            <h4 class="card-title">Enter Details Below</h4>
                            <a href="{{ route('backend.sub_category.create') }}" class="btn btn-success waves-effect waves-light" >Add Sub Category</a>
                        </div>
                        <!-- end card header -->

                        <div class="card-body">
                        <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Sub Category</th>
                        <th>Parent Category</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Ring</td>
                        <td>Jewelry</td>
                        <td>jewelry</td>
                        <td><input type="checkbox" id="switch3" switch="bool" checked />
                            <label for="switch3" data-on-label="Active" data-off-label="Inactive"></label>
                        </td>
                        <td>2025-02-26</td>
                        <td>
                            <a href="{{ route('backend.sub_category.edit') }}" class="btn btn-primary btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm" id="sa-params">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
                            
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
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

<script>
    document.querySelectorAll("#sa-params").forEach(button => {
        button.addEventListener("click", function() {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                confirmButtonClass: "btn btn-success mt-2",
                cancelButtonClass: "btn btn-danger ms-2 mt-2",
                buttonsStyling: false
            }).then(function(e) {
                if (e.value) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success",
                        confirmButtonColor: "#5156be"
                    });
                } else if (e.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire({
                        title: "Cancelled",
                        text: "Your imaginary file is safe :)",
                        icon: "error",
                        confirmButtonColor: "#5156be"
                    });
                }
            });
        });
    });
</script>
@section('javascript-section')
@endsection
@endsection