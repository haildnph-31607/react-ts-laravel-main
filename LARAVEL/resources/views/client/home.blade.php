@extends('layout.main')
@section('main')
<main>

    <div class="slider-area">
        <div class="swiper-container slider__active">
            <div class="slider-wrapper swiper-wrapper">
                <div class="single-slider swiper-slide slider-height d-flex align-items-center" data-background="{{asset('banner/01-slide-1.jpg')}}">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-5">
                                <div class="slider-content">
                                    <div class="slider-top-btn" data-animation="fadeInLeft" data-delay="1.5s">
                                        <a href="{{route('detail-product',1)}}" class="st-btn b-radius">HOT DEALS</a>
                                    </div>
                                    <h2 data-animation="fadeInLeft" data-delay="1.7s" class="pt-15 slider-title pb-5">SALE 30% OFF <br> FUTURE FOOTBALL BOOTS</h2>
                                    <p class="pr-20 slider_text" data-animation="fadeInLeft" data-delay="1.9s">Discount 30% On Products & Free Shipping</p>
                                    <div class="slider-bottom-btn mt-75">
                                        <a data-animation="fadeInUp" data-delay="1.15s" href="shop.html" class="st-btn-b b-radius">Discover now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slider swiper-slide slider-height d-flex align-items-center" data-background="{{asset('banner/02-slide-1.jpg')}}">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-5">
                                <div class="slider-content">
                                    <div class="slider-top-btn" data-animation="fadeInLeft" data-delay="1s">
                                        <a href="{{route('detail-product',1)}}" class="st-btn b-radius">New Arraivels</a>
                                    </div>
                                    <h2 data-animation="fadeInLeft" data-delay="1.5s" class="pt-15 slider-title pb-5">SALE 20% OFF<br> SAMSUNG GALAXY BUDS </h2>
                                    <p class="pr-20 slider_text" data-animation="fadeInLeft" data-delay="1.7s">Discount 30% On Products & Free Shipping</p>
                                    <div class="slider-bottom-btn mt-75">
                                        <a data-animation="fadeInUp" data-delay="1.9s" href="shop.html" class="st-btn-b b-radius">Discover now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slider swiper-slide slider-height d-flex align-items-center" data-background="{{asset('banner/01-slide-3.jpg')}}">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-5">
                                <div class="slider-content">
                                    <div class="slider-top-btn" data-animation="fadeInLeft" data-delay="1s">
                                        <a href="{{route('detail-product',1)}}" class="st-btn b-radius">New DEALS</a>
                                    </div>
                                    <h2 data-animation="fadeInLeft" data-delay="1.5s" class="pt-15 slider-title pb-5">SALE 30% OFF <br> FUTURE FOOTBALL BOOTS</h2>
                                    <p class="pr-20 slider_text" data-animation="fadeInLeft" data-delay="1.8s">Discount 30% On Products & Free Shipping</p>
                                    <div class="slider-bottom-btn mt-75">
                                        <a data-animation="fadeInUp" data-delay="1.10s" href="shop.html" class="st-btn-b b-radius">Discover now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-slider-paginations"></div>
            </div>
        </div>
    </div>

    <section class="banner__area pt-20 pb-10">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="banner__item p-relative w-img mb-30">
                        <div class="banner__img">
                            <a href="{{route('detail-product',1)}}"><img src="{{asset('area/banner-1.jpg')}}" alt=""></a>
                        </div>
                        <div class="banner__content">
                            <h6><a href="{{route('detail-product',1)}}">Intelligent <br> New Touch Control</a></h6>
                            <p>Discount  20% On Products</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="banner__item p-relative mb-30 w-img">
                        <div class="banner__img">
                            <a href="{{route('detail-product',1)}}"><img src="{{asset('area/banner-2.jpg')}}" alt=""></a>
                        </div>
                        <div class="banner__content">
                            <h6><a href="{{route('detail-product',1)}}">On-sale <br> Best Prices</a></h6>
                            <p>Limited Time: Online Only!</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="banner__item p-relative mb-30 w-img">
                        <div class="banner__img">
                            <a href="{{route('detail-product',1)}}"><img src="{{asset('area/banner-3.jpg')}}" alt=""></a>
                        </div>
                        <div class="banner__content">
                            <h6><a href="{{route('detail-product',1)}}">Hot Sale <br> Super Laptops 2022 </a></h6>
                            <p>Free Shipping All Order</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="topsell__area-1 pt-15">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section__head d-flex justify-content-between mb-10">
                        <div class="section__title">
                            <h5 class="st-titile-d">Top Deals Of The Day</h5>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="product-bs-slider">
                    <div class="product-slider swiper-container">
                        <div class="swiper-wrapper">

                   @foreach($product as $item)

                   <div class="product__item swiper-slide">
                    <div class="product__thumb fix">
                        <div class="product-image w-img">
                            <a href="{{route('detail-product',$item->id)}}">
                                <img src="{{asset('/uploads/product/'.$item->image)}}" height="210px" alt="product">
                            </a>
                        </div>
                        <div class="product__offer">
                        <span class="discount">-15%</span>
                        </div>
                        <div class="product-action">
                            <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                <ion-icon style="font-size: 18px; margin-top:10px" name="eye-outline"></ion-icon>
                            </a>
                            <a href="#" class="icon-box icon-box-1">
                                <ion-icon  style="font-size: 18px; margin-top:10px" name="heart-outline"></ion-icon>
                            </a>
                            <a href="#" class="icon-box icon-box-1">
                                <ion-icon  style="font-size: 18px; margin-top:10px" name="layers-outline"></ion-icon>
                            </a>
                        </div>
                    </div>
                    <div class="product__content">
                        <h6><a href="{{route('detail-product',$item->id)}}">{{$item->name}}</a></h6>
                        <div class="rating mb-5">
                            <ul>
                                <ion-icon  style="font-size: 16px; color: orange" name="star-outline"></ion-icon>
                                <ion-icon style="font-size: 16px;  color: orange" name="star-outline"></ion-icon>
                                <ion-icon style="font-size: 16px;  color: orange" name="star-outline"></ion-icon>
                                <ion-icon style="font-size: 16px;  color: orange" name="star-outline"></ion-icon>
                                <ion-icon style="font-size: 16px;  color: orange" name="star-outline"></ion-icon>
                            </ul>
                            <span>(01 review)</span>
                        </div>
                        <div class="price mb-10">
                            <span> {{ number_format($item->price, 0, ',', '.')  }} VNĐ</span>
                        </div>
                        <div class="progress mb-5">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 10%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="progress-rate">
                            <span>Brand : {{$item->category->name}}</span>
                        </div>
                        <div class="payment">
                            <img src="{{asset('logo/momo.png')}}" alt="" width="68px">
                            <img src="{{asset('logo/paypal.jpg')}}" alt="" width="68px">
                            <img src="{{asset('logo/vnpay.jpg')}}" alt="" width="68px">
                        </div>
                    </div>
                    <div class="product__add-cart text-center">
                        <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                        <a href="{{route('detail-product',$item->id)}}"> View To Product</a>
                        </button>
                    </div>
                </div>


                   @endforeach


                        </div>
                    </div>

                    <div class="bs-button bs-button-prev"><ion-icon style="margin-top: 10px" name="chevron-back-circle-outline"></ion-icon></div>
                    <div class="bs-button bs-button-next"><ion-icon style="margin-top: 10px" name="chevron-forward-circle-outline"></ion-icon></div>
                </div>
            </div>
        </div>
    </section>

    <section class="banner__area banner__area-d pb-10">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="banner__item p-relative w-img mb-30">
                        <div class="banner__img">
                            <a href="{{route('detail-product',1)}}"><img src="{{asset('banner/bannerVnpay.png')}}" height="100px"  alt=""></a>
                        </div>
                        {{-- <div class="banner__content">
                            <span>Bestseller Products</span>
                            <h6><a href="{{route('detail-product',1)}}">PC & Docking Station</a></h6>
                            <p>Discount 20% Off, Top Quality Products</p>
                        </div> --}}
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12" >
                    <div class="banner__item p-relative mb-30 w-img">
                        <div class="banner__img">
                            <a  href="{{route('detail-product',1)}}"><img src="{{asset('banner/paypal.jpg')}}" alt="" height="100px" ></a>
                        </div>
                        {{-- <div class="banner__content">
                            <span>Featured Products</span>
                            <h6><a href="{{route('detail-product',1)}}">Accessories iPhone</a></h6>
                            <p>Free Shipping All Order Over $99</p>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="topsell__area-2 pt-15">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section__head d-flex justify-content-between mb-10">
                        <div class="section__title">
                            <h5 class="st-titile">Top Selling Products</h5>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="tab-content" id="flast-sell-tabContent">
                        <div class="tab-pane fade active show" id="computer" role="tabpanel" aria-labelledby="computer-tab">
                            <div class="product-bs-slider-2">
                                <div class="product-slider-2 swiper-container">
                                    <div class="swiper-wrapper">

                                   @foreach ($product as $item)
                                   <div class="product__item swiper-slide">
                                    <div class="product__thumb fix">
                                        <div class="product-image w-img">
                                            <a href="{{route('detail-product',$item->id)}}">
                                                <img src="{{asset('uploads/product/'.$item->image)}}" height="210px"  alt="product">
                                            </a>
                                        </div>
                                        <div class="product__offer">
                                        <span class="discount">-15%</span>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                               <ion-icon style="font-size: 18px; margin-top:10px" name="eye-outline"></ion-icon>

                                            </a>
                                            <a href="#" class="icon-box icon-box-1">
                                                <ion-icon  style="font-size: 18px; margin-top:10px" name="heart-outline"></ion-icon>
                                            </a>
                                            <a href="#" class="icon-box icon-box-1">
                                                <ion-icon  style="font-size: 18px; margin-top:10px" name="layers-outline"></ion-icon>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product__content">
                                        <h6><a href="{{route('detail-product',$item->id)}}">{{$item->name}}</a></h6>
                                        <div class="rating mb-5">
                                            <ul>
                                               <ion-icon  style="font-size: 16px; color: orange" name="star-outline"></ion-icon>
                                               <ion-icon style="font-size: 16px;  color: orange" name="star-outline"></ion-icon>
                                               <ion-icon style="font-size: 16px;  color: orange" name="star-outline"></ion-icon>
                                               <ion-icon style="font-size: 16px;  color: orange" name="star-outline"></ion-icon>
                                               <ion-icon style="font-size: 16px;  color: orange" name="star-outline"></ion-icon>
                                            </ul>
                                            <span>(01 review)</span>
                                        </div>
                                        <div class="price">
                                            <span> {{ number_format($item->price, 0, ',', '.')  }} VNĐ</span>
                                        </div>
                                        <div class="payment">
                                            <img src="{{asset('logo/momo.png')}}" alt="" width="68px">
                                            <img src="{{asset('logo/paypal.jpg')}}" alt="" width="68px">
                                            <img src="{{asset('logo/vnpay.jpg')}}" alt="" width="68px">
                                        </div>
                                    </div>
                                    <div class="product__add-cart text-center">
                                        <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                      <a href="{{route('detail-product',$item->id)}}">View To Product</a>
                                        </button>
                                    </div>

                                </div>
                                   @endforeach

                                    </div>
                                </div>

                                <div class="bs-button bs2-button-prev"><ion-icon style="margin-top: 10px" name="chevron-back-circle-outline"></ion-icon></div>
                                <div class="bs-button bs2-button-next"><ion-icon style="margin-top: 10px" name="chevron-forward-circle-outline"></ion-icon></div>
                            </div>
                        </div>
                        {{-- <div class="tab-pane fade" id="samsung" role="tabpanel" aria-labelledby="samsung-tab">
                            <div class="product-bs-slider-2">
                                <div class="product-slider-2 swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="product__item swiper-slide">
                                            <div class="product__thumb fix">
                                                <div class="product-image w-img">
                                                    <a href="{{route('detail-product',1)}}">
                                                        <img src="assets/img/product/tp-1.jpg" alt="product">
                                                    </a>
                                                </div>
                                                <div class="product__offer">
                                                <span class="discount">-15%</span>
                                                </div>
                                                <div class="product-action">
                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-heart"></i>
                                                        <i class="fal fa-heart"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-layer-group"></i>
                                                        <i class="fal fa-layer-group"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product__content">
                                                <h6><a href="{{route('detail-product',1)}}">Epple iPad Pro 10.5-inch Cellular 64G</a></h6>
                                                <div class="rating mb-5">
                                                    <ul>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                    </ul>
                                                    <span>(01 review)</span>
                                                </div>
                                                <div class="price">
                                                    <span>$105-$110</span>
                                                </div>
                                            </div>
                                            <div class="product__add-cart text-center">
                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                Add to Cart
                                                </button>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="bs-button bs2-button-prev"><i class="fal fa-chevron-left"></i></div>
                                <div class="bs-button bs2-button-next"><i class="fal fa-chevron-right"></i></div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="htc" role="tabpanel" aria-labelledby="htc-tab">
                            <div class="product-bs-slider-2">
                                <div class="product-slider-2 swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="product__item swiper-slide">
                                            <div class="product__thumb fix">
                                                <div class="product-image w-img">
                                                    <a href="{{route('detail-product',1)}}">
                                                        <img src="assets/img/product/tp-4.jpg" alt="product">
                                                    </a>
                                                </div>
                                                <div class="product-action">
                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-heart"></i>
                                                        <i class="fal fa-heart"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-layer-group"></i>
                                                        <i class="fal fa-layer-group"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product__content">
                                                <h6><a href="{{route('detail-product',1)}}">Wireless Bluetooth Over-Ear Headphones</a></h6>
                                                <div class="rating mb-5">
                                                    <ul>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                    </ul>
                                                    <span>(01 review)</span>
                                                </div>
                                                <div class="price">
                                                    <span>$100-$180</span>
                                                </div>
                                            </div>
                                            <div class="product__add-cart text-center">
                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                Add to Cart
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="bs-button bs2-button-prev"><i class="fal fa-chevron-left"></i></div>
                                <div class="bs-button bs2-button-next"><i class="fal fa-chevron-right"></i></div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nokia" role="tabpanel" aria-labelledby="nokia-tab">
                            <div class="product-bs-slider-2">
                                <div class="product-slider-2 swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="product__item swiper-slide">
                                            <div class="product__thumb fix">
                                                <div class="product-image w-img">
                                                    <a href="{{route('detail-product',1)}}">
                                                        <img src="assets/img/product/tp-1.jpg" alt="product">
                                                    </a>
                                                </div>
                                                <div class="product__offer">
                                                <span class="discount">-15%</span>
                                                </div>
                                                <div class="product-action">
                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-heart"></i>
                                                        <i class="fal fa-heart"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-layer-group"></i>
                                                        <i class="fal fa-layer-group"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product__content">
                                                <h6><a href="{{route('detail-product',1)}}">Epple iPad Pro 10.5-inch Cellular 64G</a></h6>
                                                <div class="rating mb-5">
                                                    <ul>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                    </ul>
                                                    <span>(01 review)</span>
                                                </div>
                                                <div class="price">
                                                    <span>$105-$110</span>
                                                </div>
                                            </div>
                                            <div class="product__add-cart text-center">
                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                Add to Cart
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="bs-button bs2-button-prev"><i class="fal fa-chevron-left"></i></div>
                                <div class="bs-button bs2-button-next"><i class="fal fa-chevron-right"></i></div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="cell" role="tabpanel" aria-labelledby="cell-tab">
                            <div class="product-bs-slider-2">
                                <div class="product-slider-2 swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="product__item swiper-slide">
                                            <div class="product__thumb fix">
                                                <div class="product-image w-img">
                                                    <a href="{{route('detail-product',1)}}">
                                                        <img src="assets/img/product/tp-1.jpg" alt="product">
                                                    </a>
                                                </div>
                                                <div class="product__offer">
                                                <span class="discount">-15%</span>
                                                </div>
                                                <div class="product-action">
                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-heart"></i>
                                                        <i class="fal fa-heart"></i>
                                                    </a>
                                                    <a href="#" class="icon-box icon-box-1">
                                                        <i class="fal fa-layer-group"></i>
                                                        <i class="fal fa-layer-group"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product__content">
                                                <h6><a href="{{route('detail-product',1)}}">Epple iPad Pro 10.5-inch Cellular 64G</a></h6>
                                                <div class="rating mb-5">
                                                    <ul>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                    </ul>
                                                    <span>(01 review)</span>
                                                </div>
                                                <div class="price">
                                                    <span>$105-$110</span>
                                                </div>
                                            </div>
                                            <div class="product__add-cart text-center">
                                                <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                Add to Cart
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="bs-button bs2-button-prev"><i class="fal fa-chevron-left"></i></div>
                                <div class="bs-button bs2-button-next"><i class="fal fa-chevron-right"></i></div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>




    <section class="brand-area brand-area-d">
        <div class="container">
            <div class="brand-slider swiper-container pt-50 pb-45">
                <div class="swiper-wrapper">
                    <div class="brand-item w-img swiper-slide">
                        <img src="{{asset('brand/brand-1.jpg')}}" alt="brand">
                    </div>
                    <div class="brand-item w-img swiper-slide">
                        <img src="{{asset('brand/brand-2.jpg')}}" alt="brand">
                    </div>
                    <div class="brand-item w-img swiper-slide">
                        <img src="{{asset('brand/brand-3.jpg')}}" alt="brand">
                    </div>
                    <div class="brand-item w-img swiper-slide">
                        <img src="{{asset('brand/brand-4.jpg')}}" alt="brand">
                    </div>
                    <div class="brand-item w-img swiper-slide">
                        <img src="{{asset('brand/brand-5.jpg')}}" alt="brand">
                    </div>
                    <div class="brand-item w-img swiper-slide">
                        <img src="{{asset('brand/brand-6.jpg')}}" alt="brand">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="moveing-text-area">
        <div class="container">
            <div class="ovic-running">
                <div class="wrap">
                    <div class="inner">
                        <p class="item">Free UK Delivery - Return Over $100.00 ( Excluding Homeware )   |   Free UK Collect From Store</p>
                        <p class="item">Design Week / 15% Off the website / Code: AYOSALE-2020</p>
                        <p class="item">Always iconic. Now organic. Introducing the $20 Organic Tee.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>




</main>

@endsection
