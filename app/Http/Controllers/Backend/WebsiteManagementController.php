<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebsiteManagementController extends Controller
{
    public function generalSetting(){
        try{
             return view('backend.website_management.general_setting');
        }catch(\Exception $e){
            return "Something went wrong";
        }
    }

    public function seoSetting(){
        try{
             return view('backend.website_management.seo_setting');
        }catch(\Exception $e){
            return "Something went wrong";
        }
    }

    public function socialMediaLink(){
        try{
             return view('backend.website_management.social_media_link');
        }catch(\Exception $e){
            return "Something went wrong";
        }
    }

    public function paymentGateway(){
        try{
             return view('backend.website_management.payment_gateway');
        }catch(\Exception $e){
            return "Something went wrong";
        }
    }
}
