@extends('layout.main')
@section('main')
<style>
    .containersrs {
        border: 2px solid #ccc;
        border-radius: 4px;
        overflow: hidden;
        max-width: 600px;
        margin-top: 20px;

    }

    .titlesen {
        background-color: #d3d3d3;
        color: black;
        padding: 10px;
        font-size: 16px;
        font-weight: bold;
        border-bottom: 1px solid #ccc;
    }

    .contentene {
        background-color: #fff;
        color: #333;
        padding: 10px;
        font-size: 16px;
        border-radius: 0 0 4px 4px;
    }
    .coupon-detail {
        display: inline-block;
        padding: 10px;
        border: 1px solid lightskyblue;
        background-color: white;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .coupon-detail input[type="radio"] {
        display: none;
    }

    .coupon-detail label {
        display: block;
        position: relative;
        padding-left: 30px;
        cursor: pointer;
        font-size: 16px;
        color: black;
    }

    .coupon-detail label:before {
        color: orangered;
        content: "";
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 20px;
        height: 20px;
        border: 1px solid orange;
        background-color: white;
        border-radius: 3px;
    }

    .coupon-detail input[type="radio"]:checked + label:before {
        background-color: red;
    }

    .coupon-detail input[type="radio"]:checked + label:after {
        content: "\2714";
        position: absolute;
        top: 50%;
        left: 5px;
        transform: translateY(-50%);
        font-size: 14px;
        color: white;
    }


    .discount-deal {
    background-color: #ff0000;
    color: #ffffff;
    padding: 20px 25px;
    font-size: 24px;
    font-weight: bold;
    text-align: center;
    position: relative;
    overflow: hidden;
    animation: pulse 2s infinite;
    clip-path: polygon(
        10% 0%, 15% 5%, 20% 0%, 25% 5%, 30% 0%, 35% 5%, 40% 0%,
        45% 5%, 50% 0%, 55% 5%, 60% 0%, 65% 5%, 70% 0%, 75% 5%,
        80% 0%, 85% 5%, 90% 0%, 95% 5%, 100% 0%, 95% 15%, 100% 20%,
        95% 25%, 100% 30%, 95% 35%, 100% 40%, 95% 45%, 100% 50%,
        95% 55%, 100% 60%, 95% 65%, 100% 70%, 95% 75%, 100% 80%,
        95% 85%, 100% 90%, 95% 95%, 90% 100%, 85% 95%, 80% 100%,
        75% 95%, 70% 100%, 65% 95%, 60% 100%, 55% 95%, 50% 100%,
        45% 95%, 40% 100%, 35% 95%, 30% 100%, 25% 95%, 20% 100%,
        15% 95%, 10% 100%, 5% 95%, 0% 100%, 5% 85%, 0% 80%,
        5% 75%, 0% 70%, 5% 65%, 0% 60%, 5% 55%, 0% 50%,
        5% 45%, 0% 40%, 5% 35%, 0% 30%, 5% 25%, 0% 20%,
        5% 15%, 0% 10%
    );
}

@keyframes pulse {
    0%, 100% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.1);
    }
}

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
    .variant-button {
        width: 100px;
        height: 50px;
        background-color: #f0f0f0;
        border: 2px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        position: relative; /* Để đặt dấu tick */
        transition: all 0.3s ease;
    }

    .variant-button.selected {
        border-color: red;
    }

    .variant-button.selected::before {
        content: "";
        position: absolute;
        top: 0;
        right: 0;
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 0 20px 20px 0;
        border-color: transparent red transparent transparent;
    }

    .variant-button.selected::after {
        content: "✔"; /* Ký hiệu tick */
        color: white;
        font-size: 12px;
        position: absolute;
        top: 10%; /* Đưa tick vào giữa */
        right: 4px; /* Cách lề phải */
        transform: translate(50%, -50%); /* Đặt tick vào giữa và thẳng đứng lên */
    }
    /*
    classify
    */
    .data-class{
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
        }
        .class-option {
                display: inline-block;
                margin: 10px;
            }
        .class-option input[type="radio"] {
                display: none;
            }
        .class-option label {
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
        .class-option input[type="radio"]:checked + label {
                border: 2px solid red;
            }
    .class-button {
        width: 100px;
        height: 50px;
        background-color: #f0f0f0;
        border: 2px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        position: relative; /* Để đặt dấu tick */
        transition: all 0.3s ease;
    }

    .class-button .selecte {
        border-color: red;
    }

    .class-button .selecte::before {
        content: "";
        position: absolute;
        top: 0;
        right: 0;
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 0 20px 20px 0;
        border-color: transparent red transparent transparent;
    }

    .class-button .selecte::after {
        content: "✔"; /* Ký hiệu tick */
        color: white;
        font-size: 100px;
        position: absolute;
        top: 20px; /* Đưa tick vào giữa */
        right: 4px; /* Cách lề phải */
        transform: translate(50%, -50%); /* Đặt tick vào giữa và thẳng đứng lên */
    }
</style>
<section class="breadcrumb__area box-plr-75">
    <div class="container">
        <div class="row">
            <div class="col-xxl-12">
                <div class="breadcrumb__wrapper">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li> >>
                          <li>{{$detail->name}}</li>
                        </ol>
                      </nav>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- <div id="cart-icon">
    <img src="cart-icon.png" alt="Cart">
</div> --}}
<div class="product-details">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="product__details-nav d-sm-flex align-items-start">
                    <ul class="nav nav-tabs flex-sm-column justify-content-between" id="productThumbTab" role="tablist">
                         @foreach ($detail->variant as $item)
                              <li class="nav-item" role="presentation">
                          <button class="nav-link" id="thumb{{$item->id}}-tab" data-bs-toggle="tab" data-bs-target="#thumb{{$item->id}}" type="button" role="tab" aria-controls="thumbTwo" aria-selected="false">
                            <img src="{{asset('uploads/variation/'.$item->image)}}" alt="" width="100px">
                          </button>
                        </li>
                         @endforeach


                    </ul>
                    <div class="product__details-thumb">
                        <div class="tab-content" id="productThumbContent">
                           @foreach ($detail->variant as $key => $item)
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
                        {{-- <span>(01 review)</span>
                        <span><a href="#">Add your review</a></span> --}}

                    </div>
                    <div class="price mb-10">
                        @if($sales)

                         <input type="hidden" id="discounts" value="{{$sales->discount}}">
                         <input type="hidden" id="id_types" value="{{$sales->id_types}}">

                            @php
                                if($sales->id_types == 2){
                                    $discount = ($sales->discount / 100) * $detail->price;
                                } else {
                                    $discount = $sales->discount;
                                }
                                $finalPrice = number_format($detail->price - $discount, 0, ',', '.') . ' VNĐ';
                            @endphp
                            <span id="price">{{ $finalPrice }}</span><sup style="color:red;"> - @if($sales->id_types ==2) {{ $sales->discount }} % @else {{ number_format($sales->discount,0,',','.') }} VNĐ @endif </sup>
                        @else
                            <span id="price">{{ number_format($detail->price, 0, ',', '.') }} VNĐ</span>
                        @endif
                    </div>

                    @if($sales)
                    <div class="discount-deal">
                        {{$sales->title}}
                    </div>
                    @endif

                    <div class="data-color">
                        @foreach ($detail->variant as  $item)
                        <div class="color-option">
                         <input type="radio" id="color-{{$item->id}}" name="datacolors" data-image="{{ $item->image }}" value="{{{$item->variant}}}">
                         <label for="color-{{$item->id}}" class="variant-button"><img style="margin-top: -10px; margin-left: -10px;" src="{{asset('/uploads/variation/'.$item->image)}}" width="28px" alt="">{{$item->variant}}</label>
                     </div>
                        @endforeach

                     </div>
                     <div class="data-class">
                         @foreach ($detail->classify as  $item)
                         <div class="class-option">
                          <input type="radio" id="classify-{{$item->id}}"
                           data-quantity = "{{{$item->quantity}}}"
                           data-price = "{{{$item->price}}}"
                           data-classify = "{{$item->id}}"
                           name="dataclassify"
                           value="{{{$item->classify}}}">

                          <label for="classify-{{$item->id}}" class="class-button">{{$item->classify}}</label>
                      </div>
                         @endforeach

                      </div>
                      <div class="product-stock mb-20">
                        <h5 id="stock"></h5>
                    </div>
                    <div class="coupons">
                        <div class="containersrs">

                            <div class="titlesen">Các deal dành cho bạn khi mua sản phẩm </div>
                            <div class="contentene">
                                @if($data)

                                @foreach ($data as $key => $item)
                                <div class="coupon-detail">
                                  <input type="radio" id="option{{$key}}" name="optionsKey" value="{{$item->sku}}">
                                  <label for="option{{$key}}">@if($item->id_types == 2) <span style="color: red">Giảm giá : {{$item->discount}} %  </span>       @else   <span style="color: red">Giảm giá : {{number_format($item->discount,0,',','.')}} VNĐ  </span>          @endif</label>
                              </div>
                                @endforeach
                          @endif
                            </div>
                        </div>
                    </div>
                    <div class="features-des mb-20 mt-10">
                        <div class="containersrs">

                            <div class="titlesen">Các ưu đãi khác</div>
                            <div class="contentene"> {!! $detail->description !!}</div>
                        </div>
                    </div>
                    <div class="features-des mb-20 mt-10">
                        <div class="containersrs">

                            <div class="titlesen">Các cách bảo hành</div>
                            <div class="contentene">
                               - Bảo hành 24 tháng kể từ ngày mua <br>
                               - Lỗi 1 đổi 1 trong vòng 7 ngày<br>
                               - Được test máy trực tiếp<br>
                               - Lỗi phát sinh do nhà phát hành đềU chịu trách nhiệm <br>
                            </div>
                        </div>
                    </div>


                    <div class="cart-option mb-15">
                        <div class="product-quantity mr-20">
                            <div class="quantity">
                                <div>-</div>
                                <input type="text" value="1">
                                <div>+</div>
                            </div>

                        </div>
                       @if(Auth::user())

                       <button id="addToCart" class="cart-btn">Add to Cart</button>

                       @else
                       <button onclick="login()"  class="cart-btn btn-secondary">Your A Login Account</button>

                       @endif


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
                                    {{-- <span class="discount">-15%</span> --}}
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
                                    <div >
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
        {{-- Data carts --}}
        <input type="hidden" id="dataPrice" >
        <input type="hidden" id="dataImage">
        <input type="hidden" id="dataColor">
        <input type="hidden" id="quantityClassify">
        <input type="hidden" id="idClassify">
        <input type="hidden" id="dataQuantity" value="1">
       @if(Auth::user())
       <input type="hidden" id="user" value="{{Auth::user()->id}}">
       @endif


    </div>


    <script type="text/javascript">

       var buttons = document.querySelectorAll('.variant-button');
       var btns = document.querySelectorAll('.class-button');


