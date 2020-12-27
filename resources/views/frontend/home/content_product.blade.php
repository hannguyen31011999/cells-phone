<!-- Like Products Area Start Here -->
<div class="like-product ptb-95 off-white-bg pt-sm-50 pb-sm-55 ">
    <div class="container">
        <div class="like-product-area"> 
            <h3>Điện Thoại Nổi Bật</h3>
            <!-- Arrivals Product Activation Start Here -->
            <div class="like-pro-active owl-carousel">
            @php
            @foreach($product as $products)
                @foreach($products->ProductDetails as $key => $productDetail)
                <!-- Double Product Start -->
                <div class="double-product">
                    <!-- Single Product Start -->
                    <div class="single-product">
                        <!-- Product Image Start -->
                        <div class="pro-img">
                            <a href="{{route('viewProductDetail',['name'=>utf8tourl($products->product_name.'-'.$productDetail->rom.'GB')])}}">
                            @foreach($products->ListImages as $key1 => $attributes)
                                @if($key==$key1)
                                    <img class="primary-img" src="{{asset('backend/attribute_img/'.$attributes->image)}}" alt="single-product">
                                    @break;
                                @endif
                            @endforeach
                            </a>
                            <a href="" id="{{$productDetail->id}}" class="quick_view" data-toggle="" data-target="" title="Xem nhanh"><i class="lnr lnr-magnifier"></i></a>
                        </div>
                        <!-- Product Image End -->
                        <!-- Product Content Start -->
                        <div class="pro-content">
                            <div class="pro-info">
                                <h6><a href="product.html">{{$products->product_name}} {{$productDetail->rom}}GB</a></h6>
                                <p style="margin-top: 5px;"><span class="price">{{number_format($productDetail->price_product, 0, ".", ".")}}đ</span></p>
                            </div>
                            <div class="pro-actions">
                                <div class="actions-primary">
                                    <a href="{{route('viewProductDetail',['name'=>utf8tourl($products->product_name.'-'.$productDetail->rom.'GB')])}}" title="Xem chi tiết sản phẩm">Xem chi tiết</a>
                                </div>
                                <div class="actions-secondary">
                                    <a href="{{url('/compare?action=add&categories_id='.$products->categories_id.'&product_id='.$products->id.'&compare_id='.$productDetail->id)}}" id="add-compare" title="So sánh sản phẩm"><i class="lnr lnr-sync"></i> <span>Thêm so sánh</span></a>
                                    <a href="#" id="add-wish" data-wish="{{$productDetail->id}}" title="Yêu thích"><i class="lnr lnr-heart"></i> <span>Yêu thích</span></a>
                                </div>
                            </div>
                        </div>
                        <!-- Product Content End -->
                    </div>
                    <!-- Single Product End -->
                </div>
                <!-- Double Product End -->
                @endforeach
            @endforeach     
            </div>
            <!-- Arrivals Product Activation End Here -->
        </div>
        <!-- main-product-tab-area-->
    </div>
    <!-- Container End -->
</div>
<!-- Lile Products Area End Here -->

<div id="modal-product">
</div>
