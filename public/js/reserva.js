// Variables globales
let reservaEnEdicion = null;
let modoEdicion = false;
let datosCompletos = {}; // Para almacenar todos los datos del formulario

// Función para mostrar el formulario modal de nueva reserva
function mostrarFormularioReserva() {
  // Limpiar formulario
  document.getElementById('formNuevaReserva').reset();
  
  // Establecer valores por defecto y configurar fecha actual
  const ahora = new Date();
  const fechaHoraFormateada = ahora.toISOString().slice(0, 16);
  document.getElementById('fechaEntrada').value = fechaHoraFormateada;
  
  // Mostrar el modal (ahora cargado desde PHP)
  document.getElementById('modalNuevaReserva').style.display = 'block';
  
  // Establecer modo
  modoEdicion = false;
  reservaEnEdicion = null;
  
  // Actualizar el título y botón
  document.getElementById('tituloFormulario').textContent = 'Nueva Reserva';
  document.getElementById('btnGuardarReserva').textContent = 'Guardar Reserva';
  
  // Enfocar el primer campo
  document.getElementById('nombre').focus();
}

// Función para abrir el formulario modal en modo edición
function abrirFormularioEdicionReserva(btnEditar) {
  const fila = btnEditar.closest('tr');
  reservaEnEdicion = fila;
  
  // Obtener el ID de la reserva (para recuperar todos los datos)
  const reservaId = fila.dataset.reservaId;
  const datosReserva = datosCompletos[reservaId];
  
  if (datosReserva) {
    // Llenar el formulario con todos los datos almacenados
    document.getElementById('nombre').value = datosReserva.nombre;
    document.getElementById('telefono').value = datosReserva.telefono;
    document.getElementById('correo').value = datosReserva.correo || '';
    document.getElementById('tipoVehiculo').value = datosReserva.tipoVehiculo;
    document.getElementById('placa').value = datosReserva.placa;
    document.getElementById('espacio').value = datosReserva.espacio;
    document.getElementById('fechaEntrada').value = datosReserva.fechaEntrada;
    document.getElementById('duracionTiempo').value = datosReserva.duracionTiempo;
    document.getElementById('duracionUnidad').value = datosReserva.duracionUnidad;
    document.getElementById('estadoReserva').value = datosReserva.estado;
  } else {
    // Si no hay datos completos (para compatibilidad), obtener lo que hay en la tabla
    const celdas = fila.querySelectorAll('td');
    const usuario = celdas[0].textContent.trim();
    const placa = celdas[1].textContent.trim();
    const espacio = celdas[2].textContent.trim();
    const horaEntrada = celdas[3].textContent.trim();
    const horaSalida = celdas[4].textContent.trim();
    const estado = celdas[5].querySelector('.badge').textContent.trim();
    
    // Llenar el formulario con datos básicos
    document.getElementById('nombre').value = usuario;
    document.getElementById('placa').value = placa;
    document.getElementById('espacio').value = espacio;
    document.getElementById('estadoReserva').value = estado;
    
    // Valores por defecto para los campos que no están en la tabla
    document.getElementById('telefono').value = '';
    document.getElementById('correo').value = '';
    document.getElementById('tipoVehiculo').value = 'Automóvil';
    document.getElementById('duracionTiempo').value = '8';
    document.getElementById('duracionUnidad').value = 'horas';
    
    // Convertir la hora de entrada a fecha-hora
    const fechaActual = new Date();
    const partes = horaEntrada.match(/(\d+):(\d+)\s+(AM|PM)/i);
    if (partes) {
      let horas = parseInt(partes[1]);
      const minutos = parseInt(partes[2]);
      const periodo = partes[3].toUpperCase();
      
      if (periodo === 'PM' && horas < 12) horas += 12;
      if (periodo === 'AM' && horas === 12) horas = 0;
      
      fechaActual.setHours(horas, minutos, 0);
      document.getElementById('fechaEntrada').value = fechaActual.toISOString().slice(0, 16);
    }
  }
  
  // Configurar el formulario para edición
  document.getElementById('tituloFormulario').textContent = 'Editar Reserva';
  document.getElementById('btnGuardarReserva').textContent = 'Guardar Cambios';
  
  // Mostrar el modal
  document.getElementById('modalNuevaReserva').style.display = 'block';
  
  // Establecer modo
  modoEdicion = true;
  
  // Enfocar el primer campo
  document.getElementById('nombre').focus();
}

// Función para cerrar el formulario modal
function cerrarFormularioReserva() {
  document.getElementById('modalNuevaReserva').style.display = 'none';
}

