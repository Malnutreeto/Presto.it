'use strict'

console.log('[ADMINPANEL]Js caricato')

var width = document.querySelector('body').clientWidth;

if (width <= 768 ){
  window.location.href = 'http://127.0.0.1:8000/nope';
}

let productTable = document.getElementById('productTable')
let allInput = document.getElementById('all')
let allElement = []

function addOrRemoveInMultiproduct (elmentId){
    let value = allInput.value.split(',')
    
    if (value.indexOf(elmentId) !== -1){
        value.splice(value.indexOf(elmentId), 1);
        return value
    }

    value.push(elmentId)
    return value

}

productTable.addEventListener('change', function(event){
    
    if (event.target.parentElement.tagName === 'FORM'){
        productTable.querySelectorAll('.form-check-input').forEach((element) => {
            if(event.target.checked === true){
                element.checked = true

                if (element.parentElement.nextElementSibling){
                    allInput.value = addOrRemoveInMultiproduct(element.parentElement.nextElementSibling.innerText)
                }
            }else{
                element.checked = false

                allInput.value = '';
            }
        })
    }else{

        let rowId = event.target.parentElement.nextElementSibling.innerText

        allInput.value = addOrRemoveInMultiproduct(rowId)

    }

    console.log(allInput)

})
 