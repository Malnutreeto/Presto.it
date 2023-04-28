import * as bootstrap from 'bootstrap'

window.addEventListener('load', (e) => {
    if(document.getElementById('workModal')){
        const workModal = new bootstrap.Modal(document.getElementById('workModal'))
        workModal.toggle()
    }
})




