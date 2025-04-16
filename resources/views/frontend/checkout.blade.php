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
$cart = Cart::with(['getProductImages', 'getSize'])->where('temp_id', $temp_user_id)->get();
}
$sub_total = $cart->sum('total_amount');
@endphp
<main>
  <div class="mb-4 pb-4"></div>
  <section class="shop-checkout container">
    <h2 class="page-title">Shipping and Checkout</h2>
    <div class="checkout-steps">
      <a href="shop_cart.html" class="checkout-steps__item active">
        <span class="checkout-steps__item-number">01</span>
        <span class="checkout-steps__item-title">
          <span>Shopping Bag</span>
          <em>Manage Your Items List</em>
        </span>
      </a>
      <a href="shop_checkout.html" class="checkout-steps__item active">
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
    <form name="checkout-form" action="{{ route('frontend.place_order') }}" method="POST">
      @csrf
      <div class="checkout-form">
        <div>
        <div class="billing-info__wrapper">
          <h4>SHIPPING DETAILS</h4>
          <div class="row">
            <div class="col-md-6">
              <div class="form-floating my-3">
                <input type="text" class="form-control" name="s_f_name" id="checkout_first_name" placeholder="First Name">
                <label for="checkout_first_name">First Name</label>
                @error('s_f_name')
                <p style="color:red;">{{ $message }}</p>
                @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating my-3">
                <input type="text" class="form-control" name="s_l_name" id="checkout_last_name" placeholder="Last Name">
                <label for="checkout_last_name">Last Name</label>
                @error('s_l_name')
                <p style="color:red;">{{ $message }}</p>
                @enderror
              </div>
            </div>

            <!-- <div class="col-md-12">
                <div class="search-field my-3">
                  <div class="form-label-fixed hover-container">
                    <label for="search-dropdown" class="form-label">Country / Region*</label>
                    <div class="js-hover__open">
                      <input type="text" class="form-control form-control-lg search-field__actor search-field__arrow-down" id="search-dropdown" name="search-keyword" readonly placeholder="Choose a location...">
                    </div>
                    <div class="filters-container js-hidden-content mt-2">
                      <div class="search-field__input-wrapper">
                        <input type="text" class="search-field__input form-control form-control-sm bg-lighter border-lighter" placeholder="Search">
                      </div>
                      <ul class="search-suggestion list-unstyled">
                        <li class="search-suggestion__item js-search-select">Australia</li>
                        <li class="search-suggestion__item js-search-select">Canada</li>
                        <li class="search-suggestion__item js-search-select">United Kingdom</li>
                        <li class="search-suggestion__item js-search-select">United States</li>
                        <li class="search-suggestion__item js-search-select">Turkey</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div> -->
            <div class="col-md-12">
              <div class="form-floating mt-3 mb-3">
                <input type="text" class="form-control" name="s_street_address" id="checkout_street_address" placeholder="Street Address *">
                <label for="checkout_company_name">Street Address *</label>
                @error('s_street_address')
                <p style="color:red;">{{ $message }}</p>
                @enderror
              </div>

            </div>
            <div class="col-md-12">
              <div class="form-floating my-3">
                <input type="text" class="form-control" name="s_city" id="checkout_city" placeholder="Town / City *">
                <label for="checkout_city">Town / City *</label>
                @error('s_city')
                <p style="color:red;">{{ $message }}</p>
                @enderror
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-floating my-3">
                <input type="text" class="form-control" name="s_postal_code" id="checkout_zipcode" placeholder="Postcode / ZIP *">
                <label for="checkout_zipcode">Postcode / ZIP *</label>
                @error('s_postal_code')
                <p style="color:red;">{{ $message }}</p>
                @enderror
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-floating my-3">
                <input type="text" class="form-control" name="s_phone" id="checkout_phone" placeholder="Phone *">
                <label for="checkout_phone">Phone *</label>
                @error('s_phone')
                <p style="color:red;">{{ $message }}</p>
                @enderror
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-floating my-3">
                <input type="email" class="form-control" name="s_email" id="checkout_email" placeholder="Your Mail *">
                <label for="checkout_email">Your Mail *</label>
                @error('s_email')
                <p style="color:red;">{{ $message }}</p>
                @enderror
              </div>
            </div>
            <div class="col-md-12">

              <div class="form-check mb-3">
                <input class="form-check-input form-check-input_fill" name="billing_address_is_different" type="checkbox" value="" id="ship_different_address">
                <label class="form-check-label" for="ship_different_address">BILLING ADDRESS IS DIFFERENT?</label>
              </div>
            </div>
          </div>
          <!-- BILLING ADDRESS FORM -->
        </div>
        <div id="billing_address_form" class="billing-info__wrapper" style="display: none;">
            <h4>BILLING DETAILS</h4>
            <div class="row">
              <div class="col-md-6">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="b_f_name" id="checkout_billing_first_name" placeholder="First Name">
                  <label for="checkout_billing_first_name">First Name</label>
                  @error('b_f_name')
                  <p style="color:red;">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="b_l_name" id="checkout_billing_last_name" placeholder="Last Name">
                  <label for="checkout_billing_last_name">Last Name</label>
                  @error('b_l_name')
                  <p style="color:red;">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-floating mt-3 mb-3">
                  <input type="text" class="form-control" name="b_street_address" id="checkout_billing_street_address" placeholder="Street Address *">
                  <label for="checkout_billing_street_address">Street Address *</label>
                  @error('b_street_address')
                  <p style="color:red;">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="b_city" id="checkout_billing_city" placeholder="Town / City *">
                  <label for="checkout_billing_city">Town / City *</label>
                  @error('b_city')
                  <p style="color:red;">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="b_postal_code" id="checkout_billing_zipcode" placeholder="Postcode / ZIP *">
                  <label for="checkout_billing_zipcode">Postcode / ZIP *</label>
                  @error('b_postal_code')
                  <p style="color:red;">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="b_phone" id="checkout_billing_phone" placeholder="Phone *">
                  <label for="checkout_billing_phone">Phone *</label>
                  @error('b_phone')
                  <p style="color:red;">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-floating my-3">
                  <input type="email" class="form-control" name="b_email" id="checkout_billing_email" placeholder="Your Mail *">
                  <label for="checkout_billing_email">Your Mail *</label>
                  @error('b_email')
                  <p style="color:red;">{{ $message }}</p>
                  @enderror
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="checkout__totals-wrapper">
          <div class="sticky-content">
            <div class="checkout__totals">
              <h3>Your Order</h3>
              <table class="checkout-cart-items">
                <thead>
                  <tr>
                    <th>PRODUCT</th>
                    <th>SUBTOTAL</th>
                  </tr>
                </thead>
                <tbody>
                  @if(count($cart) > 0)
                  @foreach($cart as $item)
                  <tr>
                    <td>{{$item->product_name}} x {{$item->quantity}}</td>
                    <td>Rs.{{$item->total_amount ?? 0.00}}</td>
                  </tr>
                  @endforeach
                  @endif

                </tbody>
              </table>
              <table class="checkout-totals">
                <tbody>
                  <tr>
                    <th>SUBTOTAL</th>
                    <td>Rs.{{ $sub_total }}</td>
                  </tr>
                  <tr>
                    <th>SHIPPING</th>
                    <td>Free shipping</td>
                  </tr>
                  <!-- <tr>
                      <th>VAT</th>
                      <td>$19</td>
                    </tr> -->
                  <tr>
                    <th>TOTAL</th>
                    <td>Rs. {{ $sub_total }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="checkout__payment-methods">
              <div class="form-check">
                <input class="form-check-input form-check-input_fill" type="radio" value="cash_on_delivery" name="payment_mode" id="checkout_payment_method_3">
                <label class="form-check-label" for="checkout_payment_method_3">Cash on delivery</label>
              </div>
              <div class="form-check">
                <input class="form-check-input form-check-input_fill" type="radio" value="online" name="payment_mode" id="checkout_payment_method_4">
                <label class="form-check-label" for="checkout_payment_method_4">Online</label>
              </div>
              @error('payment_mode')
              <p style="color:red;">{{ $message }}</p>
              @enderror
            </div>
            <button class="btn btn-primary btn-checkout">PLACE ORDER</button>
          </div>
        </div>
      </div>
    </form>
  </section>
  <div class="mb-5 pb-xl-5"></div>
</main>


@section('javascript-section')
<script>
$(document).ready(function () {
  // Toggle billing address form
  $('#ship_different_address').change(function () {
    if ($(this).is(':checked')) {
      $('#billing_address_form').slideDown();
    } else {
      $('#billing_address_form').slideUp();
    }
  });

});
</script>
@endsection
@endsection