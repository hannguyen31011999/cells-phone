function changeWard()
{
    var id_district = document.getElementById("choose-district").value;
    $.ajax({
        type: 'get',
        url: '/shopping-cart/checkout',
        data: {
          "id_district":id_district
        },
        success: function(response) {
            $('#render-ward').empty().html('<select class="form-control" name="ward" id="choose-ward" onchange="priceShipping()"></select>');
            $('#choose-ward').append('<option value="">-- Chọn Phường/Xã --</option>');
            $.each(response.ward, function(key, value){
                $('#choose-ward').append('<option value="'+value.id+'">'+value.name+'</option>');
            });
        },
        error: function (response) {
            alert('Đã xảy ra lỗi! xin thử lại');
        }
    });
}

function priceShipping()
{
    var id_ward = document.getElementById("choose-ward").value;
    $.ajax({
        type: 'get',
        url: '/shopping-cart/checkout',
        data: {
          "id_ward":id_ward
        },
        success: function(response) {
            $('#render-ship').text(response.priceShip.toLocaleString('vi-VN', {style: 'currency',currency:'VND'}));
            $('#render-totalPrice').text(response.totalPrice.toLocaleString('vi-VN', {style: 'currency',currency:'VND'}));
        },
        error: function (response) {
            alert('Đã xảy ra lỗi! xin thử lại');
        }
    });
}

$(document).ready(function(){
    $('.radio-group .radio').click(function(){
        $('.radio').addClass('gray');
        $(this).removeClass('gray');
        var payment = $(this).attr('payment');
        $('#choose-payment').val(payment);
    });


    $('#choose-province').on('change',function(e){
        var id_province= $("#choose-province option:selected").val();
        $.ajax({
            type: 'get',
            url: '/shopping-cart/checkout',
            data: {
              "id_province":id_province
            },
            success: function(response) {
                $('#render-district').empty().html('<select class="form-control" name="district" id="choose-district" onchange="changeWard()"></select>');
                $('#choose-district').append('<option value="">-- Chọn Quận/Huyện --</option>');
                $.each(response.district, function(key, value){
                    $('#choose-district').append('<option value="'+value.id+'">'+value.name+'</option>');
                });
            },
            error: function (response) {
                alert('Đã xảy ra lỗi! xin thử lại');
            }
        });
        e.preventDefault();
    });
});