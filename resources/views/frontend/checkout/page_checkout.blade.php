@extends('frontend.master')

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
  body {
    color: #000;
    overflow-x: hidden;
    height: 100%;
    background-color: #fff;
    background-repeat: no-repeat
}

.book {
    margin: 20px 15px 5px 15px
}

.border-top {
    border-top: 1px solid #EEEEEE !important;
    margin-top: 20px;
    padding-top: 15px
}

.card {
    margin: 40px 0px;
    padding: 40px 50px;
    border-radius: 20px;
    border: none;
    box-shadow: 1px 5px 10px 1px rgba(0, 0, 0, 0.2)
}

button:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    outline-width: 0
}

.pay {
    width: 80px;
    height: 40px;
    border-radius: 5px;
    border: 1px solid #673AB7;
    margin: 10px 20px 10px 0px;
    cursor: pointer;
    box-shadow: 1px 5px 10px 1px rgba(0, 0, 0, 0.2)
}

.gray {
    -webkit-filter: grayscale(100%);
    -moz-filter: grayscale(100%);
    -o-filter: grayscale(100%);
    -ms-filter: grayscale(100%);
    filter: grayscale(100%);
    color: #E0E0E0
}

.gray .pay {
    box-shadow: none
}

#tax {
    border-top: 1px lightgray solid;
    margin-top: 10px;
    padding-top: 10px
}

.btn-blue {
    border: none;
    border-radius: 10px;
    background-color: #673AB7;
    color: #fff;
    padding: 8px 15px;
    margin: 20px 0px;
    cursor: pointer
}

.btn-blue:hover {
    background-color: #311B92;
    color: #fff
}

#checkout {
  text-align: center;
}

#check-amt {
    float: right
}

@media screen and (max-width: 768px) {

    .book,
    .book-img {
        width: 200px;
        height: 50px
    }

    .card {
        padding-left: 15px;
        padding-right: 15px
    }

    .mob-text {
        font-size: 13px
    }

    .pad-left {
        padding-left: 20px
    }
}

.custom-style .current {
  width: 110px;
  display: inline-block;
  text-overflow: ellipsis;
  overflow: hidden;
  white-space: nowrap;
}
.messenger-errors{
    color: red;
    font-size: 14px;
    margin-top: 5px;
}
</style>
@endsection

@section('header')
    @include('frontend.header.header_master')
@endsection

@section('categories')
    @include('frontend.categories.categories_none')
@endsection

@section('content')
<!-- Breadcrumb Start -->
<div class="breadcrumb-area mt-30">
    <div class="container">
        <div class="breadcrumb">
            <ul class="d-flex align-items-center">
                <li><a href="{{route('home')}}">Trang chủ</a></li>
                <li class="active"><a href="#">Thanh toán</a></li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->
