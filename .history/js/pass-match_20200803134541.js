$('#password, #confirm_password', '#reg_btn').on('keyup', function(){
    if ($('#password').val() == $('#confirm_password').val()){
        $('#message').html('Ujema').css('color', 'green');
        $('#reg_btn').prop('disabled', false);
    }
    else
        $('#message').html('Ne ujema').css('color', 'red');
});