$('#password, #confirm_password').on('keyup', function(){
    if ($('#password').val() === $('#confirm_password').val()){
        $('#message').html('Ujema').css('color', 'green');
        $('#confirm_password').css('border-color', 'green');
        $('#reg_btn').prop('disabled', false);
    }
    else{
        $('#message').html('Ne ujema').css('color', 'red');
        $('#confirm_password').css('border-color', 'red');
        $('#reg_btn').prop('disabled', true);
    }
});