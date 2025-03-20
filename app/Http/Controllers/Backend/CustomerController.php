<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        try{
            $customers = User::where('role_id', 2)->orderBy('id', 'desc')->paginate(20);
             return view('backend.customer.index', compact('customers'));
        }catch(\Exception $e){
            return "Something went wrong";
        }
    }

    public function viewCustomer($id){
        try{
            $customer = User::where('role_id', 2)->where('id', $id)->first();
             return view('backend.customer.view', compact('customer'));
        }catch(\Exception $e){
            return "Something went wrong";
        }
    }
    
    public function update(){
        try{
             return view('backend.customer.view');
        }catch(\Exception $e){
            return "Something went wrong";
        }
    }
}
