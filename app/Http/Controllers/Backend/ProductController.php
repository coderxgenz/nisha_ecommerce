<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Product;
use Auth;
use Illuminate\Http\Request;
use Str;

class ProductController extends Controller
{
    public function index(){
        try{
             return view('backend.product.index');
        }catch(\Exception $e){
            return "Something went wrong";
        }
    }

    public function create(){
        try{
            return view('backend.product.create');
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
            Product::create([
                'name' => $request->name,
                'sku' => $request->sku ?? $request->name,
                'slug' => $slug,
                'main_category_id' => $request->main_category,
                'sub_category_id' => $request->sub_category, 
                'stock' => $request->stock,
                'stock_status' => $request->stock > 0 ? '1' : '0',
                'short_description' => $request->short_description,
                'full_description' => $request->full_description,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'meta_keywords' => $request->meta_keywords,
                'thumbnail_images' => $request->thumbnail_images,   
                'uploaded_by' => Auth::user()->id,   
                'is_featured' => $request->is_featured ?? '0',
                'is_trending' => $request->is_trending ?? '0',
                'is_todays_deal' => $request->is_todays_deal ?? '0',
                'new_arrival' => $request->new_arrival ?? '0',
                'active' => $request->status ?? '1',   
            ]);
            return view('backend.product.index')->with('created', "Product Created Successfully");  
        }catch(\Exception $e){
            return "Something went wrong";
        }
    }

}
