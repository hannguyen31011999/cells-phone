
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
                        <span>Voucher: {{number_format($cart['discount'],0,".",".")}}<sup>đ</sup></span>
                        <span>Màu sắc: {{$cart['color']}}</span>
                        <span>Số lượng: {{$cart['qty']}}</span>
                    </div>
                    <a class="del-icone" id="delete-cart" data-id="{{$key}}" href="#" onclick="confirm('Bạn muốn sản phẩm này?');"><i class="ion-close"></i></a>
                </div>
                @endforeach
                <!-- Cart Box End -->
                <!-- Cart Footer Inner Start -->
                <div class="cart-footer">
                   <ul class="price-content">
                       <li>Thành tiền<span>{{number_format(Session::get('cart')->totalPrice,0,".",".")}}<sup>đ</sup></span></li>
                       <li>Tổng khuyến mãi<span>{{number_format(Session::get('cart')->totalDiscount,0,".",".")}}<sup>đ</sup></span></li>
                       <li>Tổng tiền<span>{{number_format(Session::get('cart')->totalPrice-Session::get('cart')->totalDiscount,0,".",".")}}<sup>đ</sup></span></li>
                   </ul>
                    <div class="cart-actions text-center">
                        <a class="cart-checkout" href="">Thanh toán</a>
                    </div>
                </div>
                <!-- Cart Footer Inner End -->
            </li>
            @else
                <h5 style="padding: 5px;margin-left: 14%;">Giỏ hàng đang trống</h5>
            @endif
        </ul>
    </li>
    <li><a href="#"><i class="lnr lnr-heart"></i><span class="my-cart"><span>Wish</span><span>list (0)</span></span></a>
    </li>
    <li><a href="#"><i class="lnr lnr-user"></i><span class="my-cart"><span> <strong>Đăng nhập</strong></span><span>tài khoản</span></span></a>
</ul>
<!-- Cart Box End Here -->