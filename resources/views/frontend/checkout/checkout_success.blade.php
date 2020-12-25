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
            <div class="alert alert-success" style="text-align: center;">
                <h4>Thanh toán đơn hàng thành công</h4>
                <br><a href="{{route('home')}}">Tiếp tục mua sắm</a>
            </div>
        </div>
    </div><br>
    <!-- order -->
</div>
@endsection
@section('js')
<script src="{{asset('js\jquery.min.js')}}"></script>
<script src="{{asset('frontend/ajax/cart.js')}}"></script>
@endsection