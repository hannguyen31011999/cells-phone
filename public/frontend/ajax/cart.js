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
            // var notification = alertify.notify('Thêm thành công sản phẩm', 'success',2, function(){  console.log('success');});
            // $('.alertify-notifier').css('color','white');
            $('#cart-render').empty().html(response);
            $('#render-modal').text('Thêm sản phẩm vào giỏ hàng');
            $('#modalSuccess').modal('show');
            setTimeout(function(){ 
                $('#modalSuccess').modal('hide');
            },1000);
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


$(document).on('change', 'input[name=changeQuantity]', function(e){
    var id = $(this).attr('data-id');
    var qty = $('#change-quantity'+id).val();
    if(qty>0)
    {
        $.ajax({
            type: 'get',
            url: '/update-cart',
            data: {
              "qty":qty,
              "id":id     
            },
            success: function(response) {
                // render data to template shoppingcart 
                $.each(response.data.products,function(key,value){
                    // template shoppingcart render
                    $('#change-quantity'+key).val(value.qty);
                    $('#render-discount'+key).text(value.discount.toLocaleString('vi-VN', {style: 'currency',currency:'VND'}));
                    $('#render-subtotal'+key).text((value.price*value.qty-value.discount).toLocaleString('vi-VN', {style: 'currency',currency:'VND'}));

                    // template cart render
                    $('.render-discount'+key).text("Voucher: " + value.discount.toLocaleString('vi-VN', {style: 'currency',currency:'VND'}));
                    $('.render-qty'+key).text("Số lượng: " + value.qty);

                });
                $('#sup').remove();
                $('#render-totalPrice').text((response.data.totalPrice-response.data.totalDiscount).toLocaleString('vi-VN', {style: 'currency',currency:'VND'}));

                // render data to template cart 
                $('.total-pro').text(response.data.totalQuantity);
                $('.render-subtotal').text(response.data.totalPrice.toLocaleString('vi-VN', {style: 'currency',currency:'VND'}));
                $('.render-totaldiscount').text(response.data.totalDiscount.toLocaleString('vi-VN', {style: 'currency',currency:'VND'}));
                $('.render-totalprice').text((response.data.totalPrice-response.data.totalDiscount).toLocaleString('vi-VN', {style: 'currency',currency:'VND'}));
            },
            error: function (response) {
                alert('Đã xảy ra lỗi! xin thử lại');
            }
        });
    }else{
        alert('Số lượng không nhỏ hơn 1');
        $('#change-quantity'+id).val(1);
    }
    
    e.preventDefault();
});