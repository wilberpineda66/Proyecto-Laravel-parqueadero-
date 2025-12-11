<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://cdn.sstatic.net/Sites/es/img/favicon.ico?v=a8def514be8a">
    <link rel="stylesheet" href="{{ asset('css/informacion.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <title>Información</title>
    <style>
        .nav-link-wrapper a {
            text-decoration: none;
            color: white;
            padding: 10px;
            transition: color 0.3s ease;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
            color: black;
            font-size: 36px;
        }

        .necesitas-algo {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: white;
        }
    </style>
</head>
<body>

<header>
    <div class="logo-container"> 
        <div class="left-side">
            <a href="#"><img src="{{ asset('img/refugiorodante2.png') }}" alt="Logo"></a>
        </div>
        <div class="right-side">
            <h1>REFUGIO RODANTE</h1>
        </div>

        <div class="menu-toggle" id="menu-toggle">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
    </div>

    <nav id="nav-menu" class="nav-links">
        <div class="nav-link-wrapper"><a href="/inde">Inicio</a></div>
        <div class="nav-link-wrapper"><a href="/informacion">Más información</a></div>
        <div class="nav-link-wrapper"><a href="/quienessomos">Quienes Somos</a></div>
        <div class="nav-link-wrapper"><a href="/login">Iniciar Sesión</a></div>
    </nav>
</header>

<div class="necesitas-algo"> 
    <div class="informacion">
        <div class="info">
            <h2 style="color: #373b41;">¿Necesitas algo?</h2>
            <p>Mantengamos el contacto.<br> Escríbenos y te responderemos tan pronto como sea posible.</p>
            <img src="{{ asset('img/foto-informacion.png') }}" alt="Soporte">
        </div>

        <div class="formulario">
            <form action="https://formsubmit.co/pwilber797@gmail.com" method="POST">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" placeholder="Escribe tu nombre" required>

                <label for="telefono">Teléfono</label>
                <input type="tel" id="telefono" name="telefono" placeholder="Escribe tu teléfono" required>

                <label for="correo">Correo electrónico</label>
                <input type="email" id="correo" name="correo" placeholder="Escribe tu correo electrónico" required>

                <label for="categoria">Categoría</label>
                <select id="categoria" name="categoria" required>
                    <option value="">Selecciona...</option>
                    <option value="soporte">Soporte</option>
                    <option value="consulta">Consulta</option>
                    <option value="otro">Otro</option>
                </select>

                <label for="mensaje">Tu mensaje</label>
                <textarea id="mensaje" name="mensaje" placeholder="Escribe tu mensaje" required></textarea>

                <div class="checkbox-container">
                    <input type="checkbox" id="politicas" required>
                    <label for="politicas" class="politicas" style="font-size: 14px; color: #373b41;">
                        Acepta nuestras <a style="color: #33595e;" href="/termino-y-condiciones">políticas de tratamiento de datos</a>
                    </label>
                </div>
                <br>

                <input type="hidden" name="_captcha" value="false">
                <input type="hidden" name="_next" value="http://localhost:8000/informacion">

                <button type="submit">Enviar mensaje</button>
            </form>
        </div>
    </div>
</div>
<br><br><br><br>



 <div class="encuentranos"> 
    <h1> Encuentranos en </h1>
 </div>

<!-- Contenedor principal que tendrá el mapa y la búsqueda en disposición horizontal -->
<div class="main-container">
    <!-- Contenedor de la barra de búsqueda -->
    <div class="search-container">
        <div class="search-box">
            <input type="text" id="searchInput" placeholder="En donde buscas un parking">
            <button id="searchButton">
                <i class="bi bi-search" style="color: #33595e;" alt="Buscar"></i>
            </button>
        </div>
        <div id="searchResults" class="search-results">
        </div>
    </div>

    <!-- Contenedor del mapa -->
    <div id="map" style="height: 450px;"></div>
</div>

