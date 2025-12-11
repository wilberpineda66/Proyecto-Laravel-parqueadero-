const menuToggle = document.getElementById('menu-toggle');
const navMenu = document.getElementById('nav-menu');

menuToggle.addEventListener('click', () => {
    navMenu.classList.toggle('show');
});

  // Código para la funcionalidad de preguntas frecuentes
document.addEventListener('DOMContentLoaded', function() {
    // Funcionalidad para las preguntas frecuentes
    const itemsPreguntas = document.querySelectorAll('.item-pregunta');
    
    itemsPreguntas.forEach(item => {
        const pregunta = item.querySelector('.pregunta');
        
        pregunta.addEventListener('click', () => {
            // Cerrar todos los items abiertos
            itemsPreguntas.forEach(otroItem => {
                if (otroItem !== item && otroItem.classList.contains('activo')) {
                    otroItem.classList.remove('activo');
                }
            });
            
            // Abrir/cerrar el item actual
            item.classList.toggle('activo');
        });
    });
});