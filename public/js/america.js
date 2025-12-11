// Manejo de navegación de pestañas
document.addEventListener('DOMContentLoaded', function() {
    // Referencia a los botones de navegación
    const botonInfo = document.getElementById('botonInfo');
    const botonEspacios = document.getElementById('botonEspacios');
    const botonReservar = document.getElementById('botonReservar');
    
    // Función para manejar la navegación
    function activarPestaña(botonActivo) {
        // Quitar clase activo de todos los botones
        const botones = document.querySelectorAll('.botonNav');
        botones.forEach(btn => btn.classList.remove('activo'));
        
        // Agregar clase activo al botón seleccionado
        botonActivo.classList.add('activo');
        
        // Aquí se podría agregar lógica para cambiar el contenido según la pestaña
    }
    
    // Event listeners para los botones
    botonInfo.addEventListener('click', function() {
        activarPestaña(this);
        // Mostrar contenido de información (ya visible por defecto)
    });
    
    botonEspacios.addEventListener('click', function() {
        activarPestaña(this);
        // Aquí se cargaría o mostraría el contenido de espacios
        console.log('Mostrando sección de Espacios');
    });
    
    botonReservar.addEventListener('click', function() {
        activarPestaña(this);
        // Aquí se cargaría o mostraría el contenido de reservas
        console.log('Mostrando sección de Reservas');
    });
    
    // Botón de acción "Espacios Disponibles"
    const botonAccion = document.querySelector('.botonAccion');
    botonAccion.addEventListener('click', function() {
        // Simulación de acción al hacer clic en el botón
        activarPestaña(botonEspacios);
        console.log('Redirigiendo a sección de Espacios Disponibles');
    });
    
    // Botón volver
    const botonVolver = document.querySelector('.botonVolver');
    botonVolver.addEventListener('click', function() {
        console.log('Volver a la página anterior');
        // Aquí podría ir la lógica para volver atrás
        // history.back(); // Descomenta para implementar la funcionalidad de volver
    });
});


// comun.js - Funcionalidad común para todas las páginas
document.addEventListener('DOMContentLoaded', function() {
    // Botón volver
    const botonVolver = document.querySelector('.botonVolver');
    if (botonVolver) {
        botonVolver.addEventListener('click', function() {
            history.back();
        });
    }
});