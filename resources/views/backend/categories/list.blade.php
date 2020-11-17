@extends('backend.master')

@section('css')
<style type="text/css">
    .button-add{
        margin-left: 91%;
        margin-bottom: 5px;
    }
</style>
@endsection

@section('content')
<br></br>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">
                <h4 class="m-t-0 header-title mb-4"><b>Danh sách loại sản phẩm</b></h4>
                <div class="button-add">
                    <a href="{{url('admin/categories/create')}}" class="btn btn-primary waves-effect waves-light ">Tạo mới</a>
                </div>
                <table id="datatable" class="table table-bordered table-stried" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Tên loại sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Mô tả</th></div>
                            <th>Thời gian tạo</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $categories)
                        <tr>
                            <td>{{$categories->categories_name}}</td>
                            <td><img src="{{ asset('/storage/app/categories/'.$categories->categories_image) }}" width="100" height="100"></td>
                            <td><div style="max-height: 150px;overflow: auto;">{{$categories->categories_desc}}</div></td>
                            <td>{{date_format($categories->created_at,"d/m/Y H:i")}}</td>
                            <td><div style="width: 100px;"><a href="{{url('admin/categories/create')}}" class="btn btn-icon waves-effect waves-light btn-warning"><i class="fa fa-wrench"></i></a>
                            <a href="{{url('admin/categories/create')}}" class="btn btn-icon waves-effect waves-light btn-danger" style="margin-left: 5px;"><i class="fas fa-trash-alt"></i></a></div></td>
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