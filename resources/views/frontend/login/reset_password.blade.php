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
        <div class="breadcrumb">
            <ul class="d-flex align-items-center">
                <li><a href="{{route('home')}}">Trang chủ</a></li>
                <li><a href="">Tài khoản</a></li>
                <li class="active"><a href="">Đặt lại mật khẩu</a></li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->
<div class="register-account ptb-100 ptb-sm-60">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @if(Session::has('error'))
                    <div class="alert alert-danger">
                        {{Session::get('error')}}
                    </div>
                @endif
            </div>
            <div class="col-sm-12">
                <div class="register-title">
                    <h3 class="mb-10">Đặt Lại Mật Khẩu</h3>
                    <p class="mb-10">Nếu mã xác nhận của bạn quá thời hạn,bạn vui lòng qua trang <a href="{{url('account/recovery')}}">quên mật khẩu.</a></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <form class="form-register" action="{{url('/account/reset?token='.$token)}}" method="post">
                    @csrf
                    <fieldset>
                        <legend>Cài đặt lại mật khẩu</legend>
                        <div class="form-group d-md-flex align-items-md-center">
                            <label class="control-label col-md-2" for="pwd"><span class="require">*</span>New Password:</label>
                            <div class="col-md-10">
                                <input type="password" name="new_password" class="form-control" id="pwd" placeholder="Nhập password...">
                                <div class="messenger-errors">
                                    @if($errors->has('new_password'))
                                        {{$errors->first('new_password')}}
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group d-md-flex align-items-md-center">
                            <label class="control-label col-md-2" for="pwd-confirm"><span class="require">*</span>Confirm Password</label>
                            <div class="col-md-10">
                                <input type="password" name="confirm_password" class="form-control" id="pwd-confirm" placeholder="Nhập lại password...">
                                <div class="messenger-errors">
                                    @if($errors->has('confirm_password'))
                                        {{$errors->first('confirm_password')}}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="terms">
                        <div class="float-md-right">
                            <input type="submit" value="Xác nhận" class="return-customer-btn">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
@endsection
@section('js')
<script src="{{asset('js\jquery.min.js')}}"></script>
<script src="{{asset('frontend/ajax/cart.js')}}"></script>
@endsection
