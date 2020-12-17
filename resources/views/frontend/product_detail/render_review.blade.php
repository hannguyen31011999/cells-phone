<div class="group-title">
    <h2>Bình luận khách hàng</h2>
</div>
@foreach($review as $reviews)
    <div id="header-name" style="width: 25px;height: 25px;background: #ddd;color: #666;text-align: center;text-transform: uppercase;font-size: 12px;margin-right: 7px;line-height: 26px;float: left;">{{firstChar($reviews->name)}}</div>
    <p id="render-name">{{$reviews->name}}</p>
    <p id="">{{$reviews->content}}</p>
    <p style="margin-bottom: 15px;">{{date_format(new Datetime($reviews->created_at),"d-m-Y H:i")}}</p>
@endforeach
<h4 class="review-mini-title">Đánh giá của khách hàng</h4>
<ul class="review-list">
    <!-- Single Review List Start -->
    <li>
        5 <i class="fa fa-star"></i>
        <label>{{$countStar[0]}} Đánh giá</label>
    </li>
    <!-- Single Review List End -->
    <!-- Single Review List Start -->
    <li>
        4 <i class="fa fa-star"></i>
        <label>{{$countStar[1]}} Đánh giá</label>
    </li>
    <!-- Single Review List End -->
    <!-- Single Review List Start -->
    <li>
        3 <i class="fa fa-star"></i>
        <label>{{$countStar[2]}} Đánh giá</label>
    </li>
    <!-- Single Review List End -->
    <!-- Single Review List Start -->
    <li>
        2 <i class="fa fa-star"></i>
        <label>{{$countStar[3]}} Đánh giá</label>
    </li>
    <!-- Single Review List End -->
    <!-- Single Review List Start -->
    <li>
        1 <i class="fa fa-star"></i>
        <label>{{$countStar[4]}} Đánh giá</label>
    </li>
    <!-- Single Review List End -->
</ul>