import 'bootstrap';

// let cards = document.querySelector('.big-container');

// function spanToggler(spans, domElment, actions = true){
//     spans.forEach((element) => {
//         if(actions){
//             domElment.appendChild(element)
//         }else{
//             element.remove()
//             domElment.appendChild(element)
//         }
//     } )
// }

// cards.addEventListener('mouseover', (event) =>{
//     let target = event.target
//     if(target.classList.contains('card')){
//         let face = target.querySelector('.face1')

//         face.classList.remove('card-border-animation')
//         target.classList.add('card-border-animation')
        
//         let spans = target.querySelectorAll('SPAN')

//         spanToggler(Array.from(spans), target)

//         target.addEventListener('mouseout', (event) => {
//             face.classList.add('card-border-animation')
//             target.classList.remove('card-border-animation')
//             spanToggler(Array.from(spans), target, false)
//         })

//     }
// })