buttons.forEach(function(button) {
    button.addEventListener('click', function() {
        // Xóa class 'selected' từ tất cả các button
        buttons.forEach(function(btn) {
            btn.classList.remove('selected');
        });


        this.classList.add('selected');
    });
});
btns.forEach(function(click) {
    click.addEventListener('click', function() {

        btns.forEach(function(btnClass) {
            btnClass.classList.remove('selecte');
        });
        this.classList.add('selecte');
    });
});

        document.addEventListener('DOMContentLoaded', function () {
            const radioButtons = document.querySelectorAll('input[name="datacolors"]');

            radioButtons.forEach(radio => {
                radio.addEventListener('change', function () {
                    if (this.checked) {

                        const selectedColor = this.value;
                        const dataImg = this.dataset.image ;
                        // console.log(dataImg);
                        document.getElementById('dataImage').value = dataImg;
                        document.getElementById('dataColor').value =selectedColor;



                    }
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            const radioButtons = document.querySelectorAll('input[name="dataclassify"]');
              let max = 0;
            radioButtons.forEach(radio => {
                radio.addEventListener('change', function () {
                    if (this.checked) {
                        const selectedColor = this.value;
                        let quantity =   radio.dataset.quantity;
                        let price = radio.dataset.price;
                        let id = radio.dataset.classify;

                        let discounts = document.getElementById('discounts');
                        let id_types = document.getElementById('id_types');


                        if(discounts){
                            let discount = discounts.value;
                        if(id_types.value == 2){

                          let aount = (discount / 100) * price;
                          let prices = price - aount;
                        document.getElementById('dataPrice').value = prices;
                        const formatter = new Intl.NumberFormat('vi-VN', {
                                style: 'currency',
                                currency: 'VND',
                                minimumFractionDigits: 0,
                                });
                        const priceFormat =formatter.format(prices);
                        let element = document.getElementById('price');
                         element.textContent = priceFormat;

                        }else{
                           let aount = discount;
                          let prices = price-aount;
                        document.getElementById('dataPrice').value = prices;
                        const formatter = new Intl.NumberFormat('vi-VN', {
                                style: 'currency',
                                currency: 'VND',
                                minimumFractionDigits: 0,
                                });
                        const priceFormat =formatter.format(prices);
                        let element = document.getElementById('price');
                         element.textContent = priceFormat;


                        }
                        }else{
                            document.getElementById('dataPrice').value = price;
                            const formatter = new Intl.NumberFormat('vi-VN', {
                                style: 'currency',
                                currency: 'VND',
                                minimumFractionDigits: 0,
                                });
                        const priceFormat =formatter.format(price);
                        let element = document.getElementById('price');
                         element.textContent = priceFormat;

                        }
                        document.getElementById('idClassify').value = id;



                        max = quantity;
                        document.getElementById('quantityClassify').value =quantity;
                        document.getElementById('stock').innerHTML = `Availability: <span> ${quantity}  in stock</span>`;


                    }
                });
            });

            const minusBtn = document.querySelector('.quantity div:first-child');
            const plusBtn = document.querySelector('.quantity div:last-child');
            const input = document.querySelector('.quantity input');

            minusBtn.addEventListener('click', function () {
                let value = parseInt(input.value);
                if (value > 1) {
                    input.value = value - 1;
                    document.getElementById('dataQuantity').value = input.value;

                }
            });

            plusBtn.addEventListener('click', function () {
                let value = parseInt(input.value);
                input.value = value + 1;
                document.getElementById('dataQuantity').value = input.value;

                if (max == 0){
                    alert('Vui lòng chọn các tuỳ chọn !');
                    input.value = 1;
                    return false;

                }else if(value ==  max){
                    alert(`Quầy hàng chỉ còn ${max} sản phẩm !`);
                    input.value = max;
                    document.getElementById('dataQuantity').value = max;
                    return false;
                } else{
                    input.value = value + 1;
                    document.getElementById('dataQuantity').value = input.value;

                }
            });

   document.querySelector('.keys0').classList.add('active')

        });
    </script>
    <script type="text/javascript">
    function login(){
        if(confirm('Bạn chua đăng nhập , bạn muốn đến trang đăng nhập chứ ?')){
           return window.location.href = '{{ route('login') }}';
        }
    }
    </script>
    <script type="module">
      $('#addToCart').click(function(){
        // let token = 'fbgnGA2XygDoSTUWUguGVwwVqkH3Rd38gJyKToez';


            let images = $('#dataImage').val();
            let price = $('#dataPrice').val();
            let name = "{{ $detail->name }}"
            let quantitys = $('#dataQuantity').val();
            let productID = "{{ $detail->id }}";
            let user = $('#user').val();
            let idClassify = $('#idClassify').val();
            let quantityClassify = $('#quantityClassify').val();
            let dataColor = $('#dataColor').val();


           if(images !== "" && price !== "" && name !== "" && quantitys !== "" ){
              $.ajax({
                 url:'{{route('getCart')}}',
                 method:'GET',
                 data:{
                    idClassify,
                    quantityClassify,
                    dataColor
                 },
                 success:function(data){
                    if(data){
                        let id = data.id;
                        // console.log(id);
              $.ajax({
                 url:'{{route('quantityCart')}}',
                 method:'GET',
                 data:{
                    quantitys,
                    id
                 },
                 success:function(){
                    alert('Thêm thành công vào giỏ hàng');
                    window.location.reload();
                 }

              })
                    }else{
                $.ajax({
                        url:'{{ route('carts') }}',
                        method:'GET',
                        data:{
                        dataColor,
                        idClassify,
                        price,
                        images,
                        name,
                        quantitys,
                        productID,
                        user,
                        },
                        success:function(){
                            alert('Thêm vào giỏ hàng thành công !')
                            window.location.reload()
                        }
                    })
                    }
                 }
              })

           }else{
            alert('Bạn chưa chọn các tuỳ chọn !');
           }


      })
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    const radios = document.querySelectorAll('input[name="optionsKey"]');
    radios.forEach(radio => {
        radio.addEventListener('click', function() {
            // Sao chép giá trị của radio được chọn vào clipboard
            navigator.clipboard.writeText(this.value)
                .then(() => {
                    // alert(`Copy mã thành công ! Mã của bạn là : ${this.value} hãy nhập mã khi thanh toán nhé !`)
                    // Thêm các thông báo hoặc xử lý khác sau khi sao chép thành công
                })
                .catch(err => {
                    console.error('Lỗi khi sao chép giá trị: ', err);
                });
        });
    });
});

    </script>

</div>

@endsection
