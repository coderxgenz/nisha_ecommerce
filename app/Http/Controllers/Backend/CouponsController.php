<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CouponsController extends Controller
{
    public function index(){
        try{
             return view('backend.coupons.index');
        }catch(\Exception $e){
            return "Something went wrong";
        }
    }
    public function create(){
        try{
             return view('backend.coupons.create');
        }catch(\Exception $e){
            return "Something went wrong";
        }
    }
}
