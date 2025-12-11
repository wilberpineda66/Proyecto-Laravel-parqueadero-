# 🚗 Refugio Rodante -- Guía de Instalación

Sistema de gestión de parqueaderos desarrollado en Laravel 10.

------------------------------------------------------------------------

## 📌 Requisitos

### ✔ Software necesario

-   PHP 8.1 o superior\
-   Composer\
-   MySQL\
-   XAMPP\
-   Git\
-   Navegador web

------------------------------------------------------------------------

## 📁 1. Clonar el repositorio

``` bash
git clone https://github.com/SrAlucart/Versiones.git
```

O si ya existe una carpeta vacía:

``` bash
git init
git branch -M main
git remote add origin https://github.com/SrAlucart/Versiones.git
git pull origin main
```

------------------------------------------------------------------------

## ⚙️ 2. Instalar dependencias

``` bash
composer install
```

------------------------------------------------------------------------

## 🔧 3. Crear archivo `.env`

Dentro del proyecto:

``` bash
cp .env.example .env
```

Generar la clave del proyecto:

``` bash
php artisan key:generate
```

------------------------------------------------------------------------

## 🛢 4. Configurar Base de Datos

Editar `.env`:

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=rodante
    DB_USERNAME=root
    DB_PASSWORD=

Crear base de datos manualmente desde phpMyAdmin:

    rodante

------------------------------------------------------------------------

## 🏗 5. Ejecutar migraciones y seeders

``` bash
php artisan migrate:fresh --seed
```

Esto creará:

-   Usuarios\
-   Parqueaderos\
-   Espacios de parqueadero\
-   Reservas

------------------------------------------------------------------------

## 🚀 6. Iniciar el servidor Laravel

``` bash
php artisan serve
```

Abrir en el navegador:

    http://127.0.0.1:8000

------------------------------------------------------------------------

## 🔑 7. Acceso al panel administrador

Usuario generado por el seeder:

    Email: admin@example.com
    Password: 123456789

------------------------------------------------------------------------

## 🧩 Estructura principal del proyecto

    app/
      Http/
        Controllers/
        Middleware/
      Models/
    database/
      migrations/
      seeders/
    resources/
      views/
    routes/
      web.php

------------------------------------------------------------------------

## 🧪 Pruebas del módulo Parqueaderos

1.  Acceder como Administrador\
2.  Ir a **Gestión de Parqueaderos**\
3.  Agregar parqueadero con:
    -   latitud válida → 4.1234
    -   longitud válida → -74.2345\
4.  Ver los espacios generados automáticamente\
5.  Editar parqueadero\
6.  Eliminar parqueadero

------------------------------------------------------------------------
## ⭐ Autor

Proyecto desarrollado por **Emanuel (SrAlucart)**\
Repositorio oficial: https://github.com/SrAlucart/Versiones

------------------------------------------------------------------------

## 📄 Licencia

Este proyecto es de uso académico.
