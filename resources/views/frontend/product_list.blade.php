@extends('layouts/frontend/main')
@section('main-section')

<main>
  <section class="full-width_padding">
    <div class="full-width_border border-2" style="border-color: #f5e6e0;">
      <div class="shop-banner position-relative ">
        <div class="background-img" style="background-color: #f5e6e0;">
          <img loading="lazy" src="{{url('assets/frontend/images/shop/shop_banner_2.png')}}" width="1759" height="420" alt="Pattern" class="slideshow-bg__img object-fit-cover">
        </div>

        <div class="shop-banner__content container position-absolute start-50 top-50 translate-middle">
          <h2 class="h1 text-uppercase text-center fw-bold mb-3 mb-xl-4 mb-xl-5">{{ $sub_category->name ?? '' }}</h2>
          <ul class="d-flex justify-content-center flex-wrap list-unstyled text-uppercase h6">
            <li class="me-3 me-xl-4 pe-1"><a href="#" class="menu-link menu-link_us-s menu-link_active">StayHome</a></li>
            <li class="me-3 me-xl-4 pe-1"><a href="#" class="menu-link menu-link_us-s">New In</a></li>
            <li class="me-3 me-xl-4 pe-1"><a href="#" class="menu-link menu-link_us-s">Jackets</a></li>
            <li class="me-3 me-xl-4 pe-1"><a href="#" class="menu-link menu-link_us-s">Hoodies</a></li>
            <li class="me-3 me-xl-4 pe-1"><a href="shop4.html" class="menu-link menu-link_us-s">Men</a></li>
            <li class="me-3 me-xl-4 pe-1"><a href="shop5.html" class="menu-link menu-link_us-s">Women</a></li>
            <li class="me-3 me-xl-4 pe-1"><a href="#" class="menu-link menu-link_us-s">Trousers</a></li>
            <li class="me-3 me-xl-4 pe-1"><a href="shop3.html" class="menu-link menu-link_us-s">Accessories</a></li>
            <li class="me-3 me-xl-4 pe-1"><a href="#" class="menu-link menu-link_us-s">Shoes</a></li>
          </ul>
        </div><!-- /.shop-banner__content -->
      </div><!-- /.shop-banner position-relative -->
    </div><!-- /.full-width_border -->
  </section><!-- /.full-width_padding-->

  <div class="mb-4 pb-lg-3"></div>

  <section class="shop-main container d-flex">
    <div class="shop-sidebar side-sticky bg-body" id="shopFilter">
      <div class="aside-header d-flex d-lg-none align-items-center">
        <h3 class="text-uppercase fs-6 mb-0">Filter By</h3>
        <button class="btn-close-lg js-close-aside btn-close-aside ms-auto"></button>
      </div><!-- /.aside-header -->

      <div class="pt-4 pt-lg-0"></div>

      <div class="accordion" id="categories-list">
        <div class="accordion-item mb-4 pb-3">
          <h5 class="accordion-header" id="accordion-heading-11">
            <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-filter-1" aria-expanded="true" aria-controls="accordion-filter-1">
              Product Categories
              <svg class="accordion-button__icon type2" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg">
                <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                  <path d="M5.35668 0.159286C5.16235 -0.053094 4.83769 -0.0530941 4.64287 0.159286L0.147611 5.05963C-0.0492049 5.27473 -0.049205 5.62357 0.147611 5.83813C0.344427 6.05323 0.664108 6.05323 0.860924 5.83813L5 1.32706L9.13858 5.83867C9.33589 6.05378 9.65507 6.05378 9.85239 5.83867C10.0492 5.62357 10.0492 5.27473 9.85239 5.06018L5.35668 0.159286Z" />
                </g>
              </svg>
            </button>
          </h5>
          <div id="accordion-filter-1" class="accordion-collapse collapse show border-0" aria-labelledby="accordion-heading-11" data-bs-parent="#categories-list">
            <div class="accordion-body px-0 pb-0 pt-3">
              <ul class="list list-inline mb-0">
                <!-- Nested Accordion -->
                <div class="accordion" id="nestedAccordion1">
                  @if(count($categories) > 0)
                  @foreach($categories as $category)
                  <!-- Dresses -->
                  <div class="accordion-item pb-2">
                    <h2 class="accordion-header" id="nestedHeading_{{ $category->slug ?? '' }}">
                      <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button" data-bs-toggle="collapse" data-bs-target="#nestedCollapse_{{ $category->slug ?? '' }}" aria-expanded="true" aria-controls="nestedCollapse_{{ $category->slug ?? '' }}">
                        {{ $category->name ?? ''}}
                        <svg class="accordion-button__icon type2" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg">
                          <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                            <path d="M5.35668 0.159286C5.16235 -0.053094 4.83769 -0.0530941 4.64287 0.159286L0.147611 5.05963C-0.0492049 5.27473 -0.049205 5.62357 0.147611 5.83813C0.344427 6.05323 0.664108 6.05323 0.860924 5.83813L5 1.32706L9.13858 5.83867C9.33589 6.05378 9.65507 6.05378 9.85239 5.83867C10.0492 5.62357 10.0492 5.27473 9.85239 5.06018L5.35668 0.159286Z" />
                          </g>
                        </svg>
                      </button>
                    </h2>
                    <div id="nestedCollapse_{{ $category->slug ?? '' }}" class="accordion-collapse collapse {{ $sub_category->getMainCategory?->slug == $category->slug ? 'show':'' }}" aria-labelledby="nestedHeading_{{ $category->slug ?? '' }}" data-bs-parent="#nestedAccordion1">
                      <div class="accordion-body">
                        @if(count($category->subCategories) > 0)
                        <ul class="list-group">
                          @foreach($category->subCategories as $subCategory)
                          <li class="list-group-item">
                            <a href="{{ route('frontent.product_list', [$subCategory->slug ?? "" ]) }}" class="menu-link py-1">{{ $subCategory->name ?? '' }}</a>
                          </li> 
                          @endforeach
                        </ul>
                        @endif
                      </div>
                    </div>
                  </div>
                  @endforeach
                  @endif

                   
                   


                </div> <!-- Nested Accordion Ends -->

              </ul>
            </div>
          </div>
        </div><!-- /.accordion-item -->
      </div><!-- /.accordion-item -->


      @if(count($colors) > 0)
      <div class="accordion" id="color-filters">
        <div class="accordion-item mb-4 pb-3">
          <h5 class="accordion-header" id="accordion-heading-1">
            <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-filter-2" aria-expanded="true" aria-controls="accordion-filter-2">
              Colors
              <svg class="accordion-button__icon type2" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg">
                <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                  <path d="M5.35668 0.159286C5.16235 -0.053094 4.83769 -0.0530941 4.64287 0.159286L0.147611 5.05963C-0.0492049 5.27473 -0.049205 5.62357 0.147611 5.83813C0.344427 6.05323 0.664108 6.05323 0.860924 5.83813L5 1.32706L9.13858 5.83867C9.33589 6.05378 9.65507 6.05378 9.85239 5.83867C10.0492 5.62357 10.0492 5.27473 9.85239 5.06018L5.35668 0.159286Z" />
                </g>
              </svg>
            </button>
          </h5>
          

          <div id="accordion-filter-2" class="accordion-collapse collapse show border-0" aria-labelledby="accordion-heading-1" data-bs-parent="#color-filters">
            <div class="accordion-body px-0 pb-0">
              <div class="d-flex flex-wrap">
                @foreach($colors as $color)
                <a href="{{ route('frontent.product_list', [$sub_category->slug ?? "" ]) }}?color={{ $color->color_code ?? $color->name}}" class="swatch-color js-filter" style="color: {{ $color->name ?? '' }}"></a>
                @endforeach 
              </div>
            </div>
          </div>
        </div><!-- /.accordion-item -->
      </div><!-- /.accordion -->
      @endif
      

      @if(count($sizes) > 0)
      <div class="accordion" id="size-filters">
        <div class="accordion-item mb-4 pb-3">
          <h5 class="accordion-header" id="accordion-heading-size">
            <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-filter-size" aria-expanded="true" aria-controls="accordion-filter-size">
              Sizes
              <svg class="accordion-button__icon type2" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg">
                <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                  <path d="M5.35668 0.159286C5.16235 -0.053094 4.83769 -0.0530941 4.64287 0.159286L0.147611 5.05963C-0.0492049 5.27473 -0.049205 5.62357 0.147611 5.83813C0.344427 6.05323 0.664108 6.05323 0.860924 5.83813L5 1.32706L9.13858 5.83867C9.33589 6.05378 9.65507 6.05378 9.85239 5.83867C10.0492 5.62357 10.0492 5.27473 9.85239 5.06018L5.35668 0.159286Z" />
                </g>
              </svg>
            </button>
          </h5>
          <div id="accordion-filter-size" class="accordion-collapse collapse show border-0" aria-labelledby="accordion-heading-size" data-bs-parent="#size-filters">
            <div class="accordion-body px-0 pb-0">
              <div class="d-flex flex-wrap">
                @foreach($sizes as $size)
                <a href="#" class="swatch-size btn btn-sm btn-outline-light mb-3 me-3 js-filter">{{ $size->name ?? '' }}</a>
                @endforeach 
              </div>
            </div>
          </div>
        </div><!-- /.accordion-item -->
      </div><!-- /.accordion -->
      @endif

      <div class="accordion" id="price-filters">
        <div class="accordion-item mb-4">
          <h5 class="accordion-header mb-2" id="accordion-heading-price">
            <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-filter-price" aria-expanded="true" aria-controls="accordion-filter-price">
              Price
              <svg class="accordion-button__icon type2" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg">
                <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                  <path d="M5.35668 0.159286C5.16235 -0.053094 4.83769 -0.0530941 4.64287 0.159286L0.147611 5.05963C-0.0492049 5.27473 -0.049205 5.62357 0.147611 5.83813C0.344427 6.05323 0.664108 6.05323 0.860924 5.83813L5 1.32706L9.13858 5.83867C9.33589 6.05378 9.65507 6.05378 9.85239 5.83867C10.0492 5.62357 10.0492 5.27473 9.85239 5.06018L5.35668 0.159286Z" />
                </g>
              </svg>
            </button>
          </h5>
          <div id="accordion-filter-price" class="accordion-collapse collapse show border-0" aria-labelledby="accordion-heading-price" data-bs-parent="#price-filters">
            <input class="price-range-slider" type="text" name="price_range" value="" data-slider-min="10" data-slider-max="1000" data-slider-step="5" data-slider-value="[250,450]" data-currency="₹">
            <div class="price-range__info d-flex align-items-center mt-2">
              <div class="me-auto">
                <span class="text-secondary">Min Price: </span>
                <span class="price-range__min">₹250</span>
              </div>
              <div>
                <span class="text-secondary">Max Price: </span>
                <span class="price-range__max">₹450</span>
              </div>
            </div>
          </div>
        </div><!-- /.accordion-item -->
      </div><!-- /.accordion -->
    </div><!-- /.shop-sidebar -->

    <div class="shop-list flex-grow-1">
      <div class="d-flex justify-content-between mb-4 pb-md-2">
        <div class="breadcrumb mb-0 d-none d-md-block flex-grow-1">
          <a href="#" class="menu-link menu-link_us-s text-uppercase fw-medium">Home</a>
          <span class="breadcrumb-separator menu-link fw-medium ps-1 pe-1">/</span>
          <a href="#" class="menu-link menu-link_us-s text-uppercase fw-medium">{{ $sub_category->getMainCategory?->name ?? '' }}</a>
          <span class="breadcrumb-separator menu-link fw-medium ps-1 pe-1">/</span>
          <span class="text-uppercase fw-medium">{{ $sub_category->name ?? '' }}</span>
        </div><!-- /.breadcrumb -->

        <div class="shop-acs d-flex align-items-center justify-content-between justify-content-md-end flex-grow-1">
          <select class="shop-acs__select form-select w-auto border-0 py-0 order-1 order-md-0" aria-label="Sort Items" name="total-number">
            <option selected>Default Sorting</option>
            <option value="1">Popularity</option>
            <option value="2">Best selling</option>
            <option value="3">Price, low to high</option>
            <option value="3">Price, high to low</option>
            <option value="3">Newest First</option>
          </select>

          <div class="shop-asc__seprator mx-3 bg-light d-none d-md-block order-md-0"></div>

          <div class="col-size align-items-center order-1 d-none d-lg-flex">
            <span class="text-uppercase fw-medium me-2">View</span>
            <button class="btn-link fw-medium me-2 js-cols-size" data-target="products-grid" data-cols="2">2</button>
            <button class="btn-link fw-medium me-2 js-cols-size" data-target="products-grid" data-cols="3">3</button>
            <button class="btn-link fw-medium js-cols-size" data-target="products-grid" data-cols="4">4</button>
          </div><!-- /.col-size -->

          <div class="shop-filter d-flex align-items-center order-0 order-md-3 d-lg-none">
            <button class="btn-link btn-link_f d-flex align-items-center ps-0 js-open-aside" data-aside="shopFilter">
              <svg class="d-inline-block align-middle me-2" width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#icon_filter" />
              </svg>
              <span class="text-uppercase fw-medium d-inline-block align-middle">Filter</span>
            </button>
          </div><!-- /.col-size d-flex align-items-center ms-auto ms-md-3 -->
        </div><!-- /.shop-acs -->
      </div><!-- /.d-flex justify-content-between -->

      <div class="products-grid row row-cols-2 row-cols-md-3" id="products-grid">
      @if(count($products) > 0)
      @foreach($products as $product)


        <div class="product-card-wrapper">
          <div class="product-card mb-3 mb-md-4 mb-xxl-5">
            <div class="pc__img-wrapper">
              <div class="swiper-container background-img js-swiper-slider" data-settings='{"resizeObserver": true}'>
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <a href="product1_simple.html"><img loading="lazy" src="{{url('assets/frontend/images/products/1.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img"></a>
                  </div><!-- /.pc__img-wrapper -->
                  <div class="swiper-slide">
                    <a href="product1_simple.html"><img loading="lazy" src="{{url('assets/frontend/images/products/4.jpg')}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img"></a>
                  </div><!-- /.pc__img-wrapper -->
                </div>
                <span class="pc__img-prev"><svg width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_prev_sm" />
                  </svg></span>
                <span class="pc__img-next"><svg width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_next_sm" />
                  </svg></span>
              </div>
              <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
            </div>

            <div class="pc__info position-relative">
              <p class="pc__category">Dresses</p>
              <h6 class="pc__title"><a href="product1_simple.html">Cropped Faux Leather Jacket</a></h6>
              <div class="product-card__price d-flex">
                <span class="money price">₹29</span>
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
        @endforeach


         
         
      </div><!-- /.products-grid row -->

      <nav class="shop-pages d-flex justify-content-between mt-3" aria-label="Page navigation">
        <a href="#" class="btn-link d-inline-flex align-items-center">
          <svg class="me-1" width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg">
            <use href="#icon_prev_sm" />
          </svg>
          <span class="fw-medium">PREV</span>
        </a>
        <ul class="pagination mb-0">
          <li class="page-item"><a class="btn-link px-1 mx-2 btn-link_active" href="#">1</a></li>
          <li class="page-item"><a class="btn-link px-1 mx-2" href="#">2</a></li>
          <li class="page-item"><a class="btn-link px-1 mx-2" href="#">3</a></li>
          <li class="page-item"><a class="btn-link px-1 mx-2" href="#">4</a></li>
        </ul>
        <a href="#" class="btn-link d-inline-flex align-items-center">
          <span class="fw-medium me-1">NEXT</span>
          <svg width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg">
            <use href="#icon_next_sm" />
          </svg>
        </a>
      </nav>

      @else
      <div class="alert alert-danger col-md-12" role="alert">
       <center>No Products Found</center> 
      </div>
      @endif
    </div>
  </section><!-- /.shop-main container -->
</main>


@section('javascript-section')
@endsection
@endsection