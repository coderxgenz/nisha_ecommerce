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
                        <h4 class="mb-sm-0 font-size-18">All Products</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">All Products</li>
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
                        <h5 class="mb-0 fw-bold"><i class="fas fa-box-open"></i> Products List</h5>
                            <a href="{{ route('backend.product.create') }}" class="btn btn-success waves-effect waves-light">Add New Product</a>
                        </div>

                        <div class="card-body">
                        <div class="table-responsive">
                            @if(count($products) > 0)
                            <table class="table table-hover align-middle text-center">
                                <thead class="table-dark" >
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Category</th>
                                        <th>Sub Category</th> 
                                        <th>Stock</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $sn = 1;
                                    @endphp
                                    @foreach($products as $product)
                                    <tr>
                                        <td>{{ $sn++ }}</td>
                                        <td>{{ $product->name ?? '' }}</td>
                                        <td>{{ $product->getMainCategory?->name ?? '' }}</td>
                                        <td>{{ $product->getSubCategory?->name ?? '' }}</td>
                                        <td>{{ $product->stock ?? 0 }}</td>
                                        @if($product->stock > 0)
                                        <td><span class="badge bg-success text-dark">In Stock</span></td>
                                        @else
                                        <td><span class="badge bg-danger text-dark">Sold Out</span></td>
                                        @endif
                                        <td>{{ $product->created_at->format('Y-m-d') }}</td>
                                        <td>
                                            <a href="{{ route('backend.product.edit', $product->id) }}" class="btn btn-success btn-sm"> <i class="fas fa-edit"></i></a>
                                            <a href="{{ route('backend.product.destroy', $product->id) }}" class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach 
                                </tbody>
                            </table>
                            <div class="">
                                {{ $products->links('pagination::bootstrap-5') }}
                            </div>
                            @else
                            <center> <h3>No Records Available</h3></center>
                            @endif 
                        </div>
                    </div>
                </div>
            </div> 
        </div> 
    </div> 
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
@elseif(Session::has('updated'))
<script>
    Swal.fire({
  title: "Success!",
  text: "{{ Session::get('updated') }}",
  icon: "success"
});
</script>
@elseif(Session::has('deleted'))
<script>
    Swal.fire({
  title: "Success!",
  text: "{{ Session::get('deleted') }}",
  icon: "success"
});
</script>
@endif

@endsection
@endsection