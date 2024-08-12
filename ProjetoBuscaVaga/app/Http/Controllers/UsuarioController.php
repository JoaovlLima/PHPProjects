<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    //Registro, Login e Logout

// Exibir o formulário de login
public function showLoginForm()
{
    return view('usuarios.login');
}


// Processar o login do usuário
public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);


    if (Auth::guard('web')->attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/dashboard');
    }


    return back()->withErrors([
        'email' => 'As credenciais não correspondem aos nossos registros.',
    ])->onlyInput('email');
}


// Exibir o formulário de registro
public function showRegistroForm()
{
    return view('usuarios.registro');
}


// Processar o registro de um novo usuário
public function registro(Request $request)
{
    $request->validate([
        'nome' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:usuarios',
        'password' => 'required|string|min:8|confirmed',
    ]);


    $usuario = Usuario::create([
        'nome' => $request->nome,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);


    Auth::login($usuario);


     return redirect('/dashboard');
}


// Realizar o logout do usuário
public function logout(Request $request)
{
    Auth::logout();


    $request->session()->invalidate();
    $request->session()->regenerateToken();


    return redirect('/');
}


}
