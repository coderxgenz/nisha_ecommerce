<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index(){
        try{
            return view('backend.sub_category.index');
        }catch(\Exception $e){
            return "Something went wrong";
        }
    }

    public function create(){
        try{
            return view('backend.sub_category.create');
        }catch(\Exception $e){
            return "Something went wrong";
        }
    }

    public function edit(){
        try{
            return view('backend.sub_category.edit');
        }catch(\Exception $e){
            return "Something went wrong";
        }
    }
}
