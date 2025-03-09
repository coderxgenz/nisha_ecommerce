<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index()
    {
        try{ 
            $sizes = Size::paginate(20);
            return view('backend.size.index', compact('sizes'));
        }catch(\Exception $e){
         return "Something Went Wrong";
        }
    }

    public function create()
    {
        try{ 
            return view('backend.size.create');
        }catch(\Exception $e){
         return "Something Went Wrong";
        }
    }
    public function edit()
    {
        try{ 
            return view('backend.size.edit');
        }catch(\Exception $e){
         return "Something Went Wrong";
        }
    }

    public function store(Request $request){
        $validate = $request->validate([
            'name' => 'required',
        ]);
        try{
            Size::create([
                'name' => $request->name,
                'order_number' => $request->order_number, 
            ]);
            return redirect()->route('backend.size.index')->with('created', "Size Created Successfully");
        }catch(\Exception $e){
            return "Something Went Wrong";
        }
    }
    public function update(Request $request){
        try{
            return redirect()->route('backend.size.index');
        }catch(\Exception $e){
            return "Something Went Wrong";
        }
    }
}
