@extends('frontend.master')

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{asset('frontend\css\profile.css')}}">
<style type="text/css">
    .box-product{
        display: flex;
        flex-wrap: wrap;
    }
    .box-product > .attribute{
        background-color: #f1f1f1;
        width: 85px;
        margin-right: 10px;
        margin-bottom: 10px;
        text-align: center;
        line-height: 30px;
        font-size: 12px;
    }
    .linked-price{
        color: red;
    }
    .attribute-color{
        color: black;
        word-wrap: normal;
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
                <li class="active"><a href="">Sản phẩm</a></li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->
<!-- Shop Page Start -->
<div class="main-shop-page pt-100 pb-100 ptb-sm-60">
    <div class="container">
        <!-- Row End -->
        <div class="row">
            <!-- Sidebar Shopping Option Start -->
            <div class="col-lg-3 order-2 order-lg-1">
                @include('frontend.product.sidebar')
            </div>
            <!-- Sidebar Shopping Option End -->
            <!-- Product Categorie List Start -->
            <div class="col-lg-9 order-1 order-lg-2">
                <!-- Grid & List View Start -->
                <div class="grid-list-top border-default universal-padding d-md-flex justify-content-md-between align-items-center mb-30">
                    <div class="grid-list-view  mb-sm-15">
                        <ul class="nav tabs-area d-flex align-items-center">
                            <li><a class="active" data-toggle="tab" href="#grid-view"><i class="fa fa-th"></i></a></li>
                            <li><a data-toggle="tab" href="#list-view"><i class="fa fa-list-ul"></i></a></li>
                        </ul>
                    </div>
                    <!-- Toolbar Short Area Start -->
                    <div class="main-toolbar-sorter clearfix">
                        <div class="toolbar-sorter d-flex align-items-center">
                        </div>
                    </div>
                    <!-- Toolbar Short Area End -->
                </div>
                @include('frontend.product.content')
                <!-- Grid & List View End -->
            </div>
            <!-- product Categorie List End -->
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
<div id="modal-product">
</div>
<!-- Shop Page End -->
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
<script src="{{asset('frontend/ajax/wish.js')}}"></script>
<script src="{{asset('frontend/ajax/compare.js')}}"></script>
<script src="{{asset('frontend/ajax/shop.js')}}"></script>
@endsection