<style>
    .encuentranos h1 {
        text-align: center;
        margin: 20px 0;
        text-align: left;
        margin-left: 30px;
        color: black;
        font-size: 45px;
        
    }

    /* Contenedor principal para mapa y búsqueda */
    .main-container {
        display: flex;
        flex-direction: row;
        gap: 20px;
        margin: 20px;
        width: 100%;
    }

    /* Estilos para la barra de búsqueda */
    .search-container {
        position: relative;
        width: 300px;
        height: 450px;
        margin-top: 0;
        flex-shrink: 0;
        padding: 15px;
        border-radius: 5px;
    
    }

    .search-box {
        display: flex;
        align-items: center;
        background: white;
        border-radius: 4px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        padding: 5px 10px;
        margin-bottom: 15px;
        width: 290px;
        margin-left: -10px;
    }

    .search-box input {
        flex: 1;
        border: none;
        padding: 10px;
        font-size: 16px;
        outline: none;
        width: 250px;
    }

    .search-box button {
        background: none;
        border: none;
        cursor: pointer;
        padding: 5px;
    }

    .search-box button img {
        width: 20px;
        height: 20px;
        opacity: 0.6;
    }

    .search-box button:hover img {
        opacity: 1;
    }

    /* Estilos para resultados de búsqueda */
    .search-results {
        background: white;
        max-height: 360px;
        overflow-y: auto;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        border-radius: 4px;
        display: none; /* Se mostrará sólo cuando haya resultados */
    }

    .search-results.active {
        display: block;
    }

    .result-item {
        padding: 10px 15px;
        cursor: pointer;
        border-bottom: 1px solid #eee;
    }

    .result-item:hover {
        background-color: #f0f0f0;
    }

    /* Estilos para el mapa */
    #map {
        flex-grow: 1;
        border-radius: 5px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }
</style>
 




<?php
$parqueaderos = [
    ["nombre" => "Parqueadero Laureles", "latitud" => 6.227, "longitud" => -75.591],
    ["nombre" => "Parqueadero Centro", "latitud" => 6.250, "longitud" => -75.563],
    ["nombre" => "Parqueadero Bello", "latitud" => 6.363, "longitud" => -75.536],
    ["nombre" => "Parqueadero Poblado", "latitud" => 6.205, "longitud" => -75.570],
    ["nombre" => "Parqueadero Aranjuez", "latitud" => 6.287, "longitud" => -75.545],
    ["nombre" => "Parqueadero Sabaneta", "latitud" => 6.168, "longitud" => -75.606]
];
?>

<!-- Incluir Leaflet CSS y JS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

<script>
    // Función para inicializar el mapa
    function initMap() {
        // Crear el mapa con un centro provisional
        var map = L.map('map').setView([6.2442, -75.5812], 13); // Medellín como valor por defecto
        
        // Variable para almacenar todos los marcadores
        var allMarkers = [];

        // Cargar capa de mapa (utilizando OpenStreetMap)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Marcadores de parqueaderos desde PHP
        var parqueaderos = <?php echo json_encode($parqueaderos); ?>;

        parqueaderos.forEach(function(p) {
            var marker = L.marker([parseFloat(p.latitud), parseFloat(p.longitud)])
                .addTo(map)
                .bindPopup(p.nombre);
                
            // Guardar referencia al marcador junto con los datos
            allMarkers.push({
                marker: marker,
                data: p
            });
        });

        // Geolocalización del usuario
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var userLocation = [position.coords.latitude, position.coords.longitude];

                // Centrar el mapa en la ubicación del usuario
                map.setView(userLocation, 13);

                // Marcador azul para el usuario
                L.marker(userLocation, {
                    icon: L.icon({
                        iconUrl: 'https://unpkg.com/leaflet@1.7.1/dist/images/marker-icon-2x.png',
                        iconSize: [25, 41],
                        iconAnchor: [12, 41],
                        popupAnchor: [1, -34],
                        shadowUrl: 'https://unpkg.com/leaflet@1.7.1/dist/images/marker-shadow.png',
                        shadowSize: [41, 41]
                    })
                }).addTo(map).bindPopup("Tu ubicación");
            }, function() {
                console.log("No se pudo obtener tu ubicación.");
            });
        }

        // Implementar la funcionalidad de búsqueda
        document.getElementById('searchButton').addEventListener('click', function() {
            performSearch();
        });

        document.getElementById('searchInput').addEventListener('keyup', function(e) {
            if (e.key === 'Enter') {
                performSearch();
            }
            
            // Mostrar sugerencias mientras escribe
            var searchTerm = this.value.toLowerCase();
            if (searchTerm.length > 2) {
                showSuggestions(searchTerm);
            } else {
                document.getElementById('searchResults').innerHTML = '';
                document.getElementById('searchResults').classList.remove('active');
            }
        });

        function showSuggestions(searchTerm) {
            var resultsContainer = document.getElementById('searchResults');
            resultsContainer.innerHTML = '';
            
            var found = false;
            
            parqueaderos.forEach(function(p) {
                if (p.nombre.toLowerCase().includes(searchTerm)) {
                    addResultItem(p);
                    found = true;
                }
            });
            
            if (found) {
                resultsContainer.classList.add('active');
            } else {
                resultsContainer.classList.remove('active');
            }
        }

        function performSearch() {
            var searchTerm = document.getElementById('searchInput').value.toLowerCase();
            var resultsContainer = document.getElementById('searchResults');
            
            resultsContainer.innerHTML = '';
            
            if (searchTerm.trim() === '') {
                resultsContainer.classList.remove('active');
                return;
            }
            
            var found = false;
            
            // Filtrar parqueaderos según el término de búsqueda
            parqueaderos.forEach(function(p) {
                if (p.nombre.toLowerCase().includes(searchTerm)) {
                    addResultItem(p);
                    found = true;
                }
            });
            
            if (found) {
                resultsContainer.classList.add('active');
            } else {
                resultsContainer.innerHTML = '<div class="result-item">No se encontraron resultados.</div>';
                resultsContainer.classList.add('active');
            }
        }

        function addResultItem(parqueadero) {
            var resultItem = document.createElement('div');
            resultItem.className = 'result-item';
            resultItem.textContent = parqueadero.nombre;
            
            // Al hacer clic en un resultado, centrar el mapa en ese parqueadero
            resultItem.addEventListener('click', function() {
                map.setView([parseFloat(parqueadero.latitud), parseFloat(parqueadero.longitud)], 16);
                
                // Buscar y abrir el popup del marcador correspondiente
                allMarkers.forEach(function(m) {
                    if (m.data.nombre === parqueadero.nombre) {
                        m.marker.openPopup();
                    }
                });
                
                // Ocultar resultados y actualizar el input
                document.getElementById('searchInput').value = parqueadero.nombre;
                document.getElementById('searchResults').innerHTML = '';
                document.getElementById('searchResults').classList.remove('active');
            });
            
            document.getElementById('searchResults').appendChild(resultItem);
        }
    }

    // Inicializar el mapa al cargar la página
    document.addEventListener('DOMContentLoaded', function() {
        initMap();
    });
