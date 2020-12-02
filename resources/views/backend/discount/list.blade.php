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
                <h4 class="m-t-0 header-title mb-4"><b>Danh sách chi tiết sản phẩm</b></h4>
                <div class="button-add">
                    <a href="{{route('discount.store')}}" class="btn btn-primary waves-effect waves-light ">Tạo mới</a>
                </div>
                <table id="datatable" class="table table-bordered table-stried" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Mã khuyến mãi</th>
                            <th>Tên khuyến mãi</th>
                            <th>Loại khuyến mãi</th>
                            <th>Giá trị</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thúc</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($discount as $discounts)
                        <tr>
                            <td>{{$discounts->id}}</td>
                            <td>{{$discounts->discount_name}}</td>
                            <td>{{$discounts->discount_type}}</td>
                            <td>{{number_format($discounts->discount_value,0, ".", ".")}}đ</td>
                            <td>
                                {{date_format(new DateTime($discounts->created_at),"d/m/Y H:i")}}
                            </td>
                            <td>
                                {{date_format(new DateTime($discounts->discount_end),"d/m/Y H:i")}}
                            </td>
                            <td>
                                <div style="width: 100px;">
                                    <a href="{{route('discount.edit',['id'=>$discounts->id])}}" class="btn btn-icon waves-effect waves-light btn-warning"><i class="fa fa-wrench"></i></a>
                                    <a href="{{route('discount.delete',['id'=>$discounts->id])}}" onclick="confirm('Bạn muốn khuyến mãi này?');" class="btn btn-icon waves-effect waves-light btn-danger" style="margin-left: 5px;"><i class="fas fa-trash-alt"></i></a>
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

@endsection