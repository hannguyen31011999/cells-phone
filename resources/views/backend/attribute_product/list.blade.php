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
                <h4 class="m-t-0 header-title mb-4"><b>Danh sách attribute sản phẩm</b></h4>
                <div class="button-add">
                @if(isset($productDetail))
                    <a href="{{route('attribute_product.create',['id'=>$productDetail->id])}}" class="btn btn-primary waves-effect waves-light ">+</a>
                    <a href="{{route('product_detail.list',['id'=>$productDetail->product_id])}}" class="btn btn-danger waves-effect waves-light ">Quay lại</a>
                @endif
                </div>
                <table id="datatable" class="table table-bordered table-stried" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Mã sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Bộ nhớ trong</th>
                            <th>Màu sắc</th>
                            <th>Hình ảnh</th>
                            <th>Giá tiền</th>
                            <th>Số lượng</th>
                            <th>Thời gian tạo</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($attributeProduct as $attributeProduct)
                        <tr>
                            @foreach($product as $products)
                                <td>{{$products->id}}</td>
                                <td>{{$products->product_name}}</td>
                            @endforeach
                            @if(isset($productDetail))
                                <td>{{$productDetail->rom}}GB</td>
                            @endif
                            <td>{{$attributeProduct->color}}</td>
                            <td>
                                <img src="{{asset('backend/attribute_img/'.$attributeProduct->image)}}" class="image" height="75" width="75">
                            </td>
                            <td>{{number_format($attributeProduct->price_attribute, 0, ".", ".")}}đ</td>
                            <td>{{$attributeProduct->qty}}</td>
                            <td>{{date_format(new DateTime($attributeProduct->created_at),'d-m-Y H:i')}}</td>
                            <td>
                                <div style="width: 100px;">
                                    <a href="{{route('attribute_product.edit',['id'=>$attributeProduct->product_detail_id,'id1'=>$attributeProduct->id])}}" class="btn btn-icon waves-effect waves-light btn-warning"><i class="fa fa-wrench"></i></a>
                                    <a href="{{route('attribute_product.delete',['id'=>$attributeProduct->product_detail_id,'id1'=>$attributeProduct->id])}}" onclick="confirm('Bạn muốn sản phẩm này?');" class="btn btn-icon waves-effect waves-light btn-danger" style="margin-left: 5px;"><i class="fas fa-trash-alt"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div id="overlay"></div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
@endsection

@section('js')
<script src="{{asset('js\jquery.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.image').on('click', function() {
            $('#overlay')
            .css({backgroundImage: `url(${this.src})`})
            .addClass('open')
            .one('click', function() { $(this).removeClass('open'); });
        });
    });
</script>
@endsection