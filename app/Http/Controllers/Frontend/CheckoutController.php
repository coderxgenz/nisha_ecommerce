<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function viewCheckout(){
        try{
            return view('frontend.checkout');
        }catch(\Exception $e){
            return "Somethig went wrong";
        }
    }
}
