<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\MainCategory;
use Illuminate\Http\Request;
use Str;
use Illuminate\Validation\Rule;

class MainCategoryController extends Controller
{
    public function index(){
        try{
            $main_categories = MainCategory::paginate(20);
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
        $validator = $request->validate([
            'name' => ['required'],
            'image' => ['mimes:png,jpg,jpeg,webp']
        ]);
        try{
            $slug = empty($request->slug) ? Str::slug($request->name) : Str::slug($request->slug); 
            if (MainCategory::where('slug', $slug)->exists()) {
                return back()->withErrors(['slug' => 'This slug already exists. Please choose another.']);  
            } 
            $main_category = MainCategory::create([
                'name' => $request->name,
                'slug' =>  $slug,
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
            'slug' => ['required', Rule::unique('main_categories', 'slug')->ignore($id)],
        ]);
        try{
            $main_category = MainCategory::where('id', $id)->update([
                'name' => $request->name,
                'slug' =>  empty($request->slug) ? Str::slug($request->name) : Str::slug($request->slug),
                'order_number' => $request->order_number,
            ]);
            if($request->has('image')){
                $image = $request->file('image');
                $image_name = time().'.'.$image->extension();
                $image->move(public_path('upload/images/main_category'), $image_name);
                MainCategory::find($id)->update([
                    'image' => 'upload/images/main_category/'.$image_name,
                ]);
            }   
            return redirect()->route('backend.main_category.index')->with('updated', "Main Category Updated Successfully");
        }catch(\Exception $e){ 
            return "Something went wrong";
        }
    }   

    public function destroy($id){
        try{
            $main_category = MainCategory::find($id); 
            $main_category->delete();
            return redirect()->route('backend.main_category.index')->with('deleted', "Main Category Deleted Successfully");
        }catch(\Exception $e){
            return "Something went wrong";
        }
    }

    public function changeStatus($id){
        try{
            // $category = MainCategory::findOrFail($id);
            // $category->status = $category->status == 1 ? 0 : 1; // Toggle status
            // $category->save(); 
            // return response()->json(['success' => true, 'message' => 'Status updated successfully!']);
        }catch(\Exception $e){
            return response()->json(['success' => false, 'message' => 'Failed!']);
            
        }
   
}


}
