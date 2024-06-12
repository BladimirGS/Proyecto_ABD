/*===== SHOW NAVBAR  =====*/ 
const showNavbar = (toggleId, navId, bodyId, headerId) =>{
    const toggle = document.getElementById(toggleId),
    nav = document.getElementById(navId),
    bodypd = document.getElementById(bodyId),
    headerpd = document.getElementById(headerId)

    // Validate that all variables exist
    if(toggle && nav && bodypd && headerpd){
        toggle.addEventListener('click', ()=>{
            // show navbar
            nav.classList.toggle('show')
            // add padding to body
            bodypd.classList.toggle('body-pd')
            // add padding to header
            headerpd.classList.toggle('body-pd')
        })
    }
}

showNavbar('header-toggle','nav-bar','body-pd','header')

document.addEventListener("DOMContentLoaded", function() {
    // Verificar si existe un elemento con el ID 'alert'
    var alertElement = document.getElementById('alert');
    
    // Si el elemento existe, esperar 5 segundos y luego eliminarlo
    if (alertElement) {
        setTimeout(function() {
            alertElement.remove();
        }, 5000); // 5000 milisegundos = 5 segundos
    }
});
