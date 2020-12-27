<div class="main-page-banner pb-50 off-white-bg">
    <div class="container">
        <div class="row">
            <!-- Vertical Menu Start Here -->
            <div class="col-xl-3 col-lg-4 d-none d-lg-block">
                <div class="vertical-menu mb-all-30">
                    <nav>
                        <ul class="vertical-menu-list">
                        @foreach($categories as $Categories)
                            <li><a href="shop.html"><span><img src="{{asset('frontend\img\vertical-menu\4.png')}}" alt="menu-icon"></span>{{$Categories->categories_name}}<i class="fa fa-angle-right" aria-hidden="true"></i>
                            </a>
                                <!-- Vertical Mega-Menu Start -->
                                <ul class="ht-dropdown megamenu megamenu-two">
                                    <!-- Single Column Start -->
                                    <li class="two-megamenu">
                                        <ul>
                                        @foreach($product as $products)
                                            @if($products->categories_id==$Categories->id)
                                                <li><a href="{{route('product',['categories'=>utf8tourl($Categories->categories_name),'product'=>utf8tourl($products->product_name)])}}">{{$products->product_name}}</a></li>
                                            @endif
                                        @endforeach
                                        </ul>
                                    </li>
                                    <!-- Single Column End -->
                                </ul>
                                <!-- Vertical Mega-Menu End -->
                            </li>
                        @endforeach
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- Vertical Menu End Here -->
            <!-- Slider Area Start Here -->
            <div class="col-xl-9 col-lg-8 slider_box">
                <div class="slider-wrapper theme-default">
                    <!-- Slider Background  Image Start-->
                    <div id="slider" class="nivoSlider">
                        <a href="shop.html"><img src="{{asset('frontend\img\slider\1.jpg')}}" data-thumb="img/slider/1.jpg')}}" alt="" title="#htmlcaption"></a>
                        <a href="shop.html"><img src="{{asset('frontend\img\slider\2.jpg')}}" data-thumb="img/slider/2.jpg')}}" alt="" title="#htmlcaption2"></a>
                    </div>
                    <!-- Slider Background  Image Start-->
                </div>
            </div>
            <!-- Slider Area End Here -->
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>