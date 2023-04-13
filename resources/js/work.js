'use strict'

let container = document.querySelector('.container');

container.addEventListener('mouseover', (e) => {
    if (e.target.classList.contains('iconbox') || e.target.classList.contains('bi') || e.target.tagName === 'P') {
        if (e.target.children[0].classList.contains('d-none')) {
            e.target.children[0].classList.remove('d-none')
            e.target.children[1].classList.add('d-none')
            e.target.classList.remove('shadow-drop-center')
        } else {
            e.target.children[0].classList.add('d-none')
            e.target.children[1].classList.remove('d-none')
            e.target.classList.add('shadow-drop-center')
        }
    }  
})

container.addEventListener('mouseout', (e) => {
    if (e.target.classList.contains('iconbox')) {
        if (e.target.children[0].classList.contains('d-none')) {
            e.target.children[0].classList.remove('d-none')
            e.target.children[1].classList.add('d-none')
            e.target.classList.remove('shadow-drop-center')
        } else {
            e.target.children[0].classList.add('d-none')
            e.target.children[1].classList.remove('d-none')
            
        }
    }  
})





