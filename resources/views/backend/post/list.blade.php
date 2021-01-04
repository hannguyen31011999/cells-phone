@extends('backend.master')

@section('css')
<style type="text/css">
    .button-add{
        margin-left: 91%;
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
    .modal-body img{
        height: 400px !important;
        width: 430px !important;
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
                <h4 class="m-t-0 header-title mb-4"><b>Danh sách bài viết</b></h4>
                <div class="button-add">
                    <a href="{{route('post.store')}}" class="btn btn-primary waves-effect waves-light ">Tạo mới</a>
                </div>
                <table id="datatable" class="table table-bordered table-stried" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Mã bài viết</th>
                            <th>Tiêu đề</th>
                            <th>Nội dung bài viết</th>
                            <th>Hình ảnh</th>
                            <th>Người tạo</th>
                            <th>Ngày tạo</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($post as $posts)
                        <tr>
                            <td>{{$posts->id}}</td>
                            <td>{{$posts->title}}</td>
                            <td><a href="#" onclick="detailPost(<?php echo $posts->id; ?>)" style="color: red;">Xem chi tiết</a></td>
                            <td><img id="image" src="{{asset('backend/post/'.$posts->image)}}" height="60" width="60"></td>
                            <td>{{ $posts->Users()->first()->fullname }}</td>
                            <td>{{ date_format(new DateTime($posts->created_at),'d-m-Y H:i') }}</td>
                            <td>
                                <div style="width: 100px;">
                                    <a href="{{route('post.edit',['id'=>$posts->id])}}" class="btn btn-icon waves-effect waves-light btn-warning"><i class="fa fa-wrench"></i></a>
                                    <a href="{{route('post.delete',['id'=>$posts->id])}}" onclick="confirm('Bạn muốn khuyến mãi này?');" class="btn btn-icon waves-effect waves-light btn-danger" style="margin-left: 5px;"><i class="fas fa-trash-alt"></i></a>
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
<div id="render-modal"></div>
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

    function detailPost(id)
    {
        $.ajax({
            type: 'get',
            url: '/admin/post/list',
            data: {
              "id":id
            },
            success: function(response) {
                console.log(response);
                $('#render-modal').empty().html(response);
                $('#post'+id).modal('show');
            },
            error: function (response) {
                alert('Xảy ra lỗi!xin thử lại');
            }
        });
    }
</script>
@endsection