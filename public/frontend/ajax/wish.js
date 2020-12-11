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
