<!-- Grid & List Main Area End -->
                    <div class="tab-content fix">
                        <div id="grid-view" class="tab-pane fade show active">
                            <div class="row">
                            @foreach($cate as $value)
                                @foreach($value->ProductDetails()->orderBy('price_product','asc')->get() as $products)
                                <!-- Single Product Start -->
                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                            @foreach($products->AttributeProducts()->get() as $attribute)
                                                <a href="{{url(utf8tourl($value->product_name.'-'.$products->rom.'GB'))}}">
                                                    <img class="primary-img" src="{{asset('backend/product_img/'.$attribute->image)}}" alt="single-product">
                                                </a>
                                                @break
                                            @endforeach
                                                <a href="#" id="{{$products->id}}" class="quick_view" data-toggle="" data-target="" title="Xem nhanh"><i class="lnr lnr-magnifier"></i></a>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <div class="pro-info">
                                                    <a href="#" style="margin-bottom: 5px;">{{$value->product_name.' '.$products->rom.'GB'}}</a>
                                                    <p><span class="price">{{number_format($products->price_product,0,".",".")}}<sup>đ</sup></span></p>
                                                </div>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="{{url(utf8tourl($value->product_name.'-'.$products->rom.'GB'))}}" title="Chi tiết sản phẩm">Chi tiết sản phẩm</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="{{url('/compare?action=add&categories_id='.$value->categories_id.'&product_id='.$value->id.'&compare_id='.$products->id)}}" id="add-compare" title="So sánh"><i class="lnr lnr-sync"></i> <span>Thêm so sánh</span></a>
                                                        <a href="" id="add-wish" data-wish="{{$products->id}}" title="Yêu thích"><i class="lnr lnr-heart"></i> <span>Thêm yêu thích</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                </div>
                                <!-- Single Product End -->
                                @endforeach
                            @endforeach
                            </div>
                            <!-- Row End -->
                        </div>
                        <!-- #grid view End -->
                        <div id="list-view" class="tab-pane fade">
                            @foreach($cate as $value)
                                @foreach($value->ProductDetails()->orderBy('price_product','asc')->get() as $products)
                                    <!-- Single Product Start -->
                                    <div class="single-product"> 
                                        <div class="row">        
                                            <!-- Product Image Start -->
                                            <div class="col-lg-4 col-md-5 col-sm-12">
                                                <div class="pro-img">
                                                    @foreach($products->AttributeProducts()->get() as $attribute)
                                                        <a href="{{url(utf8tourl($value->product_name.'-'.$products->rom.'GB'))}}">
                                                            <img class="primary-img" src="{{asset('backend/product_img/'.$attribute->image)}}" alt="single-product">
                                                        </a>
                                                        @break
                                                    @endforeach
                                                    <a href="#" id="{{$products->id}}" class="quick_view" data-toggle="" data-target="" title="Xem nhanh"><i class="lnr lnr-magnifier"></i></a>
                                                </div>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="col-lg-8 col-md-7 col-sm-12">
                                                <div class="pro-content hot-product2">
                                                    <h4><a href="product.html">{{$value->product_name.' '.$products->rom.'GB'}}</a></h4>
                                                    <p><span class="price">{{number_format($products->price_product,0,".",".")}}<sup>đ</sup></span></p>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="{{url(utf8tourl($value->product_name.'-'.$products->rom.'GB'))}}" title="Chi tiết sản phẩm">Chi tiết sản phẩm</a>
                                                        </div>
                                                        <div class="actions-secondary">
                                                            <a href="{{url('/compare?action=add&categories_id='.$value->categories_id.'&product_id='.$value->id.'&compare_id='.$products->id)}}" id="add-compare" title="So sánh"><i class="lnr lnr-sync"></i> <span>Thêm so sánh</span></a>
                                                            <a href="" id="add-wish" data-wish="{{$products->id}}" title="Yêu thích"><i class="lnr lnr-heart"></i> <span>Thêm yêu thích</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                @endforeach
                            @endforeach
                        </div>
                        <!-- #list view End -->
                        <div class="pro-pagination">
                            {!! $cate->render() !!}                                  
                        </div>
                        <!-- Product Pagination Info -->
                    </div>
                    <!-- Grid & List Main Area End -->