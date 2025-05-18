<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\ShippingMethod;
use App\Models\Backend\Tax;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function shippingMethod(){
        try {
            $shipping_methods = ShippingMethod::get();
            return view('backend.setting.shipping_setting', compact('shipping_methods'));
        } catch (\Exception $e) {
            abort('500');
        }
    }
    public function taxMethod(){
        try {
            $taxes = Tax::get();
            return view('backend.setting.tax_setting', compact('taxes'));
        } catch (\Exception $e) {
            abort('500');
        }
    }
}
