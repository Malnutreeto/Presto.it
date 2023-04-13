'use strict'

let container = document.querySelector('.container');
let iconboxes = container.querySelectorAll('.iconbox')

container.addEventListener('mouseover', (e) => {
     if(e.target.classList.contains('iconbox')) {
        e.target.children[0].classList.toggle('d-none')
        e.target.children[1].classList.toggle('d-none')
     } else if (e.target.classList.contains('flex-wrap')) {
        iconboxes.forEach((element=>{
            element.children[0].classList.remove('d-none')
            element.children[1].classList.add('d-none')
        }))
     }
})








