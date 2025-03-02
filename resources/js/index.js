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
