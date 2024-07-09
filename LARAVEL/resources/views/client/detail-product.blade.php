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
                        <span>(01 review)</span>
                        <span><a href="#">Add your review</a></span>
                    </div>
                    <div class="price mb-10">
                        <span id="price">{{ number_format($detail->price, 0, ',', '.')  }} VNĐ</span>
                    </div>
                    <div class="features-des mb-20 mt-10">
                        <ul>
                           {{$detail->description}}
                        </ul>
                    </div>
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
                         <input type="radio" id="classify-{{$item->id}}" data-quantity = "{{{$item->quantity}}}"  data-price = "{{{$item->price}}}" name="dataclassify" value="{{{$item->classify}}}">



                         <label for="classify-{{$item->id}}" class="class-button">{{$item->classify}}</label>
                     </div>
                        @endforeach

                     </div>
                    <div class="product-stock mb-20">
                        <h5 id="stock"></h5>
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
                        document.getElementById('dataPrice').value = price;
                        max = quantity;
                        document.getElementById('stock').innerHTML = `Availability: <span> ${quantity}  in stock</span>`;
                        const formatter = new Intl.NumberFormat('vi-VN', {
                                style: 'currency',
                                currency: 'VND',
                                minimumFractionDigits: 0,
                                });
                        const priceFormat =formatter.format(price);
                        let element = document.getElementById('price');
                         element.textContent = priceFormat;


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
            console.log(user,quantitys);


           if(images !== "" && price !== "" && name !== "" && quantitys !== "" ){
            $.ajax({
            url:'{{ route('carts') }}',
            method:'GET',
            data:{
              price,
              images,
              name,
              quantitys,
              productID,
              user,
            },
            success:function(){
                alert('Thêm vào giỏ hàng thành công !')
            }
         })
           }else{
            alert('Bạn chưa chọn các tuỳ chọn !');
           }


      })
    </script>

</div>

@endsection
