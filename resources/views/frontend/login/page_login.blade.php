@extends('frontend.master')

@section('css')
<style type="text/css">
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
        @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
        @endif
        @if(Session::has('mess_error'))
            <div class="alert alert-danger">
                {{Session::get('mess_error')}}
            </div>
        @endif
        <div class="breadcrumb">
            <ul class="d-flex align-items-center">
                <li><a href="{{route('home')}}">Trang chủ</a></li>
                <li><a href="">Tài khoản</a></li>
                <li class="active"><a href="">Đăng nhập</a></li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->
@include('frontend.login.content_login')
@endsection

@section('js')

<script src="{{asset('js\jquery.min.js')}}"></script>
<script src="{{asset('frontend/ajax/cart.js')}}"></script>
@endsection
