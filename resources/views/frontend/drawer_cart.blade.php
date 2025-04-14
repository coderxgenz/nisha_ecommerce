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
  $sub_total = $cart->sum('total_amount');
   
@endphp
<a href="#" class="header-tools__item header-tools__cart js-open-aside" data-aside="cartDrawer">
        <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <use href="#icon_cart" />
        </svg>
        <span class="cart-amount d-block position-absolute js-cart-items-count">{{ count($cart) ?? 0 }}</span>
    </a>

<div class="aside aside_right overflow-hidden cart-drawer" id="cartDrawer">
    <div class="aside-header d-flex align-items-center">
      <h3 class="text-uppercase fs-6 mb-0">SHOPPING BAG ( <span class="cart-amount js-cart-items-count">{{ count($cart) ?? 0 }}</span> ) </h3>
      <button class="btn-close-lg js-close-aside btn-close-aside ms-auto"></button>
    </div><!-- /.aside-header -->

    <div class="aside-content cart-drawer-items-list">
      @if(count($cart) > 0)
        @foreach($cart as $item)
          @php 
            $product_image = App\Models\Backend\ProductImage::where('product_id', $item->product_id)
            ->where('product_variant_id', $item->product_variant_id)
            ->first();
          @endphp
          <div class="cart-drawer-item d-flex position-relative">
            <div class="position-relative">
              <a href="">
                <img loading="lazy" class="cart-drawer-item__img" src="{{ url($product_image->image) }}" alt="">
              </a>
            </div>
            <div class="cart-drawer-item__info flex-grow-1">
              <h6 class="cart-drawer-item__title fw-normal"><a href="#">{{$item->name}}</a></h6>
              <p class="cart-drawer-item__option text-secondary">Color: {{ $item->getColor->name }}</p>
              <p class="cart-drawer-item__option text-secondary">Size: {{ $item->getSize->name }}</p>
              <div class="d-flex align-items-center justify-content-between mt-1">
                <div class="qty-control position-relative">
                  <input type="number" name="quantity" value="{{$item->quantity}}" min="1" class="qty-control__number border-0 text-center">
                  <div class="qty-control__reduce text-start">-</div>
                  <div class="qty-control__increase text-end">+</div>
                </div><!-- .qty-control -->
                <span class="cart-drawer-item__price money price">Rs.{{$item->total_amount ?? 0.00}}</span>
              </div>
            </div> 
            <button class="btn-close-xs position-absolute top-0 end-0 js-cart-item-remove"></button>
          </div>  
          <hr class="cart-drawer-divider"> 
        @endforeach
    
         
      <hr class="cart-drawer-divider"> 
       <!-- /.cart-drawer-item d-flex -->

    </div><!-- /.aside-content -->

    <div class="cart-drawer-actions position-absolute start-0 bottom-0 w-100">
      <hr class="cart-drawer-divider">
      <div class="d-flex justify-content-between">
        <h6 class="fs-base fw-medium">SUBTOTAL:</h6>
        <span class="cart-subtotal fw-medium">Rs. {{ number_format($sub_total, 2) ?? 0 }}</span>
      </div><!-- /.d-flex justify-content-between -->
      <a href="{{ route('frontend.view_cart') }}" class="btn btn-light mt-3 d-block">View Cart</a>
      <a href="{{ route('frontend.view_checkout') }}" class="btn btn-primary mt-3 d-block">Checkout</a>
    </div><!-- /.aside-content -->

    @else
      <div class="cart-drawer-item d-flex position-relative">
         
        <div class="cart-drawer-item__info flex-grow-1">
          <h6 class="cart-drawer-item__title fw-normal"><a href="product1_simple.html">No items in cart</a></h6>
        </div>
       
      </div>
      <hr class="cart-drawer-divider">
      @endif
  </div>