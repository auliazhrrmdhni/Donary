
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Charifit</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('build/assets/img/favicon.png') }}">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('build/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/gijgo.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/style.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('build/assets/css/responsive.css') }}"> -->
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->


    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div class="header-top_area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-md-12 col-lg-8">
                            <div class="short_contact_list">
                                <ul>
                                    <li><a href="#"> <i class="fa fa-phone"></i> +1 (454) 556-5656</a></li>
                                    <li><a href="#"> <i class="fa fa-envelope"></i>Yourmail@gmail.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 col-lg-4">
                            <div class="social_media_links d-none d-lg-block">
                                <a href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-pinterest-p"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-3">
                            <div class="logo">
                                <a href="master.blade.php">
                                    <img src="{{ asset('build/assets/img/logo.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9">
                            <div class="main-menu">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="{{ route('home') }}">home</a></li>
                                        <li><a href="{{ route('campaigns') }}">Campaign</a></li>
                                        <li><a href="{{ route('contact') }}">Contact</a></li>
                                        @auth
                                        <li>
                                            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                                @csrf
                                                <button type="submit" class="bg-transparent border-0 text-white" style="padding: 0 15px; font-size: inherit; font-family: inherit; cursor: pointer;">
                                                    Logout
                                                </button>
                                            </form>
                                        </li>
                                    @else
                                        <li><a href="{{ route('login') }}">Login</a></li>
                                    @endauth

                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    @yield('slider')

    @yield('konten')

    <!-- footer_start  -->
    <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-md-6 col-lg-4 ">
                        <div class="footer_widget">
                            <div class="footer_logo">
                                <a href="#">
                                    <img src="{{ asset('build/assets/img/footer_logo.png') }}" alt="">
                                </a>
                            </div>
                            <p class="address_text">Lorem ipsum dolor sit amet, <br> consectetur adipiscing elit, sed do <br> eiusmod tempor incididunt ut labore.
                            </p>
                            <div class="socail_links">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="ti-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-twitter-alt"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-dribbble"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Services
                            </h3>
                            <ul class="links">
                                <li><a href="#">Donate</a></li>
                                <li><a href="#">Sponsor</a></li>
                                <li><a href="#">Fundraise</a></li>
                                <li><a href="#">Volunteer</a></li>
                                <li><a href="#">Partner</a></li>
                                <li><a href="#">Jobs</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Contacts
                            </h3>
                            <div class="contacts">
                                <p>+2(305) 587-3407 <br>
                                    info@loveuscharity.com <br>
                                    Flat 20, Reynolds Neck, North
                                    Helenaville, FV77 8WS
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Top News
                            </h3>
                            <ul class="news_links">
                                <li>
                                    <div class="thumb">
                                        <a href="#">
                                            <img src="{{ asset('build/assets/img/news/news_1.png') }}" alt="">
                                        </a>
                                    </div>
                                    <div class="info">
                                        <a href="#">
                                            <h4>School for African 
                                                Childrens</h4>
                                        </a>
                                        <span>Jun 12, 2019</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="thumb">
                                        <a href="#">
                                            <img src="{{ asset('build/assets/img/news/news_2.png') }}" alt="">
                                        </a>
                                    </div>
                                    <div class="info">
                                        <a href="#">
                                            <h4>School for African 
                                                Childrens</h4>
                                        </a>
                                        <span>Jun 12, 2019</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="row">
                    <div class="bordered_1px "></div>
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer_end  -->

    <!-- link that opens popup -->

    <!-- JS here -->
    <script src="{{ asset('build/assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ asset('build/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('build/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('build/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('build/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('build/assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('build/assets/js/ajax-form.js') }}"></script>
    <script src="{{ asset('build/assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('build/assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('build/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('build/assets/js/scrollIt.js') }}"></script>
    <script src="{{ asset('build/assets/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('build/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('build/assets/js/nice-select.min.js') }}"></script>
    <script src="{{ asset('build/assets/js/jquery.slicknav.min.js') }}"></script>
    <script src="{{ asset('build/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('build/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('build/assets/js/gijgo.min.js') }}"></script>
    <!--contact js-->
    <script src="{{ asset('build/assets/js/contact.js') }}"></script>
    <script src="{{ asset('build/assets/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('build/assets/js/jquery.form.js') }}"></script>
    <script src="{{ asset('build/assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('build/assets/js/mail-script.js') }}"></script>

    <script src="{{ asset('build/assets/js/main.js') }}"></script>
</body>

</html>