<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Cell phone</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Responsive bootstrap 4 admin template" name="description">
        <meta content="Coderthemes" name="author">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('backend\assets\images\favicon.ico')}}">

        <!-- Plugins css-->
        <link href="{{asset('backend\assets\libs\sweetalert2\sweetalert2.min.css')}}" rel="stylesheet" type="text/css">

        <!-- App css -->
        <link href="{{asset('backend\assets\css\bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">
        <link href="{{asset('backend\assets\css\icons.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('backend\assets\css\app.min.css')}}" rel="stylesheet" type="text/css" id="app-stylesheet">

        <link href="{{asset('backend\assets\libs\bootstrap-tagsinput\bootstrap-tagsinput.css')}}" rel="stylesheet">

        <!-- third party css -->
        <link href="{{asset('backend\assets\libs\datatables\dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('backend\assets\libs\datatables\buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('backend\assets\libs\datatables\responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('backend\assets\libs\datatables\select.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('backend\assets\libs\dropzone\dropzone.min.css')}}" rel="stylesheet" type="text/css">
        @yield('css')
    </head>
    <body>
        <!-- Begin page -->
        <div id="wrapper">
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">
                    <li class="dropdown d-none d-lg-block" >
                        <div class="nav-link dropdown-toggle mr-0 waves-effect">
                            <div id="clock"></div>
                        </div>
                    </li>
                    <li class="dropdown d-none d-lg-block">
                        <a class="nav-link dropdown-toggle mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{asset('backend\assets\images\flags\vietnam.png')}}" alt="user-image" class="mr-2" height="12"> <span class="align-middle">Vietnam <i class="mdi mdi-chevron-down"></i> </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="{{asset('backend\assets\images\flags\us.jpg')}}" alt="user-image" class="mr-2" height="12"> <span class="align-middle">English</span>
                            </a>
                        </div>
                    </li>

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle  waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="mdi mdi-email-outline noti-icon"></i>
                            <span class="badge badge-purple rounded-circle noti-icon-badge">3</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5 class="font-16 m-0">
                                    <span class="float-right">
                                        <a href="" class="text-dark">
                                            <small>Clear All</small>
                                        </a>
                                    </span>Chat
                                </h5>
                            </div>

                            <div class="slimscroll noti-scroll">

                                <div class="inbox-widget">
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="{{asset('backend\assets\images\users\avatar-1.jpg')}}" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Cristina Pride</p>
                                            <p class="inbox-item-text text-truncate">Hi, How are you? What about our next meeting</p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="{{asset('backend\assets\images\users\avatar-2.jpg')}}" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Sam Garret</p>
                                            <p class="inbox-item-text text-truncate">Yeah everything is fine</p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="{{asset('backend\assets\images\users\avatar-3.jpg')}}" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Karen Robinson</p>
                                            <p class="inbox-item-text text-truncate">Wow that's great</p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="{{asset('backend\assets\images\users\avatar-4.jpg')}}" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Sherry Marshall</p>
                                            <p class="inbox-item-text text-truncate">Hi, How are you? What about our next meeting</p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="{{asset('backend\assets\images\users\avatar-5.jpg')}}" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Shawn Millard</p>
                                            <p class="inbox-item-text text-truncate">Yeah everything is fine</p>

                                        </div>
                                    </a>
                                </div> <!-- end inbox-widget -->

                            </div>
                            <!-- All-->
                            <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                View all
                                <i class="fi-arrow-right"></i>
                            </a>

                        </div>
                    </li>

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle  waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="mdi mdi-bell-outline noti-icon"></i>
                            <span class="badge badge-pink rounded-circle noti-icon-badge">4</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5 class="font-16 m-0">
                                    <span class="float-right">
                                        <a href="" class="text-dark">
                                            <small>Clear All</small>
                                        </a>
                                    </span>Notification
                                </h5>
                            </div>

                            <div class="slimscroll noti-scroll">
                    
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon">
                                        <i class="mdi mdi-comment-account-outline text-info"></i>
                                    </div>
                                    <p class="notify-details">Caleb Flakelar commented on Admin
                                        <small class="noti-time">1 min ago</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon text-success">
                                        <i class="mdi mdi-account-plus text-primary"></i>
                                    </div>
                                    <p class="notify-details">New user registered.
                                        <small class="noti-time">5 hours ago</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon text-danger">
                                        <i class="mdi mdi-heart text-danger"></i>
                                    </div>
                                    <p class="notify-details">Carlos Crouch liked 
                                        <small class="noti-time">3 days ago</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon text-warning">
                                        <i class="mdi mdi-comment-account-outline text-primary"></i>
                                    </div>
                                    <p class="notify-details">Caleb Flakelar commented on Admi
                                        <small class="noti-time">4 days ago</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon text-purple">
                                        <i class="mdi mdi-account-plus text-danger"></i>
                                    </div>
                                    <p class="notify-details">New user registered.
                                        <small class="noti-time">7 days ago</small>
                                    </p>
                                </a>

                                 <!-- item-->
                                 <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon text-danger">
                                        <i class="mdi mdi-heart text-danger"></i>
                                    </div>
                                    <p class="notify-details">Carlos Crouch liked <b>Admin</b>.
                                        <small class="noti-time">Carlos Crouch liked</small>
                                    </p>
                                </a>
                            </div>

                            <!-- All-->
                            <a href="javascript:void(0);" class="dropdown-item text-center notify-item notify-all">
                                    See all notifications
                            </a>

                        </div>
                    </li>

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{asset('backend\assets\images\users\avatar-1.jpg')}}" alt="user-image" class="rounded-circle">
                            <span class="pro-user-name ml-1">
                                {{Auth::User()->fullname}}
                                <i class="mdi mdi-chevron-down"></i>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="mdi mdi-account-outline"></i>
                                <span>Thông tin tài khoản</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="mdi mdi-settings-outline"></i>
                                <span>Cấu hình</span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <a href="{{url('logout')}}" class="dropdown-item notify-item">
                                <i class="mdi mdi-logout-variant"></i>
                                <span>Thoát</span>
                            </a>

                        </div>
                    </li>

                    <li class="dropdown notification-list">
                        <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect">
                            <i class="mdi mdi-settings-outline noti-icon"></i>
                        </a>
                    </li>


                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="{{url('admin/dashboard')}}" class="logo text-center logo-dark">
                        <span class="logo-lg">
                            <img src="{{asset('backend\assets\images\logo-dark.png')}}" alt="" height="18">
                            <!-- <span class="logo-lg-text-dark">Velonic</span> -->
                        </span>
                        <span class="logo-sm">
                            <!-- <span class="logo-lg-text-dark">V</span> -->
                            <img src="{{asset('backend\assets\images\logo-sm.png')}}" alt="" height="22">
                        </span>
                    </a>

                    <a href="{{url('admin/dashboard')}}" class="logo text-center logo-light">
                        <span class="logo-lg">
                            <img src="{{asset('backend\assets\images\logo-light.png')}}" alt="" height="18">
                            <!-- <span class="logo-lg-text-dark">Velonic</span> -->
                        </span>
                        <span class="logo-sm">
                            <!-- <span class="logo-lg-text-dark">V</span> -->
                            <img src="{{asset('backend\assets\images\logo-sm.png')}}" alt="" height="22">
                        </span>
                    </a>
                </div>

                <!-- LOGO -->
  

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </li>
        
                    <li class="d-none d-lg-block">
                        <form class="app-search">
                            <div class="app-search-box">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <div class="input-group-append">
                                        <button class="btn" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
            <!-- end Topbar --> <!-- ========== Left Sidebar Start ========== -->

        </div>

        <div class="left-side-menu">

            <div class="slimscroll-menu">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <ul class="metismenu" id="side-menu">

                        <li class="menu-title">Menu</li>

                        <li>
                            <a href="{{url('admin/dashboard')}}" class="waves-effect">
                                <i class="ion ion-md-home"></i>
                                <span>  Trang chủ  </span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="waves-effect">
                                <i class=" ion ion-ios-list font-20"></i>
                                <span> Sản phẩm </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">

                                <li><a href="{{url('admin/categories/list')}}">Hãng sản xuất</a></li>
                                <li><a href="{{url('admin/product/list')}}">Sản phẩm</a></li>
                                <li><a href="{{route('discount.list')}}">Khuyến mãi</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="waves-effect">
                                <i class="ion-md-cart font-20"></i>
                                <span> Đơn hàng </span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="waves-effect">
                                <i class="ion ion-ios-create font-20"></i>
                                <span> Bài viết </span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="waves-effect">
                                <i class="ion ion-md-stats font-20"></i>
                                <span>  Thống kê  </span>
                                <span class="badge badge-danger badge-pill float-right"> 4 </span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="forms-elements.html">Doanh thu</a></li>
                                <li><a href="forms-validation.html">Đơn hàng</a></li>
                                <li><a href="forms-advanced.html">Người dùng</a></li>
                                <li><a href="forms-wizard.html">Sản phẩm</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="waves-effect">
                                <i class="fas fa-comment font-20"></i>
                                <span> Đánh giá</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="waves-effect">
                                <i class="ion ion-md-person"></i>
                                <span> Người dùng </span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="waves-effect">
                                <i class="ion ion-ios-finger-print font-20"></i>
                                <span> Phân quyền </span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <div class="content">
                <!-- Start Content-->
                <div class="container-fluid">
                    <!-- start page title -->
                    <!-- end page title -->
                    @yield('content')
                    <!-- end container-fluid -->
                </div>
            </div>
            <!-- end content -->
            <!-- Footer Start -->
            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            2020 &copy; Cellphone by <a href="">Han Nguyen</a>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->
        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        
        <!-- Right Sidebar -->
        <div class="right-bar">
            <div class="rightbar-title">
                <a href="javascript:void(0);" class="right-bar-toggle float-right">
                    <i class="mdi mdi-close"></i>
                </a>
                <h4 class="font-17 m-0 text-white">Theme Customizer</h4>
            </div>
            <div class="slimscroll-menu">
        
                <div class="p-4">
                    <div class="alert alert-warning" role="alert">
                        <strong>Customize </strong> the overall color scheme, layout, etc.
                    </div>
                    <div class="mb-2">
                        <img src="{{asset('backend\assets\images\layouts\light.png')}}" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked="">
                        <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
                    </div>
            
                    <div class="mb-2">
                        <img src="{{asset('backend\assets\images\layouts\dark.png')}}" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsstyle="{{asset('backend\assets/css/bootstrap-dark.min.css')}}" data-appstyle="{{asset('backend\assets/css/app-dark.min.css')}}">
                        <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
                    </div>
                </div>
            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- clock -->
        <script>
            function currentTime() {
                var date = new Date(); /* creating object of Date class */
                var hour = date.getHours();
                var min = date.getMinutes();
                var sec = date.getSeconds();
                hour = updateTime(hour);
                min = updateTime(min);
                sec = updateTime(sec);
                document.getElementById("clock").innerText = hour + " : " + min + " : " + sec; /* adding time to the div */
                    var t = setTimeout(function(){ currentTime() }, 1000); /* setting timer */
            }

            function updateTime(k) {
                if (k < 10) {
                    return "0" + k;
                }
                else {
                    return k;
                }
            }
            currentTime();
        </script>

        @yield('js')

        <!-- Vendor js -->
        <script src="{{asset('backend\assets\js\vendor.min.js')}}"></script>

        <script src="{{asset('backend\assets\libs\moment\moment.min.js')}}"></script>
        <script src="{{asset('backend\assets\libs\jquery-scrollto\jquery.scrollTo.min.js')}}"></script>
        <script src="{{asset('backend\assets\libs\sweetalert2\sweetalert2.min.js')}}"></script>

        <!-- Sweet alert init js-->
        <script src="{{asset('backend\assets\js\pages\sweet-alerts.init.js')}}"></script>
        
        <!-- Chat app -->
        <script src="{{asset('backend\assets\js\pages\jquery.chat.js')}}"></script>

        <!-- Todo app -->
        <script src="{{asset('backend\assets\js\pages\jquery.todo.js')}}"></script>

        <!--Morris Chart-->
        <script src="{{asset('backend\assets\libs\morris-js\morris.min.js')}}"></script>
        <script src="{{asset('backend\assets\libs\raphael\raphael.min.js')}}"></script>

        <!-- Sparkline charts -->
        <script src="{{asset('backend\assets\libs\jquery-sparkline\jquery.sparkline.min.js')}}"></script>

        <!-- Dashboard init JS -->
        <script src="{{asset('backend\assets\js\pages\dashboard.init.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('backend\assets\js\app.min.js')}}"></script>


        <!-- Required datatable js -->
        <script src="{{asset('backend\assets\libs\datatables\jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('backend\assets\libs\datatables\dataTables.bootstrap4.min.js')}}"></script>
        <!-- Buttons examples -->
        <script src="{{asset('backend\assets\libs\datatables\dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('backend\assets\libs\datatables\buttons.bootstrap4.min.js')}}"></script>
        <script src="{{asset('backend\assets\libs\jszip\jszip.min.js')}}"></script>
        <script src="{{asset('backend\assets\libs\pdfmake\pdfmake.min.js')}}"></script>
        <script src="{{asset('backend\assets\libs\pdfmake\vfs_fonts.js')}}"></script>
        <script src="{{asset('backend\assets\libs\datatables\buttons.html5.min.js')}}"></script>
        <script src="{{asset('backend\assets\libs\datatables\buttons.print.min.js')}}"></script>

        <!-- Responsive examples -->
        <script src="{{asset('backend\assets\libs\datatables\dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('backend\assets\libs\datatables\responsive.bootstrap4.min.js')}}"></script>

        <script src="{{asset('backend\assets\libs\datatables\dataTables.keyTable.min.js')}}"></script>
        <script src="{{asset('backend\assets\libs\datatables\dataTables.select.min.js')}}"></script>

        <!-- Datatables init -->
        <script src="{{asset('backend\assets\js\pages\datatables.init.js')}}"></script>


        <!-- dropzone -->
        <script src="{{asset('backend\assets\libs\dropzone\dropzone.min.js')}}"></script>

        <!-- tag input -->
        <script src="{{asset('backend\assets\libs\bootstrap-tagsinput\bootstrap-tagsinput.min.js')}}"></script>
    </body>
</html>