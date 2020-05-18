# POC Laravel API Rest Auth

Este proyecto es una prueba de conceptos, donde se implemementa el paquete [laravel-jwtredis](https://github.com/sametsahindogan/laravel-jwtredis), además de los paquetes:
* [laravel-permission](https://github.com/spatie/laravel-permission): Manejo de tablas y lógica para autenticación de usuarios.
* [jwt-auth](https://github.com/tymondesigns/jwt-auth): Implementación de JWT.
* [predis](https://github.com/nrk/predis): Gestión de conexiones a Redis.
* [response-object-creator](https://github.com/sametsahindogan/response-object-creator): Constructor de respuestas de la API. Necesario para laravel-jwtredis.

Se usó como base un proyecto de Laravel 7, y se busca obtener una API que permite la autenticación y autorización de usuarios, con gestión de Redis para la gestión de sesiones.

## Base de datos

Se recomienda tener una base de datos limpia con un usuario de base de datos creado para el proyecto. El proyecto incluye un [script para creación de BD](documentation/db-setup/DB%20Setup.sql), que se usa para crear una base de datos limpia y un usuario.

## Ejecutar el proyecto

Para inicial el proyecto, se debe clonar y configurar como cualquier proyecto Laravel: crear un archivo .env y configurar la base de datos, con la base de datos y el usuario creados con el script del proyecto o unos creados por su propia cuenta.

Para arrancar el proyecto, se ejecuta el comando:
`php artisan serve`

_Nota: Recuerde que se deben realizar las migraciones para poder ejectuar el proyecto, con el comando `php artisan migrate`_




