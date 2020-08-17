function ajaxUpdate(e){
    e.preventDefault();
    var fname = $("#fname").val();
    var lname = $("#lname").val();
    var phoneNumber = $("#phoneNumber").val();
    var address = $("#address").val();
    var city = $("#city").val();
    var postalCode = $("#postalCode").val();
    var country = $("#country").val();

    console.log(fname);
    console.log(lname);
    console.log(phoneNumber);
    console.log(address);
    console.log(postalCode);
    console.log(city);
    console.log(country);

    $.ajax({
        type: 'POST',
        data: 'fname=' + fname + '&lname=' + lname + '&phoneNumber=' + phoneNumber + '&address=' + address + 
                    '&postalCode=' + postalCode + '&city=' + city + '&country=' + country,
        url: '../includes/profile-update.inc.php',
        success:function(data){
            alert(data);
        }  

    })
}