<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API de Gestión de Usuarios, Categorías y Productos</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; margin: 20px; }
        h1, h2, h3 { color: #333; }
        code { background: #f4f4f4; padding: 2px 4px; border-radius: 4px; }
        pre { background: #f4f4f4; padding: 10px; border-radius: 5px; overflow-x: auto; }
    </style>
</head>
<body>
    <h1>API de Gestión de Usuarios, Categorías y Productos</h1>
    <p>Este proyecto es una API desarrollada en Laravel que permite la gestión de usuarios, categorías y productos. Cuenta con una interfaz visual y soporta llamadas REST API.</p>

    <h2>Requisitos</h2>
    <ul>
        <li>PHP 8.x</li>
        <li>Composer</li>
        <li>Laravel 10.x</li>
        <li>MySQL o PostgreSQL</li>
        <li>Node.js (opcional para la interfaz visual)</li>
    </ul>

    <h2>Instalación</h2>
    <ol>
        <li>Clonar el repositorio:
            <pre><code>git clone https://github.com/tu_usuario/tu_repositorio.git
cd tu_repositorio</code></pre>
        </li>
        <li>Instalar dependencias de Laravel:
            <pre><code>composer install</code></pre>
        </li>
        <li>Configurar variables de entorno:
            <pre><code>cp .env.example .env</code></pre>
            <p>Edita el archivo <code>.env</code> con la configuración de tu base de datos.</p>
        </li>
        <li>Generar clave de aplicación:
            <pre><code>php artisan key:generate</code></pre>
        </li>
        <li>Ejecutar migraciones y seeders:
            <pre><code>php artisan migrate --seed</code></pre>
        </li>
        <li>Iniciar el servidor:
            <pre><code>php artisan serve</code></pre>
        </li>
    </ol>

    <h2>Endpoints de la API</h2>
    <h3>Autenticación</h3>
    <ul>
        <li><code>POST /api/login</code>: Iniciar sesión</li>
        <li><code>POST /api/register</code>: Registrar usuario</li>
        <li><code>POST /api/logout</code>: Cerrar sesión</li>
    </ul>

    <h3>Categorías</h3>
    <ul>
        <li><code>GET /api/categories</code>: Listar categorías</li>
        <li><code>POST /api/categories</code>: Crear categoría</li>
        <li><code>GET /api/categories/{id}</code>: Obtener una categoría</li>
        <li><code>PUT /api/categories/{id}</code>: Actualizar una categoría</li>
        <li><code>DELETE /api/categories/{id}</code>: Eliminar una categoría</li>
    </ul>

    <h3>Productos</h3>
    <ul>
        <li><code>GET /api/products</code>: Listar productos</li>
        <li><code>POST /api/products</code>: Crear producto</li>
        <li><code>GET /api/products/{id}</code>: Obtener un producto</li>
        <li><code>PUT /api/products/{id}</code>: Actualizar un producto</li>
        <li><code>DELETE /api/products/{id}</code>: Eliminar un producto</li>
    </ul>

    <h2>Uso de la Interfaz Visual</h2>
    <p>Para acceder a la interfaz visual, inicia el servidor y abre en el navegador:</p>
    <pre><code>http://localhost:8000</code></pre>

    <h2>Credenciales de Prueba</h2>
    <p>Para probar la API, puedes usar el siguiente usuario:</p>
    <ul>
        <li><strong>Correo:</strong> admin@mail.com</li>
        <li><strong>Contraseña:</strong> 1234Qwer</li>
    </ul>

    <h2>Licencia</h2>
    <p>Este proyecto está bajo la licencia MIT.</p>
</body>
</html>
