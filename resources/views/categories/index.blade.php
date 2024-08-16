@extends('app')

@section('content')

<!-- Contenedor principal con clases de Bootstrap para estilo -->
<div class="container w-100 w-md-25 border p-4">
    <div class="row mx-auto">
        <!-- Formulario para crear una nueva categoría -->
        <form method="POST" action="{{route('categories.store')}}">
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
                <input type="text" class="form-control mb-2" name="name" id="exampleFormControlInput1" placeholder="Hogar">

                <!-- Campo de entrada para el color de la categoría -->
                <label for="exampleColorInput" class="form-label">Escoge un color para la categoría</label>
                <input type="color" class="form-control form-control-color" name="color" id="exampleColorInput" value="#563d7c" title="Choose your color">

                <!-- Botón para enviar el formulario y crear la categoría -->
                <input type="submit" value="Crear Categoría" class="btn btn-primary my-2" />
            </div>
        </form>

        <div>
            <!-- Título para la sección de categorías creadas -->
            <h4>Categorias creadas</h4>
            <!-- Iterar sobre la colección de categorías ($categories) -->
            @foreach ($categories as $category)
            <div class="row py-1">
                <!-- Columna para mostrar el nombre y color de la categoría -->
                <div class="col-12 col-md-9 d-flex align-items-center">
                    <!-- Enlace para ver los detalles de la categoría -->
                    <a class="d-flex align-items-center gap-2" href="{{ route('categories.show', ['category' => $category->id]) }}">
                        <span class="color-container" style="background-color: {{ $category->color }}"></span> {{ $category->name }}
                    </a>
                </div>

                <!-- Columna para el botón de eliminar categoría -->
                <div class="col-12 col-md-3 d-flex justify-content-end">
                    <!-- Botón para abrir el modal de confirmación de eliminación -->
                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal{{$category->id}}">Eliminar</button>
                </div>
            </div>

            <!-- Modal de confirmación de eliminación de categoría -->
            <div class="modal fade" id="modal{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <!-- Título del modal -->
                            <h5 class="modal-title" id="exampleModalLabel">Eliminar categoría</h5>
                            <!-- Botón para cerrar el modal -->
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Mensaje de advertencia sobre la eliminación de la categoría -->
                            Al eliminar la categoría <strong>{{ $category->name }}</strong> se eliminan todas las tareas asignadas a la misma.
                            ¿Está seguro que desea eliminar la categoría <strong>{{ $category->name }}</strong>?
                        </div>
                        <div class="modal-footer">
                            <!-- Botón para cancelar la eliminación -->
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, cancelar</button>
                            <!-- Formulario para eliminar la categoría -->
                            <form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="POST">
                                <!-- Método HTTP DELETE para eliminar el recurso -->
                                @method('DELETE')
                                <!-- Token CSRF para proteger contra ataques CSRF -->
                                @csrf
                                <!-- Botón para confirmar la eliminación -->
                                <button type="submit" class="btn btn-primary">Sí, eliminar categoría</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>
</div>
@endsection