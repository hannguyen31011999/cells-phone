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
                $('#change-img').html('<a class="attribute-tag" data-fancybox="images" href="backend/attribute_img/'+response.data.image+'" alt="Sản phẩm" id="attribute-image"><img src="../backend/attribute_img/'+response.data.image+'" alt="Sản phẩm" id="attribute-image"></a>');
                $('#price_attribute').html('<span class="price">'+price.toLocaleString('vi-VN', {style: 'currency',currency:'VND'})+'</span><span class="saving-price" style="margin-left: 5px;">khuyến mãi giảm trực tiếp '+ (response.discount/1000) +'K</span>');
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



function filterSelectPrice()
{
    var filter = $('#filterSelect').val();
    var url = $('#filterSelect').attr('data-url');
    $.ajax({
        type: 'get',
        url: "/" + url,
        data: {
          "filter":filter
        },
        success: function(response) {
            $('#render-select').empty().html(response);
            $('head').append('<script src="../frontend/ajax/shop.js"></script>');
            $('.form-check-input').prop('checked',false);
        },
        error: function (response) {
            alert('Đã xảy ra lỗi! xin thử lại');
        }
    });
}

function filterRom(checkbox,number) {
    var checkboxes = document.getElementsByName('rom');
    checkboxes.forEach((item) => {
        if (item !== checkbox) {item.checked = false}
        else{item.checked = true}
    });
    var check = $('#rom'+number).val();
    var url = $('#filterSelect').attr('data-url');
    $.ajax({
        type: 'get',
        url: "/" + url,
        data: {
          "check":check
        },
        success: function(response) {
            $('#render-select').empty().html(response);
            $('head').append('<script src="../frontend/ajax/shop.js"></script>');
        },
        error: function (response) {
            alert('Đã xảy ra lỗi! xin thử lại');
        }
    });
}