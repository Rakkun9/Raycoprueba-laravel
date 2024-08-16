@extends('app')

@section('content')

<!-- Contenedor principal con clases de Bootstrap para estilo -->
<div class="container w-50 border p-4">
    <!-- Título de la sección de tareas completadas -->
    <h2>Tareas Completadas</h2>
    <div class="row mx-auto">

        <!-- Verificar si la colección de tareas completadas ($completedTodos) está vacía -->
        @if ($completedTodos->isEmpty())
        <!-- Mensaje para indicar que no hay tareas completadas -->
        <p>No hay tareas completadas.</p>
        @else
        <div>
            <!-- Iterar sobre la colección de tareas completadas ($completedTodos) -->
            @foreach ($completedTodos as $todo)
            <div class="row py-1">
                <!-- Columna para mostrar el título de la tarea completada -->
                <div class="col-md-9 d-flex align-items-center">
                    <li><span>{{ $todo->title }} </span></li>
                </div>
            </div>
            @endforeach
        </div>
        @endif

    </div>
</div>

@endsection