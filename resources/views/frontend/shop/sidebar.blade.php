<div class="col-lg-3 order-2 order-lg-1">
    <div class="sidebar">
        <!-- Sidebar Electronics Categorie Start -->
        <div class="electronics mb-40">
            <h3 class="sidebar-title">Sản phẩm</h3>
            <div id="shop-cate-toggle" class="category-menu sidebar-menu sidbar-style">
                <ul>
                @foreach($menu as $value)
                    <li class="has-sub">
                        <a href="#" style="font-size: 13px !important">
                            {{$value->product_name}}
                        </a>
                        <ul class="category-sub">
                        @foreach($value->ProductDetails()->get() as $products)
                            <li><a href="{{url(utf8tourl($value->product_name.'-'.$products->rom.'GB'))}}" style="font-size: 13px !important">{{$value->product_name." ".$products->rom."GB"}}</a></li>
                        @endforeach
                        </ul>
                        <!-- category submenu end-->
                    </li>
                @endforeach
                </ul>
            </div>
            <!-- category-menu-end -->
        </div>
        <!-- Sidebar Electronics Categorie End -->
        <!-- Price Filter Options Start -->
        <!-- <div class="search-filter mb-40">
            <h3 class="sidebar-title">Tìm kiếm theo giá tiền</h3>
            <form action="#" class="sidbar-style">
                <div id="slider-range"></div>
                <input type="text" id="amount" class="amount-range" readonly="">
            </form>
        </div> -->
        <!-- Price Filter Options End -->
        <!-- Product Size Start -->
        <div class="size mb-40">
            <h3 class="sidebar-title">Dung lượng rom</h3>
            <ul class="size-list sidbar-style">
                <li class="form-check">
                    <input class="form-check-input" value="32" id="rom1" type="checkbox"  name="rom" onclick="filterRom(this,1)">
                    <label class="form-check-label" for="small">32GB</label>
                </li>
                <li class="form-check">
                    <input class="form-check-input" value="64" id="rom2" type="checkbox"  name="rom" onclick="filterRom(this,2)">
                    <label class="form-check-label" for="medium">64GB</label>
                </li>
                <li class="form-check">
                    <input class="form-check-input" value="128" id="rom3" type="checkbox"  name="rom" onclick="filterRom(this,3)">
                    <label class="form-check-label" for="large">128GB</label>
                </li>
                <li class="form-check">
                    <input class="form-check-input" value="256" id="rom4" type="checkbox"  name="rom" onclick="filterRom(this,4)">
                    <label class="form-check-label" for="large">256GB</label>
                </li>
                <li class="form-check">
                    <input class="form-check-input" value="512" id="rom5" type="checkbox" name="rom" onclick="filterRom(this,5)">
                    <label class="form-check-label" for="large">512GB</label>
                </li>
            </ul>
        </div>
        <!-- Product Size End -->
        <!-- Product Top Start -->
        <div class="top-new mb-40">
            <h3 class="sidebar-title">Sản phẩm mới</h3>
            <div class="side-product-active owl-carousel">
                <!-- Side Item Start -->
                <div class="side-pro-item">
                @foreach($cate as $value)
                    @foreach($value->ProductDetails()->orderBy('created_at','desc')->limit(3)->get() as $products)
                    <!-- Single Product Start -->
                    <div class="single-product single-product-sidebar">
                        <!-- Product Image Start -->
                        <div class="pro-img">
                        @foreach($products->AttributeProducts()->get() as $attribute)
                            <a href="{{url(utf8tourl($value->product_name.'-'.$products->rom.'GB'))}}">
                                <img class="primary-img" src="{{asset('backend/product_img/'.$attribute->image)}}" alt="single-product">
                            </a>
                            @break
                        @endforeach
                        </div>
                        <!-- Product Image End -->
                        <!-- Product Content Start -->
                        <div class="pro-content">
                            <a href="{{url(utf8tourl($value->product_name.'-'.$products->rom.'GB'))}}">{{$value->product_name.' '.$products->rom.'GB'}}</a>
                            <p><span class="price">{{number_format($products->price_product,0,".",".")}}<sup>đ</sup></span></p>
                        </div>
                        <!-- Product Content End -->
                    </div>
                    <!-- Single Product End -->
                    @endforeach
                    @break
                @endforeach          
                </div>
                <!-- Side Item End -->
            </div>
        </div>
        <!-- Product Top End -->                            
        <!-- Single Banner Start -->
        <div class="col-img">
            <a href="shop.html"><img src="{{asset('frontend\img\banner\banner-sidebar.jpg')}}" alt="slider-banner"></a>
        </div>
        <!-- Single Banner End -->
    </div>
</div>