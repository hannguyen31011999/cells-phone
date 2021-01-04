function changePurchase()
{
    let choose = $('#changePurchase').val();
    window.location = choose;
}

$(document).on('click', '.detail-purchase', function(e){
    var id = $(this).attr('data-id');
    $.ajax({
        type: 'get',
        url: '/account/purchase',
        data: {
          "id":id
        },
        success: function(response) {
            $('#render-modal').empty().html(response);
            $('#myModal').modal('show');
        },
        error: function (response) {
            alert('Đã xảy ra lỗi! xin thử lại');
        }
    });
    e.preventDefault();
});