<!-- Realted Products Start Here -->
<div class="hot-deal-products off-white-bg pt-100 pb-90 pt-sm-60 pb-sm-50">
    <div class="container">
       <!-- Product Title Start -->
       <div class="post-title pb-30">
           <h2>Sản Phẩm Liên Quan</h2>
       </div>
       <!-- Product Title End -->
        <!-- Hot Deal Product Activation Start -->
        <div class="hot-deal-active owl-carousel">
        @foreach($related as $key => $value)
            @foreach($value->ProductDetails as $product)
                <!-- Single Product Start -->
                <div class="single-product">
                    <!-- Product Image Start -->
                    <div class="pro-img">
                        <a href="product.html">
                            @foreach($value->AttributeProducts as $image)
                                @if($image->product_detail_id==$product->id)
                                    <img class="primary-img" src="{{asset('backend/product_img/'.$image->image)}}" alt="{{$value->product_name.' '.$product->rom.'GB'}}" title="{{$value->product_name.' '.$product->rom.'GB'}}">
                                @break
                                @endif
                            @endforeach
                        </a>
                    </div>
                    <!-- Product Image End -->
                    <!-- Product Content Start -->
                    <div class="pro-content">
                        <div class="pro-info">
                            <h4><a href="">{{$value->product_name." ".$product->rom."GB"}}</a></h4>
                            <p><span class="price">{{number_format($product->price_product,0,".",".")}}<sup>đ</sup></span></p>
                            <p><span>22 Đánh giá</span></p>
                        </div>
                        <div class="pro-actions">
                            @foreach($value->Slugs as $slug)
                                @if($slug->product_detail_id==$product->id)
                                    <div class="actions-primary">
                                        <a href="{{$slug->url}}" title="Chi tiết sản phẩm">Chi tiết sản phẩm</a>
                                    </div>
                                @endif
                            @endforeach
                            <div class="actions-secondary">
                                <a href="{{url('/compare?action=add&categories_id='.$value->categories_id.'&product_id='.$value->id.'&compare_id='.$product->id)}}" title="Compare"><i class="lnr lnr-sync"></i> <span>So sánh sản phẩm</span></a>
                                <a href="#" id="add-wish" data-wish="{{$product->id}}" title="Yêu thích"><i class="lnr lnr-heart"></i> <span>Yêu thích</span></a>
                            </div>
                        </div>
                    </div>
                    <!-- Product Content End -->
                </div>
                <!-- Single Product End -->
            @endforeach        
        @endforeach                
        </div>                
        <!-- Hot Deal Product Active End -->
    </div>
    <!-- Container End -->
</div>
<!-- Realated Products End Here -->