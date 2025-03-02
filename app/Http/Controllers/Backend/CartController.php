<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function viewCart(){
        try{
            return view('frontend.cart');
        }catch(\Exception $e){
            return "Somethig went wrong";
        }
    }
}
