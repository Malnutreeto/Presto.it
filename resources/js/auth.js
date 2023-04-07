'use strict'

console.log('[Auth]Js caricato');

let passwordInput = document.getElementById('passwordInput');
let passwordIcon = passwordInput.querySelector('.bi-key');

passwordInput.addEventListener('input', (event) => {

    if (event.target.name === 'password' && passwordIcon.classList.contains('bi-key')){
        passwordIcon.classList.remove('bi-key');
        passwordIcon.classList.add('bi-eye');
    }
})

passwordIcon.addEventListener('click', (event) => {
    
    let password = passwordIcon.nextElementSibling

    if (password.getAttribute('type') === 'password'){
        password.setAttribute('type', 'text')
        passwordIcon.classList.remove('bi-eye');
        passwordIcon.classList.add('bi-eye-slash-fill');
    }
    else {
        password.setAttribute('type', 'password')
        passwordIcon.classList.add('bi-eye');
        passwordIcon.classList.remove('bi-eye-slash-fill');
    }
})

window.addEventListener("load", function(){
    let divErr = document.querySelector(".err-text");
    if (divErr) {
        divErr.parentElement.classList.add("shake-horizontal")
    }
})

// var loginInput = document.getElementById("loginInput");

// loginInput.focusout = function(event) {
//   var input = loginInput.value;
//   if (event.keyCode == 13 && input === "") {
//     loginInput.classList.add("shake-horizontal");
//     setTimeout(function() {
//       loginInput.classList.remove("shake-horizontal");
//     }, 1000); 
//   }  
// }