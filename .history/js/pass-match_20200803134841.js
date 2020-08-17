$('#password, #confirm_password').on('keyup', function(){
    if ($('#password').val() == $('#confirm_password').val()){
        $('#message').html('Ujema').css('color', 'green');
        $('#reg_btn').prop('disabled', false);
    }
    else{
        $('#message').html('Ne ujema').css('color', 'red');
        $('#password').css('border-color', 'red');
        $('#confirm_password').css('border-color', 'red');
    }
});