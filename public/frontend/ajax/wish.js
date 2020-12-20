
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

// add product yêu thích
$(document).on('click', '#add-wish', function(e){
    var id = $(this).attr('data-wish');
    $.ajax({
        type: 'get',
        url: '/add-wishlist',
        data: {
          "id":id
        },
        success: function(response) {
            $('#render-modal').text('Thêm vào danh sách yêu thích');
            $('#render-wish').text('yêu thích ('+response+')');
            $('#modalSuccess').modal('show');
            setTimeout(function(){ 
                $('#modalSuccess').modal('hide');
            },2000);
        },
        error: function (response) {
            alert('Đã xảy ra lỗi! xin thử lại');
        }
    });
    e.preventDefault();
});


function addCart(id){
    var id_before = $('#add-cart'+id).attr('data-id');
    var qty = 1;
    if(id_before===null){
        alert('Chọn màu sản phẩm');
    }else{
        $.ajax({
            type: 'get',
            url: '/add-cart',
            data: {
              "id":id_before,
              "qty":qty
            },
            success: function(response) {
                var notification = alertify.notify('Thêm thành công sản phẩm', 'success',2, function(){  console.log('success');});
                $('.alertify-notifier').css('color','white');
                $('#cart-render').empty().html(response);
            },
            error: function (response) {
                if(response.responseJSON.messenger!==null){
                    alert(response.responseJSON.messenger);
                }else{
                    alert('Đã xảy ra lỗi! xin thử lại');
                }
            }
        });
    }
}