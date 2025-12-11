function toggleDropdown() {
    document.getElementById("dropdown-menu").classList.toggle("show");
}

window.onclick = function(event) {
    if (!event.target.closest('.user-profile')) {
        document.getElementById("dropdown-menu").classList.remove("show");
    }
}

function abrirModalReserva() {
    document.getElementById("modalReserva").style.display = "flex";
}

function cerrarModalReserva() {
    document.getElementById("modalReserva").style.display = "none";
}

// Cerrar modal al hacer clic fuera del contenido
window.onclick = function(event) {
    if (event.target == document.getElementById("modalReserva")) {
        cerrarModalReserva();
    }
    if (!event.target.closest('.user-profile')) {
        document.getElementById("dropdown-menu").classList.remove("show");
    }
}

document.getElementById("formReserva").addEventListener("submit", function(event) {
    event.preventDefault();
    // Aquí iría el código para guardar la reserva
    alert("Reserva guardada exitosamente");
    cerrarModalReserva();
});