@extends('layouts/backend/main')
@section('main-section')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Edit Product</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('backend.product.index') }}">Products</a> </li>
                                <li class="breadcrumb-item active">Edit Product</li>
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
                                <form action="{{ route('backend.product.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
 
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <label for="productName" class="form-label">Product Name</label>
                                            <input type="text" value="{{ $product->name ?? '' }}" name="name" class="form-control" id="productName" placeholder="Enter product name">
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label for="productName" class="form-label">Product Slug</label>
                                            <input type="text" value="{{ $product->slug ?? '' }}" name="slug" class="form-control" id="productName" placeholder="Enter Product Slug">
                                        </div>


                                        <div class="col-md-6 mb-4">
                                            <label for="category" class="form-label">Category</label>
                                            <select class="form-control" name="main_category" id="main_category">
                                                <option value="">Select Category</option> 
                                                @if(count($main_categories) > 0)
                                                @foreach($main_categories as $main_category)
                                                <option value="{{ $main_category->id }}" {{ $product->main_category_id == $main_category->id ? "selected":"" }}>{{ $main_category->name }}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <label for="subCategory" class="form-label">Sub Category</label>
                                            <select class="form-control" name="sub_category" id="sub_category">
                                                <option value="">Select Sub Category</option> 
                                                @if(count($selected_sub_cat_list) > 0)
                                                @foreach($selected_sub_cat_list as $sub_category)
                                                <option value="{{ $sub_category->id }}" {{ $product->sub_category_id == $sub_category->id ? "selected":"" }}>{{ $sub_category->name }}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 mb-4 ">
                                            <label class="form-label">Select Sizes</label>
                                            <select class="form-control" name="sizes[]" id="variant_size" multiple>
                                                 @if(count($sizes) > 0)
                                                @foreach($sizes as $size)
                                                <option value="{{ $size->name }}" data-sname="{{ $size->name }}" {{ in_array($size->id, $selected_size_variants) ? "selected":"" }}>{{ $size->name }}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div> 
                                    </div>
                                    <div class="row">
                                    <div class="variant_section mb-4">
                                        @foreach($selected_size_variants as $size)
                                    @php
                                    $size_detail = App\Models\Backend\Size::where('id', $size)->first();
                                    $selected_color_variants = App\Models\Backend\ProductVariants::where('variant_id', $size_detail->id)
                                    ->where('product_id', $product->id)
                                    ->pluck('color_id')->toArray(); 
                                    @endphp
                                        <div id="variant_section_{{ $size_detail->name }}">
                                    <div class="row">
                                        <div class="col-md-12 mb-12">
                                            <label for="color" class="form-label">Select Color for Size {{ $size_detail->name }}</label>
                                            <select class="form-control color-selector" id="variant_color" name="variant_color_{{ $size_detail->name }}[]" data-size="{{ $size_detail->name }}" multiple>
                                                @if(count($colors) > 0)
                                                @foreach($colors as $color)
                                                <option value="{{ $color->name }}" {{ in_array($color->id, $selected_color_variants) ? "selected":"" }}>{{ $color->name }}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                            <div id="variant_color_data_{{ $size_detail->name }}">
                                                @foreach($selected_color_variants as $color)
                                                @php 
                                                $color_detail = App\Models\Backend\Color::where('id', $color)->first();
                                                $product_variant_detail = App\Models\Backend\ProductVariants::where('product_id', $product->id)
                                                ->where('variant_id', $size_detail->id) 
                                                ->where('color_id', $color_detail->id)
                                                ->first();
                                                @endphp
                                                <div class="row variant-row">
                                                    <div class="col-md-3 mb-4">
                                                        <label class="form-label">Color: {{ $color_detail->name }}</label> 
                                                    </div>
                                                    <div class="col-md-3 mb-4">
                                                        <label class="form-label">Upload Image</label>
                                                        <input type="file" class="form-control" name="image_{{ $size_detail->name }}_{{ $color_detail->name }}[]" data-size="{{ $color_detail->name }}" data-color="{{ $color_detail->name }}" multiple accept=".jpg, .jpeg, .png, .webp">
                                                    </div>
                                                    <div class="col-md-3 mb-4">
                                                        <label class="form-label">Price (₹)</label>
                                                        <input type="number" value="{{ $product_variant_detail->price ?? '' }}" class="form-control" name="price_{{ $size_detail->name }}_{{ $color_detail->name }}" data-size="{{ $color_detail->name }}" data-color="{{ $color_detail->name }}" placeholder="Enter price">
                                                    </div>
                                                    <div class="col-md-3 mb-4">
                                                        <label class="form-label">Sale Price (₹)</label>
                                                        <input type="number" value="{{ $product_variant_detail->sale_price ?? '' }}" class="form-control" name="sale_price_{{ $size_detail->name }}_{{ $color_detail->name }}" data-size="{{ $color_detail->name }}" data-color="{{ $color_detail->name }}" placeholder="Enter Sale price">
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div> 
                                    </div>


                                    </div>
                                    @endforeach
                                     
                                     
                                    </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <label for="stock" class="form-label">Stock</label>
                                            <input type="number" value="{{ $product->stock ?? 0 }}" name="stock" class="form-control" id="stock" placeholder="Enter stock quantity">
                                        </div>


                                        <div class="col-md-6 mb-4 ">
                                            <label for="statuss" class="form-label">Status</label>
                                            <select class="form-control" name="stock_status" id="statuss">
                                                <option value="1" {{ $product->stock_status == 1 ? "selected":"" }}>In Stock</option>
                                                <option value="0" {{ $product->stock_status == 0 ? "selected":"" }}>Out Of Stock</option>
                                            </select>
                                        </div> 
                                        <div class="col-md-12 mb-4 ">
                                            <label for="shortDescription" class="form-label">Short Description</label>
                                            <textarea class="form-control" name="short_description" id="shortDescription" rows="2" placeholder="Enter short description">{{ $product->short_description ?? '' }}</textarea>
                                        </div>

                                        <div class="col-md-12 mb-4 ">
                                            <label for="description" class="form-label">Product Description</label>
                                            <textarea class="form-control" name="full_description" id="editor" rows="4" placeholder="Enter full product description">{{ $product->full_description ?? '' }}</textarea>
                                        </div>




                                        <div class="form-group mb-3">
                                        <label>Thumbnail Image</label>
                                        <input name="thumbnail_images" class="form-control image-input" type="file" accept="image/png, image/jpeg, image/jpg, image/webp">
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
    $(document).ready(function() {
    let sizeSelector = new Choices("#variant_size", { removeItemButton: true }); 
    let colors = @json($colors);    
    let already_selected_size_variants = @json($already_selected_size_variants);
   
    document.querySelectorAll(".color-selector").forEach((el) => {
        new Choices(el, { removeItemButton: true });
    });
    let already_selected_sizes = []; 
    $(document).on("change", "#variant_size", function () {
    let sizes = $(this).val();     
    let append_to_html = ''; 
    let color_options = '';
    colors.forEach((color) => {
        color_options += `<option value="${color.name}">${color.name}</option>`;
    });
    let missingSizes = sizes.filter(size => !already_selected_size_variants.includes(size)); 
    already_selected_size_variants = sizes;
    // $(".variant_section").html(""); 
    missingSizes.forEach((size) => {
        append_to_html = `
            <div class="row">
                <div class="col-md-12 mb-12">
                    <label for="color" class="form-label">Select Color for Size ${size}</label>
                    <select class="form-control color-selector" id="variant_color" name="variant_color_${size}[]" data-size="${size}" multiple>
                        ${color_options}
                    </select>
                    <div id="variant_color_data_${size}"></div>
                </div>
            </div>`;
            $(".variant_section").append(append_to_html);
            // Initialize Choices.js for the new select
            let colorSelect = document.querySelector(`.color-selector[data-size="${size}"]`);
            if (colorSelect) {
                new Choices(colorSelect, { removeItemButton: true });
            }
        });
    });

});

