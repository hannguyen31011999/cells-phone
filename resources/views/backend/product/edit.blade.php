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
                <h4 class="header-title mb-4">Trang cập nhật sản phẩm</h4>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        @if(Session::has('error'))
                            <div class="alert alert-danger" style="margin-top: 5px;">
                                {{Session::get('error')}}
                            </div>
                        @endif
                        @if(isset($product))
                            <form action="{{route('product.update',['id'=>$product->id])}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Nhà sản xuất</label>
                                    <div class="col-lg-10">
                                        <select class="form-control" name="categories_id">
                                        @foreach($categories as $categories)
                                            @if($product->categories_id==$categories->id)
                                                <option value="{{$categories->id}}" selected>
                                                    {{$categories->categories_name}}
                                                </option>
                                            @else
                                                <option value="{{$categories->id}}">
                                                    {{$categories->categories_name}}
                                                </option>
                                            @endif
                                        @endforeach
                                        </select>
                                        @if($errors->has('categories_id'))
                                        	<div class="alert alert-danger">
                                        		{{$errors->first('categories_id')}}
                                        	</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Khuyến mãi</label>
                                    <div class="col-lg-10">
                                        <select class="form-control" name="discount_id">
                                        @foreach($discount as $discount)
                                            @if($discount->id==$product->discount_id)
                                                <option value="{{$discount->id}}" selected>
                                                    {{$discount->discount_name}}
                                                </option>
                                            @else
                                                <option value="{{$discount->id}}">
                                                    {{$discount->discount_name}}
                                                </option>
                                            @endif
                                        @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Tên sản phẩm</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="product_name" class="form-control" value="{{$product->product_name}}">
                                        @if($errors->has('product_name'))
                                        	<div class="alert alert-danger">
                                        		{{$errors->first('product_name')}}
                                        	</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="example-textarea">Mô tả</label>
                                    <div class="col-lg-10">
                                        <textarea class="form-control" name="desc" id="ckeditor">{{$product->desc}}</textarea>
                                        @if($errors->has('desc'))
                                        	<div class="alert alert-danger">
                                        		{{$errors->first('desc')}}
                                        	</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Màn hình</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="screen" class="form-control" value="{{$product->screen}}">
                                        @if($errors->has('screen'))
                                        	<div class="alert alert-danger">
                                        		{{$errors->first('screen')}}
                                        	</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Độ phân giải</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="screen_resolution" class="form-control" value="{{$product->screen_resolution}}">
                                        @if($errors->has('screen_resolution'))
                                        	<div class="alert alert-danger">
                                        		{{$errors->first('screen_resolution')}}
                                        	</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Hệ điều hành</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="operating_system" class="form-control" value="{{$product->operating_system}}">
                                        @if($errors->has('operating_system'))
                                        	<div class="alert alert-danger">
                                        		{{$errors->first('operating_system')}}
                                        	</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Chip xử lý</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="cpu" class="form-control" value="{{$product->cpu}}">
                                        @if($errors->has('cpu'))
                                        	<div class="alert alert-danger">
                                        		{{$errors->first('cpu')}}
                                        	</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Chip đồ họa</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="gpu" class="form-control" value="{{$product->gpu}}">
                                        @if($errors->has('gpu'))
                                        	<div class="alert alert-danger">
                                        		{{$errors->first('gpu')}}
                                        	</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Ram</label>
                                    <div class="col-lg-10">
                                        <input type="number" name="ram" class="form-control" value="{{$product->ram}}">
                                        @if($errors->has('ram'))
                                        	<div class="alert alert-danger">
                                        		{{$errors->first('ram')}}
                                        	</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Camera trước</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="camera_fr" class="form-control" value="{{$product->camera_fr}}">
                                        @if($errors->has('camera_fr'))
                                        	<div class="alert alert-danger">
                                        		{{$errors->first('camera_fr')}}
                                        	</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Camera sau</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="camera_ba" class="form-control" value="{{$product->camera_ba}}">
                                        @if($errors->has('camera_ba'))
                                        	<div class="alert alert-danger">
                                        		{{$errors->first('camera_ba')}}
                                        	</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Video</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="video" class="form-control" value="{{$product->video}}">
                                        @if($errors->has('video'))
                                        	<div class="alert alert-danger">
                                        		{{$errors->first('video')}}
                                        	</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Dung lượng pin</label>
                                    <div class="col-lg-10">
                                        <input type="number" name="pin" class="form-control" value="{{$product->pin}}">
                                        @if($errors->has('pin'))
                                        	<div class="alert alert-danger">
                                        		{{$errors->first('pin')}}
                                        	</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Hình ảnh</label>
                                    <div class="col-lg-10">
                                        <input type="file" class="form-control" id="example-fileinput" name="image[]" multiple>
                                        @if(Session::has('image_error'))
                                            <div class="alert alert-danger" style="margin-top: 5px;">
                                                {{Session::get('image_error')}}
                                            </div>
                                        @elseif($errors->has('image'))
                                            <div class="alert alert-danger" style="margin-top: 5px;">
                                                {{$errors->first('image')}}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="card" style="margin-top: 5px;">
                                            <div class="card-body">
                                                <div id="preview">
                                                @foreach($listImage as $listImages)
                                                    <img src="{{asset('backend/product_img/'.$listImages->image)}}" alt="" height="150" width="150" id="img" style="border:1px solid #ccc!important;margin-bottom:5px;">
                                                @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-2"><button class="btn btn-primary waves-effect width-md waves-light" style="">Cập nhật</button></div>
                                    <div class="col-lg-2"><a href="{{url('admin/product/list')}}" class="btn btn-warning waves-effect width-md waves-light" style="margin-left: 25px;">Quay lại</a></div>
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
@include('ckfinder::setup')
<!-- ckeditor -->
<script src="{{asset('ckeditor\ckeditor.js') }}"></script>
<script src="{{asset('ckfinder\ckfinder.js') }}"></script>
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
    function previewImages() {
      var preview = document.querySelector('#preview');
      if (this.files) {
        [].forEach.call(this.files, readAndPreview);
      }
      function readAndPreview(file) {

        var reader = new FileReader();
        
        reader.addEventListener("load", function() {
            var image = new Image();
            image.height = 150;
            image.width = 150;
            image.style = "margin-left:5px;border:1px solid #ccc!important;margin-bottom:5px;";
            image.title  = file.name;
            image.src    = this.result;
            image.setAttribute('id','img');
            $('.card').css('display','block');
            preview.appendChild(image);
        });
        reader.readAsDataURL(file);
        $('#img').remove();
      }
    }
    document.querySelector('#example-fileinput').addEventListener("change", previewImages);
</script>
@endsection