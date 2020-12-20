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

$(function (){
      var star = '.star',
      selected = '.selected';
      var vote = 0;
      $(star).on('click', function(){
        $(selected).each(function(){
            $(this).removeClass('selected');
        });
        $(this).addClass('selected');
      });
    });

$(document).on('submit', '#review-sp', function(e){
    var vote = $(".selected").attr('id');
    var name = $('#name').val();
    var email = $('#email').val();
    var content = $('textarea#comment').val();
    var url = $(this).attr('data-url');
    var product_id = $(this).attr('product-id');
    var product_detail_id = $(this).attr('product-detail-id');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'post',
        url:url,
        data: {
          "point":vote,
          "name":name,
          "email":email,
          "content":content,
          "product_id":product_id,
          "product_detail_id":product_detail_id
        },
        success: function(response) {
            $('#msg1').css('display','none');
            $('#msg2').css('display','none');
            $('#msg3').css('display','none');
            $('#msg4').css('display','none');

            $('.star').removeClass('selected');
            $('#name').val("");
            $('#email').val("");
            $('textarea#comment').val("");
            $('#render-review').empty().html(response);
            
            $('#render-modal').text('Đánh giá của khách hàng đã được thêm');
            $('#modalSuccess').modal('show');
            setTimeout(function(){ 
                $('#modalSuccess').modal('hide');
            },1000);
        },
        error: function (response) {
            var errors = response.responseJSON.errors;
            $.each(errors,function(index,value){
                if(index==="name"){
                    $('#msg1').css('display','block');
                    $('#msg1').text(errors.name);
                }else if(index==="email"){
                    $('#msg2').css('display','block');
                    $('#msg2').text(errors.email);
                }else if(index==="content"){
                    $('#msg3').css('display','block');
                    $('#msg3').text(errors.content);
                }else{
                    $('#msg4').css('display','block');
                    $('#msg4').text(errors.point);
                }
            });
        }
    });
    e.preventDefault();
});