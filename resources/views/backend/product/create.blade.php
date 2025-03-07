@extends('layouts/backend/main')
@section('main-section')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Add Main Category</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('backend.main_category.index') }}">Main Category</a> </li>
                                <li class="breadcrumb-item active">Add Main Category</li>
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
                                <form method="POST" action="{{ route('backend.product.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <label for="productName" class="form-label">Product Name</label>
                                            <input type="text" name="name" class="form-control" id="productName" placeholder="Enter product name">
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label for="productName" class="form-label">Product Slug</label>
                                            <input type="text" name="slug" class="form-control" id="productName" placeholder="Enter Product Slug">
                                        </div>


                                        <div class="col-md-6 mb-4">
                                            <label for="category" class="form-label">Category</label>
                                            <select class="form-control" id="category" name="main_category">
                                                <option value="">Select Category</option>
                                                <option value="jewelry">Jewelry</option>
                                                <option value="accessories">Accessories</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <label for="subCategory" class="form-label">Sub Category</label>
                                            <select class="form-control" name="sub_category" id="subCategory">
                                                <option value="">Select Sub Category</option>
                                                <option value="necklaces">Necklaces</option>
                                                <option value="earrings">Earrings</option>
                                                <option value="rings">Rings</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="variant_section mb-4">
                                    <div class="row">
                                        <div class="col-lg-12 mb-4 ">
                                            <label class="form-label">Select Sizes</label>
                                            <select class="form-control" name="size[]" id="size-selector" multiple>
                                                <option value="S">S</option>
                                                <option value="M">M</option>
                                                <option value="L">L</option>
                                                <option value="XL">XL</option>
                                            </select>
                                        </div>
                                        <div id="variant-wrapper"></div>
                                    </div>
                                    </div>



                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <label for="stock" class="form-label">Stock</label>
                                            <input type="number" name="stock" class="form-control" id="stock" placeholder="Enter stock quantity">
                                        </div>


                                        <div class="col-md-6 mb-4 ">
                                            <label for="statuss" class="form-label">Status</label>
                                            <select class="form-control" name="stock_status" id="statuss">
                                                <option value="1">In Stock</option>
                                                <option value="0">Out Of Stock</option>
                                            </select>
                                        </div>
                                        <!-- <div class="col-lg-6 mb-4">

                                            <label for="unique-tags" class="form-label ">Enter Tags</label>
                                            <input class="form-control" id="unique-tags" type="text" placeholder="Enter something" />
                                        </div> -->


                                        <div class="col-md-12 mb-4 ">
                                            <label for="shortDescription" class="form-label">Short Description</label>
                                            <textarea class="form-control" name="short_description" id="shortDescription" rows="2" placeholder="Enter short description"></textarea>
                                        </div>

                                        <div class="col-md-12 mb-4 ">
                                            <label for="description" class="form-label">Product Description</label>
                                            <textarea class="form-control" name="full_description" id="editor" rows="4" placeholder="Enter full product description"></textarea>
                                        </div>





                                        <div class="col-xl-6 py-3">
                                            <label for="thumbnailImage" class="form-label">Thumbnail Image *</label>
                                            <div class="dropzone">
                                                <div class="fallback">
                                                    <input name="thumbnail_image" type="file" accept="image/png, image/jpeg, image/jpg, image/webp">

                                                </div>
                                                <div class="dz-message needsclick">
                                                    <div class="mb-3">
                                                        <i class="display-4 text-muted bx bx-cloud-upload"></i>
                                                    </div>

                                                    <h5>Drop files here or click to upload.</h5>
                                                </div>
                                            </div>
                                            @error('image')
                                            <p style="color:red;"><b>{{ $message }}</b></p>
                                            @enderror
                                        </div>
                                          
                                    </div>

                                    <button type="submit" class="btn btn-success">Submit</button>
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
    Dropzone.autoDiscover = false;
    document.addEventListener("DOMContentLoaded", function() {
        var myDropzone = new Dropzone(".dropzone", {
            url: "/upload",
            maxFilesize: 2, // 2MB max size
            acceptedFiles: "image/png, image/jpeg, image/jpg, image/webp",
            addRemoveLinks: true
        });
    });
    document.addEventListener("DOMContentLoaded", function() {
        var myDropzone = new Dropzone(".dropzone2", {
            url: "/upload",
            maxFilesize: 2, // 2MB max size
            acceptedFiles: "image/png, image/jpeg, image/jpg, image/webp",
            addRemoveLinks: true
        });
    });

    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error('Error initializing CKEditor:', error);
        });
</script>

