@extends('layouts/frontend/main')
@section('main-section')
@php
use App\Models\Cart;
if(Auth::check()){
    $user_id = Auth::user()->id; 
    $cart_item_check = Cart::where('product_id', $product->id)
    ->where('user_id', $user_id)
    ->where('color_id', $selected_color_id)
    ->where('size_id', $selected_size_id) 
    ->exists();
  }else{
    if(!Session::has('temp_user_id')) {
      $temp_user_id = bin2hex(random_bytes(10)); 
      Session::put('temp_user_id', $temp_user_id);
    }else{
      $temp_user_id = Session::get('temp_user_id');
    }
    $cart_item_check = Cart::where('product_id', $product->id)
    ->where('temp_id', $temp_user_id)
    ->where('color_id', $selected_color_id)
    ->where('size_id', $selected_size_id) 
    ->exists();
  }

@endphp
<main>
  
    <div class="mb-md-1 pb-md-3"></div>
    <section class="product-single container">
      <div class="row">
        <div class="col-lg-7">
          <div class="product-single__media" data-media-type="vertical-thumbnail">
            <div class="product-single__image">
              <div class="swiper-container">
                <div class="swiper-wrapper">
                @if(count($selected_product_images) > 0)
                @foreach($selected_product_images as $p_image)
                  <div class="swiper-slide product-single__image-item">
                    <img loading="lazy" class="h-auto" src="{{url($p_image->image ?? '')}}" width="674" height="674" alt="">
                    <a data-fancybox="gallery" href="{{url($p_image->image ?? '')}}" data-bs-toggle="tooltip" data-bs-placement="left" title="Zoom">
                      <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_zoom" /></svg>
                    </a>
                  </div>
                  @endforeach
                  @else
                  <div class="swiper-slide product-single__image-item">
                    <img loading="lazy" class="h-auto" src="{{url('upload/images/product_images/default_product.jpg')}}" width="674" height="674" alt="">
                    <a data-fancybox="gallery" href="{{url('upload/images/product_images/default_product.jpg')}}" data-bs-toggle="tooltip" data-bs-placement="left" title="Zoom">
                      <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_zoom" /></svg>
                    </a>
                  </div>
                  @endif
                   
                </div>
                <div class="swiper-button-prev"><svg width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg"><use href="#icon_prev_sm" /></svg></div>
                <div class="swiper-button-next"><svg width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg"><use href="#icon_next_sm" /></svg></div>
              </div>
            </div>
            <div class="product-single__thumbnail">
              <div class="swiper-container">
                <div class="swiper-wrapper">
                  @if(count($selected_product_images) > 0)
                  @foreach($selected_product_images as $p_image)
                  <div class="swiper-slide product-single__image-item"><img loading="lazy" class="h-auto" src="{{url($p_image->image ?? '')}}" width="104" height="104" alt=""></div> 
                  @endforeach
                  @else
                  <div class="swiper-slide product-single__image-item"><img loading="lazy" class="h-auto" src="{{url('upload/images/product_images/default_product.jpg')}}" width="104" height="104" alt=""></div> 
                  @endif
                </div>
              </div>
            </div>
            @if($selected_variant_detail->sale_price != '') 
            <div class="product-label sale-label">
              <span>On Sale!</span>
            </div>
            @endif
          </div>
        </div>
        <div class="col-lg-5">
          <div class="d-flex justify-content-between mb-4 pb-md-2">
            <div class="breadcrumb mb-0 d-none d-md-block flex-grow-1">
              <a href="#" class="menu-link menu-link_us-s text-uppercase fw-medium">Home</a>
              <span class="breadcrumb-separator menu-link fw-medium ps-1 pe-1">/</span>
              <a href="{{ route('frontent.product_list', [$sub_category->slug ?? "" ]) }}" class="menu-link menu-link_us-s text-uppercase fw-medium">{{ $main_category->name }}</a>
              <span class="breadcrumb-separator menu-link fw-medium ps-1 pe-1">/</span>
              <a href="{{ route('frontent.product_list', [$sub_category->slug ?? "" ]) }}" class="menu-link menu-link_us-s text-uppercase fw-medium">{{ $sub_category->name }}</a>
            </div>
    
            <!-- <div class="product-single__prev-next d-flex align-items-center justify-content-between justify-content-md-end flex-grow-1">
              <a href="javascript:void(0)" class="text-uppercase fw-medium"><svg class="mb-1px" width="10" height="10" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg"><use href="#icon_prev_md" /></svg><span class="menu-link menu-link_us-s">Prev</span></a>
              <a href="javascript:void(0)" class="text-uppercase fw-medium"><span class="menu-link menu-link_us-s">Next</span><svg class="mb-1px" width="10" height="10" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg"><use href="#icon_next_md" /></svg></a>
            </div> -->
          </div>
          <h1 class="product-single__name">{{ $product->name ?? '' }}</h1>
          <div class="product-single__rating">
            <div class="reviews-group d-flex">
              <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
              <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
              <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
              <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
              <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
            </div>
            <span class="reviews-note text-lowercase text-secondary ms-1">8k+ reviews</span>
          </div> 
          @if($selected_variant_detail->sale_price == '')
          <div class="product-single__price">
            <span class="current-price">Rs. {{ $selected_variant_detail->price ?? '' }}</span>
          </div>
          @else
          <div class="product-single__price">
            <span class="old-price">Rs. {{ $selected_variant_detail->price ?? '' }}</span>
            <span class="special-price">Rs. {{ $selected_variant_detail->sale_price ?? '' }}</span>
          </div>
          @endif
          
 
          <div class="product-single__short-desc">
            <p>{{ $product->short_description ?? '' }}</p>
          </div>
           
            <div class="product-single__swatches">
              <div class="product-swatch text-swatches">
                @if(count($sizes) > 0)
                <label>Sizes</label>
                <div class="swatch-list">
                  @foreach($sizes as $index => $size)
                  <input type="radio" name="size" data-size="{{ $size->variant_id }}" id="swatch-{{ $index }}" {{ $size->variant_id == $selected_size_id ? "checked":"" }} 
                   onchange="changeSize(this, {{ $product->id }}, {{ $selected_color_id }})">
                  <label class="swatch js-filter-size" for="swatch-{{ $index }}" aria-label="{{ strtoupper($size->name) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ strtoupper($size->name) }}">{{ strtoupper($size->name) }}</label>
                  @endforeach
                </div>
                @endif
                <a href="#" class="sizeguide-link" data-bs-toggle="modal" data-bs-target="#sizeGuide">Size Guide</a>
              </div>

              @if(count($sizes) > 0)
              <div class="product-swatch color-swatches">
                <label>Color</label>
                <div class="swatch-list">
                @foreach($colors as $index => $color) 
                  <input type="radio" name="color" id="swatch_{{ $index }}" data-color-id="{{ $color->color_id }}" {{ $color->color_id == $selected_color_id ? "checked":"" }}>
                  <label class=" swatch-color  js-filter-color" for="swatch_{{ $index }}"  aria-label="{{ $color->color }}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $color->color }}" style="width:18px; height:18px; color: {{ $color->color }}; background:{{ $color->color }};" ></label>
                  @endforeach 
                </div>
              </div>
              @endif


            </div>

            @if($selected_variant_detail->stock > 0 && $selected_variant_detail->stock_status == 1)
            <div class="product-single__addtocart">
            <form action="{{ route('frontend.add_to_cart') }}" method="POST" id="add_to_cart_form">
              @csrf  
            <div class="qty-control position-relative">
                <input type="number" name="product_quantity" value="1" min="1" class="qty-control__number text-center">
                <div class="qty-control__reduce">-</div>
                <div class="qty-control__increase">+</div>
              </div> 
                <input type="text" name="product_name" value="{{ $product->name ?? '' }}" hidden>
                <input type="text" name="product_id" value="{{ $product->id ?? '' }}" hidden>
                <input type="text" name="product_size_id" value="{{ $selected_variant_detail->variant_id ?? '' }}" hidden>
                <input type="text" name="product_color_id" value="{{ $selected_variant_detail->color_id ?? '' }}" hidden>
                <input type="text" name="product_color" value="{{ $selected_variant_detail->color ?? '' }}" hidden>
                <input type="text" name="product_variant_id" value="{{ $selected_variant_detail->id ?? '' }}" hidden> 
                <input type="text" name="product_price" value="{{ $selected_variant_detail->price ?? '' }}" hidden>
                <input type="text" name="product_sale_price" value="{{ $selected_variant_detail->sale_price ?? '' }}" hidden> 
                <input type="text" name="product_size" value="{{ $selected_variant_detail->name ?? '' }}" hidden>
                <input type="text" name="color_name" value="{{ $selected_variant_detail->color ?? '' }}" hidden>
                <input type="text" name="product_image" value="{{ $selected_product_images[0]->id ?? '' }}" hidden>

                <button type="submit" class="btn btn-primary" id="add_to_cart_btn" data-url="{{ route('frontend.add_to_cart') }}" {{ $cart_item_check ? 'disabled' : '' }}  >
                {{ $cart_item_check ? 'Added' : 'Add to Cart' }}  
                  </button>
                </form>
                </div>
            @else 
            <div class="product-single__addtocart">
              <button type="submit" class="btn btn-primary btn-addtocart btn-outofstock">Out of Stock</button>
            </div>
            @endif
            
          </form>
          <div class="product-single__addtolinks">
            <a href="#" class="menu-link menu-link_us-s add-to-wishlist"><svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart" /></svg><span>Add to Wishlist</span></a>
            <share-button class="share-button">
              <button class="menu-link menu-link_us-s to-share border-0 bg-transparent d-flex align-items-center">
                <svg width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_sharing" /></svg>
                <span>Share</span>
              </button>
              <details id="Details-share-template__main" class="m-1 xl:m-1.5" hidden="">
                <summary class="btn-solid m-1 xl:m-1.5 pt-3.5 pb-3 px-5">+</summary>
                <div id="Article-share-template__main" class="share-button__fallback flex items-center absolute top-full left-0 w-full px-2 py-4 bg-container shadow-theme border-t z-10">
                  <div class="field grow mr-4">
                    <label class="field__label sr-only" for="url">Link</label>
                    <input type="text" class="field__input w-full" id="url" value="https://uomo-crystal.myshopify.com/blogs/news/go-to-wellness-tips-for-mental-health" placeholder="Link" onclick="this.select();" readonly="">
                  </div>
                  <button class="share-button__copy no-js-hidden">
                    <svg class="icon icon-clipboard inline-block mr-1" width="11" height="13" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" viewBox="0 0 11 13">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M2 1a1 1 0 011-1h7a1 1 0 011 1v9a1 1 0 01-1 1V1H2zM1 2a1 1 0 00-1 1v9a1 1 0 001 1h7a1 1 0 001-1V3a1 1 0 00-1-1H1zm0 10V3h7v9H1z" fill="currentColor"></path>
                    </svg>
                    <span class="sr-only">Copy link</span>
                  </button>
                </div>
              </details>
            </share-button>
            <script src="js/details-disclosure.js" defer="defer"></script>
            <script src="js/share.js" defer="defer"></script>
          </div>
          <div class="product-single__meta-info">
            <div class="meta-item">
              <label>SKU:</label>
              <span>{{ $product->sku ?? '' }}</span>
            </div>
            <!-- <div class="meta-item">
              <label>Categories:</label>
              <span>Casual & Urban Wear, Jackets, Men</span>
            </div>
            <div class="meta-item">
              <label>Tags:</label>
              <span>biker, black, bomber, leather</span>
            </div> -->
          </div>
        </div>
      </div>
      <div class="product-single__details-tab">
        <ul class="nav nav-tabs" id="myTab1" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link nav-link_underscore active" id="tab-description-tab" data-bs-toggle="tab" href="#tab-description" role="tab" aria-controls="tab-description" aria-selected="true">Description</a>
          </li>
          <!-- <li class="nav-item" role="presentation">
            <a class="nav-link nav-link_underscore" id="tab-additional-info-tab" data-bs-toggle="tab" href="#tab-additional-info" role="tab" aria-controls="tab-additional-info" aria-selected="false">Additional Information</a>
          </li> -->
          <li class="nav-item" role="presentation">
            <a class="nav-link nav-link_underscore" id="tab-reviews-tab" data-bs-toggle="tab" href="#tab-reviews" role="tab" aria-controls="tab-reviews" aria-selected="false">Reviews (2)</a>
          </li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane fade show active" id="tab-description" role="tabpanel" aria-labelledby="tab-description-tab">
            <div class="product-single__description"> 
               {!! $product->full_description ?? '' !!} 
            </div> 
          </div>
          <!-- <div class="tab-pane fade" id="tab-additional-info" role="tabpanel" aria-labelledby="tab-additional-info-tab">
            <div class="product-single__addtional-info">
              <div class="item">
                <label class="h6">Weight</label>
                <span>1.25 kg</span>
              </div>
              <div class="item">
                <label class="h6">Dimensions</label>
                <span>90 x 60 x 90 cm</span>
              </div>
              <div class="item">
                <label class="h6">Size</label>
                <span>XS, S, M, L, XL</span>
              </div>
              <div class="item">
                <label class="h6">Color</label>
                <span>Black, Orange, White</span>
              </div>
              <div class="item">
                <label class="h6">Storage</label>
                <span>Relaxed fit shirt-style dress with a rugged</span>
              </div>
            </div>
          </div> -->
          <div class="tab-pane fade" id="tab-reviews" role="tabpanel" aria-labelledby="tab-reviews-tab">
            <h2 class="product-single__reviews-title">Reviews</h2>
            <div class="product-single__reviews-list">
              <div class="product-single__reviews-item">
                <div class="customer-avatar">
                  <img loading="lazy" src="{{url('assets/frontend/images/avatar.jpg')}}" alt="">
                </div>
                <div class="customer-review">
                  <div class="customer-name">
                    <h6>Janice Miller</h6>
                    <div class="reviews-group d-flex">
                      <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                      <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                      <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                      <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                      <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                    </div>
                  </div>
                  <div class="review-date">April 06, 2023</div>
                  <div class="review-text">
                    <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est…</p>
                  </div>
                </div>
              </div>
              <div class="product-single__reviews-item">
                <div class="customer-avatar">
                  <img loading="lazy" src="{{url('assets/frontend/images/avatar.jpg')}}" alt="">
                </div>
                <div class="customer-review">
                  <div class="customer-name">
                    <h6>Benjam Porter</h6>
                    <div class="reviews-group d-flex">
                      <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                      <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                      <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                      <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                      <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                    </div>
                  </div>
                  <div class="review-date">April 06, 2023</div>
                  <div class="review-text">
                    <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est…</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="product-single__review-form">
              <form name="customer-review-form">
                <h5>Be the first to review “Message Cotton T-Shirt”</h5>
                <p>Your email address will not be published. Required fields are marked *</p>
                <div class="select-star-rating">
                  <label>Your rating *</label>
                  <span class="star-rating">
                    <svg class="star-rating__star-icon" width="12" height="12" fill="#ccc" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                      <path d="M11.1429 5.04687C11.1429 4.84598 10.9286 4.76562 10.7679 4.73884L7.40625 4.25L5.89955 1.20312C5.83929 1.07589 5.72545 0.928571 5.57143 0.928571C5.41741 0.928571 5.30357 1.07589 5.2433 1.20312L3.73661 4.25L0.375 4.73884C0.207589 4.76562 0 4.84598 0 5.04687C0 5.16741 0.0870536 5.28125 0.167411 5.3683L2.60491 7.73884L2.02902 11.0871C2.02232 11.1339 2.01563 11.1741 2.01563 11.221C2.01563 11.3951 2.10268 11.5558 2.29688 11.5558C2.39063 11.5558 2.47768 11.5223 2.56473 11.4754L5.57143 9.89509L8.57813 11.4754C8.65848 11.5223 8.75223 11.5558 8.84598 11.5558C9.04018 11.5558 9.12054 11.3951 9.12054 11.221C9.12054 11.1741 9.12054 11.1339 9.11384 11.0871L8.53795 7.73884L10.9688 5.3683C11.0558 5.28125 11.1429 5.16741 11.1429 5.04687Z"/>
                    </svg>
                    <svg class="star-rating__star-icon" width="12" height="12" fill="#ccc" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                      <path d="M11.1429 5.04687C11.1429 4.84598 10.9286 4.76562 10.7679 4.73884L7.40625 4.25L5.89955 1.20312C5.83929 1.07589 5.72545 0.928571 5.57143 0.928571C5.41741 0.928571 5.30357 1.07589 5.2433 1.20312L3.73661 4.25L0.375 4.73884C0.207589 4.76562 0 4.84598 0 5.04687C0 5.16741 0.0870536 5.28125 0.167411 5.3683L2.60491 7.73884L2.02902 11.0871C2.02232 11.1339 2.01563 11.1741 2.01563 11.221C2.01563 11.3951 2.10268 11.5558 2.29688 11.5558C2.39063 11.5558 2.47768 11.5223 2.56473 11.4754L5.57143 9.89509L8.57813 11.4754C8.65848 11.5223 8.75223 11.5558 8.84598 11.5558C9.04018 11.5558 9.12054 11.3951 9.12054 11.221C9.12054 11.1741 9.12054 11.1339 9.11384 11.0871L8.53795 7.73884L10.9688 5.3683C11.0558 5.28125 11.1429 5.16741 11.1429 5.04687Z"/>
                    </svg>
                    <svg class="star-rating__star-icon" width="12" height="12" fill="#ccc" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                      <path d="M11.1429 5.04687C11.1429 4.84598 10.9286 4.76562 10.7679 4.73884L7.40625 4.25L5.89955 1.20312C5.83929 1.07589 5.72545 0.928571 5.57143 0.928571C5.41741 0.928571 5.30357 1.07589 5.2433 1.20312L3.73661 4.25L0.375 4.73884C0.207589 4.76562 0 4.84598 0 5.04687C0 5.16741 0.0870536 5.28125 0.167411 5.3683L2.60491 7.73884L2.02902 11.0871C2.02232 11.1339 2.01563 11.1741 2.01563 11.221C2.01563 11.3951 2.10268 11.5558 2.29688 11.5558C2.39063 11.5558 2.47768 11.5223 2.56473 11.4754L5.57143 9.89509L8.57813 11.4754C8.65848 11.5223 8.75223 11.5558 8.84598 11.5558C9.04018 11.5558 9.12054 11.3951 9.12054 11.221C9.12054 11.1741 9.12054 11.1339 9.11384 11.0871L8.53795 7.73884L10.9688 5.3683C11.0558 5.28125 11.1429 5.16741 11.1429 5.04687Z"/>
                    </svg>
                    <svg class="star-rating__star-icon" width="12" height="12" fill="#ccc" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                      <path d="M11.1429 5.04687C11.1429 4.84598 10.9286 4.76562 10.7679 4.73884L7.40625 4.25L5.89955 1.20312C5.83929 1.07589 5.72545 0.928571 5.57143 0.928571C5.41741 0.928571 5.30357 1.07589 5.2433 1.20312L3.73661 4.25L0.375 4.73884C0.207589 4.76562 0 4.84598 0 5.04687C0 5.16741 0.0870536 5.28125 0.167411 5.3683L2.60491 7.73884L2.02902 11.0871C2.02232 11.1339 2.01563 11.1741 2.01563 11.221C2.01563 11.3951 2.10268 11.5558 2.29688 11.5558C2.39063 11.5558 2.47768 11.5223 2.56473 11.4754L5.57143 9.89509L8.57813 11.4754C8.65848 11.5223 8.75223 11.5558 8.84598 11.5558C9.04018 11.5558 9.12054 11.3951 9.12054 11.221C9.12054 11.1741 9.12054 11.1339 9.11384 11.0871L8.53795 7.73884L10.9688 5.3683C11.0558 5.28125 11.1429 5.16741 11.1429 5.04687Z"/>
                    </svg>
                    <svg class="star-rating__star-icon" width="12" height="12" fill="#ccc" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                      <path d="M11.1429 5.04687C11.1429 4.84598 10.9286 4.76562 10.7679 4.73884L7.40625 4.25L5.89955 1.20312C5.83929 1.07589 5.72545 0.928571 5.57143 0.928571C5.41741 0.928571 5.30357 1.07589 5.2433 1.20312L3.73661 4.25L0.375 4.73884C0.207589 4.76562 0 4.84598 0 5.04687C0 5.16741 0.0870536 5.28125 0.167411 5.3683L2.60491 7.73884L2.02902 11.0871C2.02232 11.1339 2.01563 11.1741 2.01563 11.221C2.01563 11.3951 2.10268 11.5558 2.29688 11.5558C2.39063 11.5558 2.47768 11.5223 2.56473 11.4754L5.57143 9.89509L8.57813 11.4754C8.65848 11.5223 8.75223 11.5558 8.84598 11.5558C9.04018 11.5558 9.12054 11.3951 9.12054 11.221C9.12054 11.1741 9.12054 11.1339 9.11384 11.0871L8.53795 7.73884L10.9688 5.3683C11.0558 5.28125 11.1429 5.16741 11.1429 5.04687Z"/>
                    </svg>
                  </span>
                  <input type="hidden" id="form-input-rating" value="">
                </div>
                <div class="mb-4">
                  <textarea id="form-input-review" class="form-control form-control_gray" placeholder="Your Review" cols="30" rows="8"></textarea>
                </div>
                <div class="form-label-fixed mb-4">
                  <label for="form-input-name" class="form-label">Name *</label>
                  <input id="form-input-name" class="form-control form-control-md form-control_gray">
                </div>
                <div class="form-label-fixed mb-4">
                  <label for="form-input-email" class="form-label">Email address *</label>
                  <input id="form-input-email" class="form-control form-control-md form-control_gray">
                </div>
                <div class="form-check mb-4">
                  <input class="form-check-input form-check-input_fill" type="checkbox" value="" id="remember_checkbox">
                  <label class="form-check-label" for="remember_checkbox">
                    Save my name, email, and website in this browser for the next time I comment.
                  </label>
                </div>
                <div class="form-action">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="products-carousel container">
      <h2 class="h3 text-uppercase mb-4 pb-xl-2 mb-xl-4">Related <strong>Products</strong></h2>
      <div id="related_products" class="position-relative">
        <div class="swiper-container js-swiper-slider"
          data-settings='{
            "autoplay": false,
            "slidesPerView": 4,
            "slidesPerGroup": 4,
            "effect": "none",
            "loop": true,
            "pagination": {
              "el": "#related_products .products-pagination",
              "type": "bullets",
              "clickable": true
            },
            "navigation": {
              "nextEl": "#related_products .products-carousel__next",
              "prevEl": "#related_products .products-carousel__prev"
            },
            "breakpoints": {
              "320": {
                "slidesPerView": 2,
                "slidesPerGroup": 2,
                "spaceBetween": 14
              },
              "768": {
                "slidesPerView": 3,
                "slidesPerGroup": 3,
                "spaceBetween": 24
              },
              "992": {
                "slidesPerView": 4,
                "slidesPerGroup": 4,
                "spaceBetween": 30
              }
            }
          }'>
          <div class="swiper-wrapper">
            <div class="swiper-slide product-card">
              <div class="pc__img-wrapper">
                <a href="product1_simple.html">
                  <img loading="lazy" src="{{url('assets/frontend/images/products/product_3.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                  <img loading="lazy" src="{{url('assets/frontend/images/products/product_3-1.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
                </a>
                <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
              </div>

              <div class="pc__info position-relative">
                <p class="pc__category">Dresses</p>
                <h6 class="pc__title"><a href="product1_simple.html">Kirby T-Shirt</a></h6>
                <div class="product-card__price d-flex">
                  <span class="money price">$17</span>
                </div>

                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart" /></svg>
                </button>
              </div>
            </div>

            <div class="swiper-slide product-card">
              <div class="pc__img-wrapper">
                <a href="product1_simple.html">
                  <img loading="lazy" src="{{url('assets/frontend/images/products/product_1.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                  <img loading="lazy" src="{{url('assets/frontend/images/products/product_1-1.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
                </a>
                <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
              </div>

              <div class="pc__info position-relative">
                <p class="pc__category">Dresses</p>
                <h6 class="pc__title"><a href="product1_simple.html">Cropped Faux Leather Jacket</a></h6>
                <div class="product-card__price d-flex">
                  <span class="money price">$29</span>
                </div>
                <div class="product-card__review d-flex align-items-center">
                  <div class="reviews-group d-flex">
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                  </div>
                  <span class="reviews-note text-lowercase text-secondary ms-1">8k+ reviews</span>
                </div>

                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart" /></svg>
                </button>
              </div>
            </div>

            <div class="swiper-slide product-card">
              <div class="pc__img-wrapper">
                <a href="product1_simple.html">
                  <img loading="lazy" src="{{url('assets/frontend/images/products/product_2.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                  <img loading="lazy" src="{{url('assets/frontend/images/products/product_2-1.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
                </a>
                <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
              </div>

              <div class="pc__info position-relative">
                <p class="pc__category">Dresses</p>
                <h6 class="pc__title"><a href="product1_simple.html">Calvin Shorts</a></h6>
                <div class="product-card__price d-flex">
                  <span class="money price">$62</span>
                </div>

                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart" /></svg>
                </button>
              </div>
            </div>

            <div class="swiper-slide product-card">
              <div class="pc__img-wrapper">
                <a href="product1_simple.html">
                  <img loading="lazy" src="{{url('assets/frontend/images/products/product_6.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                  <img loading="lazy" src="{{url('assets/frontend/images/products/product_6-1.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
                </a>
                <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
              </div>

              <div class="pc__info position-relative">
                <p class="pc__category">Dresses</p>
                <h6 class="pc__title"><a href="product1_simple.html">Shirt In Botanical Cheetah Print</a></h6>
                <div class="product-card__price d-flex">
                  <span class="money price">$62</span>
                </div>

                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart" /></svg>
                </button>
              </div>
            </div>

            

            

            

            
          </div><!-- /.swiper-wrapper -->
        </div><!-- /.swiper-container js-swiper-slider -->

        <div class="products-carousel__prev position-absolute top-50 d-flex align-items-center justify-content-center">
          <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg"><use href="#icon_prev_md" /></svg>
        </div><!-- /.products-carousel__prev -->
        <div class="products-carousel__next position-absolute top-50 d-flex align-items-center justify-content-center">
          <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg"><use href="#icon_next_md" /></svg>
        </div><!-- /.products-carousel__next -->

        <div class="products-pagination mt-4 mb-5 d-flex align-items-center justify-content-center"></div>
        <!-- /.products-pagination -->
      </div><!-- /.position-relative -->

    </section><!-- /.products-carousel container -->
  </main>

  @section('javascript-section')
  <script>

function changeSize(element, product_id, selected_color_id){
    const selected_size = $(element).data('size'); 
    let url = "{{ route('frontent.change_product_size') }}";
    let new_page_url = "{{ route('frontent.product_details', [':p_id', ':size_id', ':color_id']) }}";
    fetch(url, {
        method:"POST",
        headers:{
             'Content-Type': 'application/json',
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
        },
        body:JSON.stringify({size_id:selected_size, product_id:product_id, selected_color_id:selected_color_id}),
        
     }).then(response => response.json())
     .then(responseData => { 
      new_page_url = new_page_url.replace(':p_id', product_id);
      new_page_url = new_page_url.replace(':size_id', selected_size);
      new_page_url = new_page_url.replace(':color_id', responseData.new_selected_color_id); 
      window.location.href = new_page_url;         
     }).catch(error => console.error('Error:', error));
}


function changeProductColor(element, product_id, selected_size_id){
    const selected_color = $(element).data('color-id');  
    console.log('product_id:- ', product_id);
    console.log('selected_color:- ', selected_color);
    console.log('selected_size_id:- ', selected_size_id);
    // return false;
    let url = "{{ route('frontent.change_product_color') }}";
    let new_page_url = "{{ route('frontent.product_details', [':p_id', ':size_id', ':color_id']) }}";
    fetch(url, {
        method:"POST",
        headers:{
             'Content-Type': 'application/json',
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
        },
        body:JSON.stringify({color_id:selected_color, product_id:product_id, size_id:selected_size_id}),
        
     }).then(response => response.json())
     .then(responseData => { 
      console.log(responseData);
      new_page_url = new_page_url.replace(':p_id', product_id);
      new_page_url = new_page_url.replace(':size_id', selected_size_id);
      new_page_url = new_page_url.replace(':color_id', selected_color); 
      window.location.href = new_page_url;         
     }).catch(error => console.error('Error:', error));

}

//      document.addEventListener("DOMContentLoaded", function () {
//     const buttons = document.querySelectorAll(".js-filter"); 
//     buttons.forEach((btn) => {
//         btn.addEventListener("click", function () {
//           console.log(btn);
//             btn.classList.add("swatch_active");
//         });
//     });
// });

document.addEventListener("DOMContentLoaded", function () {
    const radioButtons = document.querySelectorAll("input[name='color']");
    radioButtons.forEach((radio) => {
        radio.addEventListener("change", function () {
            // Remove 'swatch_active' from all labels
            document.querySelectorAll(".js-filter-color").forEach(label => {
                label.classList.remove("swatch_active");
            }); 
            // Find the label associated with this radio input and add 'swatch_active'
            const label = document.querySelector("label[for='" + this.id + "']");
            if (label) {
                label.classList.add("swatch_active");
            } 
            // Trigger color change logic
            const productId = {{ $product->id }};
            const sizeId = {{ $selected_size_id }};
            changeProductColor(this, productId, sizeId);
        });
    });
});



 
  </script>
@endsection
@endsection