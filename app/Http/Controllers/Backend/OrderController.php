<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        try{
             return view('backend.order.index');
        }catch(\Exception $e){
            return "Something went wrong";
        }
    }

    public function viewOrder(){
        try{
             return view('backend.order.view');
        }catch(\Exception $e){
            return "Something went wrong";
        }
    }
}
