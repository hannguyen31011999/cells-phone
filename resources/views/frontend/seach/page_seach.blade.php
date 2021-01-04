@extends('frontend.master')

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style type="text/css">
    .nice-select{
        margin-left: 60px;
        width: 200px;
    }

    .nice-select.open .list{
        max-height: 120px;
        overflow: auto;
    }

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
                <li class="active"><a href="">Tìm kiếm sản phẩm</a></li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->
@if(isset($error))
<!-- Compare Page Start -->
<div class="compare-product ptb-100 ptb-sm-60">
    <div class="container">
        <div class="table-responsive-sm">
            <div class="alert alert-danger">
                {{$error}}
            </div>
        </div>
    </div>
</div>
@endif
<!-- Shop Page End -->
<!-- Shop Page Start -->
<div class="main-shop-page pt-100 pb-100 ptb-sm-60">
    <div class="container">
        <!-- Row End -->
        <div class="row">
            <!-- Sidebar Shopping Option Start -->
            <div class="sidebar">                           
                <!-- Single Banner Start -->
                <div class="col-img">
                    <a href=""><img src="{{asset('frontend\img\banner\banner-sidebar.jpg')}}" alt="slider-banner"></a>
                </div>
                <!-- Single Banner End -->
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
                </div>
                <!-- Grid & List View End -->
                <div class="main-categorie mb-all-40">
                    <div id="render-select">
                        <div class="main-categorie mb-all-40">
                            <div id="render-select">
                                <!-- content product -->
                                <!-- Grid & List Main Area End -->
                                <div class="tab-content fix">
                                    <div id="grid-view" class="tab-pane fade show active">
                                        <div class="row">
                                            @foreach($productDetail as $products)
                                                @foreach($products->Products->get() as $value)
                                            <!-- Single Product Start -->
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                    <div class="single-product">
                                                        <!-- Product Image Start -->
                                                        <div class="pro-img">
                                                        @foreach($products->AttributeProducts()->get() as $attribute)
                                                            <a href="{{url(utf8tourl($value->product_name.'-'.$products->rom.'GB'))}}">
                                                                <img class="primary-img" src="{{asset('backend/product_img/'.$attribute->image)}}" alt="single-product">
                                                            </a>
                                                            @break
                                                        @endforeach
                                                            <a href="#" id="{{$products->id}}" class="quick_view" data-toggle="" data-target="" title="Xem nhanh"><i class="lnr lnr-magnifier"></i></a>
                                                        </div>
                                                        <!-- Product Image End -->
                                                        <!-- Product Content Start -->
                                                        <div class="pro-content">
                                                            <div class="pro-info">
                                                                <a href="#" style="margin-bottom: 5px;">{{$value->product_name.' '.$products->rom.'GB'}}</a>
                                                                <p><span class="price">{{number_format($products->price_product,0,".",".")}}<sup>đ</sup></span></p>
                                                            </div>
                                                            <div class="pro-actions">
                                                                <div class="actions-primary">
                                                                    <a href="{{url(utf8tourl($value->product_name.'-'.$products->rom.'GB'))}}" title="Chi tiết sản phẩm">Chi tiết sản phẩm</a>
                                                                </div>
                                                                <div class="actions-secondary">
                                                                    <a href="{{url('/compare?action=add&categories_id='.$value->categories_id.'&product_id='.$value->id.'&compare_id='.$products->id)}}" id="add-compare" title="So sánh"><i class="lnr lnr-sync"></i> <span>Thêm so sánh</span></a>
                                                                    <a href="" id="add-wish" data-wish="{{$products->id}}" title="Yêu thích"><i class="lnr lnr-heart"></i> <span>Thêm yêu thích</span></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Product Content End -->
                                                    </div>
                                            </div>
                                            <!-- Single Product End -->
                                                @endforeach
                                            @endforeach
                                        </div>
                                        <!-- Row End -->
                                    </div>
                                    <!-- #grid view End -->
                                    <div id="list-view" class="tab-pane fade">
                                            @foreach($productDetail as $products)
                                                @foreach($products->Products->get() as $value)
                                                <!-- Single Product Start -->
                                                <div class="single-product"> 
                                                    <div class="row">        
                                                        <!-- Product Image Start -->
                                                        <div class="col-lg-4 col-md-5 col-sm-12">
                                                            <div class="pro-img">
                                                                @foreach($products->AttributeProducts()->get() as $attribute)
                                                                    <a href="{{url(utf8tourl($value->product_name.'-'.$products->rom.'GB'))}}">
                                                                        <img class="primary-img" src="{{asset('backend/product_img/'.$attribute->image)}}" alt="single-product">
                                                                    </a>
                                                                    @break
                                                                @endforeach
                                                                <a href="#" id="{{$products->id}}" class="quick_view" data-toggle="" data-target="" title="Xem nhanh"><i class="lnr lnr-magnifier"></i></a>
                                                            </div>
                                                        </div>
                                                        <!-- Product Image End -->
                                                        <!-- Product Content Start -->
                                                        <div class="col-lg-8 col-md-7 col-sm-12">
                                                            <div class="pro-content hot-product2">
                                                                <h4><a href="product.html">{{$value->product_name.' '.$products->rom.'GB'}}</a></h4>
                                                                <p><span class="price">{{number_format($products->price_product,0,".",".")}}<sup>đ</sup></span></p>
                                                                <div class="pro-actions">
                                                                    <div class="actions-primary">
                                                                        <a href="{{url(utf8tourl($value->product_name.'-'.$products->rom.'GB'))}}" title="Chi tiết sản phẩm">Chi tiết sản phẩm</a>
                                                                    </div>
                                                                    <div class="actions-secondary">
                                                                        <a href="{{url('/compare?action=add&categories_id='.$value->categories_id.'&product_id='.$value->id.'&compare_id='.$products->id)}}" id="add-compare" title="So sánh"><i class="lnr lnr-sync"></i> <span>Thêm so sánh</span></a>
                                                                        <a href="" id="add-wish" data-wish="{{$products->id}}" title="Yêu thích"><i class="lnr lnr-heart"></i> <span>Thêm yêu thích</span></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Product Content End -->
                                                    </div>
                                                </div>
                                                <!-- Single Product End -->
                                                @endforeach
                                            @endforeach
                                    </div>
                                    <!-- #list view End -->
                                    <div class="pro-pagination">                                  
                                    </div>
                                    <!-- Product Pagination Info -->
                                </div>
                                <!-- Grid & List Main Area End -->
                            </div>
                        </div>
                    </div>
                </div>
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
<script src="{{asset('frontend/ajax/quickview.js')}}"></script>
<script src="{{asset('frontend/ajax/wish.js')}}"></script>
<script src="{{asset('frontend/ajax/compare.js')}}"></script>
@endsection