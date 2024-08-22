<?php

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\AreaMedicaController;
use App\Models\Agendamento;
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
    return view('home_principal');
});

Route::resource('/agendamentos',AgendamentoController::class);



// Rota para o dashboard, protegida por autenticação
Route::get('/dashboard', function () {
    return view('usuarios.dashboard');
})->middleware('auth')->name('dashboard');


// Rotas para Agendamento
Route::get('/agendamentos', [AgendamentoController::class, 'index'])
    ->name('agendamentos.home')
    ->middleware('auth'); // Somente autenticado pode ver agendamentos

Route::get('/agendamentos/create', [AgendamentoController::class, 'create'])
    ->name('agendamentos.create')
    ->middleware('auth'); // Somente autenticado pode criar agendamentos

Route::post('/agendamentos', [AgendamentoController::class, 'store'])
    ->name('agendamentos.store')
    ->middleware('auth'); // Somente autenticado pode criar agendamentos

Route::get('/agendamentos/{id}/edit', [AgendamentoController::class, 'edit'])
    ->name('agendamentos.edit')
    ->middleware('auth'); // Somente autenticado pode editar agendamentos

Route::put('/agendamentos/{id}', [AgendamentoController::class, 'update'])
    ->name('agendamentos.update')
    ->middleware('auth'); // Somente autenticado pode atualizar agendamentos

Route::delete('/agendamentos/{id}', [AgendamentoController::class, 'destroy'])
    ->name('agendamentos.destroy')
    ->middleware('auth'); // Somente autenticado pode excluir agendamentos

// Rotas para Consulta
Route::get('/consultas', [ConsultaController::class, 'index'])
    ->name('consultas.home')
    ->middleware('auth'); // Somente autenticado pode ver consultas

Route::get('/consultas/create', [ConsultaController::class, 'create'])
    ->name('consultas.create')
    ->middleware('auth'); // Somente autenticado pode criar consultas

Route::post('/consultas', [ConsultaController::class, 'store'])
    ->name('consultas.store')
    ->middleware('auth'); // Somente autenticado pode criar consultas

Route::get('/consultas/{id}', [ConsultaController::class, 'show'])
    ->name('consultas.show')
    ->middleware('auth'); // Somente autenticado pode ver detalhes da consulta

Route::get('/consultas/{id}/edit', [ConsultaController::class, 'edit'])
    ->name('consultas.edit')
    ->middleware('auth'); // Somente autenticado pode editar consultas

Route::put('/consultas/{id}', [ConsultaController::class, 'update'])
    ->name('consultas.update')
    ->middleware('auth'); // Somente autenticado pode atualizar consultas

Route::delete('/consultas/{id}', [ConsultaController::class, 'destroy'])
    ->name('consultas.destroy')
    ->middleware('auth'); // Somente autenticado pode excluir consultas

 Route::resource('areas-medicas', AreaMedicaController::class);

 Route::patch('/consultas/{id}/status', [ConsultaController::class, 'updateStatus'])->name('consultas.updateStatus');

