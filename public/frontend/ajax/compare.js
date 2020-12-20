// change color attribute
function changeAttribute(id){
    var id_attribute = $('#choose-color'+id).val();
    $.ajax({
        type: 'get',
        url: '/change-wishlist',
        data: {
          "id_attribute":id_attribute
        },
        success: function(response) {
            $('#choose-color'+id).blur();
            $('#add-cart'+id).attr('data-id',id_attribute);
            $('#amount'+id).text(response.data.price_attribute.toLocaleString('vi-VN', {style: 'currency',currency:'VND'}));
            $('#attribute-img'+id).attr('src','backend/attribute_img/'+response.data.image);
        },
        error: function (response) {
            alert('Đã xảy ra lỗi! xin thử lại');
        }
    });
}