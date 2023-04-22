'use strict'

console.log('[PRODUCT-CREATE]Js caricato')

let imgInput = document.querySelector('[name=images]')

imgInput.parentElement.addEventListener('click', (event)=>{
    if(event.target.classList.contains('img-input') || event.target.parentElement.classList.contains('img-input')){
        imgInput.click()
    }
})

