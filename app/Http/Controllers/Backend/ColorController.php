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
            $colors = Color::paginate(20);
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
    public function edit()
    {
        try{ 
            return view('backend.color.edit');
        }catch(\Exception $e){
         return "Something Went Wrong";
        }
    }

    public function store(Request $request){
        $validate = $request->validate([
            'name' => 'required',
        ]);
        try{
            Color::create([
                'name' => $request->name,
                'order_number' => $request->order_number, 
            ]);
            return redirect()->route('backend.color.index')->with('created', "Color Created Successfully");
         }catch(\Exception $e){
            return "Something Went Wrong";
        }
    }
    public function update(Request $request){
        try{
            return redirect()->route('backend.color.index');
        }catch(\Exception $e){
            return "Something Went Wrong";
        }
    }
}
