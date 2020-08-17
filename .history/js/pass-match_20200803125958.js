$('#password, #confirm_password').on('keyup', function(){
    if ($('#password').val() == $('#confirm_password').val()){
        $('#message').html('Ujema').css('color', 'green');
    }
    else
        $('#message').html('Ne ujema').css('color', 'red');
});