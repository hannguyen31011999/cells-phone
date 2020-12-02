@extends('frontend.master')

@section('css')
<style type="text/css">
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
</style>
@endsection


@section('content')

@include('frontend.home.content_product')

@include('frontend.home.content_seller')

@endsection

@section('js')
<script src="{{asset('js\jquery.min.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function(){
        $('.quick_view').on('click', function(e) {
        	var id = $(this).attr('id');
        	$.ajax({
                type: 'get',
                url: '/modal-detail-product',
                data: {
                  "id":id
                },
                success: function(response) {
                	$('#modal-product').empty().html(response);
                	$('#myModal').modal('show');
                },
                error: function (response) {

                }
            });
            e.preventDefault();
        });
        $(document).on('click', '.attribute', function(e){
        	$('.attribute').css('border','');
        	var id = $(this).attr('id');
        	$.ajax({
                type: 'get',
                url: '/change-color',
                data: {
                  "id":id
                },
                success: function(response) {
                	var price = response.data.price_attribute;
                	$('#attribute-image').remove();
                	$('#attribute-tag').remove();
                	$('#change-img').html('<a class="attribute-tag" data-fancybox="images" href="backend/attribute_img/'+response.data.image+'" alt="Sản phẩm" id="attribute-image"><img src="backend/attribute_img/'+response.data.image+'" alt="Sản phẩm" id="attribute-image"></a>');
                	$('#price_attribute').text(price.toLocaleString('vi-VN', {
        															style: 'currency',
																    currency: 'VND'}));
                	$('#'+id).css('border','1px solid #d70018');
                },
                error: function (response) {
                	alert('Đã xảy ra lỗi! xin thử lại');
                }
            });
            e.preventDefault();
        });
    });
</script>
@endsection