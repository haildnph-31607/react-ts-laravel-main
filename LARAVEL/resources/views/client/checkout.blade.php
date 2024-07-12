@extends('layout.main')
@section('main')
    <main>
        <!-- page-banner-area-start -->
        <div class="page-banner-area page-banner-height-2" data-background="assets/img/banner/page-banner-4.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-banner-content text-center">
                            <h4 class="breadcrumb-title">Checkout</h4>
                            <div class="breadcrumb-two">
                                <nav>
                                    <nav class="breadcrumb-trail breadcrumbs">
                                        <ul class="breadcrumb-menu">
                                            <li class="breadcrumb-trail">
                                                <a href="{{ route('index') }}"><span>Home</span></a>
                                            </li>
                                            <li class="trail-item">
                                                <span>Checkout</span>
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

        <!-- coupon-area-start -->
        <section class="coupon-area pt-120 pb-30">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        {{-- <div class="coupon-accordion">
                    <!-- ACCORDION START -->
                    <h3>Returning customer? <span id="showlogin">Click here to login</span></h3>
                    <div id="checkout-login" class="coupon-content">
                    <div class="coupon-info">
                        <p class="coupon-text">Quisque gravida turpis sit amet nulla posuere lacinia. Cras sed est
                                sit amet ipsum luctus.</p>
                        <form action="#">
                                <p class="form-row-first">
                                <label>Username or email <span class="required">*</span></label>
                                <input type="text">
                                </p>
                                <p class="form-row-last">
                                <label>Password <span class="required">*</span></label>
                                <input type="text">
                                </p>
                                <p class="form-row">
                                <button class="tp-btn-h1" type="submit">Login</button>
                                <label>
                                    <input type="checkbox">
                                    Remember me
                                </label>
                                </p>
                                <p class="lost-password">
                                <a href="#">Lost your password?</a>
                                </p>
                        </form>
                    </div>
                    </div>
                    <!-- ACCORDION END -->
            </div> --}}
                    </div>
                    <div class="col-md-6">
                        <div class="coupon-accordion">
                            <!-- ACCORDION START -->
                            <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
                            <div id="checkout_coupon" class="coupon-checkout-content">
                                <div class="coupon-info">

                                    <p class="checkout-coupon">
                                        <input type="text" placeholder="Coupon Code" id="coupon" required>
                                        <button class="tp-btn-h1" type="submit" id="btnCoupon">Apply Coupon</button>
                                    </p>

                                </div>
                            </div>
                            <!-- ACCORDION END -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- coupon-area-end -->

        <!-- checkout-area-start -->
        <section class="checkout-area pb-85">
            <div class="container">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="checkbox-form">
                            <h3>Billing Details</h3>
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Full Name</label>
                                        <input type="text" placeholder="Full Name" id="name">
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Address <span class="required">*</span></label>
                                        <input type="text" placeholder="Street address" id="address">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>District <span class="required">*</span></label>
                                        <input type="text" placeholder="District" id="district">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Conscious <span class="required">*</span></label>
                                        <input type="text" placeholder="Town / City" id="conscious">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Country <span class="required">*</span></label>
                                        <input type="text" placeholder="" id="country">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Postcode / Zip <span class="required">*</span></label>
                                        <input type="text" placeholder="Postcode / Zip" id="code">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Email Address <span class="required">*</span></label>
                                        <input type="email" placeholder="" id="email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Phone <span class="required">*</span></label>
                                        <input type="text" placeholder="Phone Number" id="phone">
                                    </div>
                                </div>

                                <button type="submit" id="infomation" class="btn btn-success">Add Infomation</button>


                            </div>

                        </div>
                    </div>
                    {{--  --}}
                    <div class="col-lg-6">
                        <div class="your-order mb-30 ">
                            <h3>Your order</h3>
                            <div class="your-order-table table-responsive">
                                @if (count($cart) > 0)
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product-name">Name</th>
                                                <th class="product-total">Image</th>
                                                <th class="product-total">Quantity</th>
                                                <th class="product-total">Price</th>
                                                <th class="product-total">Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cart as $item)
                                                <tr class="cart_item">
                                                    <td class="product-name">
                                                        {{ $item->name }}
                                                    </td>
                                                    <td class="product-total">
                                                        <img src="{{ asset('uploads/variation/' . $item->image) }}"
                                                            width="100px" alt="">
                                                    </td>
                                                    <td>{{ $item->quantity }}</td>
                                                    <td>
                                                        {{ number_format($item->price) }} VNĐ
                                                    </td>
                                                    <td>
                                                        <button class="btn" onclick="return confirm('Bạn muốn xoá ?')"
                                                            id="deleteCart" data-id="{{ $item->id }}"> <ion-icon
                                                                name="trash-outline"></ion-icon></button>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                                @else
                                    <h3><ion-icon name="receipt-outline"></ion-icon> Không có sản phẩm nào !</h3>
                                @endif
                                <table>

                                    <tfoot>
                                        <tr class="cart-subtotal">
                                            <th>Cart Subtotal</th>
                                            <td><span class="amount" id="amount">{{ number_format($total) }} VNĐ</span>
                                            </td>
                                        </tr>
                                        <tr class="shipping">
                                            <th>Shipping</th>
                                            <td>
                                                <ul>
                                                    <li>
                                                        @if ($total < 20000000)
                                                            <input type="radio" name="shipping" checked>
                                                            <label>
                                                                Flat Rate: <span class="amount">50.000 VNĐ</span>
                                                            </label>
                                                        @else
                                                            <input type="radio" name="shipping" disabled>
                                                            <label>
                                                                Flat Rate: <span class="amount">50.000 VNĐ</span>
                                                            </label>
                                                        @endif
                                                    </li>
                                                    <li>
                                                        @if ($total > 20000000)
                                                            <input type="radio" name="shipping" checked>
                                                            <label>Free Shipping:</label>
                                                        @else
                                                            <input type="radio" name="shipping" disabled>
                                                            <label>Free Shipping:</label>
                                                        @endif
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <td><strong><span class="amount" id="amounts">
                                                        @if ($total < 20000000)
                                                            {{ number_format($total + 50000) }}
                                                        @else
                                                            {{ number_format($total) }}
                                                        @endif
                                                        VNĐ
                                                    </span></strong>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <div class="payment-method">
                                <div class="accordion" id="checkoutAccordion">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="checkoutOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#bankOne" aria-expanded="true" aria-controls="bankOne">
                                                Direct Bank Transfer
                                            </button>
                                        </h2>
                                        <div id="bankOne" class="accordion-collapse collapse show"
                                            aria-labelledby="checkoutOne" data-bs-parent="#checkoutAccordion">
                                            <div class="accordion-body">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="paymentTwo">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#payment" aria-expanded="false"
                                                aria-controls="payment">
                                                Cheque Payment
                                            </button>
                                        </h2>
                                        <div id="payment" class="accordion-collapse collapse"
                                            aria-labelledby="paymentTwo" data-bs-parent="#checkoutAccordion">
                                            <div class="accordion-body">
                                                <p>Please send your cheque to Store Name, Store Street, Store Town, Store
                                                    State / County, Store Postcode.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="paypalThree">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#paypal" aria-expanded="false"
                                                aria-controls="paypal">
                                                PayPal
                                            </button>
                                        </h2>
                                        <div id="paypal" class="accordion-collapse collapse"
                                            aria-labelledby="paypalThree" data-bs-parent="#checkoutAccordion">
                                            <div class="accordion-body">
                                                <p>Pay via PayPal; you can pay with your credit card if you don’t have a
                                                    PayPal account.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-button-payment mt-20">
                                    @if ($total == 0)
                                        <button type="submit" class="btn btn-secondary">Place order</button>
                                    @else
                                        <button type="submit" class="tp-btn-h1">Place order</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

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
        <script type="module">
            $('#btnCoupon').click(function() {
                let value = $('#coupon').val();
                if (value == '') {
                    alert('Vui lòng điền mã giảm giá');
                } else {
                    $.ajax({
                        url: '{{ route('CheckCoupon') }}',
                        method: 'GET',
                        data: {
                            value,
                        },
                        success: function(data) {
                            if (data) {
                                let Amout = (data.discount / 100) * {{ $total }}
                                let realPrice = {{ $total }} - Amout;
                                let realPricee = {{ $total }} - Amout;
                                if ({{ $total }} < 20000000) {
                                    realPrice += 50000
                                } else {
                                    realPrice += 0
                                }
                                const formattedNumber = realPrice.toLocaleString('vi-VN');
                                const formattedNumbers = realPricee.toLocaleString('vi-VN');
                                document.getElementById('amount').innerHTML =
                                    `${formattedNumbers } VNĐ <sup style="color:red;">- ${data.discount} %</sup>`;
                                document.getElementById('amounts').innerHTML =
                                    `${formattedNumber } VNĐ  <sup style="color:red;">- ${data.discount} %</sup>`;
                                alert(data.success)
                            } else {
                                alert(' Mã đã hết hạnn hoặc không tồn tại trên hệ thống')
                            }

                        }
                    })
                }
            })
        </script>
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
                        success: function(data) {
                            alert('Xoá thành công');

                            window.location.reload();

                        }
                    })
                })
            }
        </script>
        <script type="module">
            $('#infomation').click(function() {
                let name = $('#name').val();
                let address = $('#address').val();
                let district = $('#district').val();
                let conscious = $('#conscious').val();
                let country = $('#country').val();
                let code = $('#code').val();
                let email = $('#email').val();
                let phone = $('#phone').val();
                let id = {{ Auth::user()->id }}
                $.ajax({
                    url: '{{ route('AddCustomer') }}',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    data: {
                        name,
                        address,
                        district,
                        conscious,
                        country,
                        code,
                        email,
                        phone,
                        id
                    },
                    success: function() {
                        alert('Thanh cong ?')
                    }
                })




            })
        </script>
        <script type="module">
            $('document').ready(function() {
                let id = {{ Auth::user()->id }};
                $.ajax({
                    url: '{{ route('getCustomer') }}',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        id,
                    },
                    success: function(data) {
                        if (data) {
                            $('#name').prop('disabled', true);
                            $('#address').prop('disabled', true);
                            $('#district').prop('disabled', true);
                            $('#conscious').prop('disabled', true);
                            $('#country').prop('disabled', true);
                            $('#code').prop('disabled', true);
                            $('#phone').prop('disabled', true);
                            $('#email').prop('disabled', true);
                            //
                            $('#name').val(data.name);
                            $('#address').val(data.address);
                            $('#district').val(data.district);
                            $('#conscious').val(data.conscious);
                            $('#country').val(data.country);
                            $('#code').val(data.postal_code);
                            $('#phone').val(data.phone);
                            $('#email').val(data.email);
                            $('#infomation').attr('id', 'updateInfomation');

                            // Đổi nội dung của nút button
                            $('#updateInfomation').text('Update Information');
                        }
                    }

                })
            })
        </script>

    </main>
@endsection
