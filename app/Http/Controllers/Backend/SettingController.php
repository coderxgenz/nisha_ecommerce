<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function shippingMethod(){
        try {
            return view('backend.setting.shipping_setting');
        } catch (\Exception $e) {
            abort('500');
        }
    }
    public function taxMethod(){
        try {
            return view('backend.setting.tax_setting');
        } catch (\Exception $e) {
            abort('500');
        }
    }
}
