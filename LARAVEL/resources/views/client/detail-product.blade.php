@extends('layout.main')
@section('main')
    <style>
        .disabled-option {
            opacity: 0.5;
            pointer-events: none;

        }

        .containersrs {
            border: 2px solid #ccc;
            border-radius: 4px;
            overflow: hidden;
            max-width: 600px;
            margin-top: 20px;

        }

        .titlesen {
            background-color: #f5f3f3;
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

        .coupon-detail input[type="radio"]:checked+label:before {
            background-color: red;
        }

        .coupon-detail input[type="radio"]:checked+label:after {
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
            clip-path: polygon(10% 0%, 15% 5%, 20% 0%, 25% 5%, 30% 0%, 35% 5%, 40% 0%,
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
                    5% 15%, 0% 10%);
        }

        @keyframes pulse {

            0%,
            100% {
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

        .data-color {
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

        .color-option input[type="radio"]:checked+label {
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
            position: relative;
            /* Để đặt dấu tick */
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
            content: "✔";
            color: white;
            font-size: 12px;
            position: absolute;
            top: 10%;

            right: 4px;

            transform: translate(50%, -50%);

        }






        .data-class {
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

        .class-option input[type="radio"]:checked+label {
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
            position: relative;
            /* Để đặt dấu tick */
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
            content: "✔";
            /* Ký hiệu tick */
            color: white;
            font-size: 100px;
            position: absolute;
            top: 20px;
            /* Đưa tick vào giữa */
            right: 4px;
            /* Cách lề phải */
            transform: translate(50%, -50%);
            /* Đặt tick vào giữa và thẳng đứng lên */
        }
    </style>
    <section class="breadcrumb__area box-plr-75">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li> >>
                                <li>{{ $detail->name }}</li>
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
                            @foreach ($detail->thumbnail as $item)
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="thumb{{ $item->id }}-tab" data-bs-toggle="tab"
                                        data-bs-target="#thumb{{ $item->id }}" type="button" role="tab"
                                        aria-controls="thumbTwo" aria-selected="false">
                                        <img src="{{ asset('uploads/thumbnail/' . $item->image) }}" alt=""
                                            width="100px">
                                    </button>
                                </li>
                            @endforeach


                        </ul>
                        <div class="product__details-thumb">
                            <div class="tab-content" id="productThumbContent">
                                @foreach ($detail->thumbnail as $key => $item)
                                    <div class="tab-pane fade show {{ 'keys' . $key }}" id="thumb{{ $item->id }}"
                                        role="tabpanel" aria-labelledby="thumb{{ $item->id }}-tab">
                                        <div class="product__details-nav-thumb w-img">
                                            <img src="{{ asset('uploads/thumbnail/' . $item->image) }}" alt=""
                                                id="hoverImage">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="features-des mb-20 mt-10">
                        <div class="containersrs">

                            <div class="titlesen">Mô tả sản phẩm</div>
                            <div class="contentene">
                            @if ($description)
                            {!! $description->content!!}
                            @else
                              <h1 class="text-center">Không có mô tả về sản phẩm !</h1>
                            @endif
                            </div>
                        </div>
                    </div>
                    <div class="features-des mb-20 mt-10">
                        <div class="containersrs">

                            <div class="titlesen">Video về sản phẩm</div>
                            <div class="contentene">

                             @if ($prvd)
                             {!! $prvd->content !!}
                            @else
                              <h1 class="text-center">Không có video về sản phẩm !</h1>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="product__details-content">
                        <h6>{{ $detail->name }}</h6>
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
                            @if ($sales)
                                <input type="hidden" id="discounts" value="{{ $sales->discount }}">
                                <input type="hidden" id="id_types" value="{{ $sales->id_types }}">

                                @php
                                    if ($sales->id_types == 2) {
                                        $discount = ($sales->discount / 100) * $detail->price;
                                    } else {
                                        $discount = $sales->discount;
                                    }
                                    $finalPrice = number_format($detail->price - $discount, 0, ',', '.') . ' VNĐ';
                                @endphp
                                <span id="price">{{ $finalPrice }}</span><sup style="color:red;"> - @if ($sales->id_types == 2)
                                        {{ $sales->discount }} %
                                    @else
                                        {{ number_format($sales->discount, 0, ',', '.') }} VNĐ
                                    @endif </sup>
                            @else
                                <span id="price">{{ number_format($detail->price, 0, ',', '.') }} VNĐ</span>
                            @endif
                        </div>

                        @if ($sales)
                            <div class="discount-deal">
                                {{ $sales->title }}
                            </div>
                        @endif


                        <div id="product-container">
                            <b>Chọn Phân Loại Sản Phẩm</b> <br>
                        </div>
                        <div id="variant-display"></div>
                        <div id="stocks" class="text-danger"></div>
                        <div class="coupons">
                            <div class="containersrs">

                                <div class="titlesen">Các deal dành cho bạn khi mua sản phẩm </div>
                                <div class="contentene">
                                    @if ($data)
                                        @foreach ($data as $key => $item)
                                            <div class="coupon-detail">
                                                <input type="radio" id="option{{ $key }}" name="optionsKey"
                                                    value="{{ $item->sku }}">
                                                <label for="option{{ $key }}">
                                                    @if ($item->id_types == 2)
                                                        <span style="color: red">Giảm giá : {{ $item->discount }} % </span>
                                                    @else
                                                        <span style="color: red">Giảm giá :
                                                            {{ number_format($item->discount, 0, ',', '.') }} VNĐ </span>
                                                    @endif
                                                </label>
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
                            @if (Auth::user())
                                <button id="addToCart" class="cart-btn">Add to Cart</button>
                            @else
                                <button onclick="login()" class="cart-btn btn-secondary">Your A Login Account</button>
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
                                    <a href="#">{{ $detail->category->name }}</a>

                                </span>
                                <span class="tagged_as">
                                    <span class="title">Tags:</span>
                                    <a href="#">Smartphone</a>,
                                    <a href="#">{{ $detail->category->name }}</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="tab-content" id="flast-sell-tabContent">
                        <div class="tab-pane fade active show" id="computer" role="tabpanel"
                            aria-labelledby="computer-tab">
                            <div class="product-bs-slider-2">
                                <div class="product-slider-2 swiper-container">
                                    <div class="swiper-wrapper">

                                        @foreach ($associated as $item)
                                            <div class="product__item swiper-slide">
                                                <div class="product__thumb fix">
                                                    <div class="product-image w-img">
                                                        <a href="{{ route('detail-product', $item->id) }}">
                                                            <img src="{{ asset('uploads/product/' . $item->image) }}"
                                                                height="210px" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="product__offer">
                                                        {{-- <span class="discount">-15%</span> --}}
                                                    </div>
                                                    <div class="product-action">
                                                        <a href="#" class="icon-box icon-box-1"
                                                            data-bs-toggle="modal" data-bs-target="#productModalId">
                                                            <ion-icon style="font-size: 18px; margin-top:10px"
                                                                name="eye-outline"></ion-icon>

                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <ion-icon style="font-size: 18px; margin-top:10px"
                                                                name="heart-outline"></ion-icon>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <ion-icon style="font-size: 18px; margin-top:10px"
                                                                name="layers-outline"></ion-icon>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product__content">
                                                    <h6><a
                                                            href="{{ route('detail-product', $item->id) }}">{{ $item->name }}</a>
                                                    </h6>
                                                    <div class="rating mb-5">
                                                        <ul>
                                                            <ion-icon style="font-size: 16px; color: orange"
                                                                name="star-outline"></ion-icon>
                                                            <ion-icon style="font-size: 16px;  color: orange"
                                                                name="star-outline"></ion-icon>
                                                            <ion-icon style="font-size: 16px;  color: orange"
                                                                name="star-outline"></ion-icon>
                                                            <ion-icon style="font-size: 16px;  color: orange"
                                                                name="star-outline"></ion-icon>
                                                            <ion-icon style="font-size: 16px;  color: orange"
                                                                name="star-outline"></ion-icon>
                                                        </ul>
                                                        <span>(01 review)</span>
                                                    </div>
                                                    <div>
                                                        <span> {{ number_format($item->price, 0, ',', '.') }} VNĐ</span>
                                                    </div>
                                                </div>
                                                <div class="product__add-cart text-center">
                                                    <button type="button"
                                                        class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                        <a href="{{ route('detail-product', $item->id) }}">View To
                                                            Product</a>
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>

                                <div class="bs-button bs2-button-prev"><ion-icon style="margin-top: 10px"
                                        name="chevron-back-circle-outline"></ion-icon></div>
                                <div class="bs-button bs2-button-next"><ion-icon style="margin-top: 10px"
                                        name="chevron-forward-circle-outline"></ion-icon></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            {{-- Data carts --}}
            <input type="hidden" id="dataPrice">
            <input type="hidden" id="dataImage">
            <input type="hidden" id="dataColor">
            <input type="hidden" id="idProduct" value="{{ $detail->id }}">
            <input type="hidden" id="dataClassify">
            <input type="hidden" id="dataQuantity" value="1">
            @if (Auth::user())
                <input type="hidden" id="user" value="{{ Auth::user()->id }}">
            @endif


        </div>
<script>
            const data = @json($detail->variant);
            var max = 0;

            const grouped = {};
            data.forEach(item => {
                const idClassify = item.classify;
                const idVariant = item.variant;
                const quantity = item.quantity;
                const price = item.price;
                const image = item.image;

                if (!grouped[idClassify]) {
                    grouped[idClassify] = {
                        classify: idClassify,
                        variants: {}
                    };
                }

                if (!grouped[idClassify].variants[idVariant]) {
                    grouped[idClassify].variants[idVariant] = {
                        quantity: quantity,
                        price: price,
                        image: image
                    };
                }
            });

            const productContainer = document.getElementById('product-container');
            const variantDisplay = document.getElementById('variant-display');

            console.log(grouped)
            Object.keys(grouped).forEach(classifyId => {
                const classify = grouped[classifyId];

                const classifyElement = `
            <div class="class-option">
                <input type="radio"
                 id="classify-${classifyId}"
                  data-classify="${classifyId}"
                  name="dataclassify"
                  value="${classifyId}">
                <label
                for="classify-${classifyId}"
                 class="class-button">${classify.classify}</label>
            </div>
        `;
                productContainer.insertAdjacentHTML('beforeend', classifyElement);


                const classifyRadio = productContainer.querySelector(`#classify-${classifyId}`);
                classifyRadio.addEventListener('click', () => {

                    variantDisplay.innerHTML = '';
                    document.querySelector('#dataClassify').value = classifyRadio.dataset.classify;

                    const variantContainer = document.createElement('div');
                    variantContainer.className = 'variant-container';

                    Object.keys(classify.variants).forEach(variantId => {
                        const variant = classify.variants[variantId];
                        const isDisabled = variant.quantity == 0 ? 'disabled' : '';
                        const disabledClass = variant.quantity == 0 ? 'disabled-option' : '';
                        const variantElement = `
                        <div class="color-option ${disabledClass}" id="onMouse"  >
                            <input  type="radio" id="variant-${variantId}" name="datacolors" data-classify="${variant.classify}" data-image="${variant.image}"  data-quantity="${variant.quantity}" data-price="${variant.price}" value="${variantId}" ${isDisabled}>
                            <label for="variant-${variantId}" class="variant-button" id="variant-button">
                                <img style="margin-top: -10px; margin-left: -10px;" src="/uploads/variation/${variant.image}" width="28px" alt=""> ${variantId}
                            </label>
                        </div>
                    `;
                        variantContainer.insertAdjacentHTML('beforeend', variantElement);
                    });

                    variantDisplay.appendChild(variantContainer);

                    variantContainer.addEventListener('click', (event) => {
                        if (event.target.matches('input[type="radio"]') && !event.target.disabled) {
                            document.querySelectorAll('.color-option').forEach(v => {
                                v.classList.remove('selected');
                            });
                            event.target.parentElement.classList.add('selected');
                            max = event.target.dataset.quantity;
                            let id_types = document.querySelector('#id_types');
                            let discounts = document.querySelector('#discounts');

                            document.querySelector('#dataPrice').value = event.target.dataset.price;
                            document.querySelector('#dataColor').value = event.target.value;
                            document.querySelector('#dataImage').value = event.target.dataset.image;
                            document.querySelector('#stocks').innerHTML =
                                `Sản phẩm trong kho còn : ${event.target.dataset.quantity} sản phẩm !`


                            //
                            if (discounts) {
                                let discount = discounts.value;

                                if (discount > 0) {
                                    if (id_types.value == 2) {

                                        let aount = (discount / 100) * Number(event.target.dataset
                                            .price);
                                        let prices = Number(event.target.dataset.price) - aount;
                                        document.getElementById('dataPrice').value = prices;
                                        const formatter = new Intl.NumberFormat('vi-VN', {
                                            style: 'currency',
                                            currency: 'VND',
                                            minimumFractionDigits: 0,
                                        });

                                        const priceFormat = formatter.format(prices);
                                        let element = document.getElementById('price');
                                        element.textContent = priceFormat;

                                    } else {
                                        let aount = discount;
                                        let prices = Number(event.target.dataset.price) - aount;
                                        document.getElementById('dataPrice').value = prices;
                                        const formatter = new Intl.NumberFormat('vi-VN', {
                                            style: 'currency',
                                            currency: 'VND',
                                            minimumFractionDigits: 0,
                                        });
                                        const priceFormat = formatter.format(prices);
                                        let element = document.getElementById('price');
                                        element.textContent = priceFormat;


                                    }
                                }
                            } else {

                                const formatter = new Intl.NumberFormat('vi-VN', {
                                    style: 'currency',
                                    currency: 'VND',
                                    minimumFractionDigits: 0,
                                });
                                const priceFormat = formatter.format(event.target.dataset.price);
                                let element = document.getElementById('price');
                                element.textContent = priceFormat;
                                document.querySelector('#dataPrice').value = event.target.dataset.price;


                            }


                        }
                    });
                    const onMouse = document.querySelectorAll('#onMouse');

                    for (let i = 0; i < onMouse.length; i++) {
                        let RadioHover = onMouse[i].querySelector('input');
                        onMouse[i].addEventListener('mouseover', () => {
                            document.querySelector('#hoverImage').src =
                                `/uploads/variation/${RadioHover.dataset.image}`;

                        })

                    }

                });
            });


            const minusBtn = document.querySelector('.quantity div:first-child');
            const plusBtn = document.querySelector('.quantity div:last-child');
            const input = document.querySelector('.quantity input');

            minusBtn.addEventListener('click', function() {
                let value = parseInt(input.value);
                if (value > 1) {
                    input.value = value - 1;
                    document.getElementById('dataQuantity').value = input.value;

                }
            });

            plusBtn.addEventListener('click', function() {
                let value = parseInt(input.value);
                input.value = value + 1;
                document.getElementById('dataQuantity').value = input.value;

                if (max == 0) {
                    alert('Vui lòng chọn các tuỳ chọn !');
                    document.getElementById('dataQuantity').value = 1;
                    input.value = 1;
                    return false;

                } else if (value == max) {
                    alert(`Quầy hàng chỉ còn ${max} sản phẩm !`);
                    input.value = max;
                    document.getElementById('dataQuantity').value = max;
                    return false;
                } else {
                    input.value = value + 1;
                    document.getElementById('dataQuantity').value = input.value;

                }
            });
</script>
<script type="text/javascript">
            function login() {
                if (confirm('Bạn chua đăng nhập , bạn muốn đến trang đăng nhập chứ ?')) {
                    return window.location.href = '{{ route('login') }}';
                }
            }
            document.querySelector('.keys0').classList.add('active');
        </script>
        <script type="module">
            $('#addToCart').click(function() {

                let images = $('#dataImage').val();
                let price = $('#dataPrice').val();
                let name = "{{ $detail->name }}"
                let quantitys = $('#dataQuantity').val();
                let productID = "{{ $detail->id }}";
                let user = $('#user').val();
                let dataClassify = $('#dataClassify').val();
                let dataColor = $('#dataColor').val();


                if (images !== "" && price !== "" && name !== "" && quantitys !== "") {
                    $.ajax({
                        url: '{{ route('getCart') }}',
                        method: 'GET',
                        data: {
                            dataClassify,
                            productID,
                            dataColor
                        },
                        success: function(data) {
                            if (data) {

                                let id = data.id;
                                let quantitysy = Number(data.quantity) + Number(quantitys);
                                let total = quantitysy * price;
                                let checkID = data.id_product;
                                let checkVariant = data.variant;
                                let checkQuantity = data.quantity;

                                let checkClassify = data.classify;

                                 $.ajax({
                                    url:'{{route("checkCart")}}',
                                    method:'GET',
                                    data:{
                                        checkID,
                                        checkVariant,
                                        checkClassify

                                    },
                                    success:function(data){
                                          if(data){
                                            let quantityVariant = data.quantity;
                                            let check = Number(quantitys) + Number(checkQuantity);
                                            console.log(check);
                                            if(check > quantityVariant){
                                                alert(`Sốp không đủ sản phẩm vì giỏ hàng bạn đã có ${checkQuantity} sản phẩm , không thể thêm ${quantitys} sản phẩm nữa !`);
                                            }else{

                                            $.ajax({
                                                url: '{{ route('quantityCart') }}',
                                                method: 'GET',
                                                data: {
                                                    quantitysy,
                                                    total,
                                                    id
                                                },
                                                success: function() {
                                                    alert('Thêm thành công vào giỏ hàng');
                                                    window.location.reload();
                                                }

                                            })
                                            }
                                          }
                                    }
                                 })


                            } else {
                                $.ajax({
                                    url: '{{ route('carts') }}',
                                    method: 'GET',
                                    data: {
                                        dataColor,
                                        dataClassify,
                                        price,
                                        images,
                                        name,
                                        quantitys,
                                        productID,
                                        user,
                                    },
                                    success: function() {
                                        alert('Thêm vào giỏ hàng thành công !')
                                        window.location.reload()
                                    }
                                })
                            }
                        }
                    })

                } else {
                    alert('Bạn chưa chọn các tuỳ chọn !');
                }


            })
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const radios = document.querySelectorAll('input[name="optionsKey"]');
                radios.forEach(radio => {
                    radio.addEventListener('click', function() {

                        navigator.clipboard.writeText(this.value)
                            .then(() => {

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
