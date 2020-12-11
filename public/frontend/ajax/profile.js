    $(document).on('submit', '#form-profile', function(e){
        $('#msg1').css('display','none');
        $('#msg2').css('display','none');
        $('#msg3').css('display','none');
        var fullname = $('#fullname').val();
        var address = $('#address').val();
        var phone = $('#phone').val();
        var gender = $('input[name=gender]:checked').val();
        var birth_date = $('#birth-date').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'post',
            url: '/account/profile',
            data: {
                'fullname':fullname,
                'address':address,
                'phone':phone,
                'gender':gender,
                'birth_date':birth_date
            },
            success: function(response) {
                console.log('success profile');
                $('#render-modal').empty().html(response);
                $('#modalSuccess').modal('show');
                setTimeout(function(){ 
                    $('#modalSuccess').modal('hide');
                },2000);
            },
            error: function (response) {
                var errors = response.responseJSON.errors;
                var length = Object.keys(errors).length;
                if(length===1){
                    if(Array.isArray(errors.fullname)){
                        $('#msg1').css('display','block');
                        $('#msg1').text(errors.fullname);
                    }else if(Array.isArray(errors.phone)){
                        $('#msg2').css('display','block');
                        $('#msg2').text(errors.phone);
                    }else{
                        $('#msg3').css('display','block');
                        $('#msg3').text(errors.address);
                    }
                }else if(length===2){
                    if(Array.isArray(errors.fullname)&&Array.isArray(errors.phone)){
                        $('#msg1').css('display','block');
                        $('#msg1').text(errors.fullname);

                        $('#msg2').css('display','block');
                        $('#msg2').text(errors.phone);
                    }else if(Array.isArray(errors.address)&&Array.isArray(errors.phone)){
                        $('#msg2').css('display','block');
                        $('#msg2').text(errors.phone);

                        $('#msg3').css('display','block');
                        $('#msg3').text(errors.address);
                    }else{
                        $('#msg1').css('display','block');
                        $('#msg1').text(errors.fullname);

                        $('#msg3').css('display','block');
                        $('#msg3').text(errors.address);
                    }
                }else{
                    $('#msg1').css('display','block');
                    $('#msg1').text(errors.fullname);

                    $('#msg2').css('display','block');
                    $('#msg2').text(errors.phone);

                    $('#msg3').css('display','block');
                    $('#msg3').text(errors.address);
                }
            }
        });
        e.preventDefault();
    });