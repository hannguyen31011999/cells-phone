// change color attribute
function changeAttribute(id){
    $.ajax({
        type: 'get',
        url: '/change-wishlist',
        data: {
          "id_attribute":id
        },
        success: function(response) {
            $('.attribute').css('border','');
            $('#choose-color'+id).css('border','1px solid');
            $('.add-cart').attr('id',id);
            $('.price').text(response.data.price_attribute.toLocaleString('vi-VN', {style: 'currency',currency:'VND'}));
            $('#img-active').attr('src','backend/attribute_img/'+response.data.image);
            $('#a-active').attr('href','backend/attribute_img/'+response.data.image);
            location.hash = "content-product-header";
        },
        error: function (response) {
            alert('Đã xảy ra lỗi! xin thử lại');
        }
    });
}