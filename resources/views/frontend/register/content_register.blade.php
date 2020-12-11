<!-- Register Account Start -->
<div class="register-account ptb-100 ptb-sm-60">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="register-title">
                    <h3 class="mb-10">ĐĂNG KÍ TÀI KHOẢN</h3>
                    <p class="mb-10">Nếu bạn đã có tài khoản chưa xác nhận xin vui lòng chuyển qua trang <a href="{{url('account/confirm')}}">xác nhận tài khoản.</a></p>
                </div>
            </div>
        </div>
        <!-- Row End -->
        <div class="row">
            <div class="col-sm-12">
                <form class="form-register" action="{{route('register')}}" method="post">
                    @csrf
                    <fieldset>
                        <legend>Thông Tin Tài Khoản</legend>
                        <div class="form-group d-md-flex align-items-md-center">
                            <label class="control-label col-md-2" for="f-name"><span class="require">*</span>Họ tên</label>
                            <div class="col-md-10">
                                <input type="text" name="fullname" class="form-control" id="f-name" placeholder="Nhập đầy đủ họ và tên...">
                                <div class="messenger-errors">
                                    @if($errors->has('fullname'))
                                        {{$errors->first('fullname')}}
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group d-md-flex align-items-md-center">
                            <label class="control-label col-md-2" for="email"><span class="require">*</span>Tài khoản email</label>
                            <div class="col-md-10">
                                <input type="email" name="email" class="form-control" id="email" placeholder="Nhập tài khoản email của bạn...">
                                <div class="messenger-errors">
                                    @if($errors->has('email'))
                                        {{$errors->first('email')}}
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group d-md-flex align-items-md-center">
                            <label class="control-label col-md-2" for="number"><span class="require">*</span>Số điện thoại</label>
                            <div class="col-md-10">
                                <input type="text" name="phone" class="form-control" id="number" placeholder="Nhập số điện thoại của bạn...">
                                <div class="messenger-errors">
                                    @if($errors->has('phone'))
                                        {{$errors->first('phone')}}
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group d-md-flex align-items-md-center">
                            <label class="control-label col-md-2" for="number"><span class="require">*</span>Địa chỉ</label>
                            <div class="col-md-10">
                                <input type="text" name="address" class="form-control" id="number" placeholder="Nhập địa chỉ của bạn...">
                                <div class="messenger-errors">
                                    @if($errors->has('address'))
                                        {{$errors->first('address')}}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Thông Tin Mật khẩu</legend>
                        <div class="form-group d-md-flex align-items-md-center">
                            <label class="control-label col-md-2" for="pwd"><span class="require">*</span>Password:</label>
                            <div class="col-md-10">
                                <input type="password" name="password" class="form-control" id="pwd" placeholder="Nhập password...">
                                <div class="messenger-errors">
                                    @if($errors->has('password'))
                                        {{$errors->first('password')}}
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
                    <fieldset class="newsletter-input">
                        <legend>Xác nhận tài khoản</legend>
                        <div class="form-group d-md-flex align-items-md-center">
                            <label class="col-md-2 control-label">Gửi xác nhận qua mail</label>
                            <div class="col-md-10 radio-button">
                                 <label class="radio-inline"><input type="radio" name="optradio" value="1">Đồng ý</label>
                                 <label class="radio-inline"><input type="radio" name="optradio" value="0">Không đồng ý</label>
                            </div>
                        </div>
                    </fieldset>
                    <div class="terms">
                        <div class="float-md-right">
                            <span>Tôi đã đồng ý mọi <a href="#" class="agree"><b>điều khoản</b></a></span>
                            <input type="checkbox" name="agree" value="1"> &nbsp;
                            <input type="submit" value="Đăng kí" class="return-customer-btn">
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