# Biblioteca-Laravel


Para poder ejecutar este proyecto necesitarás Laravel8.

El primer paso será hacer 'git clone' del proyecto.

Una vez tengamos el proyecto en el equipo deberemos abrir una terminal en la carpeta 'biblioteca-laravel'.

Usaremos composer:

```bash
composer install
```

Tras ello usaremos artisan para hacer la migración y la inserción de datos en las tablas de la base de datos:

```bash
php artisan migrate
```

```bash
php artisan db:seed
```
Por último usaremos artisan para desplegar el proyecto sobre el puerto 8000:

```bash
php artisan serve
```

En el navegador: 
```
http://localhost:8000
```

Ya tendriamos el proyecto listo para ser usado.
