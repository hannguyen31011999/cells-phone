@extends('backend.master')

@section('css')
<style type="text/css">
    h3{
        font-size: 14px !important;
    }
</style>
@endsection

@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Xin chào!</h4>
            <div class="page-title-right">
                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="#">Cellphone</a></li>
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                </ol>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-xl-3 col-sm-6">
        <div class="card bg-pink">
            <div class="card-body widget-style-2">
                <div class="text-white media">
                    <div class="media-body align-self-center">
                        <h2 class="my-0 text-white"><span data-plugin="counterup">{{$countUser}}</span></h2>
                        <p class="mb-0">Người dùng</p>
                    </div>
                    <a href="" style="color:white;"><i class="ion-md-person"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6">
        <div class="card bg-purple">
            <div class="card-body widget-style-2">
                <div class="text-white media">
                    <div class="media-body align-self-center">
                        <h2 class="my-0 text-white"><span data-plugin="counterup">{{$countPost}}</span></h2>
                        <p class="mb-0">Bài viết</p>
                    </div>
                    <a href="{{route('post.list')}}" style="color:white;"><i class="ion-ios-create"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6">
        <div class="card bg-info">
            <div class="card-body widget-style-2">
                <div class="text-white media">
                    <div class="media-body align-self-center">
                        <h2 class="my-0 text-white"><span data-plugin="counterup">{{$countOrder}}</span></h2>
                        <p class="mb-0">Đơn hàng</p>
                    </div>
                    <a href="{{route('order.list')}}" style="color:white;"><i class="ion-md-cart"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6">
        <div class="card bg-primary">
            <div class="card-body widget-style-2">
                <div class="text-white media">
                    <div class="media-body align-self-center">
                        <h2 class="my-0 text-white"><span data-plugin="counterup">{{$countReview}}</span></h2>
                        <p class="mb-0">Bình luận</p>
                    </div>
                    <a href="{{route('review.list')}}" style="color:white;"><i class="mdi mdi-comment-multiple"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="card-box" style="background: white">
            <div class="row">
                <div class="col-6">
                    <div class="avatar-md bg-info rounded-circle">
                        <i class="ion-logo-usd avatar-title font-26 text-white"></i>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <h3 class="my-0 font-weight-bold">{{number_format($revenue->total,0,'.','.')}}<sup>đ</sup></h3>
                        <p class="mb-0 mt-1 text-truncate">Doanh thu tháng</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end card-box-->
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card-box" style="background: white">
            <div class="row">
                <div class="col-6">
                    <div class="avatar-md bg-warning rounded-circle">
                        <a href="{{url('/admin/order/list?type=false')}}">
                            <i class="ion-md-cart avatar-title font-26 text-white"></i>
                        </a>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <h3 class="my-0 font-weight-bold"><span data-plugin="counterup">{{$countNewOrder}}</span></h3>
                        <p class="mb-0 mt-1 text-truncate">Đơn hàng mới</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end card-box-->
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card-box" style="background: white">
            <div class="row">
                <div class="col-6">
                    <div class="avatar-md bg-success rounded-circle">
                        <a href="">
                            <i class="ion-md-contacts avatar-title font-26 text-white"></i>
                        </a>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <h3 class="my-0 font-weight-bold"><span data-plugin="counterup">{{$countNewUser}}</span></h3>
                        <p class="mb-0 mt-1 text-truncate">Người dùng mới</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end card-box-->
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card-box" style="background: white">
            <div class="row">
                <div class="col-6">
                    <div class="avatar-md bg-primary rounded-circle">
                        <a href="">
                            <i class="ion-md-eye avatar-title font-26 text-white"></i>
                        </a>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <h3 class="my-0 font-weight-bold"><span data-plugin="counterup">{{$visitor}}</span></h3>
                        <p class="mb-0 mt-1 text-truncate">Lượt xem</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end card-box-->
    </div>
    
</div>

@endsection

@section('js')
<script src="{{asset('frontend\js\vendor\jquery-3.2.1.min.js')}}"></script>
<script type="text/javascript">
    $( document ).ready(function() {
        setInterval(function(){
            window.location.href = "http://localhost:8000/admin/dashboard";
        },1000*300);
    });
</script>
@endsection