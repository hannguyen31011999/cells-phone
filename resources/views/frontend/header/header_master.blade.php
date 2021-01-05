<!-- Main Header Area Start Here -->
<header>
    <!-- Header Top Start Here -->
    <div class="header-top-area">
        <div class="container">
            <!-- Header Top Start -->
            <div class="header-top">
                <ul>
                </ul>
                <ul>                                          
                    <li><span>Ngôn ngữ</span> <a href="#">Việt Nam<i class="lnr lnr-chevron-down"></i></a>
                        <!-- Dropdown Start -->
                        <ul class="ht-dropdown">
                            <li><a href="#"><img src="{{asset('frontend\img\header\1.jpg')}}" alt="language-selector">English</a></li>
                        </ul>
                        <!-- Dropdown End -->
                    </li>
                    @if(Auth::check()&&Auth::User()->role==0&&Auth::User()->status!=0)
                    <li><a href="#">{{Auth::User()->email}}<i class="lnr lnr-chevron-down"></i></a>
                        <ul class="ht-dropdown">
                            <li><a href="{{url('account/profile')}}">Thông tin cá nhân</a></li>
                            <li><a href="{{route('viewPurchase')}}">Lịch sử mua hàng</a></li>
                            <li><a href="{{route('logout')}}">Đăng xuất</a></li>
                        </ul>
                    </li>
                    @else
                    <li><a href="{{url('account/register')}}">Đăng kí tài khoản</a>
                    </li>
                    @endif
                </ul>
            </div>
            <!-- Header Top End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Header Top End Here -->
    <!-- Header Middle Start Here -->
    <div class="header-middle ptb-15">
        <div class="container">
            <div class="row align-items-center no-gutters">
                <div class="col-lg-3 col-md-12">
                    <div class="logo mb-all-30">
                        <a href="{{route('home')}}"><img src="{{asset('frontend\img\logo\logo.png')}}" alt="logo-image"></a>
                    </div>
                </div>
                <!-- Categorie Search Box Start Here -->
                <div class="col-lg-5 col-md-8 ml-auto mr-auto col-10">
                    <div class="categorie-search-box">
                        <form action="{{url('/seach')}}" method="get">
                            <input type="text" name="query" id="seach" placeholder="Tìm kiếm bằng từ khóa">
                            <button><i class="lnr lnr-magnifier"></i></button>
                        </form>
                    </div>
                </div>
                <!-- Categorie Search Box End Here -->
                
                <div class="col-lg-4 col-md-12">
                    <div class="cart-box mt-all-30" id="cart-render">
                        @include('frontend.header.cart')
                    </div>
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Header Middle End Here -->
    <!-- Header Bottom Start Here -->
    <div class="header-bottom  header-sticky">
        <div class="container">
            <div class="row align-items-center">
                 <div class="col-xl-3 col-lg-4 col-md-6 vertical-menu d-none d-lg-block">
                    <span class="categorie-title">Danh mục Sản Phẩm</span>
                </div>                       
                <div class="col-xl-9 col-lg-8 col-md-12 ">
                    <nav class="d-none d-lg-block">
                        <ul class="header-bottom-list d-flex">
                            <li class="active"><a href="{{route('home')}}">Trang chủ</a>
                            </li>
                            <li><a href="">Sản phẩm<i class="fa fa-angle-down"></i></a>
                                <!-- Home Version Dropdown Start -->
                                <ul class="ht-dropdown dropdown-style-two">
                                    @foreach($categories as $Categories)
                                        <li><a href="{{url('/dtdt/'.utf8tourl($Categories->categories_name))}}">
                                            {{$Categories->categories_name}}
                                        </a></li>
                                    @endforeach
                                </ul>
                                <!-- Home Version Dropdown End -->
                            </li>
                            <li><a href="{{route('page_post')}}">Bài viết</a>
                            </li>
                            <li><a href="{{url('/compare')}}">So sánh sản phẩm</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="mobile-menu d-block d-lg-none">
                        <nav>
                            <ul>
                                <li><a href="index.html">home</a>
                                    <!-- Home Version Dropdown Start -->
                                    <ul>
                                        <li><a href="index.html">Home Version 1</a></li>
                                    </ul>
                                    <!-- Home Version Dropdown End -->
                                </li>
                                <li><a href="shop.html">shop</a>
                                    <!-- Mobile Menu Dropdown Start -->
                                    <ul>
                                        <li><a href="product.html">product details</a></li>
                                    </ul>
                                    <!-- Mobile Menu Dropdown End -->
                                </li>
                                <li><a href="blog.html">Blog</a>
                                    <!-- Mobile Menu Dropdown Start -->
                                    <ul>
                                        <li><a href="single-blog.html">blog details</a></li>
                                    </ul>
                                    <!-- Mobile Menu Dropdown End -->
                                </li>
                                <li><a href="#">pages</a>
                                    <!-- Mobile Menu Dropdown Start -->
                                    <ul>
                                        <li><a href="register.html">register</a></li>
                                    </ul>
                                    <!-- Mobile Menu Dropdown End -->
                                </li>
                                <li><a href="about.html">about us</a></li>
                                <li><a href="contact.html">contact us</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Header Bottom End Here -->
    <!-- Mobile Vertical Menu Start Here -->
    <div class="container d-block d-lg-none">
        <div class="vertical-menu mt-30">
            <span class="categorie-title mobile-categorei-menu">Danh mục sản phẩm</span>
            <nav>  
                <div id="cate-mobile-toggle" class="category-menu sidebar-menu sidbar-style mobile-categorei-menu-list menu-hidden ">
                    <ul>
                    @foreach($categories as $Categories)
                        <li class="has-sub"><a href="#">{{$Categories->categories_name}}</a>
                            <ul class="category-sub">
                                @foreach($product as $products)
                                    @if($products->categories_id==$Categories->id)
                                <li><a href="#">{{$products->product_name}}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                            <!-- category submenu end-->
                        </li>
                    @endforeach
                    </ul>
                </div>
                <!-- category-menu-end -->
            </nav>
        </div>
    </div>
    <!-- Mobile Vertical Menu Start End -->
</header>
<!-- Main Header Area End Here -->