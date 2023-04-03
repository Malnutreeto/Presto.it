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

import icons from '/public/icons.json' assert {type: 'json'};
let iconSelect = document.getElementById('iconSelect')
let icon = document.getElementById('icon');

for(let key in icons)
{
    let selectoption = document.createElement('option');

    selectoption.value = `bi-${key}`;
    selectoption.innerText = `bi-${key}`

    iconSelect.appendChild(selectoption);
}


iconSelect.addEventListener('change', (event) => {
    icon.setAttribute('class', '')
    icon.setAttribute('class', `bi ${event.target.value} fs-1`)
})