// Generar ID único para cada reserva
function generarId() {
  return 'reserva-' + Date.now() + '-' + Math.floor(Math.random() * 1000);
}

// Función para guardar la reserva (crear nueva o actualizar existente)
function guardarNuevaReserva(event) {
  event.preventDefault();
  
  // Obtener los valores del formulario (todos los campos)
  const nombre = document.getElementById('nombre').value;
  const telefono = document.getElementById('telefono').value;
  const correo = document.getElementById('correo').value;
  const tipoVehiculo = document.getElementById('tipoVehiculo').value;
  const placa = document.getElementById('placa').value;
  const espacio = document.getElementById('espacio').value;
  const fechaEntrada = document.getElementById('fechaEntrada').value;
  const duracionTiempo = document.getElementById('duracionTiempo').value;
  const duracionUnidad = document.getElementById('duracionUnidad').value;
  const estado = document.getElementById('estadoReserva').value;
  
  // Calcular fecha/hora de salida basada en la duración
  const fechaEntradaObj = new Date(fechaEntrada);
  const fechaSalidaObj = new Date(fechaEntradaObj);
  
  if (duracionUnidad === 'horas') {
    fechaSalidaObj.setHours(fechaSalidaObj.getHours() + parseInt(duracionTiempo));
  } else if (duracionUnidad === 'dias') {
    fechaSalidaObj.setDate(fechaSalidaObj.getDate() + parseInt(duracionTiempo));
  }
  
  // Formatear las horas para mostrar en la tabla
  const horaEntrada = formatearHora(fechaEntradaObj);
  const horaSalida = formatearHora(fechaSalidaObj);
  
  // Guardar todos los datos del formulario
  const datosReserva = {
    nombre,
    telefono,
    correo,
    tipoVehiculo,
    placa,
    espacio,
    fechaEntrada,
    duracionTiempo,
    duracionUnidad,
    estado
  };
  
  // Definir la clase CSS según el estado seleccionado
  let badgeClass = '';
  switch(estado) {
    case 'Activa':
      badgeClass = 'active';
      break;
    case 'Pendiente':
      badgeClass = 'pending';
      break;
    case 'Completada':
      badgeClass = 'completed';
      break;
    case 'Cancelada':
      badgeClass = 'cancelled';
      break;
  }
  
  if (modoEdicion && reservaEnEdicion) {
    // Actualizar la fila existente
    const reservaId = reservaEnEdicion.dataset.reservaId;
    datosCompletos[reservaId] = datosReserva;
    
    const celdas = reservaEnEdicion.querySelectorAll('td');
    celdas[0].textContent = nombre;
    celdas[1].textContent = placa;
    celdas[2].textContent = espacio;
    celdas[3].textContent = horaEntrada;
    celdas[4].textContent = horaSalida;
    celdas[5].innerHTML = `<span class="badge ${badgeClass}">${estado}</span>`;
    
    // Si el estado es completado, cambiar el botón de editar por el de ver
    if (estado === 'Completada') {
      celdas[6].innerHTML = `<button class="btn-icon"><i class="bi bi-eye"></i></button>`;
    } else {
      celdas[6].innerHTML = `
        <button class="btn-icon" onclick="abrirFormularioEdicionReserva(this)"><i class="bi bi-pencil"></i></button>
        <button class="btn-icon" onclick="eliminarReserva(this)"><i class="bi bi-trash"></i></button>
      `;
    }
    
    mostrarNotificacion('Reserva actualizada correctamente');
  } else {
    // Crear nueva fila para la tabla
    const tabla = document.querySelector('table tbody') || document.querySelector('table');
    const nuevaFila = document.createElement('tr');
    
    // Generar ID único para esta reserva
    const reservaId = generarId();
    nuevaFila.dataset.reservaId = reservaId;
    
    // Guardar en el almacén de datos completos
    datosCompletos[reservaId] = datosReserva;
    
    nuevaFila.innerHTML = `
      <td>${nombre}</td>
      <td>${placa}</td>
      <td>${espacio}</td>
      <td>${horaEntrada}</td>
      <td>${horaSalida}</td>
      <td><span class="badge ${badgeClass}">${estado}</span></td>
      <td>
        ${estado === 'Completada' ? 
          `<button class="btn-icon"><i class="bi bi-eye"></i></button>` : 
          `<button class="btn-icon" onclick="abrirFormularioEdicionReserva(this)"><i class="bi bi-pencil"></i></button>
          <button class="btn-icon" onclick="eliminarReserva(this)"><i class="bi bi-trash"></i></button>`
        }
      </td>
    `;
    
    // Si hay tbody, agregar a tbody, sino a la tabla directamente
    if (tabla.tagName === 'TBODY') {
      tabla.appendChild(nuevaFila);
    } else {
      const primerRegistro = tabla.querySelector('tr:nth-child(2)');
      if (primerRegistro) {
        tabla.insertBefore(nuevaFila, primerRegistro);
      } else {
        tabla.appendChild(nuevaFila);
      }
    }
    
    // Destacar la nueva fila
    nuevaFila.classList.add('nueva-reserva');
    setTimeout(() => {
      nuevaFila.classList.remove('nueva-reserva');
    }, 2000);
    
    mostrarNotificacion('Nueva reserva creada correctamente');
  }
  
  // Cerrar el modal
  cerrarFormularioReserva();
}

