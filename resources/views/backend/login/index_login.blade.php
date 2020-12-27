<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Cellphone</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Responsive bootstrap 4 admin template" name="description">
        <meta content="Coderthemes" name="author">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('backend\assets\images\favicon.ico')}}">

        <!-- App css -->
        <link href="{{asset('backend\assets\css\bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">
        <link href="{{asset('backend\assets\css\icons.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('backend\assets\css\app.min.css')}}" rel="stylesheet" type="text/css" id="app-stylesheet">

    </head>

    <body class="authentication-page">

        <div class="account-pages my-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">
                            <div class="card-header p-4 bg-primary">
                                <h4 class="text-white text-center mb-0 mt-0">Đăng nhập</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{url('admin/login')}}" class="p-2" >
                                    @csrf
                                    <div class="form-group mb-3">
                                        @if(Session::has('error'))
                                            <div class="alert alert-danger" style="text-align: center;">
                                                {{Session::get('error')}}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Email Address :</label>
                                        <input class="form-control" type="email" id="emailaddress" name="email" placeholder="Nhập email">
                                    </div>

                                    <div class="form-group mb-3">
                                        @if($errors->has('email'))
                                            <div class="alert alert-danger">
                                                {{$errors->first('email')}}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Password :</label>
                                        <input class="form-control" type="password" id="password" name="password" placeholder="Nhập mật khẩu">
                                    </div>

                                    <div class="form-group mb-3">
                                        @if($errors->has('password'))
                                            <div class="alert alert-danger" s>
                                                {{$errors->first('password')}}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="checkbox checkbox-success">
                                            <input id="remember" name="remember" type="checkbox" >
                                            <label for="remember">
                                                Ghi nhớ mật khẩu
                                            </label>
                                            <a href="" class="text-muted float-right">Quên mật khẩu?</a>
                                        </div>
                                    </div>

                                    <div class="form-group row text-center mt-4 mb-4">
                                        <div class="col-12">
                                            <button class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit">Đăng nhập</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <!-- end row -->

                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

            </div>
        </div>

        <!-- Vendor js -->
        <script src="{{asset('backend\assets\js\vendor.min.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('backend\assets\js\app.min.js')}}"></script>

    </body>

</html>