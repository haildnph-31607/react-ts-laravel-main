@extends('layout.main')
@section('main')
<section class="breadcrumb__area box-plr-75">
    <div class="container">
        <div class="row">
            <div class="col-xxl-12">
                <div class="breadcrumb__wrapper">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Shop</li>
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
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="thumbOne-tab" data-bs-toggle="tab" data-bs-target="#thumbOne" type="button" role="tab" aria-controls="thumbOne" aria-selected="true">
                              <img src="{{asset('product/product-nav-1.jpg')}}" alt="">
                          </button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="thumbTwo-tab" data-bs-toggle="tab" data-bs-target="#thumbTwo" type="button" role="tab" aria-controls="thumbTwo" aria-selected="false">
                            <img src="{{asset('product/product-nav-2.jpg')}}" alt="">
                          </button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="thumbThree-tab" data-bs-toggle="tab" data-bs-target="#thumbThree" type="button" role="tab" aria-controls="thumbThree" aria-selected="false">
                            <img src="{{asset('product/product-nav-3.jpg')}}" alt="">
                          </button>
                        </li>
                    </ul>
                    <div class="product__details-thumb">
                        <div class="tab-content" id="productThumbContent">
                            <div class="tab-pane fade show active" id="thumbOne" role="tabpanel" aria-labelledby="thumbOne-tab">
                                <div class="product__details-nav-thumb w-img">
                                    <img src="{{asset('product/product-nav-big-1.jpg')}}" alt="">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="thumbTwo" role="tabpanel" aria-labelledby="thumbTwo-tab">
                                <div class="product__details-nav-thumb w-img">
                                    <img src="{{asset('product/product-nav-big-3.jpg')}}" alt="">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="thumbThree" role="tabpanel" aria-labelledby="thumbThree-tab">
                                <div class="product__details-nav-thumb w-img">
                                    <img src="{{asset('product/product-nav-big-2.jpg')}}" alt="">
                                </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="product__details-content">
                    <h6>Samsung Galaxy A12, 32GB, Black – (Locked)</h6>
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
                        <span>$216.00</span>
                    </div>
                    <div class="features-des mb-20 mt-10">
                        <ul>
                            <li><a href="product-details.html"><i class="fas fa-circle"></i> Bass and Stereo Sound.</a></li>
                            <li><a href="product-details.html"><i class="fas fa-circle"></i> Display with 3088 x 1440 pixels resolution.</a></li>
                            <li><a href="product-details.html"><i class="fas fa-circle"></i> Memory, Storage &amp; SIM: 12GB RAM, 256GB.</a></li>
                            <li><a href="product-details.html"><i class="fas fa-circle"></i> Androi v10.0 Operating system.</a></li>
                        </ul>
                    </div>
                    <div class="product-stock mb-20">
                        <h5>Availability: <span> 940 in stock</span></h5>
                    </div>
                    <div class="cart-option mb-15">
                        <div class="product-quantity mr-20">
                            <div class="cart-plus-minus p-relative"><input type="text" value="1"><div class="dec qtybutton">-</div><div class="inc qtybutton">+</div></div>
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
                                <a href="#">iPhone</a>
                                <a href="#">Tablets</a>
                            </span>
                            <span class="tagged_as">
                                <span class="title">Tags:</span>
                                <a href="#">Smartphone</a>,
                                <a href="#">Tablets</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
