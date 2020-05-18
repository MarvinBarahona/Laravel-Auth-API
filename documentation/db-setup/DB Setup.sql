-- Script ejemplo, para crear una nueva base de datos para el proyecto.
-- También se crea un nuevo usuario.

CREATE USER IF NOT EXISTS poc_laravel_user@localhost;

CREATE DATABASE IF NOT EXISTS poc_laravel_auth;

GRANT ALL ON poc_laravel_auth.* TO poc_laravel_user@localhost IDENTIFIED BY 'somePassword';
