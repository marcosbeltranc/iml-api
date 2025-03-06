# API Laravel - Gestión de Usuarios, Categorías y Productos

## Instalación

Clona este repositorio:

```sh
git clone tu_repositorio
cd tu_repositorio
```

Instala las dependencias de Laravel:

```sh
composer install
```

Configura las variables de entorno:

```sh
cp .env.example .env
```

Edita el archivo `.env` con la configuración de tu base de datos.

Genera la clave de la aplicación:

```sh
php artisan key:generate
```

Ejecuta las migraciones y seeders:

```sh
php artisan migrate --seed
```

Inicia el servidor:

```sh
php artisan serve
```

## Uso de la Interfaz Visual

Para acceder a la interfaz visual, inicia el servidor y abre en el navegador:

```sh
http://localhost:8000
```

## Credenciales de Prueba

Para probar la API, puedes usar el siguiente usuario:

- **Correo:** `admin@mail.com`
- **Contraseña:** `1234Qwer`

```sh
https://iml-api-main-1kiscj.laravel.cloud/
```

## Licencia

Este proyecto está bajo la licencia MIT.

