<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainCategoryController extends Controller
{
    public function index(){
        try{
            return view('backend.main_category.index');
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

    public function edit(){
        try{
            return view('backend.main_category.edit');
        }catch(\Exception $e){
            return "Something went wrong";
        }
    }
}
