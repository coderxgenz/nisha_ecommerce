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
                                                <div class="row variant-item" data-size="{{ $size_detail->name }}">

                                                    <div class="col-md-11">
                                                        <label for="color" class="form-label">Select Color for Size {{ $size_detail->name }}</label>
                                                        <select class="form-control color-selector" id="variant_color" name="variant_color_{{ $size_detail->name }}[]" data-size="{{ $size_detail->name }}" multiple>
                                                            @if(count($colors) > 0)
                                                            @foreach($colors as $color)
                                                            <option value="{{ $color->name }}" {{ in_array($color->id, $selected_color_variants) ? "selected":"" }}>{{ $color->name }}</option>
                                                            @endforeach
                                                            @endif
                                                        </select>
                                                        </div>
                                                        <div class="col-md-1">  
                                                        <br>                 
                                                        <button type="button" class="btn btn-danger remove-variant" data-size="{{ $size_detail->name }}"><i class="fas fa-trash"></i></button>
                                                        </div>
                                                        <div class="col-md-12 mb-12">
                                            <div id="variant_color_data_{{ $size_detail->name }}">
                                                @foreach($selected_color_variants as $color)
                                                @php 
                                                $color_detail = App\Models\Backend\Color::where('id', $color)->first();
                                                $product_variant_detail = App\Models\Backend\ProductVariants::where('product_id', $product->id)
                                                ->where('variant_id', $size_detail->id) 
                                                ->where('color_id', $color_detail->id)
                                                ->first();
                                                $selcted_product_images = App\Models\Backend\ProductImage::where('product_id', $product->id)
                                                ->where('product_variant_id', $product_variant_detail->id) 
                                                ->get();
                                                 
                                                @endphp
                                                <div class="row variant-row variant-row variant_color_item" data-color="{{ $color_detail->name }}" data-size="{{ $size_detail->name }}">
                                                    <div class="col-md-1">
                                                        <label class="form-label">Color</label> 
                                                        <p>{{ $color_detail->name }}</p>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="form-label">Upload Image</label>
                                                        <input type="file" class="form-control image-input" name="image_{{ $size_detail->name }}_{{ $color_detail->name }}[]" data-size="{{ $size_detail->name }}" data-color="{{ $color_detail->name }}" multiple accept=".jpg, .jpeg, .png, .webp">
                                                        <div class="image-preview mt-2" data-size="{{ $size_detail->name }}" data-color="{{ $color_detail->name }}">
                                                            @foreach($selcted_product_images as $image) 

                                                        <div class="preview-item" style="display:inline-block; position:relative; margin:5px;">

                                                            <img src="{{ url($image->image) }}" style="width:80px; height:80px; border-radius:5px; object-fit:cover;" alt="Image Preview">
                                                            <span style="position:absolute; top:2px; right:5px; background:rgba(0,0,0,0.7); color:#fff; border-radius:50%;
                                                            width:18px; height:18px; display:flex; align-item:center; cursor:pointer; font-size:14px;">&times</span>
                                                    </div>
                                                    @endforeach    

                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label class="form-label">Stock</label>
                                                        <input type="number" class="form-control" name="stock_{{ $size_detail->name }}_{{ $color_detail->name }}" data-size="{{ $color_detail->name }}" data-color="{{ $color_detail->name }}" placeholder="Enter Stock">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">Price (₹)</label>
                                                        <input type="number" value="{{ $product_variant_detail->price ?? '' }}" class="form-control" name="price_{{ $size_detail->name }}_{{ $color_detail->name }}" data-size="{{ $color_detail->name }}" data-color="{{ $color_detail->name }}" placeholder="Enter price">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label">Sale Price (₹)</label>
                                                        <input type="number" value="{{ $product_variant_detail->sale_price ?? '' }}" class="form-control" name="sale_price_{{ $size_detail->name }}_{{ $color_detail->name }}" data-size="{{ $color_detail->name }}" data-color="{{ $color_detail->name }}" placeholder="Enter Sale price">
                                                    </div>
                                                    <div class="col-md-1">
                                                        <br>
                                                        <button type="button" class="btn btn-danger remove-color-variant" data-color="{{ $color_detail->name }}" data-size="{{ $size_detail->name }}"><i class="fas fa-trash"></i></button>
                                                    </div>
                                                </div>
                                                <hr> 
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
    const choicesInstances = new Map();
    let selectedFilesMap = {}; // Object to store files for each input field
    document.addEventListener("DOMContentLoaded", function (){
        document.body.addEventListener('change', function (event){ 
        if(event.target.classList.contains('image-input')){
            let input = event.target;
            let size = input.dataset.size;
            let color = input.dataset.color;
            console.log(size, color);   
            let previewContainer = document.querySelector(`.image-preview[data-size="${size}"][data-color="${color}"]`);
            // Ensure unique storage for each input field
            if (!selectedFilesMap[size]) selectedFilesMap[size] = {};
            if (!selectedFilesMap[size][color]) selectedFilesMap[size][color] = [];
            let fileList = selectedFilesMap[size][color];
            // Store new images while keeping existing ones
            Array.from(input.files).forEach(file => {
                if (file.type.startsWith('image/')) {
                    fileList.push(file); // Add to array
                    let reader = new FileReader();
                    reader.onload = function (e) {
                        let previewWrapper = document.createElement('div');
                        previewWrapper.classList.add("preview-item");
                        previewWrapper.style.display = 'inline-block';
                        previewWrapper.style.position = 'relative';
                        previewWrapper.style.margin = '5px';
                        let img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.width = '80px';
                        img.style.height = '80px';
                        img.style.borderRadius = '5px';
                        img.style.objectFit = 'cover';
                        // Close button to remove image
                        let closeBtn = document.createElement('span');
                        closeBtn.innerHTML = '&times;';
                        closeBtn.style.position = 'absolute';
                        closeBtn.style.top = '2px';
                        closeBtn.style.right = '5px';
                        closeBtn.style.background = 'rgba(0,0,0,0.7)';
                        closeBtn.style.color = '#fff';
                        closeBtn.style.borderRadius = '50%';
                        closeBtn.style.width = '18px';
                        closeBtn.style.height = '18px';
                        closeBtn.style.display = 'flex';
                        closeBtn.style.alignItems = 'center';
                        closeBtn.style.justifyContent = 'center';
                        closeBtn.style.cursor = 'pointer';
                        closeBtn.style.fontSize = '14px';
                        // Remove image event
                        closeBtn.addEventListener('click', function () {
                            let indexToRemove = fileList.indexOf(file);
                            if (indexToRemove > -1) {
                                fileList.splice(indexToRemove, 1); // Remove from array
                                updateFileInput(input, fileList);
                            }
                            previewWrapper.remove();
                        });
                        previewWrapper.appendChild(img);
                        previewWrapper.appendChild(closeBtn);
                        previewContainer.appendChild(previewWrapper);
                    };
                    reader.readAsDataURL(file);
                }
            });
            updateFileInput(input, fileList);
        }
    });
    // Function to update the input field with selected images
    function updateFileInput(input, fileList) {
        let dataTransfer = new DataTransfer(); // Create a new file list
        fileList.forEach(file => dataTransfer.items.add(file));
        input.files = dataTransfer.files; // Assign updated file list to input
    }
    // Reset the selected files when an input field is removed and re-added
    document.body.addEventListener('click', function (event) {
        if (event.target.classList.contains('remove-input')) {
            let inputField = event.target.closest('.variant-row');
            let input = inputField.querySelector('.image-input');
            if (input) {
                let size = input.dataset.size;
                let color = input.dataset.color;
                // Clear stored images for this specific input field
                if (selectedFilesMap[size] && selectedFilesMap[size][color]) {
                    delete selectedFilesMap[size][color];
                }
                // Reset input field value
                input.value = "";
            }
            // Remove input field from DOM
            inputField.remove();
        }
    });
});
    // Reset image storage when adding a new input field
    function resetImageStorage(size, color) {
        if(selectedFilesMap[size] && selectedFilesMap[size][color]){
            selectedFilesMap[size][color] = [];
        }
    }
    function resetImageFromSizeStorage(size) {
        if(selectedFilesMap[size]){
            selectedFilesMap[size] = [];
        }
    }
