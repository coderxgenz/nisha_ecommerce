<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Color;
use App\Models\Backend\MainCategory;
use App\Models\Backend\Product;
use App\Models\Backend\ProductImage;
use App\Models\Backend\ProductVariants;
use App\Models\Backend\Size;
use App\Models\Backend\SubCategory;
use Auth;
use Illuminate\Http\Request;
use Str;

class ProductController extends Controller
{
    public function index(){
        try{ 
            $products = Product::with(['getMainCategory:id,name',
            'getSubCategory:id,name'])->paginate(20);
             return view('backend.product.index', compact('products'));
        }catch(\Exception $e){
            return "Something went wrong";
        }
    }

    public function create(){
        try{
            $sizes = Size::where('is_active', '1')->get();
            $colors = Color::where('is_active', '1')->get();
            $main_categories = MainCategory::where('is_active', '1')->get();
            $sub_categories = SubCategory::where('is_active', '1')->get();
            return view('backend.product.create', compact('main_categories', 'sub_categories', 'sizes', 'colors'));
        }catch(\Exception $e){
            return "Something went wrong";
        }
    }
    public function edit($id){
        // try{
            $selected_size_variants = [];
            $sizes = Size::where('is_active', '1')->get();
            $colors = Color::where('is_active', '1')->get();
            $main_categories = MainCategory::where('is_active', '1')->get();
            $sub_categories = SubCategory::where('is_active', '1')->get();
            $product = Product::with([
                'getProductSizeVariants'
            ])->where('id', $id)->first();  
              
            $selected_size_variants = $product->getProductSizeVariants->unique('variant_id')->pluck('variant_id')->toArray();
            // $selected_color_variants = $product->getProductSizeVariants->unique('color_id')->pluck('color_id')->toArray();
            $already_selected_size_variants = Size::whereIn('id', $selected_size_variants)->pluck('name')->toArray();
            $selected_sub_cat_list = SubCategory::where('main_category_id', $product->main_category_id)->get(); 
            return view('backend.product.edit', compact('main_categories', 'sub_categories', 
            'sizes', 'colors', 'product', 'selected_sub_cat_list', 'selected_size_variants', 'already_selected_size_variants'));
        // }catch(\Exception $e){
        //     return "Something went wrong";
        // }
    }

    public function update(Request $request ,$id){
        try{
            $slug = empty($request->slug) ? Str::slug($request->name) : Str::slug($request->slug); 
            $product = Product::where('id', $id)->update([
                'name' => $request->name,
                'sku' => $request->sku ?? $request->name,
                'slug' => $slug,
                'main_category_id' => $request->main_category,
                'sub_category_id' => $request->sub_category, 
                'stock' => $request->stock,
                'stock_status' => $request->stock_status > 0 ? '1' : '0',
                'short_description' => $request->short_description,
                'full_description' => $request->full_description,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'meta_keywords' => $request->meta_keywords,    
                'is_featured' => $request->is_featured ?? '0',
                'is_trending' => $request->is_trending ?? '0',
                'is_todays_deal' => $request->is_todays_deal ?? '0',
                'new_arrival' => $request->new_arrival ?? '0',
                'active' => $request->status ?? '1',   
            ]); 
            if($request->has('thumbnail_images')){
                $image = $request->file('thumbnail_images'); 
                $image_name = 'product_thumbnail_' . time() . rand(1000, 9999) . '.' . $image->extension();
                $image->move(public_path('upload/images/product_thumbnails'), $image_name);
                Product::where('id', $id)->update([
                    'thumbnail_image' => 'upload/images/product_thumbnails/' . $image_name,
                ]);       
            } 

            foreach ($request->sizes as $key => $size) {
                $variantColorsKey = "variant_color_{$size}";
                $variantColors = $request->$variantColorsKey ?? [];
                $selected_size = Size::where('name', $size)->first();


                foreach ($variantColors as $color) {
                    $selected_color = Color::where('name', $color)->first();
                    $priceKey = "price_{$size}_{$color}";
                    $salePriceKey = "sale_price_{$size}_{$color}";
                    $imageKey = "image_{$size}_{$color}"; 


                    ProductVariants::updateOrCreate([
                        'product_id' => $id, 
                        'variant_id' => $selected_size->id, 
                        'color_id' => $selected_color->id, 
                        'name' => $selected_size->name,
                        'color' => $selected_color->name,
                        'price' => $request->$priceKey ?? 0,
                        'sale_price' => $request->$salePriceKey ?? 0,
                    ]);


                    if($request->has($imageKey)){
                        $images = $request->file($imageKey);
                        foreach ($images as $index => $image) {
                            $image_name = $imageKey.'_'.$index. '_' . time() . rand(1000, 9999) . '.' . $image->extension();
                            $image->move(public_path('upload/images/product_images'), $image_name);
                            ProductImage::create([
                                'product_id' => $product->id,
                                "product_variant_name" => $selected_size->name,
                                "product_variant_id" => $selected_size->id,
                                'image' => 'upload/images/product_images/' . $image_name,
                            ]);
                        }  
                    }  
                }
            } 


        }catch(\Exception $e){
            return "Something went wrong";  
        }
    }

