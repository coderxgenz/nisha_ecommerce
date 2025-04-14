<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Order;
use App\Models\Backend\ProductImage;
use App\Models\Cart;
use Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function viewDashboard(){
        try{
            $total_product_in_cart = Cart::where('user_id', Auth::user()->id)->count();
            $total_order = Order::where('user_id', Auth::user()->id)->count();
            $orders = Order::with('getOrderProducts')->where('user_id', Auth::user()->id)->orderBY('id', 'desc')->get();
             
            return view('frontend.dashboard', compact('total_product_in_cart', 'total_order', 'orders'));
        }catch(\Exception $e){
            return "Somethig went wrong";
        }
    }

    public function viewProfile(){
        try{
            return view('frontend.profile');
        }catch(\Exception $e){
            return "Somethig went wrong";
        }
    }
}
