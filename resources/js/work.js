'use strict'
console.log("cariato work");
let container = document.querySelector('.container');
let iconboxes = container.querySelectorAll('.iconbox');

window.addEventListener('load', (e) =>{
   setTimeout(() => { 
      iconboxes.forEach((element=>{
         element.children[0].classList.remove('d-none')
         element.children[1].classList.add('d-none')
         element.classList.remove('iconbox-animation')
      }))
   }, 5000)
   iconboxes.forEach((element=>{
      element.children[0].classList.add('d-none')
      element.children[1].classList.remove('d-none')
      element.classList.add('iconbox-animation')
   }))
})


container.addEventListener('mouseover', (e) => {
   if(e.target.classList.contains('iconbox')) { 
      e.target.children[0].classList.add('d-none')
      e.target.children[1].classList.remove('d-none')
   } else if (e.target.classList.contains('row')) {
      iconboxes.forEach((element=>{
         element.children[0].classList.remove('d-none')
         element.children[1].classList.add('d-none')
      }))
   }
})








