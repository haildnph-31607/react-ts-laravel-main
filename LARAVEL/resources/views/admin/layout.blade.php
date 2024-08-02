<!DOCTYPE html>
<html>



<head>
    <meta charset="utf-8" />
    <title>ADMIN DASHBOARD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Lamarena" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="assets/images/favicon.html">
    <link rel="stylesheet" href="{{ asset('dashboard/morris/morris.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('dashboard/css/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard/css/owl.theme.default.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
    <link href="{{ asset('dashboard/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard/css/metismenu.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard/css/style.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('dashboard/js/modernizr.min.js') }}"></script>
    <script src="https:////cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <style>
        li {
            position: relative;
        }

        .icons {
            position: absolute;
            right: 15px;
        }
    </style>

</head>

<body>
    <div id="wrapper">
        <div class="container-fluid">
            <div class="layout-wrapper">
                <div class="left side-menu">
                    <div class="gggf" id="refgfg">
                        <div class="top-header-left">
                            <a href="{{ route('admin') }}" class="logo">
                                <span>
                                    <img src="{{ asset('logo/image.png') }}" alt=""
                                        style="border: 3px solid lightgreen; border-radius: 50%;" height="50">
                                </span>
                            </a>
                        </div>
                        <div id="sidebar-menu">
                            <ul class="metismenu" id="side-menu">
                                <li class="menu-title">General</li>
                                <li>
                                    <a href="{{ route('admin') }}">
                                        <ion-icon name="home-outline"></ion-icon><span
                                            class="badge badge-danger badge-pill pull-right">7</span> <span> Dashboard
                                        </span>
                                    </a>
                                </li>
                                <li class="menu-title">Framework</li>
                                <li>
                                    <a href="javascript: void(0);"><span> Products </span><ion-icon class="icons"
                                            name="aperture-outline"></ion-icon></a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                        <li><a href="{{ route('product.index') }}">Product List</a></li>
                                        <li><a href="{{ route('product.create') }}">Product Add</a> </li>

                                    </ul>
                                </li>

                                <li>
                                    <a href="javascript: void(0);"><span> Category </span><ion-icon class="icons"
                                            name="layers-outline"></ion-icon></a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                        <li><a href="{{ route('category.index') }}">Category List</a><span></span></li>
                                        <li><a href="{{ route('category.create') }}">Category Add</a> <span></span>
                                        </li>

                                    </ul>
                                </li>


                                <li>
                                    <a href="javascript: void(0);"><span> Coupon </span><ion-icon class="icons"
                                            name="qr-code-outline"></ion-icon></a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                        <li><a href="{{ route('coupon.index') }}">Coupon List</a><span></span></li>
                                        <li><a href="{{ route('coupon.create') }}">Coupon Add</a> <span></span></li>

                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript: void(0);"><span> Sale </span><ion-icon class="icons"
                                            name="qr-code-outline"></ion-icon></a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                        <li><a href="{{ route('sale.index') }}">Sale List</a><span></span></li>
                                        <li><a href="{{ route('sale.create') }}">Sale Add</a> <span></span></li>

                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript: void(0);"><span> User </span><ion-icon class="icons"
                                            name="person-circle-outline"></ion-icon></a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                        <li><a href="{{ route('user.index') }}">User List</a><span></span></li>
                                        <li><a href="{{ route('user.create') }}">User Add</a> <span></span></li>

                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript: void(0);"><span> Role </span><ion-icon class="icons"
                                            name="people-circle-outline"></ion-icon></a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                        <li><a href="{{ route('role.index') }}">Role List</a><span></span></li>
                                        <li><a href="{{ route('role.create') }}">Role Add</a> <span></span></li>

                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript: void(0);"><span> Order </span><ion-icon name="reader-outline"></ion-icon></a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                        <li><a href="{{ route('order.index') }}">Order List</a><span></span></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript: void(0);"><span> Variant </span><ion-icon class="icons"
                                            name="shapes-outline"></ion-icon></a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                        <li><a href="{{ route('variant.index') }}">Variant List</a><span></span></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript: void(0);"><span> Banner </span><ion-icon class="icons"
                                            name="images-outline"></ion-icon></a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                        <li><a href="{{ route('banner.index') }}">Banner List</a><span></span></li>
                                        <li><a href="{{ route('banner.create') }}">Banner Add</a> <span></span></li>

                                    </ul>
                                </li>

                            </ul>

                        </div>


                        <div class="clearfix"></div>

                    </div>


                </div>



                <div class="content-page">


                    <div class="top-header">

                        <nav class="navbar-custom">
                            <div class="container-fluid">
                                <ul class="list-unstyled top-header-right-menu float-right mb-0">
                                    <li class="dropdown notification-list px-3 hide-phone d-none d-sm-block">
                                        <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown"
                                            href="#" role="button" aria-haspopup="false"
                                            aria-expanded="false">English
                                            <img src="{{ asset('logo/image.png') }}" class="ml-2" height="16"
                                                alt="">

                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated ">


                                            <div class="slimscroll" style="max-height: 230px;">

                                                <a href="javascript:void(0);"
                                                    class="dropdown-item notify-item d-flex flex-row justify-content-between">
                                                    <div class="text-left">German</div>
                                                    <img src="{{ asset('logo/image.png') }}" class="ml-2"
                                                        height="16" alt="">
                                                </a>


                                                <a href="javascript:void(0);"
                                                    class="dropdown-item notify-item d-flex flex-row justify-content-between">
                                                    <div class="text-left">Italy</div>
                                                    <img src="{{ asset('logo/image.png') }}" class="ml-2"
                                                        height="16" alt="">
                                                </a>


                                                <a href="javascript:void(0);"
                                                    class="ddropdown-item notify-item d-flex flex-row justify-content-between">
                                                    <div class="text-left">France</div>
                                                    <img src="{{ asset('logo/image.png') }}" class="ml-2"
                                                        height="16" alt="">
                                                </a>


                                                <a href="javascript:void(0);"
                                                    class="dropdown-item notify-item d-flex flex-row justify-content-between">
                                                    <div class="text-left">Spain</div>
                                                    <img src="{{ asset('logo/image.png') }}" class="ml-2"
                                                        height="16" alt="">
                                                </a>

                                            </div>




                                        </div>
                                    </li>

                                    <li class="dropdown notification-list">
                                        <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown"
                                            href="#" role="button" aria-haspopup="false"
                                            aria-expanded="false">

                                            <span class="badge badge-danger badge-pill noti-icon-badge">4</span>
                                        </a>
                                        <div
                                            class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg">

                                            <div class="dropdown-item noti-title">
                                                <h5 class="m-0"><span class="float-right"><a href="#"
                                                            class="text-dark"><small>Clear All</small></a>
                                                    </span>Notification</h5>
                                            </div>

                                            <div class="slimscroll" style="max-height: 230px;">

                                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                                    <div class="notify-icon bg-success">

                                                    </div>
                                                    <p class="notify-details">Your item is shipped<small
                                                            class="text-muted">1 min ago</small></p>
                                                </a>


                                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                                    <div class="notify-icon bg-info">

                                                    </div>
                                                    <p class="notify-details">New order received<small
                                                            class="text-muted">2 hours ago</small></p>
                                                </a>


                                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                                    <div class="notify-icon bg-danger">>
                                                    </div>
                                                    <p class="notify-details">Michael Ballack liked <b>Sophi</b><small
                                                            class="text-muted">3 days ago</small></p>
                                                </a>


                                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                                    <div class="notify-icon bg-info">

                                                    </div>
                                                    <p class="notify-details">New order received<small
                                                            class="text-muted">2 hours ago</small></p>
                                                </a>
                                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                                    <div class="notify-icon bg-purple">

                                                    </div>
                                                    <p class="notify-details">New user registered.<small
                                                            class="text-muted">7 days ago</small></p>
                                                </a>


                                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                                    <div class="notify-icon bg-custom">>
                                                    </div>
                                                    <p class="notify-details">Michael Ballack liked <b>Sophi</b><small
                                                            class="text-muted">8 days ago</small></p>
                                                </a>
                                            </div>


                                            <a href="javascript:void(0);"
                                                class="dropdown-item text-center text-primary notify-item notify-all">
                                                View all
                                            </a>

                                        </div>
                                    </li>

                                    <li class="dropdown notification-list">
                                        <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown"
                                            href="#" role="button" aria-haspopup="false"
                                            aria-expanded="false">


                                            <span class="badge badge-custom badge-pill noti-icon-badge">6</span>
                                        </a>
                                        <div
                                            class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg">


                                            <div class="dropdown-item noti-title">
                                                <h5 class="m-0"><span class="float-right"><a href="#"
                                                            class="text-dark"><small>Clear All</small></a> </span>5 New
                                                    Messages</h5>
                                            </div>

                                            <div class="slimscroll" style="max-height: 230px;">

                                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                                    <div class="notify-icon"><img src="{{ asset('logo/image.png') }}"
                                                            class="img-fluid rounded-circle" alt="" /> </div>
                                                    <p class="notify-details">Jasna Jakimova</p>
                                                    <p class="text-muted font-13 mb-0 user-msg">Hey, how are you? I
                                                        havent seen you long time </p>
                                                </a>


                                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                                    <div class="notify-icon"><img src="{{ asset('logo/image.png') }}"
                                                            class="img-fluid rounded-circle" alt="" /> </div>
                                                    <p class="notify-details">Gereth Smith</p>
                                                    <p class="text-muted font-13 mb-0 user-msg">This looks awesome,
                                                        congratulations</p>
                                                </a>


                                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                                    <div class="notify-icon"><img src="{{ asset('logo/image.png') }}"
                                                            class="img-fluid rounded-circle" alt="" /> </div>
                                                    <p class="notify-details">Jeneth Swonson</p>
                                                    <p class="text-muted font-13 mb-0 user-msg">What are you doing next
                                                        week?</p>
                                                </a>


                                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                                    <div class="notify-icon"><img src="{{ asset('logo/image.png') }}"
                                                            class="img-fluid rounded-circle" alt="" /> </div>
                                                    <p class="notify-details">Sensi Sodran</p>
                                                    <p class="text-muted font-13 mb-0 user-msg">This looks greaaatt :
                                                        I want same like this!</p>
                                                </a>


                                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                                    <div class="notify-icon"><img src="{{ asset('logo/image.png') }}"
                                                            class="img-fluid rounded-circle" alt="" /> </div>
                                                    <p class="notify-details">MIlinto JAkonson</p>
                                                    <p class="text-muted font-13 mb-0 user-msg">Yeah everything is fine
                                                    </p>
                                                </a>
                                            </div>


                                            <a href="javascript:void(0);"
                                                class="dropdown-item text-center text-primary notify-item notify-all">
                                                View all i>
                                            </a>

                                        </div>
                                    </li>

                                    <li class="dropdown notification-list">
                                        <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown"
                                            href="#" role="button" aria-haspopup="false"
                                            aria-expanded="false">
                                            <img src="{{ asset('logo/image.png') }}" alt="user"
                                                class="rounded-circle">
                                        </a>
                                        <div
                                            class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">

                                            <div class="dropdown-item noti-title">
                                                <h6 class="text-overflow m-0">Welcome !</h6>
                                            </div>


                                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                                My Profile</span>
                                            </a>


                                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                                Settings</span>
                                            </a>


                                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                                Support</span>
                                            </a>


                                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                                Lock Screen</span>
                                            </a>


                                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                                Logout</span>
                                            </a>

                                        </div>
                                    </li>

                                </ul>

                                <ul class="list-inline menu-left float-left mb-0">
                                    <li class="float-left toggle-icon">
                                        <button class="button-menu-mobile open-left">
                                            <ion-icon name="menu-outline"></ion-icon>
                                        </button>
                                    </li>
                                    <li class="nav-item hidden-sm-down search-box float-left"> <a
                                            class="nav-link hidden-sm-down text-muted  "
                                            href="javascript:void(0)"></a>
                                        <form class="app-search">
                                            <input type="text" class="form-control" placeholder="Search here"> <a
                                                class="srh-btn"><ion-icon name="search-outline"></ion-icon></a>
                                        </form>
                                    </li>

                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="content">
                        @yield('main')
                    </div>
                    <footer class="footer text-right">
                        2020 © Le Duc Ngoc Hai
                    </footer>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('dashboard/js/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/popper.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/waves.js') }}"></script>
    <script src="{{ asset('dashboard/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('dashboard/morris/morris.min.js') }}"></script>
    <script src="{{ asset('dashboard/raphael/raphael-min.js') }}"></script>
    <script src="{{ asset('dashboard/pages/dashboard.js') }}"></script>
    <script src="{{ asset('dashboard/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/jquery.core.js') }}"></script>
    <script src="{{ asset('dashboard/js/jquery.app.js') }}"></script>
    <script src="{{ asset('dashboard/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('dashboard/owl-carousel/owl.carousel-init.js') }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script type="text/javascript">
        //  console.log(1);
        function ChangeToSlug(x) {


            var slug;

            //Lấy text từ thẻ input title
            slug = x.value;
            slug = slug.toLowerCase();
            //Đổi ký tự có dấu thành không dấu
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
            slug = slug.replace(/đ/gi, 'd');
            //Xóa các ký tự đặt biệt
            slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
            //Đổi khoảng trắng thành ký tự gạch ngang
            slug = slug.replace(/ /gi, "-");
            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
            slug = slug.replace(/\-\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-/gi, '-');
            slug = slug.replace(/\-\-/gi, '-');
            //Xóa các ký tự gạch ngang ở đầu và cuối
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi, '');

            document.getElementById('convert_slug').value = slug;
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#datatable-buttons').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'print']
            });

        });
    </script>
</body>

</html>
