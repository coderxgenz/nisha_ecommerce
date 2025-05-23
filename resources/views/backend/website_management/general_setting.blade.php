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

    .file-upload-icon {
        font-size: 40px;
        color: #4A90E2;
    }

    .file-upload-text {
        font-size: 16px;
        font-weight: bold;
        margin-top: 10px;
        color: #333;
    }

    .file-preview {
        margin-top: 10px;
        display: none;
        position: relative;
    }

    .file-preview img {
        max-width: 100%;
        max-height: 150px;
        border-radius: 5px;
    }

    .remove-btn {
        position: absolute;
        top: 5px;
        right: 5px;
        background-color: red;
        color: white;
        border: none;
        line-height: 0px;
        border-radius: 50%;
        cursor: pointer;
        display: none;
        font-size: 32px;
        width: 40px;
        height: 40px;
    }

    .remove-btn:hover {
        background-color: darkred;
    }
</style>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Website Settings</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Website Settings</li>
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
                                <form id="pristine-valid-example" novalidate method="POST" action="{{ route('backend.main_category.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label>Company Name</label>
                                            <input type="text" name="company_name" class="form-control" placeholder="Enter company name">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Website URL</label>
                                            <input type="text" name="company_name" class="form-control" placeholder="Enter company name">
                                        </div>
                                        <div class="col-xl-6 py-3">
                                            <div class="form-group mb-3">
                                                <label><b>Upload Logo</b></label>

                                                <!-- Drag & Drop + Click Upload Box -->
                                                <div class="file-upload-box" id="fileUploadBox">
                                                    <input type="file" id="imageUpload" name="image" accept="image/png, image/jpeg, image/jpg, image/webp">
                                                    <i class="file-upload-icon bx bx-cloud-upload"></i>
                                                    <span class="file-upload-text" id="uploadText">Drag & Drop or Click to Upload</span>
                                                </div>

                                                <!-- Image Preview -->
                                                <div class="file-preview" id="filePreview">
                                                    <img id="previewImg" src="" alt="Preview Image">
                                                    <button type="button" class="remove-btn" id="removeBtn">&times;</button>
                                                </div>
                                            </div>

                                            @error('image')
                                            <p style="color:red;"><b>{{ $message }}</b></p>
                                            @enderror
                                        </div>
                                        <div class="col-xl-6 py-3">
                                            <div class="form-group mb-3">
                                                <label><b>Upload Favicon</b></label>

                                                <!-- Drag & Drop + Click Upload Box -->
                                                <div class="file-upload-box" id="fileUploadBox">
                                                    <input type="file" id="imageUpload" name="image" accept="image/png, image/jpeg, image/jpg, image/webp">
                                                    <i class="file-upload-icon bx bx-cloud-upload"></i>
                                                    <span class="file-upload-text" id="uploadText">Drag & Drop or Click to Upload</span>
                                                </div>

                                                <!-- Image Preview -->
                                                <div class="file-preview" id="filePreview">
                                                    <img id="previewImg" src="" alt="Preview Image">
                                                    <button type="button" class="remove-btn" id="removeBtn">&times;</button>
                                                </div>
                                            </div>

                                            @error('image')
                                            <p style="color:red;"><b>{{ $message }}</b></p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control" placeholder="support@example.com">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Alternate Email</label>
                                            <input type="email" name="email" class="form-control" placeholder="support@example.com">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Phone Number</label>
                                            <input type="text" name="phone" class="form-control" placeholder="+91 XXXXXXXXXX">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Alternate Phone</label>
                                            <input type="text" name="alt_phone" class="form-control" placeholder="Optional">
                                        </div>
                                        <!-- Address -->
                                        <div class="col-md-6 mb-3">
                                            <label>Company Address</label>
                                            <textarea name="address" class="form-control" rows="2" placeholder="Enter address"></textarea>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Pin Code</label>
                                            <textarea name="address" class="form-control" rows="2" placeholder="Enter address"></textarea>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Country</label>
                                            <textarea name="address" class="form-control" rows="2" placeholder="Enter address"></textarea>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>City</label>
                                            <textarea name="address" class="form-control" rows="2" placeholder="Enter address"></textarea>
                                        </div>
                                    </div>
                                    <h2>Social Media</h2>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label>Facebook</label>
                                            <input type="url" name="facebook" class="form-control" placeholder="https://facebook.com/yourpage">
                                        </div>

                                        <!-- Instagram -->
                                        <div class="col-md-6 mb-3">
                                            <label>Instagram</label>
                                            <input type="url" name="instagram" class="form-control" placeholder="https://instagram.com/yourpage">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>YouTube Channel</label>
                                            <input type="url" name="youtube" class="form-control" placeholder="https://youtube.com/channel/...">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>WhatsApp Number</label>
                                            <input type="text" name="whatsapp" class="form-control" placeholder="+91 XXXXXXXXXX">
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
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const fileInput = document.getElementById("imageUpload");
        const fileUploadBox = document.getElementById("fileUploadBox");
        const uploadText = document.getElementById("uploadText");
        const filePreview = document.getElementById("filePreview");
        const previewImg = document.getElementById("previewImg");
        const removeBtn = document.getElementById("removeBtn");

        // Click to Upload
        fileUploadBox.addEventListener("click", () => fileInput.click());

        // Drag & Drop Feature
        fileUploadBox.addEventListener("dragover", function(e) {
            e.preventDefault();
            fileUploadBox.style.borderColor = "#333";
        });

        fileUploadBox.addEventListener("dragleave", function() {
            fileUploadBox.style.borderColor = "#4A90E2";
        });

        fileUploadBox.addEventListener("drop", function(e) {
            e.preventDefault();
            fileUploadBox.style.borderColor = "#4A90E2";
            const file = e.dataTransfer.files[0];
            handleFile(file);
        });

        // File Selection
        fileInput.addEventListener("change", function() {
            const file = fileInput.files[0];
            handleFile(file);
        });

        function handleFile(file) {
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    filePreview.style.display = "block";
                    removeBtn.style.display = "inline-block";
                    uploadText.style.display = "none";
                };
                reader.readAsDataURL(file);
            }
        }

        // Remove Image
        removeBtn.addEventListener("click", function() {
            fileInput.value = "";
            filePreview.style.display = "none";
            removeBtn.style.display = "none";
            uploadText.style.display = "block";
        });
    });
</script>
@endsection
@endsection