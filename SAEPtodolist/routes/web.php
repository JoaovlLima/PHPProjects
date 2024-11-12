<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SetorController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TarefaController;
use App\Http\Controllers\UsuarioController;

Route::get('/tarefas', [TarefaController::class, 'index'])->name('tarefas.index');
Route::post('/tarefas/addResponsavel', [TarefaController::class, 'addResponsavel'])->name('tarefas.addResponsavel');

Route::get('/tarefas/create', [TarefaController::class, 'create'])->name('tarefas.create');
Route::post('/tarefas', [TarefaController::class, 'store'])->name('tarefas.store');


Route::resource('setores', SetorController::class);
Route::resource('status', StatusController::class);
Route::resource('tarefas', TarefaController::class);

// Exibe o formulário de cadastro
Route::get('/cadastro', [UsuarioController::class, 'create'])->name('usuario.create');

// Processa o cadastro de usuário
Route::post('/cadastro', [UsuarioController::class, 'store'])->name('usuario.store');




Route::get('/', function () {
    return view('welcome');
});
