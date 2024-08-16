@extends('app')

@section('content')

<!-- Contenedor principal con clases de Bootstrap para estilo -->
<div class="container w-100 w-md-25 border p-4">
    <div class="row mx-auto">
        <!-- Formulario para actualizar una categoría existente -->
        <form method="POST" action="{{route('categories.update',['category' => $category->id])}}">
            <!-- Método HTTP PATCH para actualizar el recurso -->
            @method('PATCH')
            <!-- Token CSRF para proteger contra ataques CSRF -->
            @csrf

            <div class="mb-3 col">
                <!-- Mostrar mensaje de error si hay un error en el campo 'name' -->
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <!-- Mostrar mensaje de error si hay un error en el campo 'color' -->
                @error('color')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <!-- Mostrar mensaje de éxito si la sesión tiene un mensaje de éxito -->
                @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
                @endif

                <!-- Campo de entrada para el nombre de la categoría -->
                <label for="exampleFormControlInput1" class="form-label">Nombre de la categoría</label>
                <input type="text" class="form-control mb-2" name="name" id="exampleFormControlInput1" placeholder="Hogar" value="{{ $category->name }}">

                <!-- Campo de entrada para el color de la categoría -->
                <label for="exampleColorInput" class="form-label">Escoge un color para la categoría</label>
                <input type="color" class="form-control form-control-color" name="color" id="exampleColorInput" value="{{ $category->color }}" title="Choose your color">

                <!-- Botón para enviar el formulario y actualizar la categoría -->
                <input type="submit" value="Actualizar categoría" class="btn btn-primary my-2" />
            </div>
        </form>

        <div>
            <!-- Verificar si la categoría tiene tareas asociadas -->
            @if ($category->todos->count() > 0)
            <!-- Iterar sobre las tareas asociadas a la categoría -->
            @foreach ($category->todos as $todo)
            <div class="row py-1">
                <!-- Columna para mostrar el título de la tarea -->
                <div class="col-12 col-md-9 d-flex align-items-center">
                    <!-- Enlace para editar la tarea -->
                    <a href="{{ route('todos-edit', ['id' => $todo->id]) }}">{{ $todo->title }}</a>
                </div>

                <!-- Columna para el botón de eliminar tarea -->
                <div class="col-12 col-md-3 d-flex justify-content-end">
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
            @else
            <!-- Mensaje para indicar que no hay tareas para esta categoría -->
            <p>No hay tareas para esta categoría</p>
            @endif
        </div>
    </div>
</div>
@endsection