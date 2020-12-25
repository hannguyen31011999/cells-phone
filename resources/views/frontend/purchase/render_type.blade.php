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

    .button-add{
        margin-left: 78%;
    }
    .nice-select{
        margin-bottom: 10px;
    }
    .content-panel{
        min-height: 440px !important;
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
                            <li class="active"><a href="#"><span class="fa fa-shopping-cart"></span> Đơn mua</a></li>
                            <li><a href="#"><span class="fa fa-envelope"></span> Thông báo</a></li>
                            <li ><a href="{{url('account/change-password')}}"><span class="fa fa-key"></span> Thay đổi mật khẩu</a></li>
                            <li><a href="{{route('logout')}}"><span class="fa fa-sign-out"></span> Đăng xuất</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="content-panel">
                    <h2 class="title">Lịch Sử Mua Hàng</h2>
                    <div class="card">
                        <div class="card-body table-responsive">
                            <div class="button-add">
                                <select class="form-control" onchange="changePurchase()" id="changePurchase">
                                    <option value="?type=1">Tất cả</option>
                                    <option value="?type=2">Chưa xác nhận</option>
                                    <option value="?type=3">Đang giao</option>
                                    <option value="?type=4">Hoàn thành</option>
                                    <option value="?type=5">Đã hủy</option>
                                </select>
                            </div>
                            <table id="datatable" class="table table-bordered table-stried" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Mã đơn hàng</th>
                                        <th>Phương thức thanh toán</th>
                                        <th>Phí ship</th>
                                        <th>Tổng đơn hàng</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($order as $orders)
                                    <tr>
                                        <td>{{$orders->id}}</td>
                                        <td>
                                            @if($orders->payment==0)
                                                Ship COD
                                            @else
                                                Thanh toán trực tuyến
                                            @endif
                                        </td>
                                        <td>{{number_format($orders->price_ship,0,".",".")}}<sup>đ</sup></td>
                                        <td>{{number_format($orders->total_price,0,".",".")}}<sup>đ</sup></td>
                                        <td>
                                            @if($orders->status==0)
                                                <div class="status">
                                                    Chưa xác nhận
                                                </div>
                                            @elseif($orders->status==1)
                                                <div class="status">
                                                    Đang giao
                                                </div>
                                            @elseif($orders->status==2)
                                                <div class="status">
                                                    Hoàn thành
                                                </div>
                                            @else
                                                <div class="status">
                                                    Đã hủy
                                                </div>
                                            @endif
                                        </td>
                                        <td style="text-align: center;">
                                            <a href="" class="detail-purchase" title="Chi tiết đơn hàng" data-id="{{$orders->id}}"><i class="fa fa-wrench"></i></a><br>
                                            @if($orders->status==0)
                                                <hr><a href="{{route('viewPurchase',['delete'=>$orders->id])}}" onclick="confirm('Bạn chắc chắn xóa đơn hàng này?')" title="Hủy đơn hàng"><i class="fa fa-trash"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </section>
    </div>
</div>
<div id="render-modal"></div>
@endsection

@section('js')

<script src="{{asset('js\jquery.min.js')}}"></script>
<script src="{{asset('frontend/ajax/cart.js')}}"></script>
<script type="text/javascript">
function changePurchase()
{
    let choose = $('#changePurchase').val();
    window.location = choose;
}
$(document).on('click', '.detail-purchase', function(e){
    var id = $(this).attr('data-id');
    $.ajax({
        type: 'get',
        url: '/account/purchase',
        data: {
          "id":id
        },
        success: function(response) {
            $('#render-modal').empty().html(response);
            $('#myModal').modal('show');
        },
        error: function (response) {
            alert('Đã xảy ra lỗi! xin thử lại');
        }
    });
    e.preventDefault();
});
</script>
@endsection
