<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function viewDashboard(){
        try{
            return view('frontend.dashboard');
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
