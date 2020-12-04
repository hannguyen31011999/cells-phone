@extends('frontend.master')

@section('css')

<style type="text/css">

</style>
@endsection


@section('content')
<!-- Breadcrumb Start -->
<div class="breadcrumb-area mt-30">
    <div class="container">
        <div class="breadcrumb">
            <ul class="d-flex align-items-center">
                <li><a href="">Trang chủ</a></li>
                <li class="active"><a href="">Giỏ hàng</a></li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->
<!-- Cart Main Area Start -->
<div id="table-render">
<div class="cart-main-area ptb-100 ptb-sm-60">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <!-- Form Start -->
                <form action="#">
                    <!-- Table Content Start -->
                    <div class="table-content table-responsive mb-45">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Hình ảnh</th>
                                    <th class="product-name">Tên sản phẩm</th>
                                    <th class="product-name">Màu sắc</th>
                                    <th class="product-price">Giá tiền</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-price">Khuyến mãi</th>
                                    <th class="product-subtotal">Thành tiền</th>
                                    <th class="product-remove">Thao tác</th>
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
                                    <td class="product-quantity"><input type="number" value="{{$cart['qty']}}" min="1"></td>
                                    <td class="product-price"><span class="amount">{{number_format($cart['discount'],0,".",".")}}<sup>đ</sup></span></td>
                                    <td class="product-subtotal">{{number_format(($cart['price']*$cart['qty'])-$cart['discount'],0,".",".")}}<sup>đ</sup></td>
                                    <td class="product-remove"> <a href="#" id="delete-cart" data-id="{{$key}}" onclick="confirm('Bạn muốn xóa sản phẩm này không?')"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="8" style="font-size: 20px;">Giỏ hàng đang trống</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- Table Content Start -->
                    <div class="row">
                       <!-- Cart Button Start -->
                        <div class="col-md-8 col-sm-12">
                            <div class="buttons-cart">
                            <form action="" method="">
                                <input type="submit" value="Xóa tất cả giỏ hàng">
                                <a href="{{route('home')}}">Tiếp tục mua sắm</a>
                            </form>
                            </div>
                        </div>
                        <!-- Cart Button Start -->
                        <!-- Cart Totals Start -->
                        @if(Session::has('cart'))
                        <div class="col-md-4 col-sm-12">
                            <div class="cart_totals float-md-right text-md-right">
                                <h2>Tổng giỏ hàng</h2>
                                <br>
                                <table class="float-md-right">
                                    <tbody>
                                        <tr class="order-total">
                                            <th>Tổng tiền</th>
                                            <td>
                                                <strong><span class="amount">{{number_format(Session::get('cart')->totalPrice-Session::get('cart')->totalDiscount,0,".",".")}}</span></strong><sup>đ</sup>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="wc-proceed-to-checkout">
                                    <a href="#">Tiến hành thanh toán</a>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="col-md-4 col-sm-12">
                            <div class="cart_totals float-md-right text-md-right">
                                <h2>Tổng giỏ hàng</h2>
                                <br>
                                <table class="float-md-right">
                                    <tbody>
                                        <tr class="order-total">
                                            <th>Tổng tiền</th>
                                            <td>
                                                <strong><span class="amount">0 <sup>đ</sup></span></strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="wc-proceed-to-checkout">
                                    <a href="#">Proceed to Checkout</a>
                                </div>
                            </div>
                        </div>
                        @endif
                        <!-- Cart Totals End -->
                    </div>
                    <!-- Row End -->
                </form>
                <!-- Form End -->
            </div>
        </div>
         <!-- Row End -->
    </div>
</div>
</div>
<!-- Cart Main Area End -->
@endsection

@section('js')
<script src="{{asset('js\jquery.min.js')}}"></script>
<script src="{{asset('frontend/ajax/cart.js')}}"></script>
@endsection