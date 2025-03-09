<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        try{
             return view('backend.customer.index');
        }catch(\Exception $e){
            return "Something went wrong";
        }
    }

    public function viewCustomer(){
        try{
             return view('backend.customer.view');
        }catch(\Exception $e){
            return "Something went wrong";
        }
    }
}
