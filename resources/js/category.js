'use strict'

console.log('[CATEGORY]Js caricato')

let select = document.getElementById('select');
let mainForm = document.getElementById('main');
let subForm = document.getElementById('sub') 

select.addEventListener('change', (event)=>{
    if(event.target.value === 'sub'){
        mainForm.classList.add('d-none');
        subForm.classList.remove('d-none');
    }
    else{
        mainForm.classList.remove('d-none');
        subForm.classList.add('d-none');
    }
})