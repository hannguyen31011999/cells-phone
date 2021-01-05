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
                <li class="active"><a href="">Chi tiết bài viết</a></li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->
<!-- Single Blog Page Start Here -->
        <div class="single-blog ptb-100  ptb-sm-60">
            <div class="container">
                <div class="row">
                    <!-- Single Blog Sidebar Start -->
                    <div class="col-lg-3 order-2 order-lg-1">
                        <aside>
                            <div class="single-sidebar latest-pro mb-30">
                                <h3 class="sidebar-title">Bài viết về categories</h3>
                                <ul class="sidbar-style">
                                    <li><a href="#">Smartphone</a></li>
                                    <li><a href="#">Ipad</a></li>
                                    <li><a href="#">Laptop</a></li>
                                </ul>
                            </div>
                            <div class="col-img mb-30">
                                <a href="#"><img src="{{asset('frontend\img\banner\banner-sidebar.jpg')}}" alt="slider-banner"></a>
                            </div>
                            <div class="tags">
                                 <h3 class="sidebar-title">Tags</h3>
                                 <div class="sidbar-style">
                                    <ul class="tag-list">
                                        <li><a href="#">Branding</a></li>
                                        <li><a href="#">Creative</a></li>
                                        <li><a href="#">design</a></li>
                                        <li><a href="#">Latest</a></li>
                                        <li><a href="#">Male</a></li>
                                        <li><a href="#">Female</a></li>
                                    </ul>
                                 </div>
                            </div>
                        </aside>
                    </div>
                    <!-- Single Blog Sidebar End -->
                    <!-- Single Blog Sidebar Description Start -->
                    <div class="col-lg-9 order-1 order-lg-2">
                        <div class="single-sidebar-desc mb-all-40">
                            <div class="sidebar-post-content">
                                <h4 class="sidebar-lg-title" style="font-size: 22px;">{{$post->title}}</h4>
                                <ul class="post-meta d-sm-inline-flex">
                                    <li><span>Bài viết</span> bởi {{$post->Users()->first()->fullname}}</li>
                                    <li><span>{{date_format(new DateTime($post->created_at),'d-m-Y H:i')}}</span></li>
                                </ul>
                            </div>
                            <div class="sidebar-desc mb-50">
                                {!! $post->content !!}
                            </div>
                        </div>
                    </div>
                    <!-- Single Blog Sidebar Description End -->
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Single Blog Page End Here -->
@endsection

@section('js')
<script src="{{asset('frontend/ajax/cart.js')}}"></script>
@endsection