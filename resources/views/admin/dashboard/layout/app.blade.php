<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title') - {{ env('APP_DESC') }}</title>
    <meta name="description" content="{{ env('APP_DESC') }}">
    <meta name="keywords" content="{{ env('APP_KEYWORDS') }}">
    <meta name="author" content="ASAN Webs Development">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/brand/favi.svg') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/flaticon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/off-canvas.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/rsmenu-main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/inc/custom-slider/css/nivo-slider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/inc/custom-slider/css/preview.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/rs-spacing.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
</head>

<body class="home-6">
    <div class="offwrap"></div>
    <div class="main-content">
        <div class="full-width-header">
            <header id="rs-header" class="rs-header style2 header-transparent">
                <div class="topbar-area style1">
                    <div class="container custom">
                        <div class="row y-middle">
                            <div class="col-lg-7">
                                <div class="topbar-contact">
                                    <ul>
                                        <li>
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                            <a href="mailto:{{ env('APP_MAIL') }}">{{ env('APP_MAIL') }}</a>
                                        </li>
                                        <li>
                                            <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                            <a href="tel:{{ env('APP_WHATSAPP') }}"> {{ env('APP_WHATSAPP') }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-5 text-right">
                                <div class="toolbar-sl-share">
                                    <ul>
                                        <li class="opening"> <em><i class="flaticon-clock"></i>Monday - Friday /
                                                8AM - 11PM</em> </li>
                                        <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="menu-area menu-sticky">
                    <div class="container custom">
                        <div class="row-table">
                            <div class="col-cell header-logo">
                                <div class="">
                                    <a href="{{ route('landing.index') }}">
                                        <img src="{{ asset('assets/images/brand/logo.svg') }}" alt="logo"
                                            width="300">
                                    </a>
                                </div>
                            </div>
                            <div class="col-cell">
                                <div class="rs-menu-area">
                                    <div class="main-menu">
                                        <nav class="rs-menu hidden-md">
                                            <ul class="nav-menu">
                                                <li>
                                                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('admin.pending') }}">Pending Withdraw</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('admin.pendingTids') }}">Pending TID</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('admin.allTids') }}">All TID</a>
                                                </li>
                                                <li>
                                                    <form id="logout" action="{{ route('logout') }}" method="POST">
                                                        @csrf
                                                        <a type="submit"
                                                            onclick="document.getElementById('logout').submit();">Logout</a>
                                                    </form>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <div class="col-cell">
                                <div class="expand-btn-inner">
                                    <ul>
                                        <li class="humburger">
                                            <a id="nav-expander" class="nav-expander bar" href="#">
                                                <div class="bar">
                                                    <span class="dot1"></span>
                                                    <span class="dot2"></span>
                                                    <span class="dot3"></span>
                                                    <span class="dot4"></span>
                                                    <span class="dot5"></span>
                                                    <span class="dot6"></span>
                                                    <span class="dot7"></span>
                                                    <span class="dot8"></span>
                                                    <span class="dot9"></span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <nav class="right_menu_togle hidden-md">
                    <div class="close-btn">
                        <a id="nav-close" class="nav-close">
                            <div class="line">
                                <span class="line1"></span>
                                <span class="line2"></span>
                            </div>
                        </a>
                    </div>
                    <div class="">
                        <a href="index.html"><img src="{{ asset('assets/images/brand/logo-light.svg') }}" alt="logo"
                                width="250"></a>
                    </div>
                    <div class="offcanvas-text">
                        <p>{{ env('APP_DESC_LONG') }}</p>
                    </div>
                    <div class="media-img">
                        <img src="{{ asset('assets/images/off2.jpg') }}" alt="Images">
                    </div>
                </nav>
                <nav class="right_menu_togle mobile-navbar-menu" id="mobile-navbar-menu">
                    <div class="close-btn">
                        <a id="nav-close2" class="nav-close">
                            <div class="line">
                                <span class="line1"></span>
                                <span class="line2"></span>
                            </div>
                        </a>
                    </div>
                    <ul class="nav-menu">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.pending') }}">Pending Withdraw</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.pendingTids') }}">Pending TID</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.allTids') }}">All TID</a>
                        </li>
                        <li>
                            <form id="logout" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <a type="submit"
                                    onclick="document.getElementById('logout').submit();">Logout</a>
                            </form>
                        </li>
                    </ul>
                </nav>
            </header>
        </div>
        @yield('body')
        <div class="rs-footer relative">
            <div class="bg-wrap">
                <div class="footer-content pb-90 pt-90">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 text-center md-md-30">
                                <div class="about-widget">
                                    <div class="logo-area">
                                        <a href="index.html">
                                            <img src="{{ asset('assets/images/brand/logo-light.svg') }}"
                                                alt="Footer Logo">
                                        </a>
                                    </div>
                                    <p class="footer-desc">{{ env('APP_DESC') }}</p>
                                    <ul class="footer-contact">
                                        <li>Whatsapp: <a
                                                href="tel:{{ env('APP_WHATSAPP') }}">{{ env('APP_WHATSAPP') }}</a>
                                        </li>
                                        <li>Email: <a
                                                href="mailto:{{ env('APP_MAIL') }}">{{ env('APP_MAIL') }}</a></li>
                                    </ul>
                                    <ul class="social-links">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom text-center">
                    <div class="container">
                        <p class="copyright">{{ env('APP_NAME') }} © Copyright {{ date('Y') }}.All rights
                            reserved.</p>
                    </div>
                </div>
            </div>
            <img class="pattern-right" src="assets/images/pattern/pattern7.png" alt="">
        </div>
    </div>
    <div id="scrollUp" class="orange-color">
        <i class="fa fa-angle-up"></i>
    </div>
    <div id="whatsapp" class="whatsapp">
        <a href="https://web.whatsapp.com/send?phone={{ env('APP_WHATSAPP') }}" target="_blank"><i
                class="fa fa-whatsapp" aria-hidden="true"></i></a>
    </div>
    <script src="{{ asset('assets/js/modernizr-2.8.3.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nav.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/skill.bars.jquery.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/inc/custom-slider/js/jquery.nivo.slider.js') }}"></script>
    <script src="{{ asset('assets/js/contact.form.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    <x-alert />
    @yield('footer')

</body>

</html>
