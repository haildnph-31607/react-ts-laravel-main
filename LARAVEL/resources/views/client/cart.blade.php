@extends('layout.main')
@section('main')
    <main>
        <!-- page-banner-area-start -->
        <div class="page-banner-area page-banner-height-2" data-background="assets/img/banner/page-banner-4.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-banner-content text-center">
                            <h4 class="breadcrumb-title">Your Cart</h4>
                            <div class="breadcrumb-two">
                                <nav>
                                    <nav class="breadcrumb-trail breadcrumbs">
                                        <ul class="breadcrumb-menu">
                                            <li class="breadcrumb-trail">
                                                <a href="{{ route('index') }}"><span>Home</span></a>
                                            </li>
                                            <li class="trail-item">
                                                <span>Cart</span>
                                            </li>
                                        </ul>
                                    </nav>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page-banner-area-end -->

        <!-- cart-area-start -->
        <section class="cart-area pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-12">

                        <div class="table-content table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">Images</th>
                                        <th class="cart-product-name">Product</th>
                                        <th class="product-price">Unit Price</th>
                                        <th class="product-price">Variant</th>
                                        <th class="product-price">Capacity</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                        <th class="product-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart as $key => $item)
                                        <tr>
                                            <td class="product-thumbnail"><a
                                                    href="{{ route('detail-product', $item->id_product) }}"><img
                                                        src="{{ asset('uploads/variation/' . $item->image) }}"
                                                        alt=""></a></td>
                                            <td class="product-name"><a href="shop-details.html">{{ $item->name }}</a>
                                            </td>
                                            <td class="product-price"><span class="amount">{{ number_format($item->price) }}
                                                    VNĐ</span></td>
                                            <td class="product-price"><span class="amount">{{ $item->variant }}</span></td>
                                            <td class="product-price"><span
                                                    class="amount">{{ $item->classify }}</span></td>
                                            <td class="product-quantity">
                                                <input type="number" class="form-control" data-price="{{ $item->price }}"
                                                    data-cart="{{ $item->id }}" value="{{ $item->quantity }}"
                                                    id="quantityCart" min="1">
                                            </td>
                                            <td class="product-subtotal"><span class="amount"
                                                    id="totalupdate">{{ number_format($item->total) }} VNĐ</span></td>
                                            <td class="product-remove">
                                                <button class="btn" onclick="return confirm('Bạn muốn xoá ?')"
                                                    id="deleteCart" data-id="{{ $item->id }}"> <ion-icon
                                                        name="trash-outline"></ion-icon></button>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        {{-- <div class="row">
                          <div class="col-12">
                                <div class="coupon-all">
                                   <div class="coupon">
                                      <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                      <button class="tp-btn-h1" name="apply_coupon" type="submit">Apply
                                            coupon</button>
                                   </div>
                                   <div class="coupon2">
                                      <button class="tp-btn-h1" name="update_cart" type="submit">Update cart</button>
                                   </div>
                                </div>
                          </div>
                       </div> --}}
                        <div class="row justify-content-end">
                            <div class="col-md-5">
                                <div class="cart-page-total">
                                    <h2>Cart totals</h2>
                                    <ul class="mb-20">
                                        <li>Subtotal <span id="subtotal">{{ number_format($total) }} VNĐ</span></li>
                                        {{-- <li>Total <span i>{{ number_format($total) }} VNĐ</span></li> --}}
                                    </ul>
                                    @if ($total === 0)
                                        <button class="tp-btn-h1 btn-secondary"
                                            onclick="alert('Không có sản phẩm trong giỏ hàng')">Proceed to checkout</button>
                                    @else
                                        <a class="tp-btn-h1" href="{{ route('checkout', Auth::user()->id) }}">Proceed to
                                            checkout</a>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- cart-area-end -->

        <!-- cta-area-start -->
        <section class="cta-area d-ldark-bg pt-55 pb-10">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="cta-item cta-item-d mb-30">
                            <h5 class="cta-title">Follow Us</h5>
                            <p>We make consolidating, marketing and tracking your social media website easy.</p>
                            <div class="cta-social">
                                <div class="social-icon">
                                    <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                                    <a href="#" class="youtube"><i class="fab fa-youtube"></i></a>
                                    <a href="#" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="#" class="rss"><i class="fas fa-rss"></i></a>
                                    <a href="#" class="dribbble"><i class="fab fa-dribbble"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="cta-item mb-30">
                            <h5 class="cta-title">Sign Up To Newsletter</h5>
                            <p>Join 60.000+ subscribers and get a new discount coupon on every Saturday.</p>
                            <div class="subscribe__form">
                                <form action="#">
                                    <input type="email" placeholder="Enter your email here...">
                                    <button>subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="cta-item mb-30">
                            <h5 class="cta-title">Download App</h5>
                            <p>DukaMarket App is now available on App Store & Google Play. Get it now.</p>
                            <div class="cta-apps">
                                <div class="apps-store">
                                    <a href="#"><img src="assets/img/brand/app_ios.png" alt=""></a>
                                    <a href="#"><img src="assets/img/brand/app_android.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <script>
            let deleteCart = document.querySelectorAll('#deleteCart');
            for (const iterator of deleteCart) {
                iterator.addEventListener('click', function() {
                    let id = iterator.dataset.id;
                    $.ajax({
                        url: '{{ route('deleteCarts') }}',
                        method: 'GET',
                        data: {
                            id,
                        },
                        success: function() {
                            alert('Xoá thành công ');
                            window.location.reload();
                        }
                    })
                })
            }
        </script>
        <script>
            let quantityCart = document.querySelectorAll('#quantityCart');
            let totalupdate = document.querySelectorAll('#totalupdate');
            let subtotal = document.querySelector('#subtotal')

            let tongs = 0;

            function formatCurrency(number) {
                return number.toLocaleString('vi-VN');
            }

            function updateTotalCart() {
                tongs = 0;
                for (let i = 0; i < quantityCart.length; i++) {
                    let price = Number(quantityCart[i].dataset.price);
                    let quantity = Number(quantityCart[i].value);
                    let total = price * quantity;
                    let id = quantityCart[i].dataset.cart;
                    tongs += total;
                    const formattedNumber = formatCurrency(total);
                    totalupdate[i].innerHTML = `${formattedNumber} VNĐ`;
                   $.ajax({
                       url:'{{route("updateCart")}}',
                       method:'GET',
                       data:{
                        id,
                        total,
                        quantity
                       },
                       success:function(){
                        console.log('Thành công');
                       }
                   })

                }

                subtotal.innerHTML = formatCurrency(tongs) + " VNĐ";
            }

            for (let i = 0; i < quantityCart.length; i++) {
                quantityCart[i].addEventListener('change', updateTotalCart);
            }


            updateTotalCart();
        </script>

    </main>
@endsection
