<!-- Quick View Content Start -->
<div class="main-product-thumbnail quick-thumb-content">
    <div class="container">
        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="row">
                            <!-- Main Thumbnail Image Start -->
                            <div class="col-lg-5 col-md-6 col-sm-5">
                                <!-- Thumbnail Large Image start -->
                                <div class="tab-content">
                                    <div id="thumb1" class="tab-pane fade show active">
                                    @if(isset($attribute))
                                        @foreach($attribute as $attributes)
                                        <div id="change-img">
                                            <a id="attribute-tag" data-fancybox="images" href="{{asset('backend/attribute_img/'.$attributes->image)}}"><img src="{{asset('backend/attribute_img/'.$attributes->image)}}" alt="product-view" id="attribute-image"></a>
                                        </div>
                                        @break
                                        @endforeach
                                    @endif
                                    </div>
                                </div>
                            </div>
                            <!-- Main Thumbnail Image End -->
                            <!-- Thumbnail Description Start -->
                            <div class="col-lg-7 col-md-6 col-sm-7">
                                <div class="thubnail-desc fix mt-sm-40">
                                    @if(isset($product)&&isset($productDetail)&&isset($discount))
                                    <h3 class="product-header">
                                            @foreach($product as $products)
                                                {{$products->product_name}} {{$productDetail->rom}}GB
                                            @endforeach
                                    </h3>
                                    <div>
                                        <p id="price_attribute" class="d-flex align-items-center" style="color: red;font-size: 20px;"><span class="price">{{number_format($productDetail->price_product,0, ".", ".")}}<sup>đ</sup></span><span class="saving-price" style="margin-left: 5px;">khuyến mãi giảm trực tiếp {{($discount/1000)}}K</span></p>
                                    </div>
                                    @endif
                                    <p class="mb-20 pro-desc-details" style="margin-top: 5px;">Chọn màu mà bạn yêu thích</p>
                                    <div class="box-product">
                                    @if(isset($attribute))
                                        @foreach($attribute as $attributes)
                                        <a id="color{{$attributes->id}}" data-id="{{$attributes->id}}" href="#" class="attribute">
                                            <span class="attribute-color">{{$attributes->color}}</span>
                                            <p class="linked-price">
                                                {{number_format($attributes->price_attribute, 0, ".", ".")}}đ</p>
                                        </a>
                                        @endforeach
                                    @endif
                                    </div>
                                    <div class="box-quantity d-flex">
                                        <form action="#">
                                            <input class="quantity mr-40" type="number" min="1" value="1" name="">
                                        </form>
                                        <a class="add-cart" id="" href="#">Thêm giỏ hàng</a>
                                    </div>
                                    <div class="pro-ref mt-15">
                                        <p><span class="in-stock"><i class="ion-checkmark-round"></i>Còn hàng</span></p>
                                    </div>
                                </div>
                            </div>
                            <!-- Thumbnail Description End -->
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="custom-footer">
                        <div class="socila-sharing">
                            <ul class="d-flex">
                                <li>Chia sẻ</li>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus-official" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Quick View Content End -->