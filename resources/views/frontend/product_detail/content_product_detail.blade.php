<!-- Product Thumbnail Start -->
<div class="main-product-thumbnail ptb-100 ptb-sm-60">
    <div class="container">
        <div class="thumb-bg">
            <div class="row">
                <!-- Main Thumbnail Image Start -->
                <div class="col-lg-5 mb-all-40">
                    <!-- Thumbnail Large Image start -->
                    <div class="tab-content">
                        @foreach($listImage as $key => $image)
                            @if($key==0)
                            <div id="thumb{{$key}}" class="tab-pane fade show active">
                                <a data-fancybox="images" href="{{asset('backend/product_img/'.$image->image)}}"><img src="{{asset('backend/product_img/'.$image->image)}}" alt="Xem chi tiết hình ảnh"></a>
                            </div>
                            @else
                            <div id="thumb{{$key}}" class="tab-pane fade">
                                <a data-fancybox="images" href="{{asset('backend/product_img/'.$image->image)}}"><img src="{{asset('backend/product_img/'.$image->image)}}" alt="Xem chi tiết hình ảnh"></a>
                            </div>
                            @endif
                        @endforeach
                    </div>
                    <!-- Thumbnail Large Image End -->
                    <!-- Thumbnail Image End -->
                    <div class="product-thumbnail mt-15">
                        <div class="thumb-menu owl-carousel nav tabs-area" role="tablist">
                        @foreach($listImage as $key => $image)
                            @if($key==0)
                                <a class="active" data-toggle="tab" href="#thumb{{$key}}"><img src="{{asset('backend/product_img/'.$image->image)}}" alt="Hình ảnh nhỏ"></a>
                            @else
                                <a data-toggle="tab" href="#thumb{{$key}}"><img src="{{asset('backend/product_img/'.$image->image)}}" alt="Hình ảnh nhỏ"></a>
                            @endif
                        @endforeach
                        </div>
                    </div>
                    <!-- Thumbnail image end -->
                </div>
                <!-- Main Thumbnail Image End -->
                <!-- Thumbnail Description Start -->
                <div class="col-lg-7">
                    <div class="thubnail-desc fix">
                        <h3 class="product-header">
                            @if(isset($name))
                                {{$name}}
                            @endif
                        </h3>
                        <div class="rating-summary fix mtb-10">
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <div class="rating-feedback">
                                <a href="#">(1 review)</a>
                                <a href="#">add to your review</a>
                            </div>
                        </div>
                        <div class="pro-price mtb-30">
                            <p class="d-flex align-items-center"><span class="price">
                                @if(isset($productDetail))
                                    {{number_format($productDetail->price_product, 0, ".", ".")}}<sup>đ</sup>
                                @endif
                            </span><span class="saving-price">vourcher giảm trực tiếp @if(isset($discount)){{number_format($discount/1000, 0, ".", ".")."K"}}@endif</span></p>
                        </div>
                        <div class="product-size mb-20 clearfix">
                            <div class="box-product">
                                @foreach($products->ProductDetails as $value1)
                                    @foreach($totalSlugs as $slug)
                                        @if($slug->product_detail_id==$value1->id)
                                            <a id="" href="{{route('viewProductDetail',['name'=>$slug->url])}}" class="attribute">
                                                <span class="attribute-color">{{$value1->rom}}GB</span>
                                                <p class="linked-price">
                                                    {{number_format($value1->price_product, 0, ".", ".")}}<sup>đ</sup></p>
                                            </a>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                        <div class="color clearfix mb-20">
                            <label style="margin-bottom: 5px;">Chọn màu yêu thích</label>
                            <div class="box-product">
                                @foreach($attribute as $attributes)
                                <a id="{{$attributes->id}}" href="#" class="attribute">
                                    <span class="attribute-color">{{$attributes->color}}</span>
                                    <p class="linked-price">
                                        {{number_format($attributes->price_attribute, 0, ".", ".")}}đ</p>
                                </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="box-quantity d-flex hot-product2">
                            <form action="#">
                                <input class="quantity mr-15" type="number" min="1" value="1">
                            </form>
                            <div class="pro-actions">
                                <div class="actions-primary">
                                    <a href="cart.html" title="" data-original-title="Add to Cart"> + Thêm giỏ hàng</a>
                                </div>
                            </div>
                        </div>
                        <div class="pro-ref mt-20">
                            <p><span class="in-stock"><a href="" data-toggle="modal" data-target="#detailProduct"><i class="ion-checkmark-round"></i> Xem thông số kĩ thuật</a></span></p>
                        </div>
                        <div class="socila-sharing mt-25">
                            <ul class="d-flex">
                                <li>share</li>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus-official" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Thumbnail Description End -->
            </div>
            <!-- Row End -->
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Product Thumbnail End -->