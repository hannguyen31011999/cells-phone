@extends('backend.master')

@section('css')
<style type="text/css">
    .button-add{
        margin-left: 87%;
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
                @if(isset($id))
                    <a href="{{route('product_detail.create',['id'=>$id])}}" class="btn btn-primary waves-effect waves-light ">+</a>
                @endif
                    <a href="{{route('product.list')}}" class="btn btn-danger waves-effect waves-light ">Quay lại</a>
                </div>
                <table id="datatable" class="table table-bordered table-stried" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Mã sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Bộ nhớ trong</th>
                            <th>Giá tiền</th>
                            <th>Thời gian tạo</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($productDetail as $productDetail)
                        <tr>
                            @if(isset($product))
                            <td>{{$product->id}}</td>
                            <td>{{$product->product_name}}</td>
                            @endif
                            <td>{{$productDetail->rom}}GB</td>
                            <td>{{number_format($productDetail->price_product, 0, ".", ".")}}đ</td>
                            <td>{{date_format($productDetail->created_at,"d/m/Y H:i")}}</td>
                            <td>
                                <div style="width: 100px;">
                                    <a href="{{route('product_detail.edit',['id'=>$productDetail->product_id,'idDetail'=>$productDetail->id])}}" class="btn btn-icon waves-effect waves-light btn-warning"><i class="fa fa-wrench"></i></a>
                                    <a href="{{route('product_detail.delete',['id'=>$productDetail->product_id,'idDetail'=>$productDetail->id])}})}}" onclick="confirm('Bạn muốn sản phẩm này?');" class="btn btn-icon waves-effect waves-light btn-danger" style="margin-left: 5px;"><i class="fas fa-trash-alt"></i></a>
                                    <a href="{{route('attribute_product.list',['id'=>$productDetail->id])}}" class="btn btn-primary waves-effect waves-light" style="margin-top: 5px;color: white;width:98px;">Chi tiết</a>
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