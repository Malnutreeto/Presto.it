'use strict'

console.log('[PRODUCT-CREATE]Js caricato')

let imgInput = document.querySelector('[name=images]')
let loader = document.querySelector('.loader')


imgInput.addEventListener('click', (event) => {    
    loader.classList.remove('d-none')
    imgInput.classList.add('d-none')
    setTimeout(()=>{
        loader.classList.add('d-none')
        imgInput.classList.remove('d-none')
    }, 5000)
})