    public function store(Request $request){
        // return $request; 
          // $validate = $request->validate([
            //     'name' => ['required'], 
            //     'main_category' => ['required'], 
            //     'sub_category' => ['required'], 
            //     'size' => ['required'], 
            //     'color' => ['required'], 
            //     'images' => ['required'], 
            //     'price' => ['required'], 
            //     'sale_price' => ['required'], 
            //     'stock' => ['required'], 
            //     'short_description' => ['required'], 
            //     'full_description' => ['required'], 
            //     'thumbnail' => ['required'], 
        // ]);
        try{ 
            $slug = empty($request->slug) ? Str::slug($request->name) : Str::slug($request->slug); 
            $product = Product::create([
                'name' => $request->name,
                'sku' => $request->sku ?? $request->name,
                'slug' => $slug,
                'main_category_id' => $request->main_category,
                'sub_category_id' => $request->sub_category, 
                'stock' => $request->stock,
                'stock_status' => $request->stock_status > 0 ? '1' : '0',
                'short_description' => $request->short_description,
                'full_description' => $request->full_description,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'meta_keywords' => $request->meta_keywords,    
                'uploaded_by' => Auth::user()->id,   
                'is_featured' => $request->is_featured ?? '0',
                'is_trending' => $request->is_trending ?? '0',
                'is_todays_deal' => $request->is_todays_deal ?? '0',
                'new_arrival' => $request->new_arrival ?? '0',
                'active' => $request->status ?? '1',   
            ]); 
            if($request->has('thumbnail_images')){
                $image = $request->file('thumbnail_images'); 
                $image_name = 'product_thumbnail_' . time() . rand(1000, 9999) . '.' . $image->extension();
                $image->move(public_path('upload/images/product_thumbnails'), $image_name);
                Product::where('id', $product->id)->update([
                    'thumbnail_image' => 'upload/images/product_thumbnails/' . $image_name,
                ]);       
            } 
            foreach ($request->sizes as $key => $size) {
                $variantColorsKey = "variant_color_{$size}";
                $variantColors = $request->$variantColorsKey ?? [];
                $selected_size = Size::where('name', $size)->first();
                foreach ($variantColors as $color) {
                    $selected_color = Color::where('name', $color)->first();
                    $priceKey = "price_{$size}_{$color}";
                    $salePriceKey = "sale_price_{$size}_{$color}";
                    $imageKey = "image_{$size}_{$color}"; 
                    ProductVariants::create([
                        'product_id' => $product->id, 
                        'variant_id' => $selected_size->id, 
                        'color_id' => $selected_color->id, 
                        'name' => $selected_size->name,
                        'color' => $selected_color->name,
                        'price' => $request->$priceKey ?? 0,
                        'sale_price' => $request->$salePriceKey ?? 0,
                    ]);
                    if($request->has($imageKey)){
                        $images = $request->file($imageKey);
                        foreach ($images as $index => $image) {
                            $image_name = $imageKey.'_'.$index. '_' . time() . rand(1000, 9999) . '.' . $image->extension();
                            $image->move(public_path('upload/images/product_images'), $image_name);
                            ProductImage::create([
                                'product_id' => $product->id,
                                "product_variant_name" => $selected_size->name,
                                "product_variant_id" => $selected_size->id,
                                'image' => 'upload/images/product_images/' . $image_name,
                            ]);
                        }  
                    }  
                }
            } 
            return redirect()->route('backend.product.index')->with('created', "Product Created Successfully");  
        }catch(\Exception $e){
            return "Something went wrong";
        }
    }

    public function productList(Request $request, $category_slug){
        try{ 
            $color = $request->color;
            $size = $request->size;
            $price = $request->price; 
            $sub_category = SubCategory::with('getMainCategory')->where('slug', $category_slug)->first();    
            $categories = MainCategory::with(['subCategories'])->where('is_active', '1')->get();
            $colors = Color::where('is_active', '1')->get();
            $sizes = Size::where('is_active', '1')->get();
            $products = Product::where('sub_category_id', $sub_category->id)->get();
            $product_list = [];
            foreach ($products as $product) {
                $product_variants = ProductVariants::where('product_id', $product->id)
                    ->get()
                    ->unique('color_id');
                foreach ($product_variants as $variant) {
                    $product_image = [];       
                            $product_images = ProductImage::select('image')
                                ->where('product_id', $product->id)
                                ->where('product_variant_id', $variant->variant_id)
                                ->get();
                     foreach($product_images as $p_image){
                        $product_image[] = $p_image->image;
                    }
                    $product_list[] = [
                        'id' => $product->id,
                        'p_name' => $product->name,
                        'price' => $variant->price,
                        'sale_price' => $variant->sale_price,
                        'color' => $variant->color,
                        'color_id' => $variant->color_id,
                        'size' => $variant->name,
                        'size_id' => $variant->variant_id,
                        'v_id' => $variant->id,
                        'product_images' => $product_image
                    ];
                }
            } 
             return view('frontend.product_list', compact('product_list', 'categories', 'category_slug', 
             'sub_category', 'colors', 'sizes'));
        }catch(\Exception $e){
            return "Something went wrong";
        }
    }
    public function productDetails($p_id, $selected_size_id, $selected_color_id){
        try{ 
            $product = Product::where('id', $p_id)->first();
            $sizes = ProductVariants::where('product_id', $p_id)
            ->get()
            ->unique('variant_id');

            $colors = ProductVariants::where('product_id', $p_id)
            ->where('variant_id', $selected_size_id)
            ->get();

            // $selected_variant_detail = ProductVariants::where('id', $selected_size_id)->first();




            // return $colors; 
             return view('frontend.product_details', compact('product', 'selected_size_id', 'selected_color_id', 'sizes', 'colors'));
        }catch(\Exception $e){
            return "Something went wrong";
        }
    }

}