$(document).on("change", "#variant_color", function () { 
    let colors = $(this).val(); 
    let size = $(this).data('size'); 
    let append_to_html = '';  
    colors.forEach((color) => {
        append_to_html = `
     <div class="row variant-row">
                        <div class="col-md-3 mb-4">
                            <label class="form-label">Color: ${color}</label> 
                        </div>
                        <div class="col-md-3 mb-4">
                            <label class="form-label">Upload Image</label>
                            <input type="file" class="form-control" name="image_${size}_${color}[]" data-size="${color}" data-color="${color}" multiple accept=".jpg, .jpeg, .png, .webp">
                        </div>
                        <div class="col-md-3 mb-4">
                            <label class="form-label">Price (₹)</label>
                            <input type="number" class="form-control" name="price_${size}_${color}" data-size="${color}" data-color="${color}" placeholder="Enter price">
                        </div>
                        <div class="col-md-3 mb-4">
                            <label class="form-label">Sale Price (₹)</label>
                            <input type="number" class="form-control" name="sale_price_${size}_${color}" data-size="${color}" data-color="${color}" placeholder="Enter Sale price">
                        </div>
                    </div>`;
                });
                $("#variant_color_data_"+size).append(append_to_html); 
        });






        $(document).on("change", "#main_category", async function() {
            let id = $(this).val();
            let url = "{{ route('backend.sub_category.get_sub_category_by_main_category', [':id']) }}";
            url = url.replace(':id', id);
            let append_to_html = '<option value="">Select Sub Category</option>';
            let response = await fetch(`${url}`);
            let responseData = await response.json();
            console.log(responseData);
            responseData.sub_categories.forEach((item) => {
                append_to_html += `<option value="${item.id}">${item.name}</option>`;
            }); 
            $("#sub_category").html(append_to_html);
        });
    </script>


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