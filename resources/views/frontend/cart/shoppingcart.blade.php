@extends('frontend.master')

@section('css')

<style type="text/css">

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
                                    <th class="product-quantity">Số lượng</th>
                                    <th class="product-price">Khuyến mãi</th>
                                    <th class="product-subtotal">Thành tiền</th>
                                    <th class="product-remove">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @include('frontend.cart.content_cart')
                            </tbody>
                        </table>
                    </div>
                    <!-- Table Content Start -->
                    <div class="row">
                       <!-- Cart Button Start -->
                        <div class="col-md-8 col-sm-12">
                            <div class="buttons-cart">
                                <a href="{{url('shopping-cart?action=delete')}}">Xóa giỏ hàng</a>
                                <a href="{{route('home')}}">Tiếp tục mua sắm</a>
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
                                                <span class="amount" id="render-totalPrice">{{number_format(Session::get('cart')->totalPrice-Session::get('cart')->totalDiscount,0,".",".")}}</span><sup id="sup" style="border-bottom: 1px solid black; margin-left: 5px;font-weight: bold;">đ</sup>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="wc-proceed-to-checkout">
                                    <a href="{{url('shopping-cart/checkout')}}">Tiến hành thanh toán</a>
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
                                                <span class="amount">0</span><sup>đ</sup>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="wc-proceed-to-checkout">
                                    <a href="{{route('home')}}">Quay lại mua hàng</a>
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