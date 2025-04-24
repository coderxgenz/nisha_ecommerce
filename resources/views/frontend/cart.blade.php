@extends('layouts/frontend/main')
@section('main-section')
@php
use App\Models\Cart;
  if(Auth::check()){
    $user_id = Auth::user()->id; 
    $cart = Cart::with(['getProductImages', 'getSize'])->where('user_id', $user_id)->get();
  }else{
    if(!Session::has('temp_user_id')) {
      $temp_user_id = bin2hex(random_bytes(10)); 
      Session::put('temp_user_id', $temp_user_id);
    }else{
      $temp_user_id = Session::get('temp_user_id');
    }
    $cart = Cart::with(['getSize'])->where('temp_id', $temp_user_id)->get();
    
  }
  $total_price = 0;

if (!$cart->isEmpty()) {
    $total_price = $cart->sum('total_amount');
}
   
@endphp
<main>
  <input type="hidden" value="{{ route('frontend.remove_item_from_cart') }}" id="remove_item_url">
    <div class="mb-4 pb-4"></div>
    <section class="shop-checkout container">
      <h2 class="page-title">Cart</h2>
      <div class="checkout-steps">
        <a href="shop_cart.html" class="checkout-steps__item active">
          <span class="checkout-steps__item-number">01</span>
          <span class="checkout-steps__item-title">
            <span>Shopping Bag</span>
            <em>Manage Your Items List</em>
          </span>
        </a>
        <a href="shop_checkout.html" class="checkout-steps__item">
          <span class="checkout-steps__item-number">02</span>
          <span class="checkout-steps__item-title">
            <span>Shipping and Checkout</span>
            <em>Checkout Your Items List</em>
          </span>
        </a>
        <a href="shop_order_complete.html" class="checkout-steps__item">
          <span class="checkout-steps__item-number">03</span>
          <span class="checkout-steps__item-title">
            <span>Confirmation</span>
            <em>Review And Submit Your Order</em>
          </span>
        </a>
      </div>
      <div class="shopping-cart">
        <div class="cart-table__wrapper">
          <table class="cart-table">
            <thead>
              <tr>
                <th>Product</th>
                <th></th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            @foreach($cart as $item)
            @php 
              $product_image = App\Models\Backend\ProductImage::where('product_id', $item->product_id)
              ->where('product_variant_id', $item->product_variant_id)
              ->first();
            @endphp
              <tr class="cart_item_{{ $item->id }}">
                <td>
                  <div class="shopping-cart__product-item">
                    <a href="product1_simple.html">
                      <img loading="lazy" src="{{ url($product_image->image) }}" width="120" height="120" alt="">
                    </a>
                  </div>
                </td>
                <td>
                  <div class="shopping-cart__product-item__detail">
                    <h4><a href="product1_simple.html">{{$item->name}}</a></h4>
                    <ul class="shopping-cart__product-item__options">
                      <li>Color: {{ $item->getColor->name }}</li>
                      <li>Size: {{ $item->getSize->name }}</li>
                    </ul>
                  </div>
                </td>
                <td>
                  <span class="shopping-cart__product-price">Rs.{{$item->sale_price ?? $item->price}}</span>
                </td>
                <td>
                  <div class="qty-control position-relative">
                    <input type="number" name="product_quantity" 
                    id="product_quantity_{{ $item->product_id }}_{{ $item->size_id }}_{{ $item->color_id }}" value="{{$item->quantity}}"
                    class="product_quantity_{{ $item->product_id }}_{{ $item->size_id }}_{{ $item->color_id }} qty-control__number text-center" min="1">
                    <div class="qty-control__reduce" onclick="updateQuantity('decrease', {{ $item->product_id}}, {{ $item->size_id }}, {{ $item->color_id }})">-</div>
                <div class="qty-control__increase" onclick="updateQuantity('increase', {{ $item->product_id}}, {{ $item->size_id }}, {{ $item->color_id }})">+</div>
                <input type="text" id="update_qty_url" value="{{ route('frontend.update_product_quantity') }}" hidden>
                <input type="text" name="product_size_id" id="product_size_id" value="{{ $item->size_id ?? '' }}" hidden>
                <input type="text" name="product_color_id" id="product_color_id" value="{{ $item->color_id ?? '' }}" hidden>
                  </div><!-- .qty-control -->
                </td>
                <td>
                  <span class="shopping-cart__subtotal total_price_{{ $item->product_id }}_{{ $item->size_id }}_{{ $item->color_id }}">Rs.{{$item->total_amount ?? 0.00}}</span>
                </td>
                <td>
                  <a href="javascript:void(0)" onclick="removeItemFromCart(this, {{ $item->id }})" class="">
                    <svg width="10" height="10" viewBox="0 0 10 10" fill="#767676" xmlns="http://www.w3.org/2000/svg">
                      <path d="M0.259435 8.85506L9.11449 0L10 0.885506L1.14494 9.74056L0.259435 8.85506Z"/>
                      <path d="M0.885506 0.0889838L9.74057 8.94404L8.85506 9.82955L0 0.97449L0.885506 0.0889838Z"/>
                    </svg>                  
                  </a>
                </td>
              </tr>
               @endforeach
               
            </tbody>
          </table>
          <!-- <div class="cart-table-footer">
            <form action="https://uomo-html.flexkitux.com/Demo22/" class="position-relative bg-body">
              <input class="form-control" type="text" name="coupon_code" placeholder="Coupon Code">
              <input class="btn-link fw-medium position-absolute top-0 end-0 h-100 px-4" type="submit" value="APPLY COUPON">
            </form>
            <button class="btn btn-light">UPDATE CART</button>
          </div> -->
        </div>
        <div class="shopping-cart__totals-wrapper">
          <div class="sticky-content">
            <div class="shopping-cart__totals">
              <h3>Cart Totals</h3>
              <table class="cart-totals">
                <tbody>
                  <tr>
                    <th>Subtotal</th>
                    <td>Rs.<span class="cart_total">{{$total_price ?? 0.00}}</span></td>
                  </tr>
                  <tr>
                    <th>Shipping</th>
                    <td>
                      <div class="form-check">
                        <input class="form-check-input form-check-input_fill" type="checkbox" value="0" id="free_shipping" checked>
                        <label class="form-check-label" for="free_shipping">Free shipping</label>
                      </div>
                      <!-- <div class="form-check">
                        <input class="form-check-input form-check-input_fill" type="checkbox" value="" id="flat_rate" checked>
                        <label class="form-check-label" for="flat_rate">Flat rate: $49</label>
                      </div> -->
                       
                      <!-- <div>Shipping to AL.</div>
                      <div>
                        <a href="#" class="menu-link menu-link_us-s">CHANGE ADDRESS</a>
                      </div> -->
                    </td>
                  </tr>
                  <!-- <tr>
                    <th>TAX</th>
                    <td>$19</td>
                  </tr> -->
                  <tr>
                    <th>Total</th>
                    <td>Rs.<span class="total_amount">{{$total_price ?? 0.00}}</span></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="mobile_fixed-btn_wrapper">
              <div class="button-wrapper container">
                <a href="{{ route('frontend.view_checkout') }}" class="btn btn-primary btn-checkout">PROCEED TO CHECKOUT</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="mb-5 pb-xl-5"></div>
  </main>


  @section('javascript-section')
@endsection
@endsection