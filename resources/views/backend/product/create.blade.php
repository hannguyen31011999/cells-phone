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
                <h4 class="header-title mb-4">Trang sản phẩm</h4>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        @if(Session::has('error'))
                            <div class="alert alert-danger" style="margin-top: 5px;">
                                {{Session::get('error')}}
                            </div>
                        @endif
                        <form action="{{route('product.create')}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Nhà sản xuất</label>
                                <div class="col-lg-10">
                                    <select class="form-control" name="categories_id">
                                    @foreach($categories as $categories)
                                    	<option value="{{$categories->id}}">{{$categories->categories_name}}</option>
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
                                    <option value="0">Chọn khuyến mãi</option>
                                    @foreach($discount as $discount)
                                    	<option value="{{$discount->id}}">{{$discount->discount_name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Tên sản phẩm</label>
                                <div class="col-lg-10">
                                    <input type="text" name="product_name" class="form-control" value="{{old('product_name')}}" placeholder="Nhập tên sản phẩm">
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
                                    <textarea class="form-control" name="desc" id="ckeditor" placeholder="Nhập mô tả">{{old('desc')}}</textarea>
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
                                    <input type="text" name="screen" class="form-control" value="{{old('screen')}}" placeholder="Nhập kích thước màn hình">
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
                                    <input type="text" name="screen_resolution" class="form-control" value="{{old('screen_resolution')}}" placeholder="Nhập độ phân giải màn hình">
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
                                    <input type="text" name="operating_system" class="form-control" value="{{old('operating_system')}}" placeholder="Nhập hệ điều hành">
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
                                    <input type="text" name="cpu" class="form-control" value="{{old('cpu')}}" placeholder="Nhập cpu">
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
                                    <input type="text" name="gpu" class="form-control" value="{{old('gpu')}}" placeholder="Nhập gpu">
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
                                    <input type="number" name="ram" class="form-control" value="{{old('ram')}}" placeholder="Nhập dung lượng ram">
                                    @if($errors->has('ram'))
                                    	<div class="alert alert-danger">
                                    		{{$errors->first('ram')}}
                                    	</div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Bộ nhớ trong</label>
                                <div class="col-lg-10">
                                    <select class="form-control" name="rom">
                                        <option value="32">
                                            32GB
                                        </option>
                                        <option value="64">
                                            64GB
                                        </option>
                                        <option value="128">
                                            128GB
                                        </option>
                                        <option value="256">
                                            256GB
                                        </option>
                                        <option value="512">
                                            512GB
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Camera trước</label>
                                <div class="col-lg-10">
                                    <input type="text" name="camera_fr" class="form-control" value="{{old('camera_fr')}}" placeholder="Nhập camera trước">
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
                                    <input type="text" name="camera_ba" class="form-control" value="{{old('camera_ba')}}" placeholder="Nhập camera sau">
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
                                    <input type="text" name="video" class="form-control" value="{{old('video')}}" placeholder="Nhập thông số quay video">
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
                                    <input type="number" name="pin" class="form-control" value="{{old('pin')}}" placeholder="Nhập dung lượng pin">
                                    @if($errors->has('pin'))
                                    	<div class="alert alert-danger">
                                    		{{$errors->first('pin')}}
                                    	</div>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Giá tiền</label>
                                <div class="col-lg-10">
                                    <input type="number" name="price_product" class="form-control" value="{{old('price_product')}}" placeholder="Nhập giá tiền">
                                    @if($errors->has('price_product'))
                                        <div class="alert alert-danger">
                                            {{$errors->first('price_product')}}
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
                                    @endif
                                </div>
                                <div class="col-lg-12">
                                    <div class="card" style="margin-top: 5px;display: none;">
                                        <div class="card-body">
                                            <div id="preview">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-2"><input type="submit" class="btn btn-primary waves-effect width-md waves-light" value="Tạo mới"></div>
                                <div class="col-lg-2"><a href="{{url('admin/product/list')}}" class="btn btn-warning waves-effect width-md waves-light" style="margin-left: 25px;">Quay lại</a></div>
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
@include('ckfinder::setup')
<!-- ckeditor -->
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
    function previewImages() {

      var preview = document.querySelector('#preview');

      var card = document.getElementById('card');
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
            $('.card').css('display','block');
            preview.appendChild(image);
        });
        reader.readAsDataURL(file);
      }
    }
    document.querySelector('#example-fileinput').addEventListener("change", previewImages);
</script>
@endsection