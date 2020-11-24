<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/todo/{id}', [TodoController::class, 'get']);

Route::get('/api/todo', [TodoController::class, 'find']);

Route::post('/api/todo', [TodoController::class, 'add', \App\Http\Requests\AddTodoRequest::class]);

Route::put('/api/todo/{id}', [TodoController::class, 'update', \App\Http\Requests\UpdateTodoRequest::class]);

Route::delete('/api/todo/{id}', [TodoController::class, 'delete']);

Route::post('/api/todo/reorder', [TodoController::class, 'reorder', \App\Http\Requests\ReorderTodoRequest::class]);
