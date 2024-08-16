<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Metadatos del documento -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- Enlace al archivo CSS de Bootstrap desde un CDN (Content Delivery Network) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous">

    <!-- Script para Popper.js, necesario para algunas funcionalidades de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <!-- Script para el archivo JavaScript de Bootstrap desde un CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</head>

<body>
    <!-- Formulario de registro con clases de Bootstrap para estilo -->
    <form class="container w-100 w-md-25 border p-4 mt-4" action="/register" method="POST">
        <!-- Token CSRF para proteger contra ataques CSRF -->
        @csrf

        <!-- Campo de entrada para el nombre de usuario -->
        <div data-mdb-input-init class="form-outline mb-4">
            <input type="text" name="name" class="form-control" />
            <label class="form-label">Nombre de usuario</label>
        </div>

        <!-- Campo de entrada para el email -->
        <div data-mdb-input-init class="form-outline mb-4">
            <input type="text" name="email" class="form-control" />
            <label class="form-label">Email</label>
        </div>

        <!-- Campo de entrada para la contraseña -->
        <div data-mdb-input-init class="form-outline mb-4">
            <input type="password" name="password" class="form-control" />
            <label class="form-label">Password</label>
        </div>

        <!-- Campo de entrada para repetir la contraseña -->
        <div data-mdb-input-init class="form-outline mb-4">
            <input type="password" name="password_confirmation" class="form-control" />
            <label class="form-label">Repite la contraseña</label>
        </div>

        <!-- Botón para enviar el formulario y crear el usuario -->
        <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Crear usuario</button>

        <!-- Enlace para redirigir a la página de inicio de sesión -->
        <div class="text-center">
            <p>¿Ya tienes una cuenta? <a href="/login">Login aquí</a></p>
        </div>
    </form>
</body>

</html>