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
                    alert('Đã xảy ra lỗi! xin thử lại');
                }
            });
            e.preventDefault();
        });
        
        $(document).on('click', '.attribute', function(e){
        	var id = $(this).attr('data-id');
        	$.ajax({
                type: 'get',
                url: '/change-color',
                data: {
                  "id":id
                },
                success: function(response) {
                	var price = response.data.price_attribute;
                    $('.attribute').css('border','');
                	$('#attribute-image').remove();
                	$('#attribute-tag').remove();
                    // modal_product.blade.php
                	$('#change-img').html('<a class="attribute-tag" data-fancybox="images" href="backend/attribute_img/'+response.data.image+'" alt="Sản phẩm" id="attribute-image"><img src="backend/attribute_img/'+response.data.image+'" alt="Sản phẩm" id="attribute-image"></a>');
                	// modal_product.blade.php
                    if(response.discount!==null){
                        $('#price_attribute').html('<span class="price">'+price.toLocaleString('vi-VN', {style: 'currency',currency:'VND'})+'</span><span class="saving-price" style="margin-left: 5px;">khuyến mãi giảm trực tiếp '+ (response.discount.discount_value/1000) +'K</span>');
                    }else{
                        $('#price_attribute').html('<span class="price">'+price.toLocaleString('vi-VN', {style: 'currency',currency:'VND'})+'</span>');
                    }
                   
                	$('#color'+id).css('border','solid 1px');
                    $('.add-cart').attr('id',id);
                },
                error: function (response) {
                	alert('Đã xảy ra lỗi! xin thử lại');
                }
            });
            e.preventDefault();
        });
    });