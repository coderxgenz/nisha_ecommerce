<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WishListController extends Controller
{
    public function viewWishList(){
        try{
            return view('frontend.wishlist');
        }catch(\Exception $e){
            return "Somethig went wrong";
        }
    }
}
