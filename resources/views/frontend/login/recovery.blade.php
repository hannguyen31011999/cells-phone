@extends('frontend.master')

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
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
                <li class="active"><a href="">Quên mật khẩu</a></li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->
<!-- Register Account Start -->
<div class="Lost-pass ptb-100 ptb-sm-60">
    <div class="container">
        <div class="register-title">
            <h3 class="mb-10 custom-title">Trang Quên Mật Khẩu</h3>
        </div>
        <form class="password-forgot clearfix" action="{{route('resetPassword')}}" method="post" id="form-reset">
            @csrf
            <fieldset>
                <legend>Thông tin tài khoản</legend>
                <div class="form-group d-md-flex">
                    <label class="control-label col-md-2" for="email"><span class="require">*</span>Nhập tài khoản email của bạn...</label>
                    <div class="col-md-10">
                        <input type="email" name="email" class="form-control" id="email" placeholder="Nhập tài khoản email của bạn...">
                        <div class="messenger-errors">
                            <div id="msg1"></div>
                        </div>
                    </div>
                </div>
            </fieldset>
            <div class="buttons newsletter-input">
                <div class="float-left float-sm-left">
                    <a class="customer-btn mr-20" href="{{url('account/login')}}">Quay lại</a>
                </div>
                <div class="float-right float-sm-right">
                    <input type="submit" value="Gửi xác nhận" class="return-customer-btn" id="confirm-recovery">
                </div>
            </div>
        </form>
    </div>
    <!-- Container End -->
</div>
<!-- Register Account End -->
<div id="render-modal"></div>
@endsection

@section('js')

<script src="{{asset('js\jquery.min.js')}}"></script>
<script src="{{asset('frontend/ajax/cart.js')}}"></script>
<script src="{{asset('frontend/ajax/recovery.js')}}"></script>
@endsection
