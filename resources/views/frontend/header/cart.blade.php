<!-- Cart Box Start Here -->
<ul class="d-flex justify-content-lg-end justify-content-center align-items-center">
    @if(Session::has('cart'))<li><a href="{{url('/shopping-cart')}}"><i class="lnr lnr-cart"></i><span class="my-cart"><span class="total-pro">{{Session::get('cart')->totalQuantity}}</span><span>Giỏ hàng</span></span></a>
    @else
    <li><a href="#"><i class="lnr lnr-cart"></i><span class="my-cart"><span class="total-pro">0</span><span>Giỏ hàng</span></span></a>
    @endif
        <ul class="ht-dropdown cart-box-width" style="max-height: 250px;overflow: auto;">
            <li>
            @if(Session::has('cart'))
                <input type="hidden" name="" value="{{Session::get('cart')->totalQuantity}}" id="count">
                <!-- Cart Box Start -->
                @foreach(Session::get('cart')->products as $key => $cart)
                <div class="single-cart-box">
                    <div class="cart-img">
                        <a href="#"><img src="{{asset('backend/attribute_img/'.$cart['image'])}}" alt="" title="{{$cart['productName']}}"></a>   
                    </div>
                    <div class="cart-content">
                        <h6><a href="" title="{{$cart['productName']}}">{{$cart['productName']}}</a></h6>
                        <span class="cart-price">Giá:{{number_format($cart['price'],0,".",".")}}<sup>đ</sup></span>
                        <span class="render-discount{{$key}}">Voucher: {{number_format($cart['discount'],0,".",".")}}<sup>đ</sup></span>
                        <span>Màu sắc: {{$cart['color']}}</span>
                        <span class="render-qty{{$key}}">Số lượng: {{$cart['qty']}}</span>
                    </div>
                    <a class="del-icone" id="delete-cart" data-id="{{$key}}" href="#" onclick="confirm('Bạn muốn sản phẩm này?');"><i class="ion-close"></i></a>
                </div>
                @endforeach
                <!-- Cart Box End -->
                <!-- Cart Footer Inner Start -->
                <div class="cart-footer">
                   <ul class="price-content">
                       <li>Thành tiền<span class="render-subtotal">{{number_format(Session::get('cart')->totalPrice,0,".",".")}}<sup>đ</sup></span></li>
                       <li>Tổng khuyến mãi<span class="render-totaldiscount">{{number_format(Session::get('cart')->totalDiscount,0,".",".")}}<sup>đ</sup></span></li>
                       <li>Tổng tiền<span class="render-totalprice">{{number_format(Session::get('cart')->totalPrice,0,".",".")}}<sup>đ</sup></span></li>
                   </ul>
                    <div class="cart-actions text-center">
                        <a class="cart-checkout" href="{{url('shopping-cart/checkout')}}">Thanh toán</a>
                    </div>
                </div>
                <!-- Cart Footer Inner End -->
            @else
                <h5 style="padding: 5px;margin-left: 14%;">Giỏ hàng đang trống</h5>
            @endif
            </li>
        </ul>
    </li>
    @if(Session::has('wish'))
        <li><a href="{{url('/wish-list')}}"><i class="lnr lnr-heart"></i><span class="my-cart"><span>Danh sách</span><span id="render-wish">yêu thích ({{count(Session::get('wish')->products)}})</span></span></a>
        </li>
    @else
        <li><a href="{{url('/wish-list')}}"><i class="lnr lnr-heart"></i><span class="my-cart"><span>Danh sách</span><span id="render-wish">yêu thích (0)</span></span></a></li>
    @endif
    @if(Auth::check()&&Auth::User()->role==0&&Auth::User()->status!=0)
    <li></li>
    @else
    <li><a href="{{url('account/login')}}"><i class="lnr lnr-user"></i><span class="my-cart"><span> <strong>Đăng nhập</strong></span><span>tài khoản</span></span></a></li>
    @endif
</ul>
<!-- Cart Box End Here -->