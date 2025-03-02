@extends('layouts/backend/main')
@section('main-section') 
<div class="main-content">
        <div class="page-content">
                <div class="container-fluid">
                        <div class="row">
                                <div class="col-12">
                                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                                <h4 class="mb-sm-0 font-size-18">Edit Category</h4>
                                                <div class="page-title-right">
                                                        <ol class="breadcrumb m-0">
                                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                                                <li class="breadcrumb-item"><a href="{{ route('backend.main_category.index') }}">Main Category</a> </li>
                                                                <li class="breadcrumb-item active">Edit Main Category</li>
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
                                                                <form id="pristine-valid-example" novalidate method="POST" action="{{ route('backend.main_category.update', $main_category->id) }}" enctype="multipart/form-data">
                                                                        <input type="hidden" />
                                                                        <div class="row">
                                                                                
                                                                                <div class="col-xl-4 col-md-6">
                                                                                        <div class="form-group mb-3">
                                                                                                <label>Category Name</label>
                                                                                                <input type="text" name="name" value="{{ $main_category->name ?? '' }}" required class="form-control" placeholder="Category Name" />
                                                                                        </div>
                                                                                </div>
                                                                                <div class="col-xl-4 col-md-6">
                                                                                        <div class="form-group mb-3">
                                                                                                <label>Slug</label>
                                                                                                <input type="text" name="slug" value="{{ $main_category->slug ?? '' }}" required class="form-control" placeholder="Slug" />
                                                                                        </div>
                                                                                </div>
                                                                                <div class="col-xl-4 col-md-6">
                                                                                        <div class="form-group mb-3">
                                                                                                <label>Order By</label>
                                                                                                <input type="text" name="order_number" min="1" required class="form-control" value="{{ $main_category->order_number ?? '' }}" placeholder="Order By" />
                                                                                        </div>
                                                                                </div>
                                                                                <div class="col-xl-12 py-3">
                                                                                        <div class="dropzone">
                                                                                                <div class="fallback">
                                                                                                        <input name="image" type="file" accept="image/png, image/jpeg, image/jpg, image/webp">
                                                                                                </div>
                                                                                                <div class="dz-message needsclick">
                                                                                                        <div class="mb-3">
                                                                                                                <i class="display-4 text-muted bx bx-cloud-upload"></i>
                                                                                                        </div>
                                                                                                        <h5>Drop files here or click to upload.</h5>
                                                                                                </div>
                                                                                        </div>
                                                                                </div>
                                                                        </div> 
                                                                        <div class="form-group">
                                                                                <button type="submit" class="btn btn-primary">Update</button>
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