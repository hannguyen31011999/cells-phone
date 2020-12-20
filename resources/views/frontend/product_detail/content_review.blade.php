<!-- Product Thumbnail Description Start -->
<div class="thumnail-desc pb-100 pb-sm-60">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ul class="main-thumb-desc nav tabs-area" role="tablist">
                    <li><a class="active" data-toggle="tab" href="#dtail">Mô tả sản phẩm</a></li>
                    <li><a data-toggle="tab" href="#review" id="comment">Bình luận đánh giá</a></li>
                </ul>
                <!-- Product Thumbnail Tab Content Start -->
                <div class="tab-content thumb-content border-default">
                    <div id="dtail" class="tab-pane fade show active">
                        @if(isset($products))
                            {!! $products->desc !!}
                        @endif
                    </div>
                    <div id="review" class="tab-pane fade">
                        <!-- Reviews Start -->
                        <div class="review border-default universal-padding" id="render-review">
                            @include('frontend.product_detail.render_review')
                        </div>
                        <!-- Reviews End -->
                        <!-- Reviews Start -->
                        <div class="review border-default universal-padding mt-30">
                            <h2 class="review-title mb-30">Đánh Giá Về Sản Phẩm</h2>
                            <p class="review-mini-title">Đánh Giá Của Bạn</p>
                            <ul class="review-list">
                                <!-- Single Review List Start -->
                                <li>
                                    <ul class="ratings">
                                        <li class="star" id="5"></li>
                                        <li class="star" id="4"></li>
                                        <li class="star" id="3"></li>
                                        <li class="star" id="2"></li>
                                        <li class="star" id="1"></li>
                                    </ul>
                                </li>
                                <div class="messenger-errors">
                                    <div id="msg4"></div>
                                </div>
                            </ul>
                            <!-- Reviews Field Start -->
                            <div class="riview-field mt-40">
                                <form action="{{route('uploadReview',['url'=>$slug[0]->url])}}" method="post" id="review-sp" data-url="{{$slug[0]->url}}" product-id="{{$products->id}}" product-detail-id="{{$productDetail->id}}">
                                    @csrf
                                    @if(Auth::check())
                                        <div class="form-group">
                                            <label class="req" for="comments">Bình luận</label>
                                            <textarea class="form-control" rows="5" id="comment"></textarea>
                                            <div class="messenger-errors">
                                                <div id="msg3"></div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="form-group">
                                            <label class="req" for="sure-name">Họ tên khách hàng</label>
                                            <input type="text" class="form-control" id="name">
                                            <div class="messenger-errors">
                                                <div id="msg1"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="req" for="subject">Email</label>
                                            <input type="text" class="form-control" id="email">
                                            <div class="messenger-errors">
                                                <div id="msg2"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="req" for="comments">Bình luận</label>
                                            <textarea class="form-control" rows="5" id="comment"></textarea>
                                            <div class="messenger-errors">
                                                <div id="msg3"></div>
                                            </div>
                                        </div>
                                    @endif
                                    <button type="submit" class="customer-btn">Gửi Đóng Góp</button>
                                </form>
                            </div>
                            <!-- Reviews Field Start -->
                        </div>
                        <!-- Reviews End -->
                    </div>
                </div>
                <!-- Product Thumbnail Tab Content End -->
            </div>
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
<!-- Product Thumbnail Description End -->