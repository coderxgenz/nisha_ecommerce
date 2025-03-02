<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\MainCategory;
use Illuminate\Http\Request;
use Str;

class MainCategoryController extends Controller
{
    public function index(){
        try{
            $main_categories = MainCategory::all();
            return view('backend.main_category.index', compact('main_categories'));
        }catch(\Exception $e){
            return "Something went wrong";
        }
    }

    public function create(){
        try{
            return view('backend.main_category.create');
        }catch(\Exception $e){
            return "Something went wrong";
        }
    }

    public function edit($id){
        try{
            $main_category = MainCategory::find($id);
            return view('backend.main_category.edit', compact('main_category'));
        }catch(\Exception $e){
            return "Something went wrong";
        }
    }

    public function store(Request $request){
        $validate = $request->validate([
            'name' => ['required'],
            'image' => ['mimes:png,jpg,jpeg,webp'],
        ]);
        try{
            $main_category = MainCategory::create([
                'name' => $request->name,
                'slug' =>  empty($request->slug) ? Str::slug($request->name) : Str::slug($request->slug),
                'order_number' => $request->order_number,
            ]);
            if($request->has('image')){
                $image = $request->file('image');
                $image_name = time().'.'.$image->extension();
                $image->move(public_path('upload/images/main_category'), $image_name);
                MainCategory::find($main_category->id)->update([
                    'image' => 'upload/images/main_category/'.$image_name,
                ]);
            }   
            return redirect()->route('backend.main_category.index')->with('created', "Main Category Created Successfully");
        }catch(\Exception $e){ 
            return "Something went wrong";
        }
    }   
    public function update(Request $request, $id){
        $validate = $request->validate([
            'name' => ['required'],
            'image' => ['mimes:png,jpg,jpeg,webp'],
        ]);
        try{
            $main_category = MainCategory::create([
                'name' => $request->name,
                'slug' =>  empty($request->slug) ? Str::slug($request->name) : Str::slug($request->slug),
                'order_number' => $request->order_number,
            ]);
            if($request->has('image')){
                $image = $request->file('image');
                $image_name = time().'.'.$image->extension();
                $image->move(public_path('upload/images/main_category'), $image_name);
                MainCategory::find($main_category->id)->update([
                    'image' => 'upload/images/main_category/'.$image_name,
                ]);
            }   
            return redirect()->route('backend.main_category.index')->with('created', "Main Category Created Successfully");
        }catch(\Exception $e){ 
            return "Something went wrong";
        }
    }   


}
