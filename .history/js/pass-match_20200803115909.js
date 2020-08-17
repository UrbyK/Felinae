let password = document.querySelector('#password');
let check_password = document.querySelector('#confirm_password');

function checkPassword(){
    checkPassword.bgColor = password.value == check_password.value ? 'Red' : 'Green'
}
password.addEventListener('keyup', ()=>{
    if(check_password.nodeValue.length != 0) checkPassword();
})

check_password.addEventListener('keyup', checkPassword);