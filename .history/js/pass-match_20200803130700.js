$('#password, #confirm_password').on('keyup', function(){
    if ($('#password').val() == $('#confirm_password').val()){
        $('#message').html('Ujema').css('color', 'green');
        $('#reg_btn').disabled="false";
    }
    else
        $('#message').html('Ne ujema').css('color', 'red');
});