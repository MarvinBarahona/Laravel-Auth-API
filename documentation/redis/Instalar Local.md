# Instalar instancia de Redis local

Existen muchas alternativas para instalar una instancia Redis para un desarrollo local. Para este ejemplo, se configuró una instancia usando Docker.

1) Instalar Docker localmente, ya sea usando [Docker Toolbox](https://docs.docker.com/toolbox/toolbox_install_windows/) o [Docker Desktop](https://docs.docker.com/desktop/)
1) Descargar la imagen de Redis alojada en [Docker Hub](https://hub.docker.com/_/redis/): `docker pull redis`.
1) Se puede verificar qué versión de Redis ha sido descargada con el comando: `docker images`.
1) Ejecutar un contenedor usando la imagen de Redis: `docker run --name redis-local -d -p 6379:6379 redis`, donde _redis-local_ es el nombre que se le da al contenedor. Con esto, se expondrá el servicio en el puerto 6379 del host de Docker.
1) Se puede verificar el estado del contenedor con el comando `docker container ls`.
1) Es posible detener e iniciar el servicio con los comandos: `docker container stop redis-local` y `docker container start redis-local`.

Con lo anterior ya se tendrá una instancia de Redis ejecutandose, sin contraseña e instancia única (no clúster). En la documentación de Docker Hub se encuentran las instrucciones para configuraciones más robustas.

Opcionalmente, es posible instalar un cliente gráfico para monitorear el estado de la instancia. Para este proyecto se usó la herramienta [redis-commander](https://github.com/joeferner/redis-commander).
