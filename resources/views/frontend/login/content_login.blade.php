<!-- LogIn Page Start -->
<div class="log-in ptb-100 ptb-sm-60">
    <div class="container">
        <div class="row">
            <!-- New Customer Start -->
            <div class="col-md-6">
                <div class="well mb-sm-30">
                    <div class="new-customer">
                        <h3 class="custom-title">Tài khoản mới</h3>
                        <p class="mtb-10"><strong>Đăng kí</strong></p>
                        <p>Bằng cách tạo tài khoản, bạn sẽ có thể mua sắm nhanh hơn, cập nhật trạng thái đơn hàng và theo dõi các đơn hàng bạn đã thực hiện trước đó</p>
                        <a class="customer-btn" href="{{url('account/register')}}">Tiếp tục</a>
                    </div>
                </div>
            </div>
            <!-- New Customer End -->
            <!-- Returning Customer Start -->
            <div class="col-md-6">
                <div class="well">
                    <div class="return-customer">
                        @if(Session::has('error'))
                            <div class="alert alert-danger">
                                {{Session::get('error')}}
                            </div>
                        @endif
                        <h3 class="mb-10 custom-title">Đăng nhập tài khoản</h3>
                        <form action="{{route('loginUser')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Tài khoản email</label>
                                <input type="text" name="email" placeholder="Nhập tài khoản email của bạn..." id="input-email" class="form-control">
                                <div class="messenger-errors">
                                    @if($errors->has('email'))
                                        {{$errors->first('email')}}
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input type="password" name="password" placeholder="Nhập password..." id="input-password" class="form-control">
                                <div class="messenger-errors">
                                    @if($errors->has('password'))
                                        {{$errors->first('password')}}
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox checkbox-success">
                                    <input type="checkbox" name="" style="position: relative;">
                                    <label>Ghi nhớ đăng nhập</label>
                                    <a class="text-muted float-right" href="{{url('account/recovery')}}" style="font-size: 14px;">Quên mật khẩu?</a>
                                </div>
                                <input type="submit" value="Đăng nhập" class="return-customer-btn">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Returning Customer End -->
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
<!-- LogIn Page End -->