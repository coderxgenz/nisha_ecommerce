@extends('layouts/backend/main')
@section('main-section')
<style>
        .file-upload-box {
                position: relative;
                display: flex;
                align-items: center;
                justify-content: center;
                width: 100%;
                height: 170px;
                border: 2px dashed #4A90E2;
                border-radius: 10px;
                background-color: #f9f9f9;
                text-align: center;
                cursor: pointer;
                transition: 0.3s;
                flex-direction: column;
                padding: 20px;
        }

        .file-upload-box:hover {
                background-color: #f1f1f1;
        }

        .file-upload-box input {
                display: none;
        }
</style>
<div class="main-content">
        <div class="page-content">
                <div class="container-fluid">
                        <div class="row">
                                <div class="col-12">
                                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                                <h4 class="mb-sm-0 font-size-18">Create Coupon</h4>
                                                <div class="page-title-right">
                                                        <ol class="breadcrumb m-0">
                                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                                                <li class="breadcrumb-item active">Create Coupon</li>
                                                        </ol>
                                                </div>
                                        </div>
                                </div>
                        </div>
                        <div class="row">
                                <div class="col-lg-12">
                                        <div class="card">
                                                <div class="card-header">
                                                        <h4 class="card-title">Enter Coupon Details</h4>
                                                </div>
                                                <div class="card-body">
                                                        <form method="POST" action="#">
                                                                <div class="row">
                                                                        <div class="col-xl-6 col-md-6">
                                                                                <div class="form-group mb-3">
                                                                                        <label>Coupon Code</label>
                                                                                        <input type="text" name="coupon_code" required class="form-control" placeholder="Enter Coupon Code" />
                                                                                </div>
                                                                        </div>
                                                                        <div class="col-xl-6 col-md-6">
                                                                                <div class="form-group mb-3">
                                                                                        <label>Discount Type</label>
                                                                                        <select name="discount_type" class="form-control">
                                                                                                <option value="percentage">Percentage</option>
                                                                                                <option value="fixed">Fixed Amount</option>
                                                                                        </select>
                                                                                </div>
                                                                        </div>
                                                                        <div class="col-xl-6 col-md-6">
                                                                                <div class="form-group mb-3">
                                                                                        <label>Discount Value</label>
                                                                                        <input type="number" name="discount_value" required class="form-control" placeholder="Enter Discount Value" />
                                                                                </div>
                                                                        </div>
                                                                        <div class="col-xl-6 col-md-6">
                                                                                <div class="form-group mb-3">
                                                                                        <label>Expiration Date</label>
                                                                                        <input type="text" class="form-control flatpickr-input" id="datepicker-humanfd">
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                <div class="form-group">
                                                                        <button type="submit" class="btn btn-primary">Create Coupon</button>
                                                                </div>
                                                        </form>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
    flatpickr("#datepicker-humanfd", {
        dateFormat: "d-m-Y",  // Tumhare format ke hisaab se change kar sakte ho
        altInput: true,
        altFormat: "F j, Y",  // Yeh human-friendly format ke liye hai
        allowInput: true
    });
});

</script>
@endsection