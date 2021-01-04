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
                <h4 class="header-title mb-4">Trang tạo bài viết</h4>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        @if(Session::has('error'))
                            <div class="alert alert-danger" style="margin-top: 5px;">
                                {{Session::get('error')}}
                            </div>
                        @endif
                        <form action="{{route('post.create')}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Tiêu đề</label>
                                <div class="col-lg-10">
                                    <input type="text" name="title" class="form-control" value="{{old('title')}}">
                                    @if($errors->has('title'))
                                        <div class="alert alert-danger">
                                            {{$errors->first('title')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label" for="example-textarea">Nội dung bài viết</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" name="content" id="ckeditor" placeholder="Nhập mô tả">{{old('content')}}</textarea>
                                    @if($errors->has('content'))
                                        <div class="alert alert-danger">
                                            {{$errors->first('content')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label" for="example-fileinput">Hình ảnh</label>
                                <div class="col-lg-6">
                                    <input type="file" name="image" class="form-control" id="example-fileinput" onchange="loadFile(event)">
                                    @if($errors->has('image')||Session::has('error_image'))
                                        <div class="alert alert-danger" style="margin-top: 5px;">
                                            {{$errors->first('image')}}
                                            {{Session::get('error_image')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-lg-4">
                                    <img id="output" style="margin: auto; display: none;" src="" alt="" height=150 width=200>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-2"><input type="submit" class="btn btn-primary waves-effect width-md waves-light" value="Tạo mới"></div>
                                <div class="col-lg-2"><a href="{{route('post.list')}}" class="btn btn-warning waves-effect width-md waves-light" style="margin-left: 25px;">Quay lại</a></div>
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
<script src="{{asset('ckeditor\ckeditor.js') }}"></script>
<script src="{{asset('ckfinder\ckfinder.js') }}"></script>
<script src="{{asset('js\jquery.min.js')}}"></script>
<script type="text/javascript">
    var options = {
            filebrowserImageBrowseUrl: '../../ckfinder/ckfinder.html?type=Images',
            filebrowserFlashBrowseUrl: '../../ckfinder/ckfinder.html?type=Flash',
            filebrowserImageUploadUrl: '../../ckfinder/core/connector/connector.php?command=QuickUpload&type=Images',
            //filebrowserBrowseUrl: '../../..laravel-filemanager?type=Files',
            filebrowserFlashUploadUrl: '../../public/ckfinder/core/connector/connector.php?command=QuickUpload&type=Images',
        };
    CKEDITOR.replace('ckeditor', options);
    CKFider.start();
</script>
<script type="text/javascript">
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.style = "border:1px solid #ccc!important;display:block;";
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>
@endsection