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

## Endpoints de la API

### Autenticación

- `POST /api/login` → Iniciar sesión
- `POST /api/register` → Registrar usuario
- `POST /api/logout` → Cerrar sesión

### Categorías

- `GET /api/categories` → Listar categorías
- `POST /api/categories` → Crear categoría
- `GET /api/categories/{id}` → Obtener una categoría
- `PUT /api/categories/{id}` → Actualizar una categoría
- `DELETE /api/categories/{id}` → Eliminar una categoría

### Productos

- `GET /api/products` → Listar productos
- `POST /api/products` → Crear producto
- `GET /api/products/{id}` → Obtener un producto
- `PUT /api/products/{id}` → Actualizar un producto
- `DELETE /api/products/{id}` → Eliminar un producto

## Uso de la Interfaz Visual

Para acceder a la interfaz visual, inicia el servidor y abre en el navegador:

```sh
http://localhost:8000
```

## Credenciales de Prueba

Para probar la API, puedes usar el siguiente usuario:

- **Correo:** `admin@mail.com`
- **Contraseña:** `1234Qwer`

## Licencia

Este proyecto está bajo la licencia MIT.

