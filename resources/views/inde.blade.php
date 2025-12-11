<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Inicio </title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="shortcut icon" href="https://cdn.sstatic.net/Sites/es/img/favicon.ico?v=a8def514be8a">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">



</head>
<style>
    .hero {
        background-image: url(" {{ asset ('img/principal.png') }}");
    }

    .nav-link-wrapper a {
        text-decoration: none;
        /* Quita el subrayado */
        color: white;
        /* Texto blanco */

        padding: 10px;
        transition: color 0.3s ease;
    }
</style>

<body>

    <header>
        <div class="logo-container">
            <div class="left-side">
                <a href=""><img src="img/refugiorodante2.png" alt="Logo"></a>
            </div>
            <div class="right-side">
                <h1>REFUGIO RODANTE</h1>
            </div>

            <!-- Botón de menú hamburguesa -->
            <div class="menu-toggle" id="menu-toggle">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
        </div>

        <!-- Enlaces de navegación -->
        <nav id="nav-menu" class="nav-links">
            <div class="nav-link-wrapper"><a href="/inde">Inicio</a></div>
            <div class="nav-link-wrapper"><a href="/informacion">Más información</a></div>
            <div class="nav-link-wrapper"><a href="/quienessomos">Quienes Somos</a></div>
            <div class="nav-link-wrapper"><a href="/login">Iniciar Sesión</a></div>
        </nav>
    </header>

    <section class="hero">
        <div class="hero-content">
            <h1 style="color: white;">¡Protege tu vehículo con nosotros!</h1>
            <p style="color: white;">Ofrecemos el mejor servicio de parqueadero, seguro, económico y a tu alcance.</p>
            <a href="/login" class="btn">Reserva tu Espacio</a>
        </div>
    </section>

    <!-- ================================1,2,3================================== -->

    <div class="banner-ventajas">
        <div class="ventaja">
            <div class="numero">01</div>
            <div class="contenido">
                <div class="titulo">Reservas rápidas</div>
                <div class="descripcion">Asegura tu espacio de
                    estacionamiento en pocos clics.</div>
            </div>
        </div>

        <div class="ventaja">
            <div class="numero">02</div>
            <div class="contenido">
                <div class="titulo">Flexibilidad</div>
                <div class="descripcion">Encuentra opciones que se ajusten a
                    tu horario y ubicación.</div>
            </div>
        </div>

        <div class="ventaja">
            <div class="numero">03</div>
            <div class="contenido">
                <div class="titulo">Confianza</div>
                <div class="descripcion">Disfruta de un servicio seguro y
                    confiable en cada reserva.</div>
            </div>
        </div>
    </div>

    <br><br><br><br><br>

    <!-- CÓMO FUNCIONA -->
    <section class="como-funciona">
        <h2 class="titulo-seccion">¿Cómo funciona?</h2>
        <div class="contenedor-pasos">
            <div class="paso">
                <div class="numero-paso">1</div>
                <div class="icono-paso"><i class="bi bi-search"></i></div>
                <h3 class="titulo-paso" style="margin-left: 65px;">Busca</h3>
                <p class="descripcion-paso">Encuentra el parqueadero perfecto según ubicación, precio o características.</p>
            </div>
            <div class="paso">
                <div class="numero-paso">2</div>
                <div class="icono-paso"><i class="bi bi-calendar-event"></i></div>
                <h3 class="titulo-paso" style="margin-left: 55px;">Reserva</h3>
                <p class="descripcion-paso">Selecciona fecha y hora, y confirma tu reserva en segundos.</p>
            </div>
            <div class="paso">
                <div class="numero-paso">4</div>
                <div class="icono-paso"><i class="bi bi-car-front"></i></div>
                <h3 class="titulo-paso" style="margin-left: 50px;">Estaciona</h3>
                <p class="descripcion-paso">Llega y estaciona sin preocupaciones. ¡Así de simple!</p>
            </div>
            <div class="paso">
                <div class="numero-paso">3</div>
                <div class="icono-paso"><i class="bi bi-credit-card-2-front"></i></div>
                <h3 class="titulo-paso" style="margin-left: 68px;">Paga</h3>
                <p class="descripcion-paso">Realiza el pago seguro con tarjeta, PSE o efectivo.</p>
            </div>
        </div>
    </section>


    <!-- =======================================BENEFICIOS=================================== -->
    <section class="beneficios">
        <h2 class="titulo-seccion">Beneficios para todos</h2>
        <div class="contenedor-beneficios">
            <div class="columna-beneficio">
                <h3 class="titulo-beneficio">Para conductores</h3>
                <div class="lista-beneficios">
                    <div class="item-beneficio">
                        <div class="icono-beneficio"><i class="bi bi-stopwatch"></i></div>
                        <div class="texto-beneficio">
                            <h4>Ahorra tiempo</h4>
                            <p>Encuentra y reserva parqueadero sin dar vueltas buscando espacio.</p>
                        </div>
                    </div>
                    <div class="item-beneficio">
                        <div class="icono-beneficio"><i class="bi bi-cash-coin"></i></div>
                        <div class="texto-beneficio">
                            <h4>Precios competitivos</h4>
                            <p>Compara precios y encuentra la mejor opción para tu bolsillo.</p>
                        </div>
                    </div>
                    <div class="item-beneficio">
                        <div class="icono-beneficio"><i class="bi bi-shield-lock"></i></div>
                        <div class="texto-beneficio">
                            <h4>Seguridad garantizada</h4>
                            <p>Todos nuestros parqueaderos cumplen con estándares de seguridad.</p>
                        </div>
                    </div>
                    <div class="item-beneficio">
                        <div class="icono-beneficio"><i class="bi bi-star-fill"></i></div>
                        <div class="texto-beneficio">
                            <h4>Reseñas verificadas</h4>
                            <p>Lee opiniones de otros usuarios antes de reservar.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="columna-beneficio">
                <h3 class="titulo-beneficio">Para propietarios</h3>
                <div class="lista-beneficios">
                    <div class="item-beneficio">
                        <div class="icono-beneficio"><i class="bi-graph-up-arrow"></i></div>
                        <div class="texto-beneficio">
                            <h4>Aumenta tus ingresos</h4>
                            <p>Optimiza la ocupación de tu parqueadero y genera más ganancias.</p>
                        </div>
                    </div>
                    <div class="item-beneficio">
                        <div class="icono-beneficio"><i class="bi-laptop"></i></div>
                        <div class="texto-beneficio">
                            <h4>Gestión fácil</h4>
                            <p>Administra reservas y horarios desde tu computador.</p>
                        </div>
                    </div>
                    <div class="item-beneficio">
                        <div class="icono-beneficio"><i class="bi-bar-chart-line"></i></div>
                        <div class="texto-beneficio">
                            <h4>Estadísticas básicas</h4>
                            <p>Consulta cuántas reservas recibes al día y al mes.</p>
                        </div>
                    </div>
                    <div class="item-beneficio">
                        <div class="icono-beneficio"><i class="bi-shield-check"></i></div>
                        <div class="texto-beneficio">
                            <h4>Pagos seguros</h4>
                            <p>Recibe el dinero directamente en tu cuenta sin complicaciones.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- REGISTRO DUAL -->
    <section class="seccion-registro">
        <h2 class="titulo-registro">Únete a Refugio Rodante</h2>
        <p class="descripcion-registro">Forma parte de la comunidad que está revolucionando la forma de estacionar en Colombia.</p>
        <div class="opciones-registro">
            <div class="opciones-registro">
                <div class="opcion-registro">
                    <div class="icono-registro">
                        <i class="bi bi-car-front-fill"></i>
                    </div>
                    <h3 class="titulo-opcion-registro">¿Buscas dónde estacionar?</h3>
                    <p class="descripcion-opcion-registro">
                        Encuentra los mejores espacios de estacionamiento y reserva fácilmente desde tu celular o computadora.
                    </p>
                    <a href="/login" class="boton-registro">Registrarse como usuario</a>
                </div>
                <div class="opcion-registro">
                    <div class="icono-registro">
                        <i class="bi bi-building"></i>
                    </div>
                    <h3 class="titulo-opcion-registro">¿Tienes un parqueadero?</h3>
                    <p class="descripcion-opcion-registro">
                        Aumenta tus ingresos listando tu espacio en nuestra plataforma y recibe reservas al instante.
                    </p>
                    <a href="/informacion" class="boton-registro">Registrarse como propietario</a>
                </div>
            </div>
        </div>
    </section>



    <!-- Sección de preguntas frecuentes -->
    <section class="seccion-preguntas">
        <h2 class="titulo-preguntas">Preguntas Frecuentes</h2>
        <div class="contenedor-preguntas">
            <div class="item-pregunta">
                <div class="pregunta">
                    <h3>¿Cómo puedo cancelar una reserva?</h3>
                    <i class="bi bi-plus-lg"></i>
                </div>
                <div class="respuesta">
                    <p>Puedes cancelar tu reserva hasta 2 horas antes de la hora programada sin costo alguno. Solo ingresa a tu cuenta, ve a "Mis reservas" y selecciona la opción "Cancelar".</p>
                </div>
            </div>

            <div class="item-pregunta">
                <div class="pregunta">
                    <h3>¿Qué métodos de pago aceptan?</h3>
                    <i class="bi bi-plus-lg"></i>
                </div>
                <div class="respuesta">
                    <p>Aceptamos pagos con tarjetas de crédito/débito, transferencias PSE y en efectivo directamente en el parqueadero (sujeto a las políticas de cada establecimiento).</p>
                </div>
            </div>

            <div class="item-pregunta">
                <div class="pregunta">
                    <h3>¿Cómo registro mi parqueadero en la plataforma?</h3>
                    <i class="bi bi-plus-lg"></i>
                </div>
                <div class="respuesta">
                    <p>Para registrar tu parqueadero, haz clic en "Registrarse como propietario", completa el formulario con los datos de tu establecimiento y sube los documentos requeridos. Nuestro equipo revisará tu solicitud en un plazo de 48 horas.</p>
                </div>
            </div>
        </div>
    </section>


    <br><br><br><br><br>


    <!-- ==============================================FOOTER============================================0 -->
    <footer class="footer">
        <div class="container">
            <div class="logo">
                <img src="img/refugiorodante2.png" alt="Parking Logo">
            </div>

            <div class="content">
                <div class="ubicacion">
                    <h3>Ubicación</h3>
                    <p><img src="img/maps.png" alt="Ubicación" class="icon"> Cra 14 No. 89-48 (Of. 202)</p>
                    <p><img src="img/maps.png" alt="Ciudad" class="icon"> Medellin - Colombia</p>
                </div>

                <div class="contact">
                    <h3>Contacto</h3>
                    <p><img src="img/celular.png" alt="PBX" class="icon"> <span> PBX: </span> +57 (1) 519 00 77</p>
                    <p><img src="img/celular.png" alt="Servicio al cliente" class="icon"> <span>Servicio al cliente:</span> +57 323 449 9666</p>
                    <p><img src="img/correo.png" alt="Correo" class="icon"> <span>Correo:</span> <a href="mailto:servicioalcliente@parking.net.co">servicioalcliente@gmail.com </a></p>
                </div>

                <div class="legal">
                    <h3>Legal</h3>
                    <p><img src="img/icono doc.png" class="icon"> <a href="/termino-y-condiciones">Término y condiciones politica de privacidad </a></p>
                    <p><img src="img/icono doc.png" alt="Cumplimiento" class="icon"> <a href="#">Cumplimiento</a></p>
                </div>

                <div class="social">
                    <a href="https://web.facebook.com/gaming/play/?store_visit_source=gaming_tab"><img src="img/facebook.png" alt="Facebook"></a>
                    <a href="https://www.instagram.com/"><img src="img/instagram.png" alt="Instagram"></a>
                </div>
            </div>

            <div class="copyright">
                <p style="color: black;">©2020 Parking - Todos los derechos reservados</p>
            </div>
        </div>
    </footer>

    <script src="js/bilboard.js"></script>



</body>

</html>