<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function viewAllOrder(){
        try{
            return view('frontend.orders');
        }catch(\Exception $e){
            return "Somethig went wrong";
        }
    }
    public function viewSingleOrder(){
        try{
            return view('frontend.view_order');
        }catch(\Exception $e){
            return "Somethig went wrong";
        }
    }
    public function viewOrderComplete(){
        try{
            return view('frontend.order_complete');
        }catch(\Exception $e){
            return "Somethig went wrong";
        }
    }
}
