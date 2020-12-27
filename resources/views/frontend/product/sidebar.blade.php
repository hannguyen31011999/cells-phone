<div class="sidebar">
                    <!-- Product Top Start -->
                    <div class="top-new mb-40">
                        <h3 class="sidebar-title">Sản phẩm liên quan</h3>
                        <div class="side-product-active owl-carousel">
                            <!-- Side Item Start -->
                            <div class="side-pro-item">
                                <!-- Single Product Start -->
                                @foreach($related as $value)
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
                                            <a href="{{url(utf8tourl($value->product_name.'-'.$products->rom.'GB'))}}" style="font-size: 14px;">{{$value->product_name.' '.$products->rom.'GB'}}</a>
                                            <p><span class="price">{{number_format($products->price_product,0,".",".")}}<sup>đ</sup></span></p>
                                        </div>
                                        <!-- Product Content End -->
                                    </div>
                                    <!-- Single Product End -->
                                    @endforeach
                                @endforeach          
                                <!-- Single Product End -->                                      
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