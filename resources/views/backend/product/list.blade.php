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
                <h4 class="m-t-0 header-title mb-4"><b>Danh sách sản phẩm</b></h4>
                <div class="button-add">
                    <a href="{{url('admin/product/create')}}" class="btn btn-primary waves-effect waves-light ">Tạo mới</a>
                </div>
                <table id="datatable" class="table table-bordered table-stried" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Mã sản phẩm</th>
                            <th>Mã nhà sản xuất</th>
                            <th>Mã giảm giá</th>
                            <th>Tên sản phẩm</th></div>
                            <th>Thời gian tạo</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($product as $products)
                        <tr>
                            <td>{{$products->id}}</td>
                            <td>{{$products->categories_id}}</td>
                            <td>
                                @if(empty($product->discount_id))
                                    {{$products->discount_id}}  
                                @else 
                                    Không khuyến mãi
                                @endif
                            </td>
                            <td>{{$products->product_name}}</td>
                            <td>{{date_format($products->created_at,"d/m/Y H:i")}}</td>
                            <td>
                                <div style="width: 100px;">
                                    <a href="{{url('admin/product/edit',['id'=>$products->id])}}" class="btn btn-icon waves-effect waves-light btn-warning"><i class="fa fa-wrench"></i></a>
                                    <a href="" onclick="confirm('Bạn muốn sản phẩm này?');" class="btn btn-icon waves-effect waves-light btn-danger" style="margin-left: 5px;"><i class="fas fa-trash-alt"></i></a>
                                </div>
                                <button class="btn btn-info waves-effect width-md waves-light" style="margin-top: 5px;" data-toggle="modal" data-target="#detailProduct{{$products->id}}">Chi tiết</button>
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
@include('backend.product.modal.list')
@endsection

@section('js')

@endsection