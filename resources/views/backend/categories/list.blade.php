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
                <h4 class="m-t-0 header-title mb-4"><b>Danh sách loại sản phẩm</b></h4>
                <div class="button-add">
                    <a href="{{url('admin/categories/create')}}" class="btn btn-primary waves-effect waves-light ">Tạo mới</a>
                </div>
                <table id="datatable" class="table table-bordered table-stried" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Hãng sản xuất</th>
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
                            <td><img src="{{ asset('backend/categories_img/'.$categories->categories_image) }}" width="112" height="28"></td>
                            <td><div style="max-height: 150px;overflow: auto;">{{$categories->categories_desc}}</div></td>
                            <td>{{date_format($categories->created_at,"d/m/Y H:i")}}</td>
                            <td><div style="width: 100px;"><a href="{{url('admin/categories/update',['id'=>$categories->id])}}" class="btn btn-icon waves-effect waves-light btn-warning"><i class="fa fa-wrench"></i></a>
                            <a href="{{route('categories.delete',['id'=>$categories->id])}}" onclick="confirm('Bạn muốn xóa hãng sản phẩm này?');" class="btn btn-icon waves-effect waves-light btn-danger" style="margin-left: 5px;"><i class="fas fa-trash-alt"></i></a></div></td>
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