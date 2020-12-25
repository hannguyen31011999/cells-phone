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

    div.dropdown-menu.open{
      max-height: 314px !important;
      overflow: hidden;
    }
    ul.dropdown-menu.inner{
      max-height: 260px !important;
      overflow-y: auto;
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
                            <li><a href="{{url('account/profile')}}"><span class="fa fa-user"></span> Tài Khoản Của Tôi</a></li>
                            <li><a href="{{url('account/purchase')}}"><span class="fa fa-shopping-cart"></span> Đơn mua</a></li>
                            <li><a href="#"><span class="fa fa-envelope"></span> Thông báo</a></li>
                            <li class="active"><a href=""><span class="fa fa-key"></span> Thay đổi mật khẩu</a></li>
                            <li><a href="{{route('logout')}}"><span class="fa fa-sign-out"></span> Đăng xuất</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="content-panel">
                    <h2 class="title">Đổi Mật Khẩu</h2>
                    <form class="form-horizontal" action="{{route('updatePassword')}}" method="post" id="form-password">
                        @csrf
                        <fieldset class="fieldset">
                            <h4 class="fieldset-title">Quản lý thông tin hồ sơ để bảo mật tài khoản</h4>
                            <div class="form-group">
                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Tên Đăng Nhập</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" value="{{Auth::User()->email}}" disabled>
                                </div>
                            </div>
        
                            <div class="form-group">
                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Mật Khẩu Cũ</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="password" class="form-control" value="" id="old-password">
                                    <div class="messenger-errors">
                                        <div id="msg1"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Mật Khẩu Mới</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="password" class="form-control" value="" id="new-password">
                                    <div class="messenger-errors">
                                        <div id="msg2"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Nhập Lại Mật Khẩu Mới</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="password" class="form-control" value="" id="confirm-password">
                                    <div class="messenger-errors">
                                        <div id="msg3"></div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-group">
                            <div class="col-md-10 col-sm-9 col-xs-12 col-md-push-2 col-sm-push-3 col-xs-push-0">
                                <input class="btn btn-primary" type="submit" value="Thay Đổi">
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
<script src="{{asset('frontend/ajax/changepassword.js')}}"></script>
@endsection
