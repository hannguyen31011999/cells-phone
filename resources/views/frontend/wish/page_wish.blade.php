@extends('frontend.master')

@section('css')

<style type="text/css">
    .nice-select{
        margin-left: 45px;
        width: 200px;
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
                <li><a href="">Trang chủ</a></li>
                <li class="active"><a href="">sản phẩm yêu thích</a></li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->
<!-- Wish List Start -->
<div class="cart-main-area wish-list ptb-100 ptb-sm-60">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <!-- Form Start -->
                <form action="#">
                    <!-- Table Content Start -->
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-remove">Thao tác</th>
                                    <th class="product-thumbnail">Hình ảnh</th>
                                    <th class="product-name">Sản phẩm</th>
                                    <th class="product-price">Giá tiền</th>
                                    <th class="product-quantity">Chọn màu sắc</th>
                                    <th class="product-subtotal">Thêm giỏ hàng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(Session::has('wish'))
                                    @foreach(Session::get('wish')->products as $key => $value)
                                        <tr>
                                            <td class="product-remove"> <a href="#" onclick="confirm('Bạn muốn xóa sản phẩm yêu thích này?');"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                                            <td class="product-thumbnail">
                                                <a href="#"><img src="{{asset('backend/product_img/'.$value['image'])}}" id="attribute-img{{$key}}" alt="cart-image"></a>
                                            </td>
                                            <td class="product-name"><a href="#">{{$value['productName']}}</a></td>
                                            <td class="product-price"><span class="amount" id="amount{{$key}}">{{number_format($value['price'],0,".",".")}} <sup>đ</sup></span></td>
                                            <td class="product-stock-status">
                                                <select name="attribute-color" id="choose-color{{$key}}" onchange="changeAttribute(<?php echo $key ?>)" data-select="{{$key}}">
                                                    <option value="">Chọn màu bạn thích</option>
                                                    @foreach($value['color'] as $keyAttr => $valueAttr)
                                                        <option value="{{$valueAttr->id}}">{{$valueAttr->color}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="product-add-to-cart"><a href="#" id="add-cart" data-id="">Thêm giỏ hàng</a></td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- Table Content Start -->
                </form>
                <!-- Form End -->
            </div>
        </div>
        <!-- Row End -->
    </div>
</div>
<!-- Wish List End -->
@endsection

@section('js')
<script src="{{asset('js\jquery.min.js')}}"></script>
<script src="{{asset('frontend/ajax/wish.js')}}"></script>
<script src="{{asset('frontend/ajax/cart.js')}}"></script>
@endsection