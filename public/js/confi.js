let celdaActual = null;

function editarFila(boton) {
  // Encuentra la celda que se va a editar
  let fila = boton.parentElement.parentElement;
  celdaActual = fila.cells[1];
  document.getElementById("valor").value = celdaActual.textContent;

  // Mostrar el modal
  document.getElementById("modal").style.display = "flex";
}

function cerrarModal() {
  document.getElementById("modal").style.display = "none";
}

function guardarCambios(event) {
  event.preventDefault();
  let nuevoValor = document.getElementById("valor").value;
  celdaActual.textContent = nuevoValor;
  alert("Valor actualizado: " + nuevoValor);
  cerrarModal();
}

function toggleDropdown() {
  document.getElementById("dropdown-menu").classList.toggle("show");
}

window.onclick = function (event) {
  if (!event.target.closest(".user-profile")) {
    const dropdown = document.getElementById("dropdown-menu");
    if (dropdown && dropdown.classList.contains("show")) {
      dropdown.classList.remove("show");
    }
  }
};
