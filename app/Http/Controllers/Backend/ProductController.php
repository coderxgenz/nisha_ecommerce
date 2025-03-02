<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

}
