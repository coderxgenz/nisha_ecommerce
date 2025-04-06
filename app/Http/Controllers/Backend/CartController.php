<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Auth;
use Illuminate\Http\Request;
use Session;
use function Termwind\render;

class CartController extends Controller
{
    public function viewCart(){
        try{
            return view('frontend.cart');
        }catch(\Exception $e){
            return "Somethig went wrong";
        }
    }

    public function addToCart(Request $request){
        // return $request;
        try{
            $user_id = NULL;
            $temp_user_id = NULL;
            if(Auth::check()){
                $user_id = Auth::user()->id; 
            }else{ 
                if(!Session::has('temp_user_id')) {
                    $temp_user_id = bin2hex(random_bytes(10)); 
                    Session::put('temp_user_id', $temp_user_id);
                }else{
                    $temp_user_id = Session::get('temp_user_id');
                }
            }
            $quantity = (int) $request->product_quantity;
            $price = (float) $request->product_sale_price ?? (float) $request->product_price; 
            $total_price = $quantity * $price; 

            $product_id = $request->product_id;
            $product_name = $request->product_name;
            $product_size_id = $request->product_size_id;
            $product_color_id = $request->product_color_id;
            $product_quantity = $quantity;
            $product_price = $price;
            $product_sale_price = $request->product_sale_price; 
            $product_variant_id = $request->product_variant_id;
            $product_image_id = $request->product_image_id;

            Cart::create([ 
                "user_id" => $user_id,
                "temp_id" => $temp_user_id,
                "product_id" => $product_id,
                "product_name" => $product_name,
                "size" => $product_size_id,
                "color" => $product_color_id,
                "quantity" => $product_quantity,
                "price" => $product_price,
                "sale_price" => $product_sale_price,
                "total_amount" => (int)$product_quantity * (float)$total_price,
                "size_id" => $product_size_id,
                "color_id" => $product_color_id,
                "product_variant_id" => $product_variant_id,
                "product_image_id" => $product_image_id, 
            ]);
            $cart = Cart::where('temp_id', $temp_user_id)->orWhere('user_id', $user_id)->get();
            $cart_count = Cart::where('temp_id', $temp_user_id)->orWhere('user_id', $user_id)->count();
            
            return array( 
                'drawer_cart' => view('frontend.drawer_cart')->render(),
             );
        }catch(\Exception $e){
            return "Somethig went wrong";
        }
    }
}
