<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [UsuarioController::class, 'showLoginForm'])->
name('usuarios.login.form');

Route::post('/login', [UsuarioController::class, 'login'])->
name('usuarios.login');

// Rota para exibir o formulário de registro
Route::get('/registro', [UsuarioController::class, 'showRegistroForm'])->
name('usuarios.registro.form');

// Rota para processar o registro
Route::post('/registro', [UsuarioController::class, 'registro'])->
name('usuarios.registro');

// Rota para logout
Route::post('/logout', [UsuarioController::class, 'logout'])->
name('usuarios.logout');

// Rota para exibir a home
Route::get('/', function () {
    return view('home');
});


// Rota para o dashboard, protegida por autenticação
Route::get('/dashboard', function () {
    return view('usuarios.dashboard');
})->middleware('auth')->name('dashboard');


