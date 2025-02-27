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
}
