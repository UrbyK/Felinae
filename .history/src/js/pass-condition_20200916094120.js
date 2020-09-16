
$('#password').on('keyup', function () {
    var upperCase= new RegExp('[A-Z]');
    var lowerCase= new RegExp('[a-z]');
    var numbers = new RegExp('[0-9]');
    var specialChar = new RegExp('[^A-Za-z0-9]');

    if($('#password').val().length >= 8){
        $('#minCharLenght').css('color', 'green');
    }
    else{
        $('#minCharLenght').css('color', 'red');
    }

    if($('#password').val().match(upperCase)){
        $('#bigChar').css('color', 'green');
    }
    else{
        $('#bigChar').css('color', 'red');
    }

    if($('#password').val().match(lowerCase)){
        $('#smallChar').css('color', 'green');
    }
    else{
        $('#smallChar').css('color', 'red');
    }

    if($('#password').val().match(numbers)){
        $('#numericChar').css('color', 'green');
    }
    else{
        $('#numericChar').css('color', 'red');
    }

    if($('#password').val().match(specialChar)){
        $('#specialChar').css('color', 'green');
    }
    else{
        $('#specialChar').css('color', 'red');
    }

    if($('#password').val().length >= 8 && $('#password').val().match(upperCase) && $('#password').val().match(lowerCase) && $('#password').val().match(numbers) && $('#password').val().match(specialChar)){
        $('#password').css('border-color', 'green');
    }
    else{
        $('#password').css('border-color', 'red');
    }
});