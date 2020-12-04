$(document).on('click', '.add-cart', function(e){
    var id_before = $('#id-attribute').val();
    var qty = $('.quantity').val();
    $.ajax({
        type: 'get',
        url: '/add-cart',
        data: {
          "id":id_before,
          "qty":qty
        },
        success: function(response) {
            var notification = alertify.notify('Thêm thành công sản phẩm', 'success',2, function(){  console.log('success');});
            $('#cart-render').empty().html(response);
        },
        error: function (response) {
            alert('Đã xảy ra lỗi! xin thử lại');
        }
    });
    e.preventDefault();
});

$(document).on('click', '#delete-cart', function(e){
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