<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        try{
            return view('frontend.home');

        }catch(\Exception $e){
            return "something went wrong";

        }
    }
}
