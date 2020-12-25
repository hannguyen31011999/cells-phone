@extends('frontend.master')

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{asset('frontend\css\profile.css')}}">
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
<div class="container">
    <div class="view-account">
        <section class="module">
            <div class="module-inner">
                <div class="side-bar">
                    <div class="user-info">
                        <img class="img-profile img-circle img-responsive center-block" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                        <ul class="meta list list-unstyled">
                            <li class="name">Ảnh đại diện
                            </li>
                        </ul>
                    </div>
                    <nav class="side-menu">
                        <ul class="nav">
                            <li class="active"><a href=""><span class="fa fa-user"></span> Tài Khoản Của Tôi</a></li>
                            <li><a href="{{url('account/purchase')}}"><span class="fa fa-shopping-cart"></span> Đơn mua</a></li>
                            <li><a href="#"><span class="fa fa-envelope"></span> Thông báo</a></li>
                            <li><a href="{{url('account/change-password')}}"><span class="fa fa-key"></span> Thay đổi mật khẩu</a></li>
                            <li><a href="{{route('logout')}}"><span class="fa fa-sign-out"></span> Đăng xuất</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="content-panel">
                    <h2 class="title">Hồ Sơ Của Tôi</h2>
                    <form class="form-horizontal" action="{{route('updateProfile')}}" method="post" id="form-profile">
                        @csrf
                        <fieldset class="fieldset">
                            <h4 class="fieldset-title">Quản lý thông tin hồ sơ để bảo mật tài khoản</h4>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">Tên Đăng Nhập</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" value="{{Auth::User()->email}}" disabled>
                                </div>
                            </div>
        
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">Tên Khách Hàng</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" value="{{Auth::User()->fullname}}" id="fullname">
                                    <div class="messenger-errors">
                                        <div id="msg1"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">Số Điện Thoại</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" value="{{Auth::User()->phone}}" id="phone">
                                    <div class="messenger-errors">
                                        <div id="msg2"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">Địa Chỉ</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" value="{{Auth::User()->address}}" id="address">
                                    <div class="messenger-errors">
                                        <div id="msg3"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">Giới tính</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    @if(Auth::User()->gender==0)
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="0" checked>
                                          <label class="form-check-label" for="inlineRadio1">Nam</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="1">
                                          <label class="form-check-label" for="inlineRadio2">Nữ</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="2">
                                          <label class="form-check-label" for="inlineRadio3">Khác</label>
                                        </div>
                                    @elseif(Auth::User()->gender==1)
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="0">
                                          <label class="form-check-label" for="inlineRadio1">Nam</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="1" checked>
                                          <label class="form-check-label" for="inlineRadio2">Nữ</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="2">
                                          <label class="form-check-label" for="inlineRadio3">Khác</label>
                                        </div>
                                    @else
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="0">
                                          <label class="form-check-label" for="inlineRadio1">Nam</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="1">
                                          <label class="form-check-label" for="inlineRadio2">Nữ</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="2" checked>
                                          <label class="form-check-label" for="inlineRadio3">Khác</label>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Ngày Sinh</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="date" class="form-control" value="{{date_format(new Datetime(Auth::User()->birth_date),'Y-m-d')}}" id="birth-date">
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-group">
                            <div class="col-md-10 col-sm-9 col-xs-12 col-md-push-2 col-sm-push-3 col-xs-push-0">
                                <input class="btn btn-primary" type="submit" value="Lưu thông tin">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
<div id="render-modal"></div>
@endsection

@section('js')
<script src="{{asset('frontend/ajax/cart.js')}}"></script>
<script src="{{asset('frontend/ajax/profile.js')}}"></script>
@endsection
