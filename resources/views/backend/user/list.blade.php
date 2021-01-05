@extends('backend.master')

@section('css')
<style type="text/css">
    .button-add{
        margin-left: 91%;
        margin-bottom: 5px;
    }

    .tag-li-product{
        background: #D3D3D3;
        color: red;
        list-style-type: none;
    }
    .title_product{
        margin-left: 10px;
        font-size: 17px;
    }
</style>
@endsection
@section('content')
<br></br>
<div class="row">
    <div class="col-12">
        @if(Session::has('success'))
            <div class="alert alert-icon alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <i class="mdi mdi-check-all mr-2"></i>
                <strong>{{Session::get('success')}}</strong>
            </div>
        @endif
        <div class="card">
            <div class="card-body table-responsive">
                <h4 class="m-t-0 header-title mb-4"><b>Danh sách tài khoản</b></h4>
                <div class="button-add">
                </div>
                <table id="datatable" class="table table-bordered table-stried" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Mã khách hàng</th>
                            <th>Email</th>
                            <th>Tên khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Điểm tích lũy</th>
                            <th>Ngày tạo</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($user as $value)
                        <tr>
                            <td>{{$value->id}}</td>
                            <td>{{$value->email}}</td>
                            <td>{{$value->fullname}}</td>
                            <td>{{$value->phone}}</td>
                            <td>{{$value->address}}</td>
                            <td>
                                {{$value->point}}
                            </td>
                            <td>{{date_format(new DateTime($value->created_at),'d-m-Y H:i')}}</td>
                            <td>
                                <div id="render-icon{{$value->id}}" style="width: 100px;">
                                <a href="{{route('user.list',['id'=>$value->id])}}" onclick="confirm('Bạn muốn khuyến mãi này?');" class="btn btn-icon waves-effect waves-light btn-danger" style="margin-left: 5px;" title="Xóa tài khoản"><i class="fas fa-trash-alt"></i></a>
                                @if($value->status==1)
                                    <a href="#{{$value->id}}" id="review{{$value->id}}" data-status="0" onclick="confirmStatus(<?php echo $value->id; ?>)" class="btn btn-icon waves-effect waves-light btn-warning" title="Khóa tài khoản"><i class="ion ion-md-close-circle" style="font-weight: 900;"></i></a>
                                @else
                                    <a href="#{{$value->id}}" id="review{{$value->id}}" data-status="1" onclick="confirmStatus(<?php echo $value->id; ?>)" class="btn btn-icon waves-effect waves-light btn-success" title="Mở khóa tài khoản"><i class="ion ion-md-checkmark-circle" style="font-weight: 900;"></i></a>
                                @endif
                                    
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
@endsection

@section('js')
<script src="{{asset('js\jquery.min.js')}}"></script>
<script type="text/javascript">
    function confirmStatus(id)
    {
        var status = document.getElementById('review'+id).getAttribute("data-status");
        $.ajax({
            type: 'get',
            url: '/admin/user/list',
            data: {
              "id":id,
              "status":status
            },
            success: function(response) {
                if(response=="true"){
                    if(status==="0"){
                        $('#review'+id).remove();
                        $('#render-icon'+id).append('<a href="#'+id+'" id="review'+id+'" data-status="1" onclick="confirmStatus('+id+')" class="btn btn-icon waves-effect waves-light btn-warning" title="Ẩn bình luận"><i class="ion ion-md-close-circle" style="font-weight: 900;"></i></a>');
                    }else{
                        $('#review'+id).remove();
                        $('#render-icon'+id).append('<a href="#'+id+'" id="review'+id+'" data-status="0" onclick="confirmStatus('+id+')" class="btn btn-icon waves-effect waves-light btn-success" title="Bật bình luận"><i class="ion ion-md-checkmark-circle" style="font-weight: 900;"></i></a>');
                    }
                }else{
                    alert('Xảy ra lỗi!xin thử lại');
                }
            },
            error: function (response) {
                alert('Xảy ra lỗi!xin thử lại');
            }
        });
    }
</script>
@endsection