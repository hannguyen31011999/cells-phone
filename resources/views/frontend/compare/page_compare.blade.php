@extends('frontend.master')

@section('css')

<style type="text/css">
    .nice-select{
        margin-left: 60px;
        width: 200px;
    }

    .nice-select.open .list{
        max-height: 120px;
        overflow: auto;
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
                <li class="active"><a href="">So sánh sản phẩm</a></li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->
<!-- Compare Page Start -->
<div class="compare-product ptb-100 ptb-sm-60">
    <div class="container">
        <div class="table-responsive-sm">
            @if(isset($error))
                <div class="alert alert-danger">
                    {{$error}}
                </div>
            @endif
            <table class="table text-center compare-content">
                <tbody>
                    @if(Session::has('compare'))
                        <tr>
                            <td class="product-title">Sản phẩm</td>
                            @foreach(Session::get('compare')->products as $key => $product)
                                <td class="product-description">
                                    <div class="compare-details">
                                        <div class="compare-detail-img">
                                            <a href="#"><img src="{{asset('backend/product_img/'.$product['image'])}}" alt="compare-product" id="attribute-img{{$key}}"></a>
                                        </div>
                                        <div class="compare-detail-content">
                                            <br>
                                            <span>Nhà sản xuất: {{ $product['categories_name']}}</span>
                                            <h4><a href="#">{{$product['productName']}}GB</a></h4>
                                        </div>
                                    </div>
                                </td>
                            @endforeach
                        </tr>
                        <tr>
                            <td class="product-title">Mô tả</td>
                            @foreach(Session::get('compare')->products as $product)
                                <td class="product-description" style="max-height: 200px;overflow: auto;">
                                    <p>{!!$product['desc']!!}</p>
                                </td>
                            @endforeach
                        </tr>
                        <tr>
                            <td class="product-title">Giá tiền</td>
                            @foreach(Session::get('compare')->products as $key => $product)
                                <td class="product-description"><span id="amount{{$key}}">{{number_format($product['price'],0,".",".")}} <sup>đ</sup></span></td>
                            @endforeach
                        </tr>
                        <tr>
                            <td class="product-title">Màu sắc</td>
                            @foreach(Session::get('compare')->products as $key => $product)
                                <td class="product-description">
                                    <select id="choose-color{{$key}}" onchange="changeAttribute(<?php echo $key ?>)">
                                        <option value="">Chọn màu sắc</option>
                                    @foreach($product['color'] as $value)
                                        <option value="{{$value->id}}">{{$value->color}}</option>
                                    @endforeach
                                    </select>
                                </td>
                            @endforeach
                        </tr>
                        <tr>
                            <td class="product-title">Giỏ hàng</td>
                            @foreach(Session::get('compare')->products as $key => $product)
                                <td class="product-description">
                                    <a class="compare-cart text-uppercase" href="#" id="add-cart{{$key}}" onclick="addCart(<?php echo $key ?>)"> + Thêm giỏ hàng</a>
                                </td>
                            @endforeach
                        </tr>
                        <tr>
                            <td class="product-title">Thao tác</td>
                            @foreach(Session::get('compare')->products as $key => $product)
                                <td class="product-description"><a href="{{url('/compare',['id'=>$key])}}" onclick="confirm('Bạn chắc chắn xóa?')"><i class="fa fa-trash-o"></i></a></td>
                            @endforeach
                        </tr>
                        <tr>
                            <td class="product-title">Đánh giá</td>
                            @foreach(Session::get('compare')->products as $product)
                            <td class="product-description">
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                            </td>
                            @endforeach
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Compare Page End -->
@endsection

@section('js')
<script src="{{asset('js\jquery.min.js')}}"></script>
<script src="{{asset('frontend/ajax/cart.js')}}"></script>
<script src="{{asset('frontend/ajax/wish.js')}}"></script>
<script src="{{asset('frontend/ajax/compare.js')}}"></script>
@endsection