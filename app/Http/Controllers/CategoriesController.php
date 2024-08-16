<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; 

class CategoriesController extends Controller
{
    /**
     * Muestra una lista de todas las categorías.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Obtiene todas las categorías de la base de datos
        $categories = Category::all(); 

        // Retorna la vista 'categories.index' con las categorías obtenidas
        return view('categories.index', ['categories' => $categories]); 
    }

    /**
     * Muestra el formulario para crear una nueva categoría.
     *
     * @return void
     */
    public function create()
    {
        // Este método puede ser implementado para mostrar un formulario de creación
    }

    /**
     * Almacena una nueva categoría en la base de datos.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Valida los datos de la solicitud
        $request->validate([
            'name' => 'required|unique:categories|max:255', // El nombre es obligatorio, único y no puede exceder 255 caracteres
            'color' => 'required|max:7' // El color es obligatorio y no puede exceder 7 caracteres
        ]); 

        // Crea una nueva instancia de Category y asigna los valores
        $category = new Category;
        $category->name = $request->name; 
        $category->color = $request->color; 
        $category->save(); 

        // Redirige a la lista de categorías con un mensaje de éxito
        return redirect()->route('categories.index')->with('success', 'Categoría creada');
    }

    /**
     * Muestra una categoría específica.
     *
     * @param string $category
     * @return \Illuminate\View\View
     */
    public function show(string $category)
    {
        // Busca la categoría por su ID
        $category = Category::find($category); 

        // Retorna la vista 'categories.show' con la categoría encontrada
        return view('categories.show', ['category' => $category]);
    }

    /**
     * Muestra el formulario para editar una categoría específica.
     *
     * @param string $id
     * @return void
     */
    public function edit(string $id)
    {
        // Este método puede ser implementado para mostrar un formulario de edición
    }

    /**
     * Actualiza una categoría específica en la base de datos.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, string $category)
    {
        // Busca la categoría por su ID
        $category = Category::find($category);

        // Actualiza los valores de la categoría
        $category->name = $request->name; 
        $category->color = $request->color; 
        $category->save(); 

        // Redirige a la lista de categorías con un mensaje de éxito
        return redirect()->route('categories.index')->with('success', 'Categoría actualizada');
    }

    /**
     * Elimina una categoría específica de la base de datos.
     *
     * @param string $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($category)
    {
        // Busca la categoría por su ID
        $category = Category::find($category); 

        // Elimina todas las tareas asociadas a la categoría
        $category->todos()->each(function($todo){
            $todo->delete();
        });

        // Elimina la categoría
        $category->delete(); 

        // Redirige a la lista de categorías con un mensaje de éxito
        return redirect()->route('categories.index')->with('success', 'Categoría ha sido eliminada');
    }
}