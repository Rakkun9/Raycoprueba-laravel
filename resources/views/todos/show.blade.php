@extends('app')

@section('content')
<div class="container w-50 border p-4 mt-4">
    <!-- Formulario para actualizar una tarea existente -->
    <form action="{{route('todos-update', ['id' => $todo->id]) }}" method="POST">
        <!-- Método HTTP PATCH para actualizar el recurso -->
        @method('PATCH')
        <!-- Token CSRF para proteger contra ataques CSRF -->
        @csrf

        <!-- Mostrar mensaje de éxito si la sesión tiene un mensaje de éxito -->
        @if (session('success'))
        <h6 class="alert alert-success">{{ session('success')}}</h6>
        @endif

        <!-- Mostrar mensaje de error si hay un error en el campo 'title' -->
        @error('title')
        <h6 class="alert alert-danger">{{ $message }}</h6>
        @enderror

        <!-- Campo de entrada para el título de la tarea -->
        <div class="mb-3">
            <label for="title" class="form-label">Titulo de la tarea</label>
            <input type="text" name="title" class="form-control" value="{{ $todo->title}}">
        </div>

        <!-- Botón para enviar el formulario y actualizar la tarea -->
        <button type="submit" class="btn btn-primary">Actualizar una tarea</button>
    </form>


</div>
@endsection