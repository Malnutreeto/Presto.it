'use strict'

console.log('[Auth]Js caricato');
let inputFields = document.querySelector('.login-fields');
let passwordInput = document.getElementById('passwordInput');
let passwordIcon = passwordInput.querySelector('.bi-key');
let icon = loginInput.querySelector('.bi');

passwordInput.addEventListener('input', (event) => {

    if (event.target.name === 'password' && passwordIcon.classList.contains('bi-key')){
        passwordIcon.classList.remove('bi-key');
        passwordIcon.classList.add('bi-eye');
    }
})
inputFields.addEventListener('focusin', (event) => {
    if (event.target.tagName === "INPUT") {
        console.log(event.target);
        let element = event.target.previousElementSibling;
        element.style.color='white';
         element.style.opacity='0.7';
    }
    
    
});


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

