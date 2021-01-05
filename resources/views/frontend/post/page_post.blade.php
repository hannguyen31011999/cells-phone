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
                <li class="active"><a href="">Bài viết</a></li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->
<!-- Blog Page Start Here -->
<div class="blog ptb-100  ptb-sm-60">
    <div class="container">
        <div class="main-blog">
            <div class="row">
            @foreach($post as $value)
                <!-- Single Blog Start -->
                <div class="col-lg-6 col-sm-12">
                   <div class="single-latest-blog">
                       <div class="blog-img">
                           <a href="{{route('page_detail_post',['name'=>utf8tourl($value->title)])}}"><img src="{{asset('backend/post/'.$value->image)}}" alt="hình ảnh bài viết"></a>
                       </div>
                       <div class="blog-desc">
                           <h4><a href="{{route('page_detail_post',['name'=>utf8tourl($value->title)])}}" style="word-wrap: break-word !important;"></a></h4>
                            <ul class="meta-box d-flex">
                                <li><a href="{{route('page_detail_post',['name'=>utf8tourl($value->title)])}}">{{$value->Users()->first()->fullname}} ({{date_format(new DateTime($value->created_at),'d-m-Y H:i')}})</a></li>
                            </ul>
                            <p>{{$value->title}}...</p>
                            <a class="readmore" href="{{route('page_detail_post',['name'=>utf8tourl($value->title)])}}">Đọc tiếp</a>
                       </div>
                       <div class="blog-date">
                            <span>{{date('d', strtotime($value->created_at))}}</span>
                            {{convertMonth(date('m', strtotime($value->created_at)))}}
                        </div>
                   </div>
                </div>
                <!-- Single Blog End -->
            @endforeach
            </div>
            <!-- Row End -->
            <div class="row">
                <div class="col-sm-12">
                        <div class="pro-pagination">
                            {!! $post->render() !!}                            
                        </div>
                        <!-- Product Pagination Info -->
                </div>
            </div>
            <!-- Row End -->
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Blog Page End Here -->
@endsection

@section('js')
<script src="{{asset('frontend/ajax/cart.js')}}"></script>
@endsection