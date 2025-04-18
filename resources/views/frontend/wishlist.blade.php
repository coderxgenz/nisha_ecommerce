@extends('layouts/frontend/main')
@section('main-section')

<main>
    <div class="mb-4 pb-4"></div>
    <section class="my-account container">
      <h2 class="page-title">Wishlist</h2>
      <div class="row">
        <div class="col-lg-3">
        @include('frontend/dashboard_sidebar')
        </div>
        <div class="col-lg-9">
          <div class="page-content my-account__wishlist">
            <div class="products-grid row row-cols-2 row-cols-lg-3" id="products-grid" >
              <div class="product-card-wrapper">
                <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                  <div class="pc__img-wrapper">
                    <div class="swiper-container background-img js-swiper-slider" data-settings='{"resizeObserver": true}'>
                      <div class="swiper-wrapper">
                        <div class="swiper-slide">
                          <img loading="lazy" src="{{url('assets/frontend/images/products/product_5.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                        </div><!-- /.pc__img-wrapper -->
                        <div class="swiper-slide">
                          <img loading="lazy" src="{{url('assets/frontend/images/products/product_5-1.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                        </div><!-- /.pc__img-wrapper -->
                      </div>
                      <span class="pc__img-prev"><svg width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg"><use href="#icon_prev_sm" /></svg></span>
                      <span class="pc__img-next"><svg width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg"><use href="#icon_next_sm" /></svg></span>
                    </div>
                    <button class="btn-remove-from-wishlist">
                      <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_close" /></svg>
                    </button>
                  </div>
      
                  <div class="pc__info position-relative">
                    <p class="pc__category">Dresses</p>
                    <h6 class="pc__title">Colorful Jacket</h6>
                    <div class="product-card__price d-flex">
                      <span class="money price">$29</span>
                    </div>
      
                    <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                      <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart" /></svg>
                    </button>
                  </div>
                </div>
              </div>
      
              
      
              
      
              <div class="product-card-wrapper">
                <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                  <div class="pc__img-wrapper">
                    <div class="swiper-container background-img js-swiper-slider" data-settings='{"resizeObserver": true}'>
                      <div class="swiper-wrapper">
                        <div class="swiper-slide">
                          <img loading="lazy" src="{{url('assets/frontend/images/products/product_8.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                        </div><!-- /.pc__img-wrapper -->
                        <div class="swiper-slide">
                          <img loading="lazy" src="{{url('assets/frontend/images/products/product_8-1.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                        </div><!-- /.pc__img-wrapper -->
                      </div>
                      <span class="pc__img-prev"><svg width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg"><use href="#icon_prev_sm" /></svg></span>
                      <span class="pc__img-next"><svg width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg"><use href="#icon_next_sm" /></svg></span>
                    </div>
                    <button class="btn-remove-from-wishlist">
                      <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_close" /></svg>
                    </button>
                  </div>
      
                  <div class="pc__info position-relative">
                    <p class="pc__category">Dresses</p>
                    <h6 class="pc__title">Zessi Dresses</h6>
                    <div class="product-card__price d-flex">
                      <span class="money price price-old">$129</span>
                      <span class="money price price-sale">$99</span>
                    </div>
      
                    <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                      <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart" /></svg>
                    </button>
                  </div>
                </div>
              </div>
            </div><!-- /.products-grid row -->
          </div>
        </div>
      </div>
    </section>
    <div class="mb-5 pb-xl-5"></div>
  </main>


  @section('javascript-section')
@endsection
@endsection