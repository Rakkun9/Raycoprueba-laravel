<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Category;

class TodosController extends Controller
{
    /**
     * Almacena una nueva tarea en la base de datos.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validar los datos de la solicitud
        $request->validate([
            'title' => 'required|min:3'
        ]);

        // Crear una nueva instancia de Todo y asignar los valores
        $todo = new Todo;
        $todo->title = $request->title;
        $todo->category_id = $request->category_id;
        $todo->save();

        // Redirigir a la ruta 'todos' con un mensaje de éxito
        return redirect()->route('todos')->with('success', 'Tarea creada');
    }

    /**
     * Muestra una lista de tareas no completadas.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Filtra las tareas para que solo se muestren las que no están completadas
        $todos = Todo::where('status', '!=', 'completed')->get();

        // Obtener todas las categorías
        $categories = Category::all();

        // Retorna la vista y pasa las tareas filtradas y las categorías
        return view('todos.index', compact('todos', 'categories'));
    }

    /**
     * Muestra una tarea específica.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // Buscar la tarea por su ID
        $todo = Todo::find($id);

        // Retornar la vista con la tarea encontrada
        return view('todos.show', ['todo' => $todo]);
    }

    /**
     * Actualiza una tarea existente.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Buscar la tarea por su ID
        $todo = Todo::find($id);

        // Actualizar el título de la tarea
        $todo->title = $request->title;
        $todo->save();

        // Redirigir a la ruta 'todos' con un mensaje de éxito
        return redirect()->route('todos')->with('success', 'Tarea actualizada');
    }

    /**
     * Elimina una tarea existente.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Buscar la tarea por su ID
        $todo = Todo::find($id);

        // Eliminar la tarea
        $todo->delete();

        // Redirigir a la ruta 'todos' con un mensaje de éxito
        return redirect()->route('todos')->with('success', 'Tarea se ha eliminado');
    }

    /**
     * Marca una tarea como completada.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function markAsCompleted($id)
    {
        // Buscar la tarea por su ID
        $todo = Todo::findOrFail($id);

        // Marcar la tarea como completada
        $todo->status = 'completed';
        $todo->save();

        // Redirigir a la ruta 'todos' con un mensaje de éxito
        return redirect()->route('todos')->with('success', 'Tarea marcada como completada');
    }

    /**
     * Muestra una lista de tareas completadas.
     *
     * @return \Illuminate\View\View
     */
    public function completed()
    {
        // Obtener solo las tareas que están marcadas como completadas
        $completedTodos = Todo::where('status', 'completed')->get();

        // Pasar las tareas completadas a la vista
        return view('todos.completed', compact('completedTodos'));
    }
}
