<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Product;
use App\Models\Backend\ProductVariants;
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
            $product_detail = Product::where('id', $product_id)->first();
         $new_added_item = Cart::create([ 
                "user_id" => $user_id,
                "temp_id" => $temp_user_id,
                "product_id" => $product_id,
                "product_name" => $product_name,
                "size" => $product_size_id,
                "color" => $product_color_id,
                "quantity" => $product_quantity,
                "price" => $product_price,
                "sale_price" => $product_sale_price,
                "total_amount" => (float)$total_price,
                "size_id" => $product_size_id,
                "color_id" => $product_color_id,
                "product_variant_id" => $product_variant_id,
                "product_image_id" => $product_image_id, 
            ]);
            $cart = Cart::where('temp_id', $temp_user_id)->orWhere('user_id', $user_id)->get();
            $cart_count = Cart::where('temp_id', $temp_user_id)->orWhere('user_id', $user_id)->count();
            
            return array( 
                'drawer_cart' => view('frontend.drawer_cart')->render(),
                'new_added_item' => $new_added_item
             );
        }catch(\Exception $e){
            return "Somethig went wrong";
        }
    }

    public function updateProductQuantity(Request $request){
        try{
            $product_id = (int)$request->product_id;
            $size_id = (int)$request->product_size_id;
            $color_id = (int)$request->product_color_id;
            $product_quantity = (int)$request->product_quantity;
            $user_column = '';
            $user_id = '';
            $check_stock = ProductVariants::where('product_id', $product_id)
            ->where('variant_id', $size_id)
            ->where('color_id', $color_id)
            ->where('stock', '>=', $product_quantity)->exists();
            if(!$check_stock){
                return response()->json([
                    "status" => "failed",
                    "message" => "product_quantity_exceeded", 
                ], 200);
            }   
            if(Auth::check()){
                $user_column = 'user_id';
                $user_id = Auth::user()->id;
            }else{
                $user_column = 'temp_id';
                $user_id = Session::get('temp_user_id');
            }
             
                $cart = Cart::where($user_column, $user_id)
                ->where('product_id', $product_id)
                ->where('size_id', $size_id)
                ->where('color_id', $color_id)->first(); 
                if($cart){
                    $total_price = (int)$product_quantity * (float)$cart->price;
                    $cart = Cart::where('id', $cart->id)->update([
                        'quantity' => $product_quantity,
                        'total_amount' => $total_price
                    ]);
 
                    $cart_total = Cart::where($user_column, $user_id)->sum('total_amount');
                
                    $total_price = number_format($total_price, 2);
                    $cart_total = number_format($cart_total, 2); 
                    
                    return response()->json([
                        "status" => "success",
                        "message" => "quantity_increased", 
                        "total_price" => $total_price,
                        "cart_total" => $cart_total,
                    ], 200);
                }else{
                    return response()->json([
                        "status" => "success",
                        "message" => "product_not_in_cart", 
                    ], 200);
                }

             
           
        }catch(\Exception $e){
            return response()->json([
                "status" => "failed",
                "error" => $e->getMessage()
            ], 500);
        }
    }

 
    public function removeItemFromCart(Request $request){
        try{ 
            $item_id = $request->item_id; 
            $user_column = '';
            $user_id = '';
            if(Auth::check()){
                $user_column = 'user_id';
                $user_id = Auth::user()->id;
            }else{
                $user_column = 'temp_id';
                $user_id = Session::get('temp_user_id');
            }
            Cart::where('id', $item_id)->delete();
            $cart = Cart::where($user_column, $user_id)->get();
            if($cart){
                $cart_total = Cart::where($user_column, $user_id)->sum('total_amount'); 
                $cart_total = number_format($cart_total, 2); 
                return response()->json([
                    "status" => "success",
                    "message" => "item_removed_from_cart", 
                    "cart_total" => $cart_total,
                ], 200);
            }else{
                return response()->json([
                    "status" => "success",
                    "message" => "cart_empty", 
                ], 200);
            }
          
            

           
        }catch(\Exception $e){
            return response()->json([
                "status" => "failed",
                "error" => $e->getMessage()
            ], 500);
        }
    }
}
