@extends('layouts/backend/main')
@section('main-section')
        <div class="main-content">
        <div class="page-content">
                <div class="container-fluid"> 
                        <div class="row">
                                <div class="col-12">
                                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                                <h4 class="mb-sm-0 font-size-18">Add Color</h4>
                                                <div class="page-title-right">
                                                        <ol class="breadcrumb m-0">
                                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                                                <li class="breadcrumb-item"><a href="{{ route('backend.color.index') }}">Color</a> </li>
                                                                <li class="breadcrumb-item active">Add Color</li>
                                                        </ol>
                                                </div>
                                        </div>
                                </div>
                        </div>
                        <div class="row">
                                <div class="col-lg-12">
                                        <div class="card">
                                                <div class="card-header">
                                                        <h4 class="card-title">Enter Details Below</h4>
                                                </div>  
                                                <div class="card-body">
                                                        <div>
                                                                <form id="pristine-valid-example" novalidate method="POST" action="{{ route('backend.color.store') }}">
                                                                        @csrf 
                                                                        <div class="row">
                                                                                <div class="col-xl-4 col-md-6">
                                                                                        <div class="form-group mb-3">
                                                                                                <label>Color Name</label>
                                                                                                <input type="text" name="name" required  class="form-control" placeholder="Color Name" />
                                                                                                @error('name')
                                                                                                <p style="color:red;"><b>{{ $message }}</b></p>
                                                                                                @enderror 
                                                                                        </div>
                                                                                </div> 
                                                                                <div class="col-xl-4 col-md-6">
                                                                                        <div class="form-group mb-3">
                                                                                                <label>Color Code</label>
                                                                                                <input type="color" name="color_code" required  class="form-control" style="width:20% !important;" />
                                                                                                @error('name')
                                                                                                <p style="color:red;"><b>{{ $message }}</b></p>
                                                                                                @enderror 
                                                                                        </div>
                                                                                </div> 
                                                                                <div class="col-xl-4 col-md-6">
                                                                                        <div class="form-group mb-3">
                                                                                                <label>Order By</label>
                                                                                                <input type="text" name="order_number" min="1" required class="form-control" value="1" placeholder="Order By" />
                                                                                                 
                                                                                        </div>
                                                                                </div>
                                                                                 
                                                                        </div> 
                                                                        <div class="form-group">
                                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                                        </div>
                                                                </form>
                                                        </div>

                                                </div>
                                        </div> 
                                </div> 
                        </div>
                </div>
        </div>
</div>
@section('javascript-section')

@endsection
@endsection