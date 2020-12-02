@extends('backend.master')

@section('css')
<style type="text/css">
	.alert{
		margin-top: 5px;
	}
</style>
@endsection

@section('content')
<br></br>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">Trang chi tiết sản phẩm</h4>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        @if(Session::has('error'))
                            <div class="alert alert-danger" style="margin-top: 5px;">
                                {{Session::get('error')}}
                            </div>
                        @endif
                        <form action="{{route('discount.create')}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Tên khuyến mãi</label>
                                <div class="col-lg-10">
                                    <input type="text" name="discount_name" class="form-control" value="{{old('discount_name')}}">
                                    @if($errors->has('discount_name'))
                                        <div class="alert alert-danger">
                                            {{$errors->first('discount_name')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Loại khuyến mãi</label>
                                <div class="col-lg-10">
                                    <select class="form-control" name="discount_type">
                                        <option value="Trade discount">
                                            Khấu trừ trực tiếp
                                        </option>
                                        @if($errors->has('rom'))
                                            <div class="alert alert-danger">
                                                {{$errors->first('rom')}}
                                            </div>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Giá trị khuyến mãi</label>
                                <div class="col-lg-10">
                                    <input type="number" name="discount_value" class="form-control" value="{{old('discount_value')}}">
                                    @if($errors->has('discount_value'))
                                        <div class="alert alert-danger">
                                            {{$errors->first('discount_value')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Thời gian kết thúc</label>
                                <div class="col-lg-10">
                                    <input type="date" name="discount_end" class="form-control" value="{{old('discount_end')}}">
                                    @if($errors->has('discount_end'))
                                        <div class="alert alert-danger">
                                            {{$errors->first('discount_end')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-2"><input type="submit" class="btn btn-primary waves-effect width-md waves-light" value="Tạo mới"></div>
                                <div class="col-lg-2"><a href="{{route('discount.list')}}" class="btn btn-warning waves-effect width-md waves-light" style="margin-left: 25px;">Quay lại</a></div>
                                <div class="col-lg-2"></div>
                            </div>
                        </form>
                    </div>
                    <div class="col-2"></div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->
@endsection

@section('js')
@endsection