<!-- content checkout -->
<div class="container px-4 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-12">
            @if(Session::has('error'))
                <div class="alert alert-danger" style="text-align: center;">
                    <h5>{{Session::get('error')}}</h5>
                </div>
            @endif
        </div>
    </div><br>
    <div class="row d-flex justify-content-center">
        <div class="col-5">
            <h4 class="heading">Chi tiết đơn hàng</h4>
        </div>
        <div class="col-7">
        </div>
    </div><br>
    <!-- order -->
    <div style="max-height: 450px;overflow: auto;">
        <div class="table-content table-responsive mb-45">
          <table>
            <thead>
                <tr>
                    <th class="product-thumbnail">Hình ảnh</th>
                    <th class="product-name">Tên sản phẩm</th>
                    <th class="product-name">Màu sắc</th>
                    <th class="product-price">Giá tiền</th>
                    <th class="product-quantity">Số lượng</th>
                    <th class="product-price">Khuyến mãi</th>
                    <th class="product-subtotal">Thành tiền</th>
                </tr>
            </thead>
            <tbody>
            @if(Session::has('cart'))
                @foreach(Session::get('cart')->products as $key => $cart)
                <tr>
                    <td class="product-thumbnail">
                        <a href="#"><img src="{{asset('backend/attribute_img/'.$cart['image'])}}" title="{{$cart['productName']}}" alt="{{$cart['productName']}}"></a>
                    </td>
                    <td class="product-name"><a href="#">{{$cart['productName']}}</a></td>
                    <td class="product-name"><a href="#">{{$cart['color']}}</a></td>
                    <td class="product-price"><span class="amount">{{number_format($cart['price'],0,".",".")}}<sup>đ</sup></span></td>
                    <td class="product-quantity"><input type="number" value="{{$cart['qty']}}" style="text-align: center;" disabled></td>
                    <td class="product-price"><span class="amount">{{number_format($cart['discount'],0,".",".")}}<sup>đ</sup></span></td>
                    <td class="product-subtotal"><span>{{number_format(($cart['price']*$cart['qty'])-$cart['discount'],0,".",".")}}<sup>đ</sup></span></td>
                </tr>
                @endforeach
            @else
                <tr>
                    <th colspan="7"><h4>Giỏ hàng đang trống <br></h4><a href="{{route('home')}}">quay lại mua hàng</a></th>
                </tr>
            @endif
            </tbody>
          </table>
        </div>
    </div>
    <!-- end order -->
    <br></br>
    @if(Session::has('cart'))
    <div class="row d-flex justify-content-center">
        <div class="col-5">
            <h4 class="heading">Thông tin giao nhận</h4>
        </div>
        <div class="col-7">
        </div>
    </div>

    <!-- info customer -->
    <div class="row justify-content-center">
      <form action="{{route('createOrder')}}" method="post">
        @csrf
        <div class="col-lg-12">
            <div class="card">
                <div class="row">
                    <!-- info customer -->
                    @if(Auth::check())
                        @include('frontend.checkout.page_account')
                    @else
                        @include('frontend.checkout.page_customer')
                    @endif
                    <!-- end info customer -->
                    <!-- payment -->
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4 radio-group">
                        <input type="hidden" name="payment" value="0" id="choose-payment">
                        <div class="row d-flex px-3 radio" payment="0"><img class="pay" src="{{asset('frontend/shipper.jpg')}}">
                            <p class="my-auto">Thanh toán khi nhận</p>
                        </div>
                        <div class="row d-flex px-3 radio gray" payment="1"> <img class="pay" src="{{asset('frontend/vnpay.png')}}">
                            <p class="my-auto">Thanh toán qua VNPay</p>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-2">
                        <div class="row d-flex justify-content-between px-4">
                            <p class="mb-1 text-left">Thành tiền</p>
                            @if(Session::has('cart'))
                                <h6 class="mb-1 text-right">
                                    {{
                                        number_format(Session::get('cart')->totalPrice,0,".",".")
                                    }}<sup>đ</sup>
                                </h6>
                            @endif
                        </div>
                        <div class="row d-flex justify-content-between px-4">
                            <p class="mb-1 text-left">Phí Ship</p>
                            @if(Auth::check())
                            <h6 class="mb-1 text-right" id="render-ship">{{number_format(20000,0,'.','.')}}<sup>đ</sup></h6>
                            @else
                            <h6 class="mb-1 text-right" id="render-ship">0<sup>đ</sup></h6>
                            @endif
                        </div>
                        <div class="row d-flex justify-content-between px-4" id="tax">
                            <p class="mb-1 text-left">Tổng tiền</p>
                            @if(Session::has('cart')&&Auth::check())
                                <h6 class="mb-1 text-right" id="render-totalPrice">
                                    {{
                                        number_format(Session::get('cart')->totalPrice+20000,0,".",".")
                                    }}<sup>đ</sup>
                                </h6>
                            @elseif(Session::has('cart')&&Auth::check()&&Auth::User()->point>300)
                                <h6 class="mb-1 text-right" id="render-totalPrice">
                                    {{
                                        number_format(Session::get('cart')->totalPrice,0,".",".")
                                    }}<sup>đ</sup>
                                </h6>
                            @else
                                <h6 class="mb-1 text-right" id="render-totalPrice">
                                    {{
                                        number_format(Session::get('cart')->totalPrice,0,".",".")
                                    }}<sup>đ</sup>
                                </h6>
                            @endif
                        </div><button type="submit" class="btn-block btn-blue"><span><span id="checkout">Tiến hành thanh toán</span></span></button>
                    </div>
                    <!-- end payment -->
                </div>
            </div>
        </div>
      </form>
    </div>
    <!-- end info customer -->
    @endif
</div>
<!-- end content checkout -->
<div class="modal fade" id="modalSuccess" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content text-center">
      <div class="modal-body">
        <i class="fa fa-check" style="color: rgb(102, 204, 0);font-size:50px;"></i>
        <p id="render-modal"></p>
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')
<script src="{{asset('frontend/ajax/cart.js')}}"></script>
<script src="{{asset('frontend/ajax/checkout.js')}}"></script>
@endsection