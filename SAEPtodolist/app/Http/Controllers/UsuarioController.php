<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // Exibe o formulário de cadastro
    public function create()
    {
        return view('usuario.create');
    }

    // Processa o cadastro do usuário
    public function store(Request $request)
    {
        // Valida os dados do formulário
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
        ]);

        // Cria o novo usuário sem senha
        Usuario::create([
            'nome' => $request->nome,
            'email' => $request->email,
        ]);

        // Redireciona para uma página de sucesso ou outra ação
        return redirect()->route('usuario.create')->with('success', 'Cadastro realizado com sucesso!');
    }
}
