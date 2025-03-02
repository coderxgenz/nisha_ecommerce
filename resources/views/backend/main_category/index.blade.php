@extends('layouts/backend/main')
@section('main-section')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Main Category</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Main Category</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        @if(count($main_categories) > 0)
                        
                          <div class="card-header">
                            <h4 class="card-title">Enter Details Below</h4>
                            <a href="{{ route('backend.main_category.create') }}" class="btn btn-success waves-effect waves-light" >Add New Category</a>
                        </div> 

                        <div class="card-body">

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category Name</th>
                                        <th>Slug</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $sn = 1;
                                    @endphp
                                    @foreach ($main_categories as $main_category) 
                                    <tr>
                                        <td>{{ $sn++ }}</td>
                                        <td>{{ $main_category->name ?? '' }}</td>
                                        <td>{{ $main_category->slug ?? '' }}</td>
                                        <td><input type="checkbox" id="switch3" switch="bool" checked />
                                            <label for="switch3" data-on-label="Active" data-off-label="Inactive"></label>
                                        </td>
                                        <td>{{ Carbon\Carbon::parse($main_category->created)->format('d M, Y') }}</td>
                                        <td>
                                            <a href="{{ route('backend.main_category.edit', [$main_category->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="" class="btn btn-danger btn-sm" id="sa-params">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    @else
                    <center> <h3>No Records Available</h3></center>
                    @endif

                    
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
 
@if(Session::has('created'))
<script>
    Swal.fire({
  title: "Success!",
  text: "{{ Session::get('created') }}",
  icon: "success"
});
</script>
@endif
@endsection
@endsection