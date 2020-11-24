@extends('backend.master')

@section('css')

@endsection

@section('content')
<br></br>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">Trang cập nhật nhà sản xuất</h4>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        @if(Session::has('error'))
                            <div class="alert alert-danger" style="margin-top: 5px;">
                                {{Session::get('error')}}
                            </div>
                        @endif
                        @if(isset($categories))
                            <form action="{{route('categories.update',['id'=>$categories->id])}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Tên nhà sản xuất</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="categories_name" class="form-control" value="{{$categories->categories_name}}">
                                        @if($errors->has('categories_name'))
                                            <div class="alert alert-danger" style="margin-top: 5px;">
                                                {{$errors->first('categories_name')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="example-textarea">Mô tả</label>
                                    <div class="col-lg-10">
                                        <textarea class="form-control" name="categories_desc" rows="5" id="example-textarea" >{{$categories->categories_desc}}</textarea>
                                        @if($errors->has('categories_desc'))
                                            <div class="alert alert-danger" style="margin-top: 5px;">
                                                {{$errors->first('categories_desc')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="example-fileinput">Hình ảnh</label>
                                    <div class="col-lg-6">
                                        <input type="file" name="categories_img" class="form-control" id="example-fileinput" value="" onchange="loadFile(event)">
                                        @if($errors->has('categories_img')||Session::has('error_image'))
                                            <div class="alert alert-danger" style="margin-top: 5px;">
                                                {{$errors->first('categories_img')}}
                                                {{Session::get('error_image')}}
                                            </div>
                                        @endif
                                    </div>
                                    <div id="overlay"></div>
                                    <div class="col-lg-4">
                                        <img id="output" style="border:1px solid #ccc!important; margin:auto;" src="{{asset('backend/categories_img/'.$categories->categories_image)}}" alt="" height=150 width=200>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-2"><button class="btn btn-primary waves-effect width-md waves-light" style="margin-right: 5px;">Cập nhật</button></div>
                                    <div class="col-lg-2"><a href="{{url('admin/categories/list')}}" class="btn btn-warning waves-effect width-md waves-light">Quay lại</a></div>
                                    <div class="col-lg-2"></div>
                                </div>
                            </form>
                        @endif
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
<script type="text/javascript">
var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    // output.style = "border:1px solid #ccc!important;display:block;";
    output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
    }
};
</script>
@endsection