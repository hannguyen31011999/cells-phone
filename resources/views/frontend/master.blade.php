<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Smartphone Quận 9</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicons -->
    <link rel="shortcut icon" href="{{asset('frontend\img\favicon.ico')}}">
    <!-- Fontawesome css -->
    <link rel="stylesheet" href="{{asset('frontend\css\font-awesome.min.css')}}">
    <!-- Ionicons css -->
    <link rel="stylesheet" href="{{asset('frontend\css\ionicons.min.css')}}">
    <!-- linearicons css -->
    <link rel="stylesheet" href="{{asset('frontend\css\linearicons.css')}}">
    <!-- Nice select css -->
    <link rel="stylesheet" href="{{asset('frontend\css\nice-select.css')}}">
    <!-- Jquery fancybox css -->
    <link rel="stylesheet" href="{{asset('frontend\css\jquery.fancybox.css')}}">
    <!-- Jquery ui price slider css -->
    <link rel="stylesheet" href="{{asset('frontend\css\jquery-ui.min.css')}}">
    <!-- Meanmenu css -->
    <link rel="stylesheet" href="{{asset('frontend\css\meanmenu.min.css')}}">
    <!-- Nivo slider css -->
    <link rel="stylesheet" href="{{asset('frontend\css\nivo-slider.css')}}">
    <!-- Owl carousel css -->
    <link rel="stylesheet" href="{{asset('frontend\css\owl.carousel.min.css')}}">
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{asset('frontend\css\bootstrap.min.css')}}">
    <!-- Custom css -->
    <link rel="stylesheet" href="{{asset('frontend\css\default.css')}}">
    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('frontend\style.css')}}">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{asset('frontend\css\responsive.css')}}">
    <!-- alertifyJS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    @yield('css')

</head>

<body>
    <!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->

    <!-- Main Wrapper Start Here -->
    <div class="wrapper">
        <!-- Banner Popup Start -->
        <div class="popup_banner">
            <span class="popup_off_banner">×</span>
            <div class="banner_popup_area">
                    <img src="{{asset('frontend\img\banner\pop-banner.jpg')}}" alt="">
            </div>
        </div>
        <!-- Banner Popup End -->
       <!-- Newsletter Popup Start -->
        <div class="popup_wrapper">
            <div class="test">
                <span class="popup_off">Đóng</span>
                <div class="subscribe_area text-center mt-60">
                    <h2>Góp ý</h2>
                    <p>Subscribe to the Truemart mailing list to receive updates on new arrivals, special offers and other discount information.</p>
                    <div class="subscribe-form-group">
                        <form action="#">
                            <input autocomplete="off" type="text" name="message" id="message" placeholder="Enter your email address">
                            <button type="submit">subscribe</button>
                        </form>
                    </div>
                    <div class="subscribe-bottom mt-15">
                        <input type="checkbox" id="newsletter-permission">
                        <label for="newsletter-permission">Don't show this popup again</label>
                    </div>
                </div>
            </div>
        </div>
        
        @yield('header')

        @yield('categories')

        @yield('banner')

        @yield('content')

        <!-- Support Area Start Here -->
        <div class="support-area bdr-top">
            <div class="container">
                <div class="d-flex flex-wrap text-center">
                    <div class="single-support">
                        <div class="support-icon">
                            <i class="lnr lnr-gift"></i>
                        </div>
                        <div class="support-desc">
                            <h6>Great Value</h6>
                            <span>Nunc id ante quis tellus faucibus dictum in eget.</span>
                        </div>
                    </div>
                    <div class="single-support">
                        <div class="support-icon">
                            <i class="lnr lnr-rocket"></i>
                        </div>
                        <div class="support-desc">
                            <h6>Worlwide Delivery</h6>
                            <span>Quisque posuere enim augue, in rhoncus diam dictum non</span>
                        </div>
                    </div>
                    <div class="single-support">
                        <div class="support-icon">
                           <i class="lnr lnr-lock"></i>
                        </div>
                        <div class="support-desc">
                            <h6>Safe Payment</h6>
                            <span>Duis suscipit elit sem, sed mattis tellus accumsan.</span>
                        </div>
                    </div>
                    <div class="single-support">
                        <div class="support-icon">
                           <i class="lnr lnr-enter-down"></i>
                        </div>
                        <div class="support-desc">
                            <h6>Shop Confidence</h6>
                            <span>Faucibus dictum suscipit eget metus. Duis  elit sem, sed.</span>
                        </div>
                    </div>
                    <div class="single-support">
                        <div class="support-icon">
                           <i class="lnr lnr-users"></i>
                        </div>
                        <div class="support-desc">
                            <h6>24/7 Help Center</h6>
                            <span>Quisque posuere enim augue, in rhoncus diam dictum non.</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Support Area End Here -->
        <!-- Footer Area Start Here -->
        @include('frontend.footer.footer_master')
        <!-- Footer Area End Here -->
        
    </div>
    <!-- Main Wrapper End Here -->

    

    <!-- jquery 3.2.1 -->
    <script src="{{asset('frontend\js\vendor\jquery-3.2.1.min.js')}}"></script>
    <!-- Countdown js -->
    <script src="{{asset('frontend\js\jquery.countdown.min.js')}}"></script>
    <!-- Mobile menu js -->
    <script src="{{asset('frontend\js\jquery.meanmenu.min.js')}}"></script>
    <!-- ScrollUp js -->
    <script src="{{asset('frontend\js\jquery.scrollUp.js')}}"></script>
    <!-- Nivo slider js -->
    <script src="{{asset('frontend\js\jquery.nivo.slider.js')}}"></script>
    <!-- Fancybox js -->
    <script src="{{asset('frontend\js\jquery.fancybox.min.js')}}"></script>
    <!-- Jquery nice select js -->
    <script src="{{asset('frontend\js\jquery.nice-select.min.js')}}"></script>
    <!-- Jquery ui price slider js -->
    <script src="{{asset('frontend\js\jquery-ui.min.js')}}"></script>
    <!-- Owl carousel -->
    <script src="{{asset('frontend\js\owl.carousel.min.js')}}"></script>
    <!-- Bootstrap popper js -->
    <script src="{{asset('frontend\js\popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('frontend\js\bootstrap.min.js')}}"></script>
    <!-- Plugin js -->
    <script src="{{asset('frontend\js\plugins.js')}}"></script>
    <!-- Main activaion js -->
    <script src="{{asset('frontend\js\main.js')}}"></script>

    <!-- Modernizer js -->
    <script src="{{asset('frontend\js\vendor\modernizr-3.5.0.min.js')}}"></script>

    <!-- alertifyJS -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    @yield('js')
</body>

</html>