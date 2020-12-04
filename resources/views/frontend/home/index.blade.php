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

@section('banner')
<!-- Slider Area Start Here -->
<div class="col-xl-9 col-lg-8 slider_box">
    <div class="slider-wrapper theme-default">
        <!-- Slider Background  Image Start-->
        <div id="slider" class="nivoSlider">
            <a href="shop.html"><img src="{{asset('frontend\img\slider\1.jpg')}}" data-thumb="img/slider/1.jpg')}}" alt="" title="#htmlcaption"></a>
            <a href="shop.html"><img src="{{asset('frontend\img\slider\2.jpg')}}" data-thumb="img/slider/2.jpg')}}" alt="" title="#htmlcaption2"></a>
        </div>
        <!-- Slider Background  Image Start-->
    </div>
</div>
<!-- Slider Area End Here -->
@endsection

@section('content')

@include('frontend.home.content_product')

@include('frontend.home.content_seller')

@endsection

@section('js')

<script src="{{asset('js\jquery.min.js')}}"></script>
<script src="{{asset('frontend/ajax/cart.js')}}"></script>
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
                    console.log("success");
                	$('#modal-product').empty().html(response);
                	$('#myModal').modal('show');
                },
                error: function (response) {
                    alert('Đã xảy ra lỗi! xin thử lại');
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
                    // modal_product.blade.php
                	$('#change-img').html('<a class="attribute-tag" data-fancybox="images" href="backend/attribute_img/'+response.data.image+'" alt="Sản phẩm" id="attribute-image"><img src="backend/attribute_img/'+response.data.image+'" alt="Sản phẩm" id="attribute-image"></a>');
                	// modal_product.blade.php
                    $('#price_attribute').html('<span class="price">'+price.toLocaleString('vi-VN', {style: 'currency',currency:'VND'})+'</span><span class="saving-price" style="margin-left: 5px;">khuyến mãi giảm trực tiếp '+ (response.discount/1000) +'K</span>');
                	$('#'+id).css('border','solid 1px');
                    $('#id-attribute').val(id);
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