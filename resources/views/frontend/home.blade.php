@extends('layouts/frontend/main')
@section('main-section')

<main>
  <section class="swiper-container js-swiper-slider slideshow type4 slideshow-navigation-white-sm"
    data-settings='{
        "autoplay": {
          "delay": 5000
        },
        "navigation": {
          "nextEl": ".slideshow__next",
          "prevEl": ".slideshow__prev"
        },
        "pagination": false,
        "slidesPerView": 1,
        "effect": "fade",
        "loop": true
      }'>
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <div class="overflow-hidden position-relative h-100">
          <div class="slideshow-bg">
            <img loading="lazy" src="{{url('assets/frontend/images/banner.jpg')}}" width="1920" height="600" alt="Pattern" class="slideshow-bg__img object-fit-cover">
          </div>
          <div class="slideshow-text container position-absolute start-50 top-50 translate-middle">
            <h2 class="fs-70 mb-2 mb-lg-3 animate animate_fade animate_btt animate_delay-5 text-uppercase fw-normal" style="font-family: 'Average Sans';">Natural Glow</h2>
            <p class="h6 mb-4 pb-2 animate animate_fade animate_btt animate_delay-5 lh-2rem">Beaux products protect, moisturize, and lubricate your skin. It smartly nourish your skin.<br>with lotions, day creams, night creams, tinted moisturizers, and more.</p>
            <div class="animate animate_fade animate_btt animate_delay-7">
              <a href="shop1.html" class="btn btn-primary border-0 fs-base text-uppercase fw-normal btn-50">
                <span>VIEW MORE</span>
              </a>
            </div>
          </div>
        </div>
      </div><!-- /.slideshow-item -->
      <div class="swiper-slide">
        <div class="overflow-hidden position-relative h-100">
          <div class="slideshow-bg">
            <img loading="lazy" src="{{url('assets/frontend/images/banner2.jpg')}}" width="1920" height="600" alt="Pattern" class="slideshow-bg__img object-fit-cover" style="object-position: 70% center;">
          </div>
          <div class="slideshow-text container position-absolute start-50 top-50 translate-middle">
            <h2 class="fs-70 mb-2 mb-lg-3 animate animate_fade animate_btt animate_delay-5 text-uppercase fw-normal" style="font-family: 'Average Sans';">Natural Glow</h2>
            <p class="h6 mb-4 pb-2 animate animate_fade animate_btt animate_delay-5 lh-2rem">Beaux products protect, moisturize, and lubricate your skin. It smartly nourish your skin.<br>with lotions, day creams, night creams, tinted moisturizers, and more.</p>
            <div class="animate animate_fade animate_btt animate_delay-7">
              <a href="shop1.html" class="btn btn-primary border-0 fs-base text-uppercase fw-normal btn-50">
                <span>VIEW MORE</span>
              </a>
            </div>
          </div>
        </div>
      </div><!-- /.slideshow-item -->
    </div><!-- /.slideshow-wrapper js-swiper-slider -->

    <div class="slideshow__prev position-absolute top-50 d-flex align-items-center justify-content-center border-radius-0">
      <svg width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg">
        <use href="#icon_prev_sm" />
      </svg>
    </div><!-- /.slideshow__prev -->
    <div class="slideshow__next position-absolute top-50 d-flex align-items-center justify-content-center border-radius-0">
      <svg width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg">
        <use href="#icon_next_sm" />
      </svg>
    </div><!-- /.slideshow__next -->
  </section><!-- /.slideshow -->


  <div class="mb-3 mb-xl-5 pb-1 pb-xl-5"></div>

  <section class="category-carousel container">
    <div class="d-flex align-items-center justify-content-center flex-wrap mb-3 pb-xl-2 mb-xl-4">
      <h2 class="section-title fw-bold">Shop By Category</h2>
      <!-- <a class="btn-link btn-link_md default-underline text-uppercase fw-medium" href="shop12.html">Shop All Categories</a> -->
    </div>

    <div id="category_carousel" class="position-relative">
      <div class="swiper-container js-swiper-slider"
        data-settings='{
        "autoplay": {
          "delay": 5000
        },
        "slidesPerView": 8,
        "slidesPerGroup": 1,
        "effect": "none",
        "loop": true,
        "pagination": {
          "el": "#category_carousel .slideshow-pagination",
          "type": "bullets",
          "clickable": true
        },
        "breakpoints": {
          "320": {
            "slidesPerView": 2,
            "slidesPerGroup": 2,
            "spaceBetween": 15
          },
          "768": {
            "slidesPerView": 4,
            "slidesPerGroup": 4,
            "spaceBetween": 20
          },
          "992": {
            "slidesPerView": 6,
            "slidesPerGroup": 2,
            "spaceBetween": 30
          },
          "1200": {
            "slidesPerView": 8,
            "slidesPerGroup": 2,
            "spaceBetween": 40
          }
        }
      }'>
        <div class="swiper-wrapper">
        @if(count($sub_categories) > 0)
        @foreach($sub_categories as $sub_category)

          <div class="swiper-slide">
            <div class="category_round_img_wrapper">
            <div class="border-rotate"></div>
            @if($sub_category->image == '')
            <img loading="lazy" class=" category_round_img" src="{{url('assets/default/default_category.jpg')}}" width="141" height="141" alt="">
            @else
            <img loading="lazy" class=" category_round_img" src="{{url($sub_category->image)}}" width="141" height="141" alt="">
            @endif
          </div>
            <div class="text-center">
              <a href="#" class="menu-link fw-medium">{{ $sub_category->name ?? '' }}</a>
            </div>
          </div>
          @endforeach
          @endif
 
           
           
        </div><!-- /.swiper-wrapper -->
      </div><!-- /.swiper-container js-swiper-slider -->

      <div class="slideshow-pagination mt-4 d-flex align-items-center justify-content-center"></div>
      <!-- /.products-pagination -->
    </div><!-- /.position-relative -->
  </section>


  <div class="mb-3 mb-xl-5 pb-1 pb-xl-5"></div>

  <section class="lookbook">
    <div class="container">
      <h2 class="section-title fw-normal text-center mb-3 pb-xl-3 mb-xl-4">LookBook</h2>
      <div class="row">
        <div class="col-md-6 col-xl-3">
          <div class="lookbook-item position-relative mb-4">
            <video class="w-100 h-auto" autoplay loop muted playsinline>
              <source src="{{url('assets/frontend/images/video.mp4')}}" type="video/mp4">
            </video>
            <div class="position-absolute left-0 bottom-0 width-100 px-3 mx-3 mb-3 pb-2">
              <p class="mb-1 text-uppercase text-white">Women Seasons</p>
              <a href="shop1.html" class="d-inline-block h5 mb-0 text-white">Floral Dress</a>
            </div>
          </div>

        </div>
        <div class="col-md-6 col-xl-3">
          <div class="lookbook-item position-relative mb-4">
            <video class="w-100 h-auto" autoplay loop muted playsinline>
              <source src="{{url('assets/frontend/images/video2.mp4')}}" type="video/mp4">
            </video>
            <div class="position-absolute left-0 bottom-0 width-100 px-3 mx-3 mb-3 pb-2">
              <p class="mb-1 text-uppercase text-white">Women Seasons</p>
              <a href="shop1.html" class="d-inline-block h5 mb-0 text-white">Trench Coat</a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-3">
          <div class="lookbook-item position-relative mb-4">
            <video class="w-100 h-auto" autoplay loop muted playsinline>
              <source src="{{url('assets/frontend/images/video.mp4')}}" type="video/mp4">
            </video>
            <div class="position-absolute left-0 bottom-0 width-100 px-3 mx-3 mb-3 pb-2">
              <p class="mb-1 text-uppercase text-white">Men Seasons</p>
              <a href="shop1.html" class="d-inline-block h5 mb-0 text-white">Folk Pants</a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-3">
          <div class="lookbook-item position-relative mb-4">
            <video class="w-100 h-auto" autoplay loop muted playsinline>
              <source src="{{url('assets/frontend/images/video2.mp4')}}" type="video/mp4">
            </video>
            <div class="position-absolute left-0 bottom-0 width-100 px-3 mx-3 mb-3 pb-2">
              <p class="mb-1 text-uppercase text-white">Men Seasons</p>
              <a href="shop1.html" class="d-inline-block h5 mb-0 text-white">Cos Jacket</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="mb-3 mb-xl-5 pb-1 pb-xl-5"></div>

  <section class="products-grid container">
    <h2 class="section-title text-uppercase text-center mb-1 mb-md-3 pb-xl-2 mb-xl-4">Our Trendy <strong>Products</strong></h2>

    <ul class="nav nav-tabs mb-3 text-uppercase justify-content-center" id="collections-tab" role="tablist">
      <li class="nav-item" role="presentation">
        <a class="nav-link nav-link_underscore active" id="collections-tab-1-trigger" data-bs-toggle="tab" href="#collections-tab-1" role="tab" aria-controls="collections-tab-1" aria-selected="true">All</a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link nav-link_underscore" id="collections-tab-2-trigger" data-bs-toggle="tab" href="#collections-tab-2" role="tab" aria-controls="collections-tab-2" aria-selected="true">New Arrivals</a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link nav-link_underscore" id="collections-tab-3-trigger" data-bs-toggle="tab" href="#collections-tab-3" role="tab" aria-controls="collections-tab-3" aria-selected="true">Best Seller</a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link nav-link_underscore" id="collections-tab-4-trigger" data-bs-toggle="tab" href="#collections-tab-4" role="tab" aria-controls="collections-tab-4" aria-selected="true">Top Rated</a>
      </li>
    </ul>

    <div class="tab-content pt-2" id="collections-tab-content">
      <div class="tab-pane fade show active" id="collections-tab-1" role="tabpanel" aria-labelledby="collections-tab-1-trigger">
        <div class="row">
          <div class="col-6 col-md-4 col-lg-3">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
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
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_star" />
                    </svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_star" />
                    </svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_star" />
                    </svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_star" />
                    </svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_star" />
                    </svg>
                  </div>
                  <span class="reviews-note text-lowercase text-secondary ms-1">8k+ reviews</span>
                </div>

                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <div class="col-6 col-md-4 col-lg-3">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
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
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <div class="col-6 col-md-4 col-lg-3">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
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
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <div class="col-6 col-md-4 col-lg-3">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
              <div class="pc__img-wrapper">
                <a href="product1_simple.html">
                  <img loading="lazy" src="{{url('assets/frontend/images/products/product_4.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                  <img loading="lazy" src="{{url('assets/frontend/images/products/product_4-1.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
                </a>
                <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
              </div>

              <div class="pc__info position-relative">
                <p class="pc__category">Dresses</p>
                <h6 class="pc__title"><a href="product1_simple.html">Cableknit Shawl</a></h6>
                <div class="product-card__price d-flex">
                  <span class="money price price-old">$129</span>
                  <span class="money price price-sale">$99</span>
                </div>

                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <div class="col-6 col-md-4 col-lg-3">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
              <div class="pc__img-wrapper">
                <a href="product1_simple.html">
                  <img loading="lazy" src="{{url('assets/frontend/images/products/product_5.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                  <img loading="lazy" src="{{url('assets/frontend/images/products/product_5-1.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
                </a>
                <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
              </div>

              <div class="pc__info position-relative">
                <p class="pc__category">Dresses</p>
                <h6 class="pc__title"><a href="product1_simple.html">Colorful Jacket</a></h6>
                <div class="product-card__price d-flex">
                  <span class="money price">$29</span>
                </div>

                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <div class="col-6 col-md-4 col-lg-3">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
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
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <div class="col-6 col-md-4 col-lg-3">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
              <div class="pc__img-wrapper">
                <a href="product1_simple.html">
                  <img loading="lazy" src="{{url('assets/frontend/images/products/product_7.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                  <img loading="lazy" src="{{url('assets/frontend/images/products/product_7-1.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
                </a>
                <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
              </div>

              <div class="pc__info position-relative">
                <p class="pc__category">Dresses</p>
                <h6 class="pc__title"><a href="product1_simple.html">Cotton Jersey T-Shirt</a></h6>
                <div class="product-card__price d-flex">
                  <span class="money price">$17</span>
                </div>

                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <div class="col-6 col-md-4 col-lg-3">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
              <div class="pc__img-wrapper">
                <a href="product1_simple.html">
                  <img loading="lazy" src="{{url('assets/frontend/images/products/product_8.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                  <img loading="lazy" src="{{url('assets/frontend/images/products/product_8-1.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
                </a>
                <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
              </div>

              <div class="pc__info position-relative">
                <p class="pc__category">Dresses</p>
                <h6 class="pc__title"><a href="product1_simple.html">Zessi Dresses</a></h6>
                <div class="product-card__price d-flex">
                  <span class="money price price-old">$129</span>
                  <span class="money price price-sale">$99</span>
                </div>

                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </div><!-- /.row -->
        <div class="text-center mt-2">
          <a class="btn-link btn-link_lg default-underline text-uppercase fw-medium" href="shop1.html">Discover More</a>
        </div>
      </div><!-- /.tab-pane fade show-->

      <div class="tab-pane fade show" id="collections-tab-2" role="tabpanel" aria-labelledby="collections-tab-2-trigger">
        <div class="row">
          <div class="col-6 col-md-4 col-lg-3">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
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
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <div class="col-6 col-md-4 col-lg-3">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
              <div class="pc__img-wrapper">
                <a href="product1_simple.html">
                  <img loading="lazy" src="{{url('assets/frontend/images/products/product_4.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                  <img loading="lazy" src="{{url('assets/frontend/images/products/product_4-1.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
                </a>
                <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
              </div>

              <div class="pc__info position-relative">
                <p class="pc__category">Dresses</p>
                <h6 class="pc__title"><a href="product1_simple.html">Cableknit Shawl</a></h6>
                <div class="product-card__price d-flex">
                  <span class="money price price-old">$129</span>
                  <span class="money price price-sale">$99</span>
                </div>

                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <div class="col-6 col-md-4 col-lg-3">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
              <div class="pc__img-wrapper">
                <a href="product1_simple.html">
                  <img loading="lazy" src="{{url('assets/frontend/images/products/product_5.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                  <img loading="lazy" src="{{url('assets/frontend/images/products/product_5-1.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
                </a>
                <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
              </div>

              <div class="pc__info position-relative">
                <p class="pc__category">Dresses</p>
                <h6 class="pc__title"><a href="product1_simple.html">Colorful Jacket</a></h6>
                <div class="product-card__price d-flex">
                  <span class="money price">$29</span>
                </div>

                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <div class="col-6 col-md-4 col-lg-3">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
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
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <div class="col-6 col-md-4 col-lg-3">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
              <div class="pc__img-wrapper">
                <a href="product1_simple.html">
                  <img loading="lazy" src="{{url('assets/frontend/images/products/product_7.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                  <img loading="lazy" src="{{url('assets/frontend/images/products/product_7-1.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
                </a>
                <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
              </div>

              <div class="pc__info position-relative">
                <p class="pc__category">Dresses</p>
                <h6 class="pc__title"><a href="product1_simple.html">Cotton Jersey T-Shirt</a></h6>
                <div class="product-card__price d-flex">
                  <span class="money price">$17</span>
                </div>

                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <div class="col-6 col-md-4 col-lg-3">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
              <div class="pc__img-wrapper">
                <a href="product1_simple.html">
                  <img loading="lazy" src="{{url('assets/frontend/images/products/product_8.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                  <img loading="lazy" src="{{url('assets/frontend/images/products/product_8-1.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
                </a>
                <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
              </div>

              <div class="pc__info position-relative">
                <p class="pc__category">Dresses</p>
                <h6 class="pc__title"><a href="product1_simple.html">Zessi Dresses</a></h6>
                <div class="product-card__price d-flex">
                  <span class="money price price-old">$129</span>
                  <span class="money price price-sale">$99</span>
                </div>

                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <div class="col-6 col-md-4 col-lg-3">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
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
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_star" />
                    </svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_star" />
                    </svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_star" />
                    </svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_star" />
                    </svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_star" />
                    </svg>
                  </div>
                  <span class="reviews-note text-lowercase text-secondary ms-1">8k+ reviews</span>
                </div>

                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <div class="col-6 col-md-4 col-lg-3">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
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
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </div><!-- /.row -->
        <div class="text-center mt-2">
          <a class="btn-link btn-link_lg default-underline default-underline text-uppercase fw-medium" href="#">See All Products</a>
        </div>
      </div><!-- /.tab-pane fade show-->

      <div class="tab-pane fade show" id="collections-tab-3" role="tabpanel" aria-labelledby="collections-tab-3-trigger">
        <div class="row">
          <div class="col-6 col-md-4 col-lg-3">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
              <div class="pc__img-wrapper">
                <a href="product1_simple.html">
                  <img loading="lazy" src="{{url('assets/frontend/images/products/product_5.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                  <img loading="lazy" src="{{url('assets/frontend/images/products/product_5-1.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
                </a>
                <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
              </div>

              <div class="pc__info position-relative">
                <p class="pc__category">Dresses</p>
                <h6 class="pc__title"><a href="product1_simple.html">Colorful Jacket</a></h6>
                <div class="product-card__price d-flex">
                  <span class="money price">$29</span>
                </div>

                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <div class="col-6 col-md-4 col-lg-3">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
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
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <div class="col-6 col-md-4 col-lg-3">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
              <div class="pc__img-wrapper">
                <a href="product1_simple.html">
                  <img loading="lazy" src="{{url('assets/frontend/images/products/product_7.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                  <img loading="lazy" src="{{url('assets/frontend/images/products/product_7-1.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
                </a>
                <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
              </div>

              <div class="pc__info position-relative">
                <p class="pc__category">Dresses</p>
                <h6 class="pc__title"><a href="product1_simple.html">Cotton Jersey T-Shirt</a></h6>
                <div class="product-card__price d-flex">
                  <span class="money price">$17</span>
                </div>

                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <div class="col-6 col-md-4 col-lg-3">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
              <div class="pc__img-wrapper">
                <a href="product1_simple.html">
                  <img loading="lazy" src="{{url('assets/frontend/images/products/product_8.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                  <img loading="lazy" src="{{url('assets/frontend/images/products/product_8-1.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
                </a>
                <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
              </div>

              <div class="pc__info position-relative">
                <p class="pc__category">Dresses</p>
                <h6 class="pc__title"><a href="product1_simple.html">Zessi Dresses</a></h6>
                <div class="product-card__price d-flex">
                  <span class="money price price-old">$129</span>
                  <span class="money price price-sale">$99</span>
                </div>

                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <div class="col-6 col-md-4 col-lg-3">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
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
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_star" />
                    </svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_star" />
                    </svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_star" />
                    </svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_star" />
                    </svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_star" />
                    </svg>
                  </div>
                  <span class="reviews-note text-lowercase text-secondary ms-1">8k+ reviews</span>
                </div>

                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <div class="col-6 col-md-4 col-lg-3">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
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
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <div class="col-6 col-md-4 col-lg-3">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
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
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <div class="col-6 col-md-4 col-lg-3">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
              <div class="pc__img-wrapper">
                <a href="product1_simple.html">
                  <img loading="lazy" src="{{url('assets/frontend/images/products/product_4.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                  <img loading="lazy" src="{{url('assets/frontend/images/products/product_4-1.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
                </a>
                <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
              </div>

              <div class="pc__info position-relative">
                <p class="pc__category">Dresses</p>
                <h6 class="pc__title"><a href="product1_simple.html">Cableknit Shawl</a></h6>
                <div class="product-card__price d-flex">
                  <span class="money price price-old">$129</span>
                  <span class="money price price-sale">$99</span>
                </div>

                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </div><!-- /.row -->
        <div class="text-center mt-2">
          <a class="btn-link btn-link_lg default-underline text-uppercase fw-medium" href="shop1.html">Discover More</a>
        </div>
      </div><!-- /.tab-pane fade show-->

      <div class="tab-pane fade show" id="collections-tab-4" role="tabpanel" aria-labelledby="collections-tab-4-trigger">
        <div class="row">
          <div class="col-6 col-md-4 col-lg-3">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
              <div class="pc__img-wrapper">
                <a href="product1_simple.html">
                  <img loading="lazy" src="{{url('assets/frontend/images/products/product_7.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                  <img loading="lazy" src="{{url('assets/frontend/images/products/product_7-1.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
                </a>
                <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
              </div>

              <div class="pc__info position-relative">
                <p class="pc__category">Dresses</p>
                <h6 class="pc__title"><a href="product1_simple.html">Cotton Jersey T-Shirt</a></h6>
                <div class="product-card__price d-flex">
                  <span class="money price">$17</span>
                </div>

                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <div class="col-6 col-md-4 col-lg-3">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
              <div class="pc__img-wrapper">
                <a href="product1_simple.html">
                  <img loading="lazy" src="{{url('assets/frontend/images/products/product_8.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                  <img loading="lazy" src="{{url('assets/frontend/images/products/product_8-1.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
                </a>
                <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
              </div>

              <div class="pc__info position-relative">
                <p class="pc__category">Dresses</p>
                <h6 class="pc__title"><a href="product1_simple.html">Zessi Dresses</a></h6>
                <div class="product-card__price d-flex">
                  <span class="money price price-old">$129</span>
                  <span class="money price price-sale">$99</span>
                </div>

                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <div class="col-6 col-md-4 col-lg-3">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
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
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_star" />
                    </svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_star" />
                    </svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_star" />
                    </svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_star" />
                    </svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_star" />
                    </svg>
                  </div>
                  <span class="reviews-note text-lowercase text-secondary ms-1">8k+ reviews</span>
                </div>

                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <div class="col-6 col-md-4 col-lg-3">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
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
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <div class="col-6 col-md-4 col-lg-3">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
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
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <div class="col-6 col-md-4 col-lg-3">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
              <div class="pc__img-wrapper">
                <a href="product1_simple.html">
                  <img loading="lazy" src="{{url('assets/frontend/images/products/product_4.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                  <img loading="lazy" src="{{url('assets/frontend/images/products/product_4-1.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
                </a>
                <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
              </div>

              <div class="pc__info position-relative">
                <p class="pc__category">Dresses</p>
                <h6 class="pc__title"><a href="product1_simple.html">Cableknit Shawl</a></h6>
                <div class="product-card__price d-flex">
                  <span class="money price price-old">$129</span>
                  <span class="money price price-sale">$99</span>
                </div>

                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <div class="col-6 col-md-4 col-lg-3">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
              <div class="pc__img-wrapper">
                <a href="product1_simple.html">
                  <img loading="lazy" src="{{url('assets/frontend/images/products/product_5.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                  <img loading="lazy" src="{{url('assets/frontend/images/products/product_5-1.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
                </a>
                <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
              </div>

              <div class="pc__info position-relative">
                <p class="pc__category">Dresses</p>
                <h6 class="pc__title"><a href="product1_simple.html">Colorful Jacket</a></h6>
                <div class="product-card__price d-flex">
                  <span class="money price">$29</span>
                </div>

                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <div class="col-6 col-md-4 col-lg-3">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
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
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </div><!-- /.row -->
        <div class="text-center mt-2">
          <a class="btn-link btn-link_lg default-underline text-uppercase fw-medium" href="shop1.html">See All Products</a>
        </div>
      </div><!-- /.tab-pane fade show-->
    </div><!-- /.tab-content pt-2 -->
  </section><!-- /.products-grid -->


  <div class="mb-3 mb-xl-5 pb-1 pb-xl-5"></div>


  <section class="deal-timer position-relative d-flex align-items-end overflow-hidden" style="background-color: #ebebeb;">
    <div class="background-img" style="background-image: url('../public/assets/frontend/images/deal_timer_bg.jpg');"></div>

    <div class="deal-timer-wrapper container position-relative">
      <div class="deal-timer__content pb-2 mb-3 pb-xl-5 mb-xl-3 mb-xxl-5">
        <p class="text_dash text-uppercase text-red fw-medium">Deal of the week</p>
        <h3 class="h1 text-uppercase"><strong>Spring</strong> Collection</h3>
        <a href="shop1.html" class="btn-link default-underline text-uppercase fw-medium mt-3">Shop Now</a>
      </div>

      <div class="position-relative d-flex align-items-center text-center pt-xxl-4 js-countdown" data-date="18-5-2024" data-time="06:50">
        <div class="day countdown-unit">
          <span class="countdown-num d-block"></span>
          <span class="countdown-word fw-bold text-uppercase text-secondary">Days</span>
        </div>

        <div class="hour countdown-unit">
          <span class="countdown-num d-block"></span>
          <span class="countdown-word fw-bold text-uppercase text-secondary">Hours</span>
        </div>

        <div class="min countdown-unit">
          <span class="countdown-num d-block"></span>
          <span class="countdown-word fw-bold text-uppercase text-secondary">Mins</span>
        </div>

        <div class="sec countdown-unit">
          <span class="countdown-num d-block"></span>
          <span class="countdown-word fw-bold text-uppercase text-secondary">Sec</span>
        </div>
      </div>
    </div><!-- /.deal-timer-wrapper -->
  </section><!-- /.deal-timer -->


  <div class="mb-3 mb-xl-5 pb-1 pb-xl-5"></div>


  <section class="grid-banner container mb-3">
    <div class="row">
      <div class="col-md-6">
        <div class="grid-banner__item grid-banner__item_rect position-relative mb-3">
          <div class="background-img" style="background-image: url('../public/assets/frontend/images/banner_1.jpg');"></div>
          <div class="content_abs content_bottom content_left content_bottom-lg content_left-lg">
            <h6 class="text-uppercase text-white fw-medium mb-3">Starting At $19</h6>
            <h3 class="text-white mb-3">Women's T-Shirts</h3>
            <a href="shop1.html" class="btn-link default-underline text-uppercase text-white fw-medium">Shop Now</a>
          </div><!-- /.content_abs content_bottom content_left content_bottom-md content_left-md -->
        </div>
      </div><!-- /.col-md-6 -->

      <div class="col-md-6">
        <div class="grid-banner__item grid-banner__item_rect position-relative mb-3">
          <div class="background-img" style="background-image: url('../public/assets/frontend/images/banner_2.jpg');"></div>
          <div class="content_abs content_bottom content_left content_bottom-lg content_left-lg">
            <h6 class="text-uppercase fw-medium mb-3">Starting At $39</h6>
            <h3 class="mb-3">Men's Sportswear</h3>
            <a href="shop1.html" class="btn-link default-underline text-uppercase fw-medium">Shop Now</a>
          </div><!-- /.content_abs content_bottom content_left content_bottom-md content_left-md -->
        </div>
      </div><!-- /.col-md-6 -->
    </div><!-- /.row -->
  </section><!-- /.grid-banner container -->


  <div class="mb-5 pb-1 pb-xl-4"></div>


  <section class="products-carousel container">
    <h2 class="section-title text-uppercase text-center mb-4 pb-xl-2 mb-xl-4">Limited <strong>Edition</strong></h2>

    <div id="product_carousel" class="position-relative">
      <div class="swiper-container js-swiper-slider"
        data-settings='{
            "autoplay": {
              "delay": 5000
            },
            "slidesPerView": 4,
            "slidesPerGroup": 4,
            "effect": "none",
            "loop": true,
            "pagination": {
              "el": "#product_carousel .products-pagination",
              "type": "bullets",
              "clickable": true
            },
            "navigation": {
              "nextEl": "#product_carousel .products-carousel__next",
              "prevEl": "#product_carousel .products-carousel__prev"
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
                "slidesPerGroup": 1,
                "spaceBetween": 30
              }
            }
          }'>
        <div class="swiper-wrapper">
          <div class="swiper-slide product-card">
            <div class="pc__img-wrapper">
              <a href="product1_simple.html">
                <img loading="lazy" src="{{url('assets/frontend/images/home/demo1/product-0-1.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
              </a>
              <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
            </div>

            <div class="pc__info position-relative">
              <p class="pc__category">Dresses</p>
              <h6 class="pc__title"><a href="product1_simple.html">Hub Accent Mirror</a></h6>
              <div class="product-card__price d-flex">
                <span class="money price">$17</span>
              </div>

              <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <use href="#icon_heart" />
                </svg>
              </button>
            </div>
          </div>

          <div class="swiper-slide product-card">
            <div class="pc__img-wrapper">
              <a href="product1_simple.html">
                <img loading="lazy" src="{{url('assets/frontend/images/home/demo1/product-1-1.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
              </a>
              <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
            </div>

            <div class="pc__info position-relative">
              <p class="pc__category">Dresses</p>
              <h6 class="pc__title"><a href="product1_simple.html">Hosking Blue Area Rug</a></h6>
              <div class="product-card__price d-flex">
                <span class="money price">$29</span>
              </div>
              <div class="product-card__review d-flex align-items-center">
                <div class="reviews-group d-flex">
                  <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_star" />
                  </svg>
                  <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_star" />
                  </svg>
                  <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_star" />
                  </svg>
                  <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_star" />
                  </svg>
                  <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_star" />
                  </svg>
                </div>
                <span class="reviews-note text-lowercase text-secondary ms-1">8k+ reviews</span>
              </div>

              <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <use href="#icon_heart" />
                </svg>
              </button>
            </div>
          </div>

          <div class="swiper-slide product-card">
            <div class="pc__img-wrapper">
              <a href="product1_simple.html">
                <img loading="lazy" src="{{url('assets/frontend/images/home/demo1/product-2-1.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
              </a>
              <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
            </div>

            <div class="pc__info position-relative">
              <p class="pc__category">Dresses</p>
              <h6 class="pc__title"><a href="product1_simple.html">Hanneman Pouf</a></h6>
              <div class="product-card__price d-flex">
                <span class="money price">$62</span>
              </div>

              <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <use href="#icon_heart" />
                </svg>
              </button>
            </div>
          </div>

          <div class="swiper-slide product-card">
            <div class="pc__img-wrapper">
              <a href="product1_simple.html">
                <img loading="lazy" src="{{url('assets/frontend/images/home/demo1/product-3-1.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
              </a>
              <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
            </div>

            <div class="pc__info position-relative">
              <p class="pc__category">Dresses</p>
              <h6 class="pc__title"><a href="product1_simple.html">Cushion Futon Slipcover</a></h6>
              <div class="product-card__price d-flex">
                <span class="money price">$62</span>
              </div>

              <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <use href="#icon_heart" />
                </svg>
              </button>
            </div>
          </div>
        </div><!-- /.swiper-wrapper -->
      </div><!-- /.swiper-container js-swiper-slider -->

      <div class="products-carousel__prev position-absolute top-50 d-flex align-items-center justify-content-center">
        <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
          <use href="#icon_prev_md" />
        </svg>
      </div><!-- /.products-carousel__prev -->
      <div class="products-carousel__next position-absolute top-50 d-flex align-items-center justify-content-center">
        <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
          <use href="#icon_next_md" />
        </svg>
      </div><!-- /.products-carousel__next -->

      <div class="products-pagination mt-4 mb-5 d-flex align-items-center justify-content-center"></div>
      <!-- /.products-pagination -->
    </div><!-- /.position-relative -->

  </section><!-- /.products-carousel container -->

  <section class="instagram container">
    <h2 class="section-title text-uppercase text-center mb-4 pb-xl-2 mb-xl-4">@UOMO</h2>

    <div class="row row-cols-3 row-cols-md-4 row-cols-xl-6">
      <div class="instagram__tile">
        <a href="https://instagram.com/" target="_blank" class="position-relative overflow-hidden d-block effect overlay-plus">
          <img loading="lazy" class="instagram__img" src="{{url('assets/frontend/images/instagram/insta1.jpg')}}" width="230" height="230" alt="Insta image 1">
        </a>
      </div>
      <div class="instagram__tile">
        <a href="https://instagram.com/" target="_blank" class="position-relative overflow-hidden d-block effect overlay-plus">
          <img loading="lazy" class="instagram__img" src="{{url('assets/frontend/images/instagram/insta2.jpg')}}" width="230" height="230" alt="Insta image 2">
        </a>
      </div>
      <div class="instagram__tile">
        <a href="https://instagram.com/" target="_blank" class="position-relative overflow-hidden d-block effect overlay-plus">
          <img loading="lazy" class="instagram__img" src="{{url('assets/frontend/images/instagram/insta3.jpg')}}" width="230" height="230" alt="Insta image 3">
        </a>
      </div>
      <div class="instagram__tile">
        <a href="https://instagram.com/" target="_blank" class="position-relative overflow-hidden d-block effect overlay-plus">
          <img loading="lazy" class="instagram__img" src="{{url('assets/frontend/images/instagram/insta4.jpg')}}" width="230" height="230" alt="Insta image 4">
        </a>
      </div>
      <div class="instagram__tile">
        <a href="https://instagram.com/" target="_blank" class="position-relative overflow-hidden d-block effect overlay-plus">
          <img loading="lazy" class="instagram__img" src="{{url('assets/frontend/images/instagram/insta5.jpg')}}" width="230" height="230" alt="Insta image 5">
        </a>
      </div>
      <div class="instagram__tile">
        <a href="https://instagram.com/" target="_blank" class="position-relative overflow-hidden d-block effect overlay-plus">
          <img loading="lazy" class="instagram__img" src="{{url('assets/frontend/images/instagram/insta6.jpg')}}" width="230" height="230" alt="Insta image 6">
        </a>
      </div>
      <div class="instagram__tile">
        <a href="https://instagram.com/" target="_blank" class="position-relative overflow-hidden d-block effect overlay-plus">
          <img loading="lazy" class="instagram__img" src="{{url('assets/frontend/images/instagram/insta7.jpg')}}" width="230" height="230" alt="Insta image 7">
        </a>
      </div>
      <div class="instagram__tile">
        <a href="https://instagram.com/" target="_blank" class="position-relative overflow-hidden d-block effect overlay-plus">
          <img loading="lazy" class="instagram__img" src="{{url('assets/frontend/images/instagram/insta8.jpg')}}" width="230" height="230" alt="Insta image 8">
        </a>
      </div>
      <div class="instagram__tile">
        <a href="https://instagram.com/" target="_blank" class="position-relative overflow-hidden d-block effect overlay-plus">
          <img loading="lazy" class="instagram__img" src="{{url('assets/frontend/images/instagram/insta9.jpg')}}" width="230" height="230" alt="Insta image 9">
        </a>
      </div>
      <div class="instagram__tile">
        <a href="https://instagram.com/" target="_blank" class="position-relative overflow-hidden d-block effect overlay-plus">
          <img loading="lazy" class="instagram__img" src="{{url('assets/frontend/images/instagram/insta10.jpg')}}" width="230" height="230" alt="Insta image 10">
        </a>
      </div>
      <div class="instagram__tile">
        <a href="https://instagram.com/" target="_blank" class="position-relative overflow-hidden d-block effect overlay-plus">
          <img loading="lazy" class="instagram__img" src="{{url('assets/frontend/images/instagram/insta11.jpg')}}" width="230" height="230" alt="Insta image 11">
        </a>
      </div>
      <div class="instagram__tile">
        <a href="https://instagram.com/" target="_blank" class="position-relative overflow-hidden d-block effect overlay-plus">
          <img loading="lazy" class="instagram__img" src="{{url('assets/frontend/images/instagram/insta12.jpg')}}" width="230" height="230" alt="Insta image 12">
        </a>
      </div>
    </div>
  </section><!-- /.instagram container -->


  <div class="mb-4 pb-4 pb-xl-5 mb-xl-5"></div>


  <section class="service-promotion container mb-md-4 pb-md-4 mb-xl-5">
    <div class="row">
      <div class="col-md-4 text-center mb-5 mb-md-0">
        <div class="service-promotion__icon mb-4">
          <svg width="52" height="52" viewBox="0 0 52 52" fill="none" xmlns="http://www.w3.org/2000/svg">
            <use href="#icon_shipping" />
          </svg>
        </div>
        <h3 class="service-promotion__title h5 text-uppercase">Fast And Free Delivery</h3>
        <p class="service-promotion__content text-secondary">Free delivery for all orders over $140</p>
      </div><!-- /.col-md-4 text-center-->

      <div class="col-md-4 text-center mb-5 mb-md-0">
        <div class="service-promotion__icon mb-4">
          <svg width="53" height="52" viewBox="0 0 53 52" fill="none" xmlns="http://www.w3.org/2000/svg">
            <use href="#icon_headphone" />
          </svg>
        </div>
        <h3 class="service-promotion__title h5 text-uppercase">24/7 Customer Support</h3>
        <p class="service-promotion__content text-secondary">Friendly 24/7 customer support</p>
      </div><!-- /.col-md-4 text-center-->

      <div class="col-md-4 text-center mb-4 pb-1 mb-md-0">
        <div class="service-promotion__icon mb-4">
          <svg width="52" height="52" viewBox="0 0 52 52" fill="none" xmlns="http://www.w3.org/2000/svg">
            <use href="#icon_shield" />
          </svg>
        </div>
        <h3 class="service-promotion__title h5 text-uppercase">Money Back Guarantee</h3>
        <p class="service-promotion__content text-secondary">We return money within 30 days</p>
      </div><!-- /.col-md-4 text-center-->
    </div><!-- /.row -->
  </section><!-- /.service-promotion container -->
</main>



@section('javascript-section')
@endsection
@endsection