// Función para eliminar una reserva
function eliminarReserva(btnEliminar) {
  const fila = btnEliminar.closest('tr');
  
  // Mostrar confirmación
  if (confirm('¿Está seguro de que desea eliminar esta reserva?')) {
    // Eliminar registro del almacenamiento si existe
    const reservaId = fila.dataset.reservaId;
    if (reservaId && datosCompletos[reservaId]) {
      delete datosCompletos[reservaId];
    }
    
    // Eliminar la fila de la tabla con una animación
    fila.style.transition = 'all 0.3s ease';
    fila.style.opacity = '0';
    fila.style.height = '0';
    
    setTimeout(() => {
      fila.remove();
      mostrarNotificacion('Reserva eliminada correctamente');
    }, 300);
  }
}

// Función para formatear hora (12 horas AM/PM)
function formatearHora(fecha) {
  const horas = fecha.getHours();
  const minutos = fecha.getMinutes();
  const ampm = horas >= 12 ? 'PM' : 'AM';
  const horasFormateadas = horas % 12 === 0 ? 12 : horas % 12;
  
  return `${horasFormateadas}:${minutos.toString().padStart(2, '0')} ${ampm}`;
}

// Función para mostrar una notificación
function mostrarNotificacion(mensaje, tipo = 'success') {
  // Crear elemento de notificación
  const notificacion = document.createElement('div');
  notificacion.className = `notificacion ${tipo}`;
  notificacion.textContent = mensaje;
  
  // Agregar al DOM
  document.body.appendChild(notificacion);
  
  // Mostrar y luego ocultar después de un tiempo
  setTimeout(() => {
    notificacion.classList.add('mostrar');
    
    setTimeout(() => {
      notificacion.classList.remove('mostrar');
      setTimeout(() => {
        document.body.removeChild(notificacion);
      }, 300);
    }, 3000);
  }, 10);
}

document.addEventListener('DOMContentLoaded', function () {
  // Configurar botones de edición existentes
  const botonesEditar = document.querySelectorAll('.btn-icon .bi-pencil');
  botonesEditar.forEach(boton => {
    const btnContenedor = boton.parentElement;
    btnContenedor.onclick = function () {
      abrirFormularioEdicionReserva(this);
    };
  });

  // Configurar botones de eliminación
  const botonesEliminar = document.querySelectorAll('.btn-icon .bi-trash');
  botonesEliminar.forEach(boton => {
    const btnContenedor = boton.parentElement;
    btnContenedor.onclick = function () {
      eliminarReserva(this);
    };
  });

  // Crear y agregar el botón "Nueva Reserva"
  const tabla = document.querySelector('table');
  if (tabla) {
    const contenedorTabla = tabla.parentElement;

    const btnNuevo = document.createElement('button');
    btnNuevo.className = 'btn-nueva-reserva';
    btnNuevo.textContent = '+ Nueva Reserva';
    btnNuevo.onclick = mostrarFormularioReserva;

    contenedorTabla.insertBefore(btnNuevo, tabla);

    // Inicializar las filas existentes con IDs únicos y guardar sus datos
    document.querySelectorAll('table tr:not(:first-child)').forEach(fila => {
      const reservaId = generarId();
      fila.dataset.reservaId = reservaId;

      const celdas = fila.querySelectorAll('td');
      if (celdas.length >= 6) {
        const nombre = celdas[0].textContent.trim();
        const placa = celdas[1].textContent.trim();
        const espacio = celdas[2].textContent.trim();
        const estado = celdas[5].querySelector('.badge').textContent.trim();

        datosCompletos[reservaId] = {
          nombre,
          telefono: '',
          correo: '',
          tipoVehiculo: 'Automóvil',
          placa,
          espacio,
          fechaEntrada: '',
          duracionTiempo: '8',
          duracionUnidad: 'horas',
          estado
        };
      }
    });
  }
});


