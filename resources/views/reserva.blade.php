<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Reservas</title>
    <link rel="stylesheet" href=" {{ asset('css/admin.css') }}">
    <link rel="stylesheet" href=" {{ asset('css/reserva.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>

    <!-- Barra lateral de navegación -->
    <div class="sidebar">
        <h2><i class="titulo-sidebar"></i> Refugio Rodante</h2>
        <hr>
        <a href="/admin"><i class="bi bi-house-door"></i> Inicio</a>
        <a href="/usuario"><i class="bi bi-people"></i> Usuarios</a>
        <a href="/reserva" class="active"><i class="bi bi-calendar-check"></i> Reservas</a>
        <a href="/configuracion"><i class="bi bi-gear"></i> Configuración</a>
        <a href="/cerrarsesion"><i class="bi bi-box-arrow-right"></i> Cerrar Sesión</a>

        <div class="bottom-divider"></div>

        <!-- Perfil de usuario -->
        <div class="user-profile" onclick="toggleDropdown()">
            <img src="img/logo-polica.png" alt="Usuario">
            <span>Admin</span>
        </div>
    </div>
    </div>

    <div class="main-content">
        <h1>Bienvenido, Administrador</h1>

        <!-- Reservas -->
        <div class="card" id="reservas">
            <h2>Gestión de Reservas</h2>
            <p>Administra todas las reservas de parqueadero activas y pendientes.</p>

            <div id="modalNuevaReserva" class="modal">
                <div class="modal-contenido">
                    <span class="cerrar-modal" onclick="cerrarFormularioReserva()">&times;</span>
                    <h3 id="tituloFormulario">Nueva Reserva</h3>
                    <form id="formNuevaReserva" onsubmit="guardarNuevaReserva(event)">
                        <div class="campo-formulario">
                            <label for="nombre">Usuario:</label>
                            <input type="text" id="nombre" placeholder="Nombre completo" required>
                        </div>

                        <div class="campo-formulario">
                            <label for="telefono">Teléfono:</label>
                            <input type="tel" id="telefono" placeholder="Número de teléfono" required>
                        </div>

                        <div class="campo-formulario">
                            <label for="correo">Correo Electrónico:</label>
                            <input type="email" id="correo" placeholder="correo@ejemplo.com">
                        </div>

                        <div class="campo-formulario">
                            <label for="tipoVehiculo">Tipo de Vehículo:</label>
                            <select id="tipoVehiculo" required>
                                <option value="">Seleccione tipo</option>
                                <option value="Automóvil">Automóvil</option>
                                <option value="Motocicleta">Motocicleta</option>
                                <option value="Camioneta">Camioneta</option>
                                <option value="Camión">Camión</option>
                            </select>
                        </div>

                        <div class="campo-formulario">
                            <label for="placa">Vehículo (Placa):</label>
                            <input type="text" id="placa" placeholder="Ingrese la placa" required>
                        </div>

                        <div class="campo-formulario">
                            <label for="espacio">Espacio de Parqueo:</label>
                            <select id="espacio" required>
                                <option value="">Seleccione un espacio</option>
                                <option value="A-15">A-15</option>
                                <option value="A-16">A-16</option>
                                <option value="B-22">B-22</option>
                                <option value="B-23">B-23</option>
                                <option value="C-08">C-08</option>
                                <option value="C-09">C-09</option>
                            </select>
                        </div>

                        <div class="campo-formulario">
                            <label for="fechaEntrada">Fecha y Hora de Entrada:</label>
                            <input type="datetime-local" id="fechaEntrada" required>
                        </div>

                        <div class="campo-formulario">
                            <label for="duracionTiempo">Duración:</label>
                            <div class="duracion-container">
                                <input type="number" id="duracionTiempo" min="1" max="24" value="8" required>
                                <select id="duracionUnidad">
                                    <option value="horas">Horas</option>
                                    <option value="dias">Días</option>
                                </select>
                            </div>
                        </div>

                        <div class="campo-formulario">
                            <label for="estadoReserva">Estado:</label>
                            <select id="estadoReserva">
                                <option value="Activa">Activa</option>
                                <option value="Pendiente">Pendiente</option>
                                <option value="Completada">Completada</option>
                                <option value="Cancelada">Cancelada</option>
                            </select>
                        </div>

                        <div class="botones-formulario">
                            <button type="button" onclick="cerrarFormularioReserva()">Cancelar</button>
                            <button type="submit" id="btnGuardarReserva">Guardar Reserva</button>
                        </div>
                    </form>
                </div>
            </div>


            <table>
                <tr>
                    <th>Usuario</th>
                    <th>Vehículo</th>
                    <th>Espacio</th>
                    <th>Hora Entrada</th>
                    <th>Hora Salida</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
                <tr>
                    <td>Carlos Mendoza</td>
                    <td>ABC-123</td>
                    <td>A-15</td>
                    <td>8:00 AM</td>
                    <td>5:00 PM</td>
                    <td><span class="badge active">Activa</span></td>
                    <td>
                        <button class="btn-icon"><i class="bi bi-pencil"></i></button>
                        <button class="btn-icon"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>María López</td>
                    <td>XYZ-789</td>
                    <td>B-22</td>
                    <td>9:15 AM</td>
                    <td>6:30 PM</td>
                    <td><span class="badge active">Activa</span></td>
                    <td>
                        <button class="btn-icon"><i class="bi bi-pencil"></i></button>
                        <button class="btn-icon"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>Juan Pérez</td>
                    <td>DEF-456</td>
                    <td>C-08</td>
                    <td>7:30 AM</td>
                    <td>4:00 PM</td>
                    <td><span class="badge completed">Completada</span></td>
                    <td>
                        <button class="btn-icon"><i class="bi bi-eye"></i></button>
                    </td>
                </tr>
            </table>
        </div>


        
  
     
        <script src="{{ asset('js/reserva.js') }}"></script>



</body>
</html>