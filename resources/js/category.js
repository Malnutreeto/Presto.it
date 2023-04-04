'use strict'
import * as bootstrap from 'bootstrap';
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

import icons from '/public/icons.json' assert {type: 'json'};
let iconAccordion = document.getElementById('iconAccordion');
let iconInput = document.getElementById('iconInput');

for(let key in icons){

    let icon = document.createElement('i');
    icon.setAttribute('class', `bi-${key} me-3 fs-4`)
    icon.setAttribute('name', `bi-${key}`)
    icon.setAttribute('role', `button`)
    iconAccordion.querySelector('#collapseOne').appendChild(icon);
}

iconAccordion.addEventListener('click', (event) => {
    if(event.target.tagName === 'I'){
        iconInput.value = event.target.getAttribute('name')
        iconAccordion.querySelector('button').innerHTML = `<strong>Icona selezionata:</strong><i class="ms-2 fs-4 bi ${iconInput.value}"></i>`
    }
})