</script>
<script>
    
     $(document).on("click", ".remove-color-variant", function () {
            let colorToRemove = $(this).data("color");
            let size = $(this).data("size");
            let image_inpute_field = document.querySelector(`.image-input[data-size="${size}"][data-color="${colorToRemove}"]`);
            resetImageStorage(size, colorToRemove);
            image_inpute_field.value = '';
            $(this).closest(".variant_color_item").remove(); 
            // let colorSelector = document.querySelector(`.color-selector[data-size="${size}"]`);
            let colorSelector = choicesInstances.get(size);
            if (colorSelector) { 
                colorSelector.removeActiveItemsByValue(colorToRemove); 
            } else {
                console.error(`Choices.js instance not found for size: ${size}`);
            }
        });

       
</script>


  <script>
      let sizeSelector = new Choices("#variant_size", { removeItemButton: false }); 
    $(document).ready(function() {
    let colors = @json($colors);    
    let already_selected_size_variants = @json($already_selected_size_variants); 
    document.querySelectorAll(".color-selector").forEach((el) => {
        const size = el.getAttribute("data-size");
    const instance = new Choices(el, { removeItemButton: false });
    choicesInstances.set(size, instance);
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
    console.log(missingSizes);
    already_selected_size_variants = sizes;
    // $(".variant_section").html(""); 
    if(missingSizes.length === 0){
        append_to_html = ` 
        <div class="row variant-item" data-size="${sizes}">                 
                    <div class="col-md-11">                     
                        <label for="color" class="form-label">Select Color for Size ${sizes}</label>                     
                        <select class="form-control color-selector" id="variant_color" name="variant_color_${sizes}[]" data-size="${sizes}" multiple>                         
                            ${color_options}                     
                        </select>   
                        </div>
                         <div class="col-md-1">  
                         <br>                 
                        <button type="button" class="btn btn-danger remove-variant" data-size="${sizes}"><i class="fas fa-trash"></i></button>
                        </div> 
                        <div class="col-md-12 mb-12">
                        <div id="variant_color_data_${sizes}"></div>                     
                     </div>             
                </div>`;  
 
            $(".variant_section").append(append_to_html);
            // Initialize Choices.js for the new select
            let colorSelect = document.querySelector(`.color-selector[data-size="${sizes}"]`);
            if (colorSelect) {
                new Choices(colorSelect, { removeItemButton: false });
            }
    }else{

    
    missingSizes.forEach((size) => {
        append_to_html = ` 
        <div class="row variant-item" data-size="${size}">                 
                    <div class="col-md-11">                     
                        <label for="color" class="form-label">Select Color for Size ${size}</label>                     
                        <select class="form-control color-selector" id="variant_color" name="variant_color_${size}[]" data-size="${size}" multiple>                         
                            ${color_options}                     
                        </select>   
                        </div>
                         <div class="col-md-1">  
                         <br>                 
                        <button type="button" class="btn btn-danger remove-variant" data-size="${size}"><i class="fas fa-trash"></i></button>
                        </div> 
                        <div class="col-md-12 mb-12">
                        <div id="variant_color_data_${size}"></div>                     
                     </div>             
                </div>`;  
 
            $(".variant_section").append(append_to_html);
            // Initialize Choices.js for the new select
            let colorSelect = document.querySelector(`.color-selector[data-size="${size}"]`);
            if (colorSelect) {
                new Choices(colorSelect, { removeItemButton: false });
            }
        });
    }
    }); 
});

    $(document).on("change", "#variant_color", function () { 
        let colors = $(this).val(); 
        let size = $(this).data('size'); 
        let append_to_html = '';  
        colors.forEach((color) => {
            append_to_html = `
            <div class="row variant-row variant_color_item" data-color="${color}" data-size="${size}">
                <div class="col-md-1">
                    <label class="form-label">Color</label> 
                    <p>${color}</p>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Upload Image</label>
                    <input type="file" class="form-control image-input" name="image_${size}_${color}[]" data-size="${size}" data-color="${color}" multiple accept=".jpg, .jpeg, .png, .webp">
                    <div class="image-preview mt-2" data-size="${size}" data-color="${color}"></div>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Stock</label>
                    <input type="number" class="form-control" name="stock_${size}_${color}" data-size="${color}" data-color="${color}" placeholder="Enter Stock">
                </div>
                <div class="col-md-2">
                    <label class="form-label">Price (₹)</label>
                    <input type="number" class="form-control" name="price_${size}_${color}" data-size="${color}" data-color="${color}" placeholder="Enter price">
                </div>
                <div class="col-md-2">
                    <label class="form-label">Sale Price (₹)</label>
                    <input type="number" class="form-control" name="sale_price_${size}_${color}" data-size="${color}" data-color="${color}" placeholder="Enter Sale price">
                </div>
                <div class="col-md-1">
                    <br>
                    <button type="button" class="btn btn-danger remove-color-variant" data-color="${color}" data-size="${size}"><i class="fas fa-trash"></i></button>
                </div>
            </div>
            <hr>`;
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
         $(document).on("click", ".remove-variant", function () {
            let sizeToRemove = $(this).data("size"); // Get size to remove
            $(this).closest(".variant-item").remove(); // Remove the section 
            // Remove the selected item from Choices.js multi-select
            sizeSelector.removeActiveItemsByValue(sizeToRemove); 
            resetImageFromSizeStorage(sizeToRemove);
            // Optional: If needed, remove from available options as well
            // sizeSelector.removeChoicesByValue(sizeToRemove);
        }); 
    </script>

    <script> 
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error('Error initializing CKEditor:', error);
            });
    </script>

 
 

@endsection
@endsection