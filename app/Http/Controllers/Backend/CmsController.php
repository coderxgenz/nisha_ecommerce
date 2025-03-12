<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CmsController extends Controller
{
    public function bannerMangement(){
        try{
            return view('backend.cms.banner_management');
        }catch(\Exception $e){
            return "something went wrong";
        }
    }

    public function pagesManagement(){
        try{
            return view('backend.cms.pages_management');
        }catch(\Exception $e){
            return "something went wrong";
        }
    }

    public function blogManagement(){
        try{
            return view('backend.cms.blog_management');
        }catch(\Exception $e){
            return "something went wrong";
        }
    }
}
