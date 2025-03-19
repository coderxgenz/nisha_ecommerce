@extends('layouts/backend/main')
@section('main-section')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Add New Product</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('backend.product.index') }}">Product</a> </li>
                                <li class="breadcrumb-item active">Add New Product</li>
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
                                            <input type="text" name="name" class="form-control" id="productName" placeholder="Enter product name">
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label for="productName" class="form-label">Product Slug</label>
                                            <input type="text" name="slug" class="form-control" id="productName" placeholder="Enter Product Slug">
                                        </div>


                                        <div class="col-md-6 mb-4">
                                            <label for="category" class="form-label">Category</label>
                                            <select class="form-control" name="main_category" id="main_category">
                                                <option selected disabled>Select Category</option> 
                                                @if(count($main_categories) > 0)
                                                @foreach($main_categories as $main_category)
                                                <option value="{{ $main_category->id }}">{{ $main_category->name }}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <label for="subCategory" class="form-label">Sub Category</label>
                                            <select class="form-control" name="sub_category" id="sub_category">
                                                <option selected disabled>Select Sub Category</option> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 mb-4 ">
                                            <label class="form-label">Select Sizes</label>
                                            <select class="form-control" name="sizes[]" id="variant_size" multiple>
                                                 @if(count($sizes) > 0)
                                                @foreach($sizes as $size)
                                                <option value="{{ $size->name }}" data-sname="{{ $size->name }}">{{ $size->name }}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div> 
                                    </div>
                                    <div class="row">
                                    <div class="variant_section mb-4">
                                        
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
                                        <div class="col-md-12 mb-4 ">
                                            <label for="shortDescription" class="form-label">Short Description</label>
                                            <textarea class="form-control" name="short_description" id="shortDescription" rows="2" placeholder="Enter short description"></textarea>
                                        </div>

                                        <div class="col-md-12 mb-4 ">
                                            <label for="description" class="form-label">Product Description</label>
                                            <textarea class="form-control" name="full_description" id="editor" rows="4" placeholder="Enter full product description"></textarea>
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
      const choicesInstances = new Map();
    $(document).ready(function() {
    let sizeSelector = new Choices("#variant_size", { removeItemButton: false });
    let colors = @json($colors);  
    // let colorChoices = '';

    $(document).on("change", "#variant_size", function () {
    let sizes = $(this).val();   
    let size = sizes[sizes.length - 1];
    let append_to_html = ''; 
    let color_options = '';
    colors.forEach((color) => {
        color_options += `<option value="${color.name}">${color.name}</option>`;
    });
    // $(".variant_section").html(""); 
    // sizes.forEach((size) => {        
    //         append_to_html = `             
    //             <div class="row variant-item" data-size="${size}">                 
    //                 <div class="col-md-12 mb-12">                     
    //                     <label for="color" class="form-label">Select Color for Size ${size}</label>                     
    //                     <select class="form-control color-selector" id="variant_color" name="variant_color_${size}[]" data-size="${size}" multiple>                         
    //                         ${color_options}                     
    //                     </select>                     
    //                     <div id="variant_color_data_${size}"></div>                     
    //                     <button type="button" class="btn btn-danger remove-variant" data-size="${size}">Remove</button>
    //                 </div>              
    //             </div>`; 
    // sizes.forEach((size) => {        
            append_to_html = `             
                <div class="row variant-item" data-size="${size}">                 
                    <div class="col-md-12 mb-12">                     
                        <label for="color" class="form-label">Select Color for Size ${size}</label>                     
                        <select class="form-control color-selector" id="variant_color" name="variant_color_${size}[]" data-size="${size}" multiple>                         
                            ${color_options}                     
                        </select>                     
                        <div id="variant_color_data_${size}"></div>                     
                        <button type="button" class="btn btn-danger remove-variant" data-size="${size}">Remove</button>
                    </div>              
                </div>`;     
            $(".variant_section").append(append_to_html);       
            let colorSelect = document.querySelector(`.color-selector[data-size="${size}"]`);        
            let choicesInstance = new Choices(colorSelect, { removeItemButton: false });    

        // Store the Choices.js instance in the map
        choicesInstances.set(size, choicesInstance);  
            // let colorSelect = document.querySelector(`.color-selector[data-size="${size}"]`);        
            //  new Choices(colorSelect, { removeItemButton: false });    
        // }); 
    });

        $(document).on("click", ".remove-variant", function () {
            let sizeToRemove = $(this).data("size"); // Get size to remove
            $(this).closest(".variant-item").remove(); // Remove the section 
            // Remove the selected item from Choices.js multi-select
            sizeSelector.removeActiveItemsByValue(sizeToRemove); 
            // Optional: If needed, remove from available options as well
            // sizeSelector.removeChoicesByValue(sizeToRemove);
        }); 

});

$(document).on("change", "#variant_color", function () {
    let colors = $(this).val(); 
    let size = $(this).data('size'); 
    let append_to_html = '';  
    colors.forEach((color) => {
        append_to_html = `
     <div class="row variant-row variant_color_item" data-color="${color}" data-size="${size}">
                        <div class="col-md-3 mb-4">
                            <label class="form-label">Color: ${color}</label> 
                        </div>
                        <div class="col-md-3 mb-4">
                            <label class="form-label">Upload Image</label>
                            <input type="file" class="form-control" name="image_${size}_${color}[]" data-size="${color}" data-color="${color}" multiple accept=".jpg, .jpeg, .png, .webp">
                        </div>
                        <div class="col-md-2 mb-4">
                            <label class="form-label">Price (₹)</label>
                            <input type="number" class="form-control" name="price_${size}_${color}" data-size="${color}" data-color="${color}" placeholder="Enter price">
                        </div>
                        <div class="col-md-2 mb-4">
                            <label class="form-label">Sale Price (₹)</label>
                            <input type="number" class="form-control" name="sale_price_${size}_${color}" data-size="${color}" data-color="${color}" placeholder="Enter Sale price">
                        </div>
                        <div class="col-md-2 mb-4">
                            <button type="button" class="btn btn-danger remove-color-variant" data-color="${color}" data-size="${size}">Remove</button>
                        </div>
                    </div>`;
                });
                $("#variant_color_data_"+size).append(append_to_html); 
        });
        
        $(document).on("click", ".remove-color-variant", function () {
    let colorToRemove = $(this).data("color");
    let size = $(this).data("size");
    console.log('colorToRemove:', colorToRemove);
    console.log('size:', size);

    // Remove the color variant row from UI
    $(this).closest(".variant_color_item").remove();

    // Retrieve the Choices.js instance from the map
    let colorSelector = choicesInstances.get(size);

    if (colorSelector) {
        // Remove the selected item from Choices.js multi-select
        colorSelector.removeActiveItemsByValue(colorToRemove);

        // Optional: If needed, remove the option from the dropdown
        // let currentChoices = colorSelector.config.choices.filter(choice => choice.value !== colorToRemove);
        // colorSelector.setChoices(currentChoices, 'value', 'label', true);
    } else {
        console.error(`Choices.js instance not found for size: ${size}`);
    }
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