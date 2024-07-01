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


    <link href="{{ asset('dashboard/css/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard/css/owl.theme.default.min.css') }}" rel="stylesheet" />


    <link href="{{ asset('dashboard/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard/css/metismenu.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard/css/style.css') }}" rel="stylesheet" type="text/css" />

    <script src="{{ asset('dashboard/js/modernizr.min.js') }}"></script>

</head>


<body>


    <div id="wrapper">
        <div class="container-fluid">


            <div class="layout-wrapper">



                <div class="left side-menu">

                    <div class="gggf" id="refgfg">


                        <div class="top-header-left">
                            <a href="{{route('admin')}}" class="logo">
                                <span>
                                    <img src="{{asset('logo/image.png')}}" alt="" style="border: 3px solid lightgreen; border-radius: 50%;" height="50">
                                </span>


                            </a>
                        </div>




                        <div id="sidebar-menu">

                            <ul class="metismenu" id="side-menu">


                                <li class="menu-title">General</li>

                                <li>
                                    <a href="{{route('admin')}}">
                                        <ion-icon name="home-outline"></ion-icon><span
                                            class="badge badge-danger badge-pill pull-right">7</span> <span> Dashboard
                                        </span>
                                    </a>
                                </li>
                                <li class="menu-title">Framework</li>
                                <li>
                                    <a href="javascript: void(0);"><span> Layout </span> <span
                                            class="menu-arrow"></span></a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                        <li><a href="layouts-menucollapsed.html">Menu Collapsed</a></li>
                                        <li><a href="layouts-small-menu.html">Small Menu</a></li>
                                        <li><a href="layouts-center-logo.html">Center Header</a></li>
                                        <li><a href="layouts-boxed.html">Boxed</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript: void(0);"> <span> UI Kit </span>
                                        <span class="menu-arrow"></span></a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                        <li><a href="ui-typography.html">Typography</a></li>
                                        <li><a href="ui-cards.html">cards</a></li>

                                    </ul>
                                </li>

                                <li>
                                    <a href="widgets.html">
                                       <span> Widgets </span>
                                    </a>
                                </li>

                                <li>
                                    <a href="javascript: void(0);"><span> Charts </span>
                                        <span class="menu-arrow"></span></a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                        <li><a href="chart-flot.html">Flot Chart</a></li>
                                        <li><a href="chart-morris.html">Morris Chart</a></li>

                                    </ul>
                                </li>

                                <li>
                                    <a href="javascript: void(0);"><span
                                            class="badge badge-warning  pull-right">10</span> <span> Forms </span></a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                        <li><a href="form-elements.html">Form Elements</a></li>
                                        <li><a href="form-advanced.html">Form Advanced</a></li>

                                    </ul>
                                </li>

                                <li>
                                    <a href="javascript: void(0);"> Icons </span>
                                        <span class="menu-arrow"></span></a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                        <li><a href="icons-materialdesign.html">Material Design</a></li>
                                        <li><a href="icons-dripicons.html">Dripicons</a></li>
                                        <li><a href="">Font awesome</a></li>
                                        <li><a href="icons-feather.html">Feather Icons</a></li>
                                        <li><a href="icons-simpleline.html">Simple Line Icons</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="javascript: void(0);"><span
                                            class="badge badge-danger pull-right mr-4">5</span> <span> Tables </span>
                                        <span class="menu-arrow"></span></a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                        <li><a href="tables-basic.html">Basic Tables</a></li>

                                    </ul>
                                </li>


                                <li class="menu-title">Pages</li>
                                <li>
                                    <a href="javascript: void(0);"> <span> Apps
                                        </span> <span class="menu-arrow"></span></a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                        <li><a href="apps-calendar.html">Calendar</a></li>

                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript: void(0);">User Pages </span>
                                        <span class="menu-arrow"></span></a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                        <li><a href="page-starter.html">Starter Page</a></li>

                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript: void(0);">Error Pages </span>
                                        <span class="menu-arrow"></span></a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                        <li><a href="page-404.html">Error 404</a></li>
                                        <li><a href="page-500.html">Error 500</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript: void(0);">General Pages </span>
                                        <span class="menu-arrow"></span></a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                        <li><a href="page-recoverpw.html">Recover Password</a></li>
                                        <li><a href="page-lock-screen.html">Lock Screen</a></li>


                                        <li><a href="page-confirm-mail.html">Confirm Mail</a></li>
                                        <li><a href="extras-pricing.html">Pricing</a></li>
                                        <li><a href="extras-gallery.html">Gallery</a></li>

                                    </ul>
                                </li>

                                <li class="menu-title">More</li>

                                <li>
                                    <a href="javascript: void(0);"> Maps </span> <span
                                            class="menu-arrow"></span></a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                        <li><a href="maps-google.html">Google Maps</a></li>

                                    </ul>
                                </li>



                                <li>
                                    <a href="javascript: void(0);"> Multi Level </span>
                                        <span class="menu-arrow"></span></a>
                                    <ul class="nav-second-level nav" aria-expanded="false">
                                        <li><a href="javascript: void(0);">Level 1.1</a></li>
                                        <li><a href="javascript: void(0);" aria-expanded="false">Level 1.2 <span
                                                    class="menu-arrow"></span></a>
                                            <ul class="nav-third-level nav" aria-expanded="false">
                                                <li><a href="javascript: void(0);">Level 2.1</a></li>
                                                <li><a href="javascript: void(0);">Level 2.2</a></li>
                                            </ul>
                                        </li>
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
                                            <img src="{{asset('logo/image.png')}}" class="ml-2" height="16"
                                                alt="">

                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated ">


                                            <div class="slimscroll" style="max-height: 230px;">

                                                <a href="javascript:void(0);"
                                                    class="dropdown-item notify-item d-flex flex-row justify-content-between">
                                                    <div class="text-left">German</div>
                                                    <img src="{{asset('logo/image.png')}}" class="ml-2"
                                                        height="16" alt="">
                                                </a>


                                                <a href="javascript:void(0);"
                                                    class="dropdown-item notify-item d-flex flex-row justify-content-between">
                                                    <div class="text-left">Italy</div>
                                                    <img src="{{asset('logo/image.png')}}" class="ml-2"
                                                        height="16" alt="">
                                                </a>


                                                <a href="javascript:void(0);"
                                                    class="ddropdown-item notify-item d-flex flex-row justify-content-between">
                                                    <div class="text-left">France</div>
                                                    <img src="{{asset('logo/image.png')}}" class="ml-2"
                                                        height="16" alt="">
                                                </a>


                                                <a href="javascript:void(0);"
                                                    class="dropdown-item notify-item d-flex flex-row justify-content-between">
                                                    <div class="text-left">Spain</div>
                                                    <img src="{{asset('logo/image.png')}}" class="ml-2"
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
                                                    <div class="notify-icon"><img
                                                            src="{{asset('logo/image.png')}}"
                                                            class="img-fluid rounded-circle" alt="" /> </div>
                                                    <p class="notify-details">Jasna Jakimova</p>
                                                    <p class="text-muted font-13 mb-0 user-msg">Hey, how are you? I
                                                        havent seen you long time </p>
                                                </a>


                                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                                    <div class="notify-icon"><img
                                                            src="{{asset('logo/image.png')}}"
                                                            class="img-fluid rounded-circle" alt="" /> </div>
                                                    <p class="notify-details">Gereth Smith</p>
                                                    <p class="text-muted font-13 mb-0 user-msg">This looks awesome,
                                                        congratulations</p>
                                                </a>


                                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                                    <div class="notify-icon"><img
                                                            src="{{asset('logo/image.png')}}"
                                                            class="img-fluid rounded-circle" alt="" /> </div>
                                                    <p class="notify-details">Jeneth Swonson</p>
                                                    <p class="text-muted font-13 mb-0 user-msg">What are you doing next
                                                        week?</p>
                                                </a>


                                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                                    <div class="notify-icon"><img
                                                            src="{{asset('logo/image.png')}}"
                                                            class="img-fluid rounded-circle" alt="" /> </div>
                                                    <p class="notify-details">Sensi Sodran</p>
                                                    <p class="text-muted font-13 mb-0 user-msg">This looks greaaatt :
                                                        I want same like this!</p>
                                                </a>


                                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                                    <div class="notify-icon"><img
                                                            src="{{asset('logo/image.png')}}"
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
                                            <img src="{{asset('logo/image.png')}}" alt="user"
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
                                            i>
                                        </button>
                                    </li>
                                    <li class="nav-item hidden-sm-down search-box float-left"> <a
                                            class="nav-link hidden-sm-down text-muted  " href="javascript:void(0)"></a>
                                        <form class="app-search">
                                            <input type="text" class="form-control" placeholder="Search here"> <a
                                                class="srh-btn">
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

</body>



</html>
