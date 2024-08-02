@extends('layout.main')
@section('main')
<section class="recomand-product-area light-bg-s pt-50 pb-15">
    <div class="container custom-conatiner">
        <div class="row">
            <div class="col-xl-12">
                <div class="section__head d-flex justify-content-between mb-30">
                    <div class="section__title section__title-2">
                        <h5 class="st-titile">Tìm Kiếm Sản Phẩm</h5>
                    </div>
                    <div class="button-wrap button-wrap-2">

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($results as $item)

            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2">
                <div class="product__item product__item-2 b-radius-2 mb-20">
                    <div class="product__thumb fix">
                        <div class="product-image w-img">
                            <a href="{{route('detail-product',$item->id)}}">
                                <img src="{{asset('uploads/product/'.$item->image)}}" height="210px" alt="product">
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
                    <div class="product__content product__content-2">
                        <h6><a href="{{route('detail-product',$item->id)}}">{{$item->name}}</a></h6>
                        <div class="rating mb-5 mt-10">
                            <ul>
                                <li><a href="#"><i class="fal fa-star"></i></a></li>
                                <li><a href="#"><i class="fal fa-star"></i></a></li>
                                <li><a href="#"><i class="fal fa-star"></i></a></li>
                                <li><a href="#"><i class="fal fa-star"></i></a></li>
                                <li><a href="#"><i class="fal fa-star"></i></a></li>
                            </ul>
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
                        </div>
                        <div class="price">
                            <span>{{ number_format($item->price, 0, ',', '.')  }} VNĐ</span>
                        </div>
                    </div>
                    <div class="product__add-cart text-center">
                        <button type="button" class="cart-btn-3 product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                            <a href="{{route('detail-product',$item->id)}}">View To Product</a>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

@endsection
