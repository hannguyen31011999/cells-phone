@extends('backend.master')

@section('css')
<style type="text/css">
	.alert{
		margin-top: 5px;
	}
    #overlay{
      position: fixed;
      top:25%;
      left:35%;
      bottom: 25%;
      right: 25%;
      width:50%;
      height:50%;
      background: rgba(0,0,0,0.8) none 50% / contain no-repeat;
      cursor: pointer;
      transition: 0.3s;
      
      visibility: hidden;
      opacity: 0;
    }
    #overlay.open {
      visibility: visible;
      opacity: 1;
    }

    #overlay:after { /* X button icon */
      content: "\2715";
      position: absolute;
      color:#fff;
      top: 10px;
      right:20px;
      font-size: 2em;
    }
</style>
@endsection

@section('content')
<br></br>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">Trang tạo mới attribute sản phẩm</h4>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        @if(Session::has('error'))
                            <div class="alert alert-danger" style="margin-top: 5px;">
                                {{Session::get('error')}}
                            </div>
                        @endif
                        @if(isset($productDetail))
                        <form action="{{route('attribute_product.create',['id'=>$productDetail->id])}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            @foreach($product as $products)
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Tên sản phẩm</label>
                                <div class="col-lg-10">
                                    <input type="text" name="product_name" class="form-control" value="{{$products->product_name}}" disabled>
                                </div>
                            </div>
                            @endforeach
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Bộ nhớ trong</label>
                                <div class="col-lg-10">
                                    <select class="form-control" name="rom" disabled>
                                        <option value="{{$productDetail->rom}}">
                                            {{$productDetail->rom}}GB
                                        </option>
                                    </select>
                                    @if($errors->has('rom'))
                                    <div class="alert alert-danger">
                                        {{$errors->first('rom')}}
                                    </div>
                                @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Màu sắc</label>
                                <div class="col-lg-10">
                                    <div class="tags-default">
                                        <input type="text" value="{{old('color')}}" data-role="tagsinput" name="color" placeholder="Thêm màu mới">
                                    </div>
                                    @if($errors->has('color'))
                                        <div class="alert alert-danger">
                                            {{$errors->first('color')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Giá tiền</label>
                                <div class="col-lg-10">
                                    <input type="number" name="price_attribute" class="form-control" value="{{$productDetail->price_product}}">
                                    @if($errors->has('price_attribute'))
                                        <div class="alert alert-danger">
                                            {{$errors->first('price_attribute')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Số lượng</label>
                                <div class="col-lg-10">
                                    <input type="number" name="qty" class="form-control" value="{{old('qty')}}" placeholder="Nhập số lượng">
                                    @if($errors->has('qty'))
                                        <div class="alert alert-danger">
                                            {{$errors->first('qty')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Hình ảnh</label>
                                <div class="col-lg-10">
                                    <input type="file" class="form-control" id="example-fileinput" name="image" onchange="showImage.call(this)">
                                    @if(Session::has('image_error'))
                                        <div class="alert alert-danger" style="margin-top: 5px;">
                                            {{Session::get('image_error')}}
                                        </div>
                                    @endif
                                    @if($errors->has('image'))
                                        <div class="alert alert-danger" style="margin-top: 5px;">
                                            {{$errors->first('qty')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-lg-2"></div>
                                <div class="col-lg-10">
                                    <div class="card" style="margin-top: 5px;display: none;">
                                        <div class="card-body">
                                            <div id="preview">
                                                <img src="" id="image" height="150px" width="150px" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-2"><input type="submit" class="btn btn-primary waves-effect width-md waves-light" value="Tạo mới"></div>
                                <div class="col-lg-2"><a href="{{route('attribute_product.list',['id'=>$productDetail->id])}}" class="btn btn-warning waves-effect width-md waves-light" style="margin-left: 25px;">Quay lại</a></div>
                                <div class="col-lg-2"></div>
                            </div>
                        </form>
                        @endif
                    </div>
                    <div class="col-2"></div>

                    <div id="overlay"></div>
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
<script src="{{asset('js\jquery.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#image').on('click', function() {
            $('#overlay')
            .css({backgroundImage: `url(${this.src})`})
            .addClass('open')
            .one('click', function() { $(this).removeClass('open'); });
        });
    });

     function showImage() {
        if (this.files && this.files[0]) {
            var object = new FileReader();
            object.onload = function(data) {
                $('.card').css('display','block');
                var image = document.getElementById("image");
                image.style = "margin-left:5px;border:1px solid #ccc!important;margin-bottom:5px;";
                image.src = data.target.result;
            }
            object.readAsDataURL(this.files[0]);
        }
    }
</script>
@endsection