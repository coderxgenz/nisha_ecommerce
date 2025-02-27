<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthencationController extends Controller
{
    public function adminLogin(){
        try{
            return view('auth.backend.login');
        }catch(\Exception $e){
            return "Something went wrong.";
        }
    }

    public function adminDashboard(){
        try{
            return view('backend.dashboard.admin_dashboard');
        }catch(\Exception $e){
            return "Something went wrong.";
        }
    }
}
