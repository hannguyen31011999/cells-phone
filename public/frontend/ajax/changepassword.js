$(document).on('submit', '#form-password', function(e){
        $('#msg1').css('display','none');
        $('#msg2').css('display','none');
        $('#msg3').css('display','none');

        var old_password = $('#old-password').val();
        var new_password = $('#new-password').val();
        var confirm_password = $('#confirm-password').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'post',
            url: '/account/change-password',
            data: {
                'old_password':old_password,
                'new_password':new_password,
                'confirm_password':confirm_password
            },
            success: function(response) {
                console.log('change password success');
                $('#render-modal').empty().html(response);
                $('#modalSuccess').modal('show');
                setTimeout(function(){ 
                    $('#modalSuccess').modal('hide');
                    $('#old-password').val(null);
                    $('#new-password').val(null);
                    $('#confirm-password').val(null);
                },2000);
            },
            error: function (response) {
                var errors = response.responseJSON.errors;
                var length = Object.keys(errors).length;
                if(length===1){
                    if(Array.isArray(errors.old_password)){
                        $('#msg1').css('display','block');
                        $('#msg1').text(errors.old_password);
                    }else if(Array.isArray(errors.new_password)){
                        $('#msg2').css('display','block');
                        $('#msg2').text(errors.new_password);
                    }else{
                        $('#msg3').css('display','block');
                        $('#msg3').text(errors.confirm_password);
                    }
                }else if(length===2){
                    if(Array.isArray(errors.old_password)&&Array.isArray(errors.new_password)){
                        $('#msg1').css('display','block');
                        $('#msg1').text(errors.old_password);

                        $('#msg2').css('display','block');
                        $('#msg2').text(errors.new_password);
                    }else if(Array.isArray(errors.new_password)&&Array.isArray(errors.confirm_password)){
                        $('#msg2').css('display','block');
                        $('#msg2').text(errors.new_password);

                        $('#msg3').css('display','block');
                        $('#msg3').text(errors.confirm_password);
                    }else{
                        $('#msg1').css('display','block');
                        $('#msg1').text(errors.old_password);

                        $('#msg3').css('display','block');
                        $('#msg3').text(errors.confirm_password);
                    }
                }else{
                    $('#msg1').css('display','block');
                    $('#msg1').text(errors.old_password);

                    $('#msg2').css('display','block');
                    $('#msg2').text(errors.new_password);

                    $('#msg3').css('display','block');
                    $('#msg3').text(errors.confirm_password);
                }
            }
        });
        e.preventDefault();
    });