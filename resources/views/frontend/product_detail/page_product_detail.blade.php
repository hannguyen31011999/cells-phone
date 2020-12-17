@extends('frontend.master')

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style type="text/css">
    .nice-select.open .list{
        max-height: 120px;
        overflow: auto;
    }

    .box-product{
        display: flex;
        flex-wrap: wrap;
    }
    .box-product > .attribute{
        background-color: #f1f1f1;
        width: 85px;
        margin-right: 10px;
        margin-bottom: 10px;
        text-align: center;
        line-height: 30px;
        font-size: 12px;
    }
    .linked-price{
        color: red;
    }
    .attribute-color{
        color: black;
        word-wrap: normal;
    }
    #dtail{
        max-height: 250px;
        overflow: auto;
    }

    .ratings {
      list-style-type: none;
      margin: 0;
      padding: 0;
      width: 100%;
      direction: rtl;
      text-align: left;
    }

    .star {
      position: relative;
      display: inline-block;
      transition: color 0.2s ease;
      color: #ebebeb;
    }

    .star:before {
      content: '\2605';
      width: 60px;
      height: 60px;
      font-size: 60px;
    }

    .star:hover,
    .star.selected,
    .star:hover ~ .star,
    .star.selected ~ .star{
      transition: color 0.8s ease;
      color: #f25800;
    }

    .messenger-errors{
        color: red;
        font-size: 14px;
        margin-top: 5px;
    }
</style>
@endsection
@section('header')
    @include('frontend.header.header_master')
@endsection

@section('categories')
    @include('frontend.categories.categories_none')
@endsection

@section('content')
<!-- Breadcrumb Start -->
<div class="breadcrumb-area mt-30">
    <div class="container">
        <div class="breadcrumb">
            <ul class="d-flex align-items-center">
                <li><a href="{{route('home')}}">Trang chủ</a></li>
                <li class="active"><a href="#">Chi tiết sản phẩm</a></li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->
@include('frontend.product_detail.content_product_detail')
@include('frontend.product_detail.content_review')
@include('frontend.product_detail.content_related')
@include('frontend.product_detail.modal_detail')
<div class="modal fade" id="modalSuccess" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content text-center">
      <div class="modal-body">
        <i class="fa fa-check" style="color: rgb(102, 204, 0);font-size:50px;"></i>
        <p id="render-modal"></p>
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')
<script src="{{asset('js\jquery.min.js')}}"></script>
<script src="{{asset('frontend/ajax/cart.js')}}"></script>
<script src="{{asset('frontend/ajax/wish.js')}}"></script>
<script src="{{asset('frontend/ajax/compare.js')}}"></script>
<script src="{{asset('frontend/ajax/product_detail.js')}}"></script>
<script type="text/javascript">
    $(function (){
      var star = '.star',
      selected = '.selected';
      var vote = 0;
      $(star).on('click', function(){
        $(selected).each(function(){
            $(this).removeClass('selected');
        });
        $(this).addClass('selected');
      });
    });

    $(document).on('submit', '#review-sp', function(e){
        var vote = $(".selected").attr('id');
        var name = $('#name').val();
        var email = $('#email').val();
        var content = $('textarea#comment').val();
        var url = $(this).attr('data-url');
        var product_id = $(this).attr('product-id');
        var product_detail_id = $(this).attr('product-detail-id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url:url,
            data: {
              "point":vote,
              "name":name,
              "email":email,
              "content":content,
              "product_id":product_id,
              "product_detail_id":product_detail_id
            },
            success: function(response) {
                $('#msg1').css('display','none');
                $('#msg2').css('display','none');
                $('#msg3').css('display','none');
                $('#msg4').css('display','none');

                $('.star').removeClass('selected');
                $('#name').val("");
                $('#email').val("");
                $('textarea#comment').val("");
                $('#render-review').empty().html(response);
                
                $('#render-modal').text('Đánh giá của khách hàng đã được thêm');
                $('#modalSuccess').modal('show');
                setTimeout(function(){ 
                    $('#modalSuccess').modal('hide');
                },1000);
            },
            error: function (response) {
                var errors = response.responseJSON.errors;
                $.each(errors,function(index,value){
                    if(index==="name"){
                        $('#msg1').css('display','block');
                        $('#msg1').text(errors.name);
                    }else if(index==="email"){
                        $('#msg2').css('display','block');
                        $('#msg2').text(errors.email);
                    }else if(index==="content"){
                        $('#msg3').css('display','block');
                        $('#msg3').text(errors.content);
                    }else{
                        $('#msg4').css('display','block');
                        $('#msg4').text(errors.point);
                    }
                });
            }
        });
        e.preventDefault();
    });
</script>
@endsection