@extends('app')

@section('content')
<!-- Verificar si el usuario se encuentra autenticado con Auth sino busca guest -->

@auth
<!-- Enlace para cerrar sesión -->


<!-- Contenedor principal con clases de Bootstrap para estilo -->
<div class="container w-50 border p-4">
    <div class="row mx-auto">
        <!-- Formulario para crear una nueva tarea -->
        <form method="POST" action="{{route('todos')}}">
            <!-- Token CSRF para proteger contra ataques CSRF -->
            @csrf

            <div class="mb-3 col">
                <!-- Mostrar mensaje de error si hay un error en el campo 'title' -->
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <!-- Mostrar mensaje de éxito si la sesión tiene un mensaje de éxito -->
                @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
                @endif

                <!-- Campo de entrada para el título de la tarea -->
                <label for="title" class="form-label">Título de la tarea</label>
                <input type="text" class="form-control mb-2" name="title" id="exampleFormControlInput1" placeholder="Comprar la cena">

                <!-- Campo de selección para la categoría de la tarea -->
                <label for="category_id" class="form-label">Categoria de la tarea</label>
                <select name="category_id" class="form-select">
                    <!-- Iterar sobre las categorías y crear una opción para cada una -->
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>

            </div>
            <!-- Botón para enviar el formulario y crear la tarea -->
            <input type="submit" value="Crear tarea" class="btn btn-primary my-2" />
    </div>
    </form>
    <!-- Título para la sección de tareas pendientes -->
    <h4 class="mt-4">Tareas Pendientes</h4>

    <div>
        <!-- Iterar sobre la colección de tareas ($todos) -->
        @foreach ($todos as $todo)

        <div class="row py-1">
            <!-- Columna para mostrar el título de la tarea -->
            <div class="col-md-9 d-flex align-items-center">
                <!-- Enlace para editar la tarea -->
                <a href="{{ route('todos-edit', ['id' => $todo->id]) }}">{{ $todo->title }}</a>
            </div>

            <!-- Columna para los botones de acción (Hecho y Eliminar) -->
            <div class="col-md-3 d-flex justify-content-end">
                <!-- Formulario para marcar la tarea como completada -->
                <form action="{{ route('todos-complete', [$todo->id]) }}" method="POST">
                    <!-- Método HTTP PATCH para actualizar el recurso -->
                    @method('PATCH')
                    <!-- Token CSRF para proteger contra ataques CSRF -->
                    @csrf
                    <!-- Botón para marcar la tarea como hecha -->
                    <button class="btn btn-primary btn-sm mx-2">Hecho</button>
                </form>

                <!-- Formulario para eliminar una tarea existente -->
                <form action="{{ route('todos-destroy', [$todo->id]) }}" method="POST">
                    <!-- Método HTTP DELETE para eliminar el recurso -->
                    @method('DELETE')
                    <!-- Token CSRF para proteger contra ataques CSRF -->
                    @csrf
                    <!-- Botón para eliminar la tarea -->
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </div>
        </div>

        @endforeach
    </div>

    <!-- Fin de la sección de contenido -->
    @endsection
</div>
@endauth

@guest
<!-- Mensaje para usuarios no autenticados -->
<p>Tienes que logearte para poder ver el contenido de esta página <a href="/login">inicia sesión aquí</a></p>
@endguest