@extends('layout.main')
@section('main')
<style>
    .quantity {
        display: flex;
        align-items: center;
    }
    .quantity div {
        cursor: pointer;
        width: 40px;
        height: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #ffff;
        border: 1px solid #ccc;
        user-select: none;
    }
    .quantity input[type="text"] {
        width: 50px;
        height: 40px;
        text-align: center;
        border: 1px solid #ccc;
        margin: 0 5px;
    }
    .data-color{
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
    }
    .color-option {
            display: inline-block;
            margin: 10px;
        }
        .color-option input[type="radio"] {
            display: none;
        }
        .color-option label {
            display: inline-block;
            width: 80px;
            height: 40px;
            border: 2px solid black;
            cursor: pointer;

            transition: border-color 0.3s;
            padding-top: 7px;
            padding-left: 10px;
            color: black;
        }
        .color-option input[type="radio"]:checked + label {
            border: 2px solid red;
        }

</style>
<section class="breadcrumb__area box-plr-75">
    <div class="container">
        <div class="row">
            <div class="col-xxl-12">
                <div class="breadcrumb__wrapper">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                          <li class="breadcrumb-item active" aria-current="page"></li>
                        </ol>
                      </nav>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="product-details">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="product__details-nav d-sm-flex align-items-start">
                    <ul class="nav nav-tabs flex-sm-column justify-content-between" id="productThumbTab" role="tablist">
                         @foreach ($detail->variation as $item)
                              <li class="nav-item" role="presentation">
                          <button class="nav-link" id="thumb{{$item->id}}-tab" data-bs-toggle="tab" data-bs-target="#thumb{{$item->id}}" type="button" role="tab" aria-controls="thumbTwo" aria-selected="false">
                            <img src="{{asset('uploads/variation/'.$item->image)}}" alt="" width="100px">
                          </button>
                        </li>
                         @endforeach


                    </ul>
                    <div class="product__details-thumb">
                        <div class="tab-content" id="productThumbContent">

                           @foreach ($detail->variation as $key=> $item)
                           <div class="tab-pane fade show {{'keys'.$key}}" id="thumb{{$item->id}}" role="tabpanel" aria-labelledby="thumb{{$item->id}}-tab">
                            <div class="product__details-nav-thumb w-img">
                                <img src="{{asset('uploads/variation/'.$item->image)}}" alt="">
                            </div>
                        </div>
                           @endforeach

                          </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="product__details-content">
                    <h6>{{$detail->name}}</h6>
                    <div class="pd-rating mb-10">
                        <ul class="rating">
                            <li><a href="#"><i class="fal fa-star"></i></a></li>
                            <li><a href="#"><i class="fal fa-star"></i></a></li>
                            <li><a href="#"><i class="fal fa-star"></i></a></li>
                            <li><a href="#"><i class="fal fa-star"></i></a></li>
                            <li><a href="#"><i class="fal fa-star"></i></a></li>
                        </ul>
                        <span>(01 review)</span>
                        <span><a href="#">Add your review</a></span>
                    </div>
                    <div class="price mb-10">
                        <span>{{ number_format($detail->price, 0, ',', '.')  }} VNĐ</span>
                    </div>
                    <div class="features-des mb-20 mt-10">
                        <ul>
                           {{$detail->description}}
                        </ul>
                    </div>
                    <div class="data-color">
                       @foreach ($detail->variation as  $item)
                       <div class="color-option">
                        <input type="radio" id="color-{{$item->id}}" name="datacolors" value="{{{$item->colorText}}}">
                        <label for="color-{{$item->id}}" ><img style="margin-top: -10px; margin-left: -10px;" src="{{asset('/uploads/variation/'.$item->image)}}" width="28px" alt="">{{$item->colorText}}</label>
                    </div>
                       @endforeach

                    </div>
                    <div class="product-stock mb-20">
                        {{-- <h5>Availability: <span> 940 in stock</span></h5> --}}
                    </div>
                    <div class="cart-option mb-15">
                        <div class="product-quantity mr-20">
                            <div class="quantity">
                                <div>-</div>
                                <input type="text" value="1">
                                <div>+</div>
                            </div>

                        </div>
                        <a href="cart.html" class="cart-btn">Add to Cart</a>
                    </div>
                    <div class="details-meta">
                        <div class="d-meta-left">
                            <div class="dm-item mr-20">
                                <a href="#"><i class="fal fa-heart"></i>Add to wishlist</a>
                            </div>
                            <div class="dm-item">
                                <a href="#"><i class="fal fa-layer-group"></i>Compare</a>
                            </div>
                        </div>
                        <div class="d-meta-left">
                            <div class="dm-item">
                                <a href="#"><i class="fal fa-share-alt"></i>Share</a>
                            </div>
                        </div>
                    </div>
                    <div class="product-tag-area mt-15">
                        <div class="product_info">
                            <span class="sku_wrapper">
                                <span class="title">SKU:</span>
                                <span class="sku">DK1002</span>
                            </span>
                            <span class="posted_in">
                                <span class="title">Categories:</span>
                                <a href="#">{{$detail->category->name}}</a>

                            </span>
                            <span class="tagged_as">
                                <span class="title">Tags:</span>
                                <a href="#">Smartphone</a>,
                                <a href="#">{{$detail->category->name}}</a>
                            </span>
                        </div>
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

                               @foreach ($associated  as $item)
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

                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            const radioButtons = document.querySelectorAll('input[name="datacolors"]');

            radioButtons.forEach(radio => {
                radio.addEventListener('change', function () {
                    if (this.checked) {
                        const selectedColor = this.value;
                        console.log('Selected color:', selectedColor);

                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
      document.addEventListener('DOMContentLoaded', function () {
            const minusBtn = document.querySelector('.quantity div:first-child');
            const plusBtn = document.querySelector('.quantity div:last-child');
            const input = document.querySelector('.quantity input');

            minusBtn.addEventListener('click', function () {
                let value = parseInt(input.value);
                if (value > 1) {
                    input.value = value - 1;
                }
            });

            plusBtn.addEventListener('click', function () {
                let value = parseInt(input.value);
                input.value = value + 1;
            });
        });
   document.querySelector('.keys0').classList.add('active')
    </script>
</div>

@endsection
