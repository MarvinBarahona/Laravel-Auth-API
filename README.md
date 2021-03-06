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

El archivo .env además debe incluir:
* La variable JWT_SECRET, requerido por la librería jwt-auth. Se usará para firmar los JWT creados.
* Configurar los datos de conexión de Redis. Para este ejemplo, se usó una [instancia local](documentation/redis/Instalar%20Local.md), por lo que se configuró las variables REDIS_HOST y REDIS_PORT.
* Agregar o modificar las variables: _CACHE_DRIVER=redis_ y _REDIS_CLIENT=predis_

El proyecto además incluye la [creación de usuarios](database/seeds/PermissionsAndUsersSeeder.php) de prueba, así que se deben correr las migraciones y los seeds con el comando: `php artisan migrate:fresh --seed`.

Para arrancar el proyecto, se ejecuta el comando:
`php artisan serve`


## Probar el proyecto
El proyecto incluye [los archivos usados](documentation/postman) para realizar pruebas unitarias con Postman.
Se incluyen endpoints para probar la autenticación, y endpoints de prueba para probar la autorización. En el comentario de cada request de la colección de Postman se incluye el permisos asociado al mismo. Los usuario tienen asignado:
* _Rol general_: listar.
* _Rol admin_: crear, eliminar.
* _Rol superadmin_: todos los permisos

El [ambiente de Postman](documentation/postman/Local%20-%20POC%20Laravel%20Auth.postman_environment.json) incluye la variable _token_, usada en el método de autenticación de todas las rutas que requiere un Bearer token como Header. Esta configuración (del método de autorización) se realizó sobre [la colección](documentation/postman/POC%20Laravel%20Auth.postman_collection.json), y es heredada por las requests. 

## Desarrollo
El proyecto ha sido desarrollado usando [Gitflow](https://datasift.github.io/gitflow/IntroducingGitFlow.html). Se configuró la herramienta [Girkraken](https://support.gitkraken.com/git-workflows-and-extensions/git-flow/) para facilitar esta gestión.

## TODO's:
* Retornar error por token inválido en el logout.
* Gestión de errores.
* Endpoints para verificar permisos, roles.
* Corregir error con el método "me"
