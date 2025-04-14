<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        try{
            $orders = Order::with('getUser')->orderBy('id', 'desc')->paginate(20);
             return view('backend.order.index', compact('orders'));
        }catch(\Exception $e){
            return "Something went wrong";
        }
    }
    public function edit($id){
        try{
            $order = Order::with('getUser')->where('id', $id)->first();
             return view('backend.order.edit', compact('order'));
        }catch(\Exception $e){
            return "Something went wrong";
        }
    }
    public function refundAndReturn(){
        try{
             return view('backend.returns.index');
        }catch(\Exception $e){
            return "Something went wrong";
        }
    }

    public function viewOrder($id){
        try{
            $order = Order::with('getUser', 'getOrderProducts.getProduct:id,name', 'getShippingAddress', 'getBillingAddress')
            ->where('id', $id)->first();
            // return $order;
             return view('backend.order.view', compact('order'));
        }catch(\Exception $e){
            return "Something went wrong";
        }
    }

    public function placeOrder(){
        try{
             return view('backend.order.place');
        }catch(\Exception $e){
            return "Something went wrong";
        }
    }
}