<script>
        document.addEventListener("DOMContentLoaded", function() {
            let variantIndex = 0;
            let sizeSelector = new Choices("#size-selector", { removeItemButton: true });
            let variantData = {}; // Object to store selected size & color data

            document.getElementById("size-selector").addEventListener("change", function() {
                generateVariants();
            });

            function generateVariants() {
                let selectedSizes = Array.from(document.getElementById("size-selector").selectedOptions).map(opt => opt.value);

                let variantWrapper = document.getElementById("variant-wrapper");
                variantWrapper.innerHTML = ""; // Clear display but keep data

                selectedSizes.forEach(size => {
                    if (!variantData[size]) {
                        variantData[size] = { colors: {} }; // Initialize if not exists
                    }

                    let variantHTML = `
                    <div class="variant-group">
                        <h5 class="mt-3">Size: ${size}</h5>
                        <div class="row variant-row">
                            <div class="col-md-3 mb-4">
                                <label class="form-label">Select Colors</label>
                                <select class="form-control color-selector" data-size="${size}" multiple>
                                    <option value="Red">Red</option>
                                    <option value="Green">Green</option>
                                    <option value="Blue">Blue</option>
                                    <option value="Yellow">Yellow</option>
                                </select>
                            </div>
                        </div>
                        <div class="color-variants" data-size="${size}"></div>
                    </div>`;
                    variantWrapper.insertAdjacentHTML("beforeend", variantHTML);

                    let colorSelect = document.querySelector(`.color-selector[data-size="${size}"]`);
                    let colorChoices = new Choices(colorSelect, { removeItemButton: true });

                    if (Object.keys(variantData[size].colors).length > 0) {
                        colorChoices.setChoiceByValue(Object.keys(variantData[size].colors));
                        updateColorVariants(colorSelect, Object.keys(variantData[size].colors));
                    }

                    colorSelect.addEventListener("change", function() {
                        updateColorVariants(this, Array.from(this.selectedOptions).map(opt => opt.value));
                    });
                });
            }

            function updateColorVariants(selectElement, selectedColors) {
                let size = selectElement.dataset.size;
                let colorVariantContainer = document.querySelector(`.color-variants[data-size="${size}"]`);
                colorVariantContainer.innerHTML = "";

                selectedColors.forEach(color => {
                    if (!variantData[size].colors[color]) {
                        variantData[size].colors[color] = { image: "", price: "", sale_price: "" };
                    }

                    let existingData = variantData[size].colors[color];

                    let colorVariantHTML = `
                    <div class="row variant-row">
                        <div class="col-md-3 mb-4">
                            <label class="form-label">Color: ${color}</label>
                            <input type="hidden" name="variants[${variantIndex}][size]" value="${size}">
                            <input type="hidden" name="variants[${variantIndex}][color]" value="${color}">
                        </div>
                        <div class="col-md-3 mb-4">
                            <label class="form-label">Upload Image</label>
                            <input type="file" class="form-control" name="variants[${variantIndex}][image]" data-size="${size}" data-color="${color}">
                        </div>
                        <div class="col-md-3 mb-4">
                            <label class="form-label">Price (₹)</label>
                            <input type="number" class="form-control" name="variants[${variantIndex}][price]" data-size="${size}" data-color="${color}" value="${existingData.price}" placeholder="Enter price" required>
                        </div>
                        <div class="col-md-3 mb-4">
                            <label class="form-label">Sale Price (₹)</label>
                            <input type="number" class="form-control" name="variants[${variantIndex}][sale_price]" data-size="${size}" data-color="${color}" value="${existingData.sale_price}" placeholder="Enter Sale price">
                        </div>
                    </div>`;
                    colorVariantContainer.insertAdjacentHTML("beforeend", colorVariantHTML);
                    variantIndex++;
                });

                updateStoredValues();
            }

            function updateStoredValues() {
                document.querySelectorAll("input[data-size]").forEach(input => {
                    let size = input.dataset.size;
                    let color = input.dataset.color;
                    let fieldName = input.name.split("[").pop().split("]")[0]; // Get field name (price, sale_price, image)

                    input.addEventListener("input", function() {
                        if (variantData[size] && variantData[size].colors[color]) {
                            variantData[size].colors[color][fieldName] = this.value;
                        }
                    });

                    if (variantData[size] && variantData[size].colors[color] && variantData[size].colors[color][fieldName]) {
                        input.value = variantData[size].colors[color][fieldName];
                    }
                });
            }
        });
    </script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        new Choices("#unique-tags", {
            removeItemButton: true, // Cross button enable
            duplicateItems: false, // Unique values only
            delimiter: ",", // Separate values by comma
            editItems: true, // Allow editing
            paste: false // Disable pasting to avoid duplicate issues
        });
    });
</script>

@endsection
@endsection