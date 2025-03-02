<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\MainCategory;
use App\Models\Backend\SubCategory;
use Illuminate\Http\Request;
use Str;
use Illuminate\Validation\Rule;

class SubCategoryController extends Controller
{
    public function index(){
        try{
            $sub_categories = SubCategory::with('getMainCategory')->paginate(20);
            return view('backend.sub_category.index', compact('sub_categories'));
        }catch(\Exception $e){
            return "Something went wrong";
        }
    }

    public function create(){
        try{
            $main_categories = MainCategory::where('is_active', 1)->get();
            return view('backend.sub_category.create', compact('main_categories'));
        }catch(\Exception $e){
            return "Something went wrong";
        }
    }

    public function edit($id){
        try{
            $sub_category = SubCategory::with('getMainCategory')->where('id', $id)->first();
            $main_categories = MainCategory::where('is_active', 1)->get();
            return view('backend.sub_category.edit', compact('sub_category', 'main_categories'));
        }catch(\Exception $e){
            return "Something went wrong";
        }
    }

    public function store(Request $request){
        $validator = $request->validate([
            'name' => ['required'],
            'image' => ['mimes:png,jpg,jpeg,webp'],
            'main_category' => ['required']
        ]);
        try{
            $slug = empty($request->slug) ? Str::slug($request->name) : Str::slug($request->slug); 
            if (SubCategory::where('slug', $slug)->exists()) {
                return back()->withErrors(['slug' => 'This slug already exists. Please choose another.']);  
            } 
            $sub_category = SubCategory::create([
                'name' => $request->name,
                'slug' =>  $slug,
                'main_category_id' => $request->main_category,  
                'order_number' => $request->order_number,
            ]);
            if($request->has('image')){
                $image = $request->file('image');
                $image_name = time().'.'.$image->extension();
                $image->move(public_path('upload/images/sub_category'), $image_name);
                SubCategory::find($sub_category->id)->update([
                    'image' => 'upload/images/main_category/'.$image_name,
                ]);
            }   
            return redirect()->route('backend.sub_category.index')->with('created', "Sub Category Created Successfully");
        }catch(\Exception $e){ 
            return "Something went wrong";
        }
    }

    public function destroy($id){
        try{
            $main_category = SubCategory::find($id); 
            $main_category->delete();
            return redirect()->route('backend.sub_category.index')->with('deleted', "Sub Category Deleted Successfully");
        }catch(\Exception $e){
            return "Something went wrong";
        }
    }

    public function update(Request $request, $id){
        $validate = $request->validate([
            'name' => ['required'],
            'image' => ['mimes:png,jpg,jpeg,webp'],
            'slug' => ['required', Rule::unique('sub_categories', 'slug')->ignore($id)],
        ]);
        try{
            $sub_category = SubCategory::where('id', $id)->update([
                'name' => $request->name,
                'slug' =>  empty($request->slug) ? Str::slug($request->name) : Str::slug($request->slug),
                'main_category_id' => $request->main_category,
                'order_number' => $request->order_number,
            ]);
            if($request->has('image')){
                $image = $request->file('image');
                $image_name = time().'.'.$image->extension();
                $image->move(public_path('upload/images/sub_category'), $image_name);
                SubCategory::find($id)->update([
                    'image' => 'upload/images/sub_category/'.$image_name,
                ]);
            }   
            return redirect()->route('backend.main_category.index')->with('updated', "Sub Category Updated Successfully");
        }catch(\Exception $e){ 
            return "Something went wrong";
        }
    }   


}
