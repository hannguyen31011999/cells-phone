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
<!-- Register Account Start -->
<div class="register-account ptb-100 ptb-sm-60">
    <div class="container">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                @if(isset($success))
                    <div class="alert alert-success" style="text-align: center;">
                        {{$success}}
                    </div>
                @endif
                @if(Session::has('success'))
                    <div class="alert alert-success" style="text-align: center;">
                        {{Session::get('success')}}
                    </div>
                @endif
                @if(isset($mess_error))
                    <div class="alert alert-danger" style="text-align: center;">
                        {{$mess_error}}
                    </div>
                @endif
                @if(Session::has('error'))
                    <div class="alert alert-danger" style="text-align: center;">
                        {{Session::get('error')}}
                    </div>
                @endif
            </div>
            <div class="col-sm-2"></div>
        </div>
        <!-- Row End -->
        <div class="row">
            <div class="col-sm-12">
                <form class="form-register" action="{{route('confirm')}}" method="post">
                    @csrf
                    <fieldset>
                        <legend>Kích hoạt tài khoản</legend>
                        <div class="form-group d-md-flex align-items-md-center">
                            <label class="control-label col-md-2" for="email"><span class="require">*</span>Tài khoản email</label>
                            <div class="col-md-10">
                                <input type="email" name="email" class="form-control" id="email" placeholder="Nhập tài khoản email của bạn..." value="{{old('email')}}">
                                <div class="messenger-errors">
                                    @if($errors->has('email'))
                                        {{$errors->first('email')}}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="terms">
                        <div class="float-md-right">
                            <input type="submit" value="Gửi xác nhận" class="return-customer-btn">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
<!-- Register Account End -->
@endsection

@section('js')
<script src="{{asset('frontend/ajax/cart.js')}}"></script>
@endsection
