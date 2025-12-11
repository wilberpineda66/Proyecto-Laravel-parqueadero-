<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap y SweetAlert -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    <style>
        body {
            background-color: #f4f4f4;
        }

        .contenedor-login-principal {
            position: relative;
            width: 800px;
            max-width: 100%;
            margin: 80px auto;
            overflow: hidden;
            background: #fff;
            display: flex;
            flex-direction: column;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .formulario-slider {
            display: flex;
            width: 200%;
            transition: transform 0.5s ease-in-out;
        }

        .panel-izquierdo {
    width: 50%;
    padding: 40px;
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center; /* centrado horizontal */
}

        .panel-izquierdo,
        .panel-derecho {
            width: 50%;
            padding: 40px;
            box-sizing: border-box;
        }

        .formulario-slider form h1 {
            margin-bottom: 20px;
        }

        .formulario-slider form input,
        .formulario-slider form select {
            width: 100%;
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .formulario-slider form button {
            width: 100%;
            padding: 10px;
            background-color: #2c3e50;
            color: white;
            border: none;
            border-radius: 5px;
        }

        .formulario-slider form button:hover {
            background-color: #1a252f;
        }

        .contenedor-login-principal.active .formulario-slider {
            transform: translateX(-50%);
        }

        header {
            background-color: #2c3e50;
            padding: 15px;
            color: white;
        }

        .logo-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo-container img {
            height: 50px;
        }

        .nav-link-wrapper a {
            text-decoration: none;
            color: white;
            padding: 10px;
            transition: color 0.3s ease;
        }

        .nav-links {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin-top: 10px;
        }

        /* Responsive */
        .menu-toggle {
            display: none;
            flex-direction: column;
            cursor: pointer;
        }

        .menu-toggle .bar {
            width: 25px;
            height: 3px;
            background-color: white;
            margin: 4px 0;
        }

        @media (max-width: 768px) {
            .nav-links {
                flex-direction: column;
                align-items: center;
                display: none;
                background-color: #2c3e50;
                padding-bottom: 10px;
            }

            .nav-links.active {
                display: flex;
            }

            .menu-toggle {
                display: flex;
            }

            .logo-container {
                flex-direction: row;
                justify-content: space-between;
            }

            .panel-izquierdo,
            .panel-derecho {
                width: 100%;
            }

            .formulario-slider {
                flex-direction: row;
                width: 200%;
            }
        }
    </style>
</head>

<body>
    <header>
        <div class="logo-container">
            <div class="left-side">
                <a href="/"><img src="{{ asset('img/refugiorodante2.png') }}" alt="Logo"></a>
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

    <div class="contenedor-login-principal" id="contenedor">
        <div class="formulario-slider">
            <div class="panel-izquierdo">
                @if(session('error'))
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: "{{ session('error') }}"
                    });
                </script>
                @endif

                @if(session('success'))
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: "{{ session('success') }}",
                        showConfirmButton: false,
                        timer: 2000
                    });
                </script>
                @endif

                <form action="{{ url('login') }}" method="POST">
                    @csrf
                    <h1>Iniciar Sesión</h1>
                    <input type="email" name="Email" placeholder="Email" required>
                    <input type="password" name="Contrasena" placeholder="Contraseña" required>
                    <a href="#">¿Olvidaste tu contraseña?</a>
                    <button type="submit">Iniciar Sesión</button>
                </form>
            </div>

            <div class="panel-derecho">
                <form action="{{ url('registro') }}" method="POST">
                    @csrf
                    <h1>Crear Cuenta</h1>
                    <label for="tipoUsuario">Tipo de Usuario:</label>
                    <select id="tipoUsuario" name="tipoUsuario">
                        <option value="usuario">Usuario</option>
                        <option value="admin">Administrador</option>
                    </select>
                    <input type="text" name="Nombre" placeholder="Nombre" required>
                    <input type="text" name="Apellido" placeholder="Apellido" required>
                    <input type="email" name="Email" placeholder="Email" required>
                    <input type="password" name="Contrasena" placeholder="Contraseña" required>
                    <button type="submit">Registrarse</button>
                </form>
            </div>
        </div>

        <div class="d-flex justify-content-center gap-3 p-3">
            <button class="btn btn-outline-secondary" id="switch-to-login">Iniciar Sesión</button>
            <button class="btn btn-outline-primary" id="switch-to-register">Registrarse</button>
            
        </div>
    </div>

    <script>
        const loginBtn = document.getElementById('switch-to-login');
        const registerBtn = document.getElementById('switch-to-register');
        const contenedor = document.getElementById('contenedor');

        registerBtn.addEventListener('click', () => {
            contenedor.classList.add('active');
        });

        loginBtn.addEventListener('click', () => {
            contenedor.classList.remove('active');
        });

        document.getElementById('menu-toggle').addEventListener('click', () => {
            document.getElementById('nav-menu').classList.toggle('active');
        });
    </script>

    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/bilboard.js') }}"></script>
</body>

</html>
