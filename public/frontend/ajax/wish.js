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
            $('#add-cart').attr('data-id',id_attribute);
            $('#amount'+id).text(response.data.price_attribute.toLocaleString('vi-VN', {style: 'currency',currency:'VND'}));
            $('#attribute-img'+id).attr('src','backend/attribute_img/'+response.data.image);
        },
        error: function (response) {
            alert('Đã xảy ra lỗi! xin thử lại');
        }
    });
    e.preventDefault();
}


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



$(document).on('click', '#delete-wish', function(e){
    var id = $(this).attr('data-id');
    $.ajax({
        type: 'get',
        url: '/delete-cart',
        data: {
          "id":id
        },
        success: function(response) {
            $('#cart-render').empty().html(response);
            if(window.location.href == "http://localhost:8000/shopping-cart"){
                window.location.href = "/shopping-cart";
            }
        },
        error: function (response) {
            alert('Đã xảy ra lỗi! xin thử lại');
        }
    });
    e.preventDefault();
});


$(document).on('click', '#add-cart', function(e){
    var id_before = $(this).attr('data-id');
    var qty = 1;
    if(id_before===undefined){
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
                // $('#render-modal').text('Thêm sản phẩm vào giỏ hàng');
                // $('#modalSuccess').modal('show');
                // setTimeout(function(){ 
                //     $('#modalSuccess').modal('hide');
                // },1000);
            },
            error: function (response) {
                alert('Đã xảy ra lỗi! xin thử lại');
            }
        });
    }
    
    e.preventDefault();
});