</script>








<footer class="footer">
    <div class="container">
        <div class="logo">
            <img src="{{ asset('img/refugiorodante2.png') }}" alt="Parking Logo">
        </div>
        <div class="content">
            <div class="ubicacion">
                <h3>Ubicación</h3>
                <p><img src="{{ asset('img/maps.png') }}" alt="Ubicación" class="icon"> Cra 14 No. 89-48 (Of. 202)</p>
                <p><img src="{{ asset('img/maps.png') }}" alt="Ciudad" class="icon"> Bogotá - Colombia</p>
            </div>

            <div class="contact">
                <h3>Contacto</h3>
                <p><img src="{{ asset('img/celular.png') }}" alt="PBX" class="icon"> <span> PBX: </span> +57 (1) 519 00 77</p>
                <p><img src="{{ asset('img/celular.png') }}" alt="Servicio al cliente" class="icon"> <span>Servicio al cliente:</span> +57 323 449 9666</p>
                <p><img src="{{ asset('img/correo.png') }}" alt="Correo" class="icon"> <span>Correo:</span> <a href="mailto:servicioalcliente@parking.net.co">servicioalcliente@gmail.com </a></p>
            </div>

            <div class="legal">
                <h3>Legal</h3>
                <p><img src="{{ asset('img/icono doc.png') }}" class="icon"> <a href="/termino-y-condiciones">Término y condiciones política de privacidad</a></p>
                <p><img src="{{ asset('img/icono doc.png') }}" alt="Cumplimiento" class="icon"> <a href="#">Cumplimiento</a></p>
            </div>

            <div class="social">
                <a href="https://web.facebook.com/gaming/play/?store_visit_source=gaming_tab"><img src="{{ asset('img/facebook.png') }}" alt="Facebook"></a>
                <a href="https://www.instagram.com/"><img src="{{ asset('img/instagram.png') }}" alt="Instagram"></a>
            </div>
        </div>

        <div class="copyright">
            <p style="color: black;">©2020 Parking - Todos los derechos reservados</p>
        </div>
    </div>
</footer>

<script src="{{ asset('js/bilboard.js') }}"></script>

</body>
</html>