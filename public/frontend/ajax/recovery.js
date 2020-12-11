$(document).on('submit', '#form-reset', function(e){
        $('#msg1').css('display','none');
        var email = $('#email').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'post',
            url: '/account/recovery',
            data: {
                'email':email
            },
            success: function(response) {
                $("#confirm-recovery").prop( "disabled", true );
                var number = 120;
                var test = setInterval(function(){
                    $("#confirm-recovery").val('Gửi xác nhận sau : '+ number + " s");
                    if(number===0){
                        $("#confirm-recovery").val('Gửi xác nhận')
                        $("#confirm-recovery").prop( "disabled", false );
                        clearInterval(test);
                    }
                    number--;
                },1000);
                $('#render-modal').empty().html(response);
                $('#modalSuccess').modal('show');

                setTimeout(function(){ 
                    $('#modalSuccess').modal('hide');
                },2000);
            },
            error: function (response) {
                var errors = response.responseJSON.errors;
                $('#msg1').css('display','block');
                $('#msg1').text(errors.email);
            }
        });
        e.preventDefault();
    });