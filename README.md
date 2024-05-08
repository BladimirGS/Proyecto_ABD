<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


## Instrucciones para ejecutar el proyecto localmente

1. Clona el repositorio desde GitHub:
    ```
    git clone https://github.com/BladimirGS/Proyecto_ABD.git
    ```

2. Accede al directorio del proyecto con vscode:
    ```
    code Proyecto_ABD
    ```

3. Instala las dependencias de PHP con Composer:
    ```
    composer install
    ```

4. Instala las dependencias de Node.js:
    ```
    npm install
    ```

5. Copia el archivo de configuración de ejemplo para la base de datos:
    ```
    cp .env.example .env
    ```

6. Abre el archivo `.env` y configura la conexión a la base de datos:

    ```dotenv
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nombre_bd
    DB_USERNAME=tu_usuario_mysql
    DB_PASSWORD=tu_contraseña_mysql
    ```

7. Crea una nueva base de datos en tu servidor MySQL.

8. Creamos la base de datos:
    ```sql
    CREATE DATABASE name_database;
    ```

9.  Ejecuta las migraciones y semillas de la base de datos:
    ```
    php artisan migrate:refresh --seed
    ```

10. Genera una clave de aplicación:
    ```
    php artisan key:generate
    ```

11. Ejecuta el servidor local:
    ```
    php artisan serve
    ```

12. Compila los estilos de Tailwind CSS:
    ```
    npm run dev
    ```

Inicia sesión con las siguientes credenciales:
- Correo electrónico: `admin@correo.com`
- Contraseña: `password`
  
Ahora puedes acceder al proyecto en tu navegador en la dirección `http://localhost:8000`.
