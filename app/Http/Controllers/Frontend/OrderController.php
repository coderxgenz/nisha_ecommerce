<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Order;
use App\Models\Backend\OrderDetail;
use App\Models\Backend\ProductImage;
use App\Models\Backend\ShippingDetail;
use App\Models\Cart;
use Auth;
use Crypt;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function viewAllOrder(){
        try{
            return view('frontend.orders');
        }catch(\Exception $e){
            return "Somethig went wrong";
        }
    }
    public function viewSingleOrder($id){
        try{
            $order_id = Crypt::decrypt($id);
            $order = Order::with('getUser', 'getOrderProducts.getProduct:id,name', 'getShippingAddress', 'getBillingAddress')
            ->where('id', $order_id)->first();
             
                //  return $order;
            return view('frontend.view_order', compact('order',));
        }catch(\Exception $e){
            return "Somethig went wrong";
        }
    }
    public function viewOrderComplete(){
        try{
            return view('frontend.order_complete');
        }catch(\Exception $e){
            return "Somethig went wrong";
        }
    }

    public function placeOrder(Request $request){
        $validate = $request->validate([
            's_f_name' => ['required'],
            's_l_name' => ['required'],
            's_street_address' => ['required'],
            's_city' => ['required'],
            's_postal_code' => ['required'],
            's_phone' => ['required'],
            's_email' => ['required'],
            'payment_mode' => ['required'],
        ]);
        // try{
           $shipping_detail = ShippingDetail::create([
                'name' => $request->s_f_name.' '.$request->s_l_name, 
                'email' => $request->s_email, 
                'phone' => $request->s_phone,
                'address' => $request->s_street_address,
                'city' => $request->s_city,
                'state' => $request->s_city,
                'postal_code' => $request->s_postal_code,
                'country' => 'India',
                'is_default' => 0,
                'user_id' => Auth::user()->id
            ]);

            $lastOrder = Order::orderBy('id', 'desc')->first();
            $last_order_number = $lastOrder ? $lastOrder->order_number : 11001;
            $newOrderNumber = (int)$last_order_number ? (int)$last_order_number + 1 : 11001;

            // $order_number = \Str::random(10);
            $cart_items = Cart::where('user_id', Auth::user()->id)->get();
            $total_amount = 0;

            $new_order = Order::create([
                'user_id' => Auth::user()->id,
                'order_number' => $newOrderNumber,
                'billing_address_id' => NULL,
                'shipping_address_id' => $shipping_detail->id,
                'tax' => NULL,
                'discount' => NULL,
                'shipping_charge' => 0,
                'total_amount' => 0,
                'order_date' => Carbon::now(),
                'delivery_status' => 'not_completed',
            ]);
            foreach($cart_items as $item){
                $total_price = (int)$item->quantity * (float)$item->price;  
                $total_amount += $total_price;
                $order_item = OrderDetail::create([
                    'order_id' => $new_order->id,
                    'product_id' => $item->product_id,
                    'size_id' => $item->size_id,
                    'color_id' => $item->color_id,
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                    'total_amount' => $total_price,
                    'product_variant_id' => $item->product_variant_id,
                    'product_image_id' => $item->product_image_id, 
                ]);
            }
            if($request->payment_mode == 'cash_on_delivery'){
                $new_order->update([
                    'payment_mode' => 'cash_on_delivery',
                    'payment_status' => 'unpaid',
                    'delivery_status' => 'ordered',
                    'total_amount' => $total_amount,
                ]);
            }else{
                $new_order->update([
                    'payment_mode' => 'online',
                    'payment_status' => 'paid',
                    'delivery_status' => 'ordered',
                    'total_amount' => $total_amount,
                ]);
            }
            $order_items = OrderDetail::with('getProduct')->where('order_id', $new_order->id)->get();
            Cart::where('user_id', Auth::user()->id)->delete();  
            return view('frontend.order_complete', compact('new_order', 'order_items'));
        // }catch(\Exception $e){
        //     return "Somethig went wrong";
        // }
    }
}
