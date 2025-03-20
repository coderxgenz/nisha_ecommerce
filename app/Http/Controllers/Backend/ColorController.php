<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        try{ 
            $colors = Color::orderBy('id', 'desc')->paginate(20);
            return view('backend.color.index',compact('colors'));
        }catch(\Exception $e){
         return "Something Went Wrong";
        }
    }

    public function create()
    {
        try{ 
            return view('backend.color.create');
        }catch(\Exception $e){
         return "Something Went Wrong";
        }
    }
    public function edit($id)
    {
        try{ 
            $color = Color::where('id', $id)->first();
            return view('backend.color.edit', compact('color'));
        }catch(\Exception $e){
         return "Something Went Wrong";
        }
    }

    public function store(Request $request){
        $validate = $request->validate([
            'name' => 'required',
            'color_code' => 'required',
        ]);
        try{
            Color::create([
                'name' => $request->name,
                'color_code' => $request->color_code,
                'order_number' => $request->order_number, 
            ]);
            return redirect()->route('backend.color.index')->with('created', "Color Created Successfully");
         }catch(\Exception $e){
            return "Something Went Wrong";
        }
    }
    public function update(Request $request, $id){
        $validate = $request->validate([
            'name' => 'required',
            'color_code' => 'required',
        ]);
        try{
            Color::where('id', $id)->update([
                'name' => $request->name,
                'color_code' => $request->color_code,
                'order_number' => $request->order_number, 
            ]);
            return redirect()->route('backend.color.index')->with('updated', "Color Updated Successfully");
        }catch(\Exception $e){
            return "Something Went Wrong";
        }
    }

    public function updateStatus(Request $request){
        try{
            $id = $request->id;
            $status = $request->status;
            Color::where('id', $id)->update([
                'is_active' => $status
            ]); 
            return response()->json([
                'status' => 200,
                'message' => "success"
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'status' => "failed",
                'error' => $e->getMessage()
            ], 400);
        }  
    }
}
