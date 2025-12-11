document.addEventListener('DOMContentLoaded', function() {
    // Referencia al botón de reservar espacio
    const botonReservarEspacio = document.getElementById('botonReservarEspacio');
    
    // Variable para almacenar el espacio seleccionado actualmente
    let espacioSeleccionado = null;
    
    // Definir los espacios para cada nivel
    const espaciosPorNivel = {
        'Nivel 1': {
            fila1: [
                { id: 'A-01', estado: 'ocupado' },
                { id: 'A-02', estado: 'disponible' },
                { id: 'A-03', estado: 'ocupado' },
                { id: 'A-04', estado: 'disponible' },
                { id: 'A-05', estado: 'disponible' },
                { id: 'A-06', estado: 'ocupado' },
                { id: 'B-01', estado: 'ocupado' },
                { id: 'B-02', estado: 'disponible' },
                { id: 'B-03', estado: 'disponible' }
            ],
            fila2: [
                { id: 'B-04', estado: 'ocupado' },
                { id: 'B-05', estado: 'disponible' },
                { id: 'B-06', estado: 'ocupado' },
                { id: 'C-01', estado: 'disponible' },
                { id: 'C-02', estado: 'disponible' },
                { id: 'C-03', estado: 'ocupado' },
                { id: 'C-04', estado: 'disponible' },
                { id: 'C-05', estado: 'ocupado' },
                { id: 'C-06', estado: 'disponible' }
            ]
        },
        'Nivel 2': {
            fila1: [
                { id: 'D-01', estado: 'disponible' },
                { id: 'D-02', estado: 'ocupado' },
                { id: 'D-03', estado: 'disponible' },
                { id: 'D-04', estado: 'ocupado' },
                { id: 'D-05', estado: 'disponible' },
                { id: 'D-06', estado: 'disponible' },
                { id: 'E-01', estado: 'ocupado' },
                { id: 'E-02', estado: 'disponible' },
                { id: 'E-03', estado: 'ocupado' }
            ],
            fila2: [
                { id: 'E-04', estado: 'disponible' },
                { id: 'E-05', estado: 'ocupado' },
                { id: 'E-06', estado: 'disponible' },
                { id: 'F-01', estado: 'ocupado' },
                { id: 'F-02', estado: 'disponible' },
                { id: 'F-03', estado: 'ocupado' },
                { id: 'F-04', estado: 'disponible' },
                { id: 'F-05', estado: 'ocupado' },
                { id: 'F-06', estado: 'disponible' }
            ]
        },
        'Nivel 3': {
            fila1: [
                { id: 'G-01', estado: 'ocupado' },
                { id: 'G-02', estado: 'disponible' },
                { id: 'G-03', estado: 'ocupado' },
                { id: 'G-04', estado: 'disponible' },
                { id: 'G-05', estado: 'ocupado' },
                { id: 'G-06', estado: 'disponible' },
                { id: 'H-01', estado: 'ocupado' },
                { id: 'H-02', estado: 'disponible' },
                { id: 'H-03', estado: 'ocupado' }
            ],
            fila2: [
                { id: 'H-04', estado: 'disponible' },
                { id: 'H-05', estado: 'ocupado' },
                { id: 'H-06', estado: 'disponible' },
                { id: 'I-01', estado: 'ocupado' },
                { id: 'I-02', estado: 'disponible' },
                { id: 'I-03', estado: 'ocupado' },
                { id: 'I-04', estado: 'disponible' },
                { id: 'I-05', estado: 'ocupado' },
                { id: 'I-06', estado: 'disponible' }
            ]
        }
    };
    
    // Función para cargar los espacios de un nivel
    function cargarEspaciosNivel(nivel) {
        const mapaEspacios = document.querySelector('.mapaEspacios');
        mapaEspacios.innerHTML = ''; // Limpiar espacios actuales
        
        // Obtener los espacios del nivel
        const espaciosNivel = espaciosPorNivel[nivel];
        
        // Crear fila 1
        const fila1 = document.createElement('div');
        fila1.className = 'filaEspacios';
        
        espaciosNivel.fila1.forEach(espacio => {
            const espacioElement = document.createElement('div');
            espacioElement.className = `espacio ${espacio.estado}`;
            espacioElement.id = espacio.id;
            espacioElement.textContent = espacio.id;
            
            // Si está disponible, agregar evento de clic
            if (espacio.estado === 'disponible') {
                espacioElement.addEventListener('click', function() {
                    seleccionarEspacio(this);
                });
            }
            
            fila1.appendChild(espacioElement);
        });
        
        mapaEspacios.appendChild(fila1);
        
        // Crear fila 2
        const fila2 = document.createElement('div');
        fila2.className = 'filaEspacios';
        
        espaciosNivel.fila2.forEach(espacio => {
            const espacioElement = document.createElement('div');
            espacioElement.className = `espacio ${espacio.estado}`;
            espacioElement.id = espacio.id;
            espacioElement.textContent = espacio.id;
            
            // Si está disponible, agregar evento de clic
            if (espacio.estado === 'disponible') {
                espacioElement.addEventListener('click', function() {
                    seleccionarEspacio(this);
                });
            }
            
            fila2.appendChild(espacioElement);
        });
        
        mapaEspacios.appendChild(fila2);
    }
    
    // Función para manejar la selección de nivel
    function seleccionarNivel(nivelSeleccionado) {
        // Quitar clase activo de todos los botones de nivel
        const botonesNivel = document.querySelectorAll('.botonNivel');
        botonesNivel.forEach(btn => btn.classList.remove('activo'));
        
        // Agregar clase activo al nivel seleccionado
        nivelSeleccionado.classList.add('activo');
        
        // Cargar los espacios correspondientes al nivel seleccionado
        cargarEspaciosNivel(nivelSeleccionado.textContent);
        
        // Reiniciar la selección de espacio cuando se cambia de nivel
        if (espacioSeleccionado) {
            espacioSeleccionado = null;
            botonReservarEspacio.classList.add('deshabilitado');
            botonReservarEspacio.setAttribute('href', '#');
        }
    }
    
    // Función para seleccionar un espacio
    function seleccionarEspacio(espacio) {
        // Si ya hay un espacio seleccionado, quitarle la clase
        const espacioAnterior = document.querySelector('.espacio.seleccionado');
        if (espacioAnterior) {
            espacioAnterior.classList.remove('seleccionado');
        }
        
        // Verificar si es el mismo espacio (deseleccionar)
        if (espacioAnterior === espacio) {
            espacioSeleccionado = null;
            botonReservarEspacio.classList.add('deshabilitado');
            botonReservarEspacio.setAttribute('href', '#');
        } else {
            // Seleccionar nuevo espacio
            espacio.classList.add('seleccionado');
            espacioSeleccionado = espacio;
            botonReservarEspacio.classList.remove('deshabilitado');
            
            // Actualizar el enlace del botón de reserva con el espacio seleccionado
            // Pasamos solo el ID del espacio mediante sessionStorage en lugar de como parámetro URL
            botonReservarEspacio.setAttribute('href', 'index.php?pagina=reservaamerica');
            
            // Guardar el ID del espacio seleccionado en sessionStorage
            sessionStorage.setItem('espacioSeleccionado', espacio.id);
        }
    }
    
    // Event listeners para los botones de nivel
    const botonesNivel = document.querySelectorAll('.botonNivel');
    botonesNivel.forEach(boton => {
        boton.addEventListener('click', function() {
            seleccionarNivel(this);
        });
    });
    
    // Inicialmente deshabilitar el botón de reserva
    if (botonReservarEspacio) {
        botonReservarEspacio.classList.add('deshabilitado');
        botonReservarEspacio.setAttribute('href', '#');
        
        // Evitar que se haga clic en el botón si no hay espacio seleccionado
        botonReservarEspacio.addEventListener('click', function(e) {
            if (!espacioSeleccionado) {
                e.preventDefault();
                alert('Por favor, seleccione un espacio disponible antes de reservar.');
            }
        });
    }
    
    // Cargar espacios del nivel inicial (Nivel 1)
    cargarEspaciosNivel('Nivel 1');
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