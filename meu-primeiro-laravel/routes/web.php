<?php

use App\Http\Controllers\MeuModelController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Home');
});
Route::get('/contato', function () {
    return view('Contatos');
});
Route::get('/produto', function(){
    return view('Produtos');
});
Route::get('/produto', [ProdutoController::class,'index']);

Route::get('/meu-model', [MeuModelController::class,'meumodel']);
