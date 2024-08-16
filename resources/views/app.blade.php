<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Metadatos del documento -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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

    <!-- Título de la página -->
    <title>Mis tareas</title>

    <!-- Estilos CSS personalizados -->
    <style>
        /* Estilo para el cuerpo del documento */
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }

        /* Estilo para el contenedor de color */
        .color-container {
            width: 16px;
            height: 16px;
            display: inline-block;
            border-radius: 4px;
        }

        /* Estilo para los enlaces */
        a {
            text-decoration: none;
        }
    </style>
</head>


<body>
    <!-- Barra de navegación con clases de Bootstrap para estilo y funcionalidad -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <!-- Enlace de la marca de la barra de navegación -->
            <a class="navbar-brand" href="#">Navbar</a>
            <!-- Botón para colapsar la barra de navegación en pantallas pequeñas -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Contenedor colapsable de los enlaces de navegación -->
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <!-- Enlace a la página de tareas -->
                    <a class="nav-link active" aria-current="page" href="{{route('todos')}}">Tareas</a>
                    <!-- Enlace a la página de categorías -->
                    <a class="nav-link" href="{{route('categories.index')}}">Categorias</a>
                    <!-- Enlace a la página de tareas completadas -->
                    <a class="nav-link" href="{{route('todos-completed')}}">Tareas completadas</a>
                    <!-- Enlace para cerrar sesión -->
                    <a href="/logout">logout</a>

                </div>
            </div>
        </div>
    </nav>
</body>

<!-- Sección de contenido que se insertará desde otras vistas -->
@yield('content')

</html>