<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController; 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'show']);

Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'show']);

Route::post('/login', [LoginController::class, 'login']);

Route::get('/logout', [LogoutController::class, 'logout']);



Route::get('/tareas', [TodosController::class, 'index'])->name('todos');

Route::post('/tareas', [TodosController::class, 'store'])->name('todos');

Route::get('/tareas/{id}', [TodosController::class, 'show'])->name('todos-edit');

Route::patch('/tareas/{id}', [TodosController::class, 'update'])->name('todos-update');

Route::delete('/tareas/{id}', [TodosController::class, 'destroy'])->name('todos-destroy');

Route::resource('categories', CategoriesController::class);

Route::patch('/todos/{id}/complete', [TodosController::class, 'markAsCompleted'])->name('todos-complete');

Route::get('/todos/completed', [TodosController::class, 'completed'])->name('todos-completed');
