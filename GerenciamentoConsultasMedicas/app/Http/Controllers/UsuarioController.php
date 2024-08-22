<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;
use App\Rules\ValidCpf;


class UsuarioController extends Controller
{
    // Exibir o formulário de login
    public function showLoginForm()
    {
        return view('usuarios.login');
    }

    // Processar o login do usuário
    public function login(Request $request)
    {
        // Validações para o login
        $credentials = $request->validate([
            'cpf' => ['required', new ValidCpf],
            'password' => ['required'],
        ]);

        // Tenta autenticar com o guard 'usuario'
        if (Auth::guard('usuario')->attempt($credentials)) {
            $request->session()->regenerate(); // Regenera a sessão para evitar fixação de sessão
            return redirect()->intended('/dashboard');
        }

        // Se falhar, retorna com erro
        return back()->withErrors([
            'cpf' => 'As credenciais não correspondem aos nossos registros.',
        ])->onlyInput('cpf');
    }

    // Exibir o formulário de registro
    public function showRegistroForm()
    {
        return view('usuarios.registro');
    }

    // Processar o registro de um novo usuário
    public function registro(Request $request)
{
     // Validações para o registro
     $request->validate([
        'nome' => 'required|string|max:255',
        'cpf' => ['required', new ValidCpf],
        'password' => 'required|string|min:5',
        'tipo' => 'required|in:medico,paciente',
        'crm' => 'nullable|string|required_if:tipo,medico',
        'area' => 'nullable|array|required_if:tipo,medico',
    ]);

    // Cria um novo usuário com base no tipo
    $usuario = Usuario::create([
        'nome' => $request->nome,
        'cpf' => $request->cpf,
        'password' => Hash::make($request->password),
        'tipo' => $request->tipo,
        'crm' => $request->tipo === 'medico' ? $request->crm : null,
    ]);

    // Salva as áreas médicas
    if ($request->tipo === 'medico' && $request->filled('area')) {
        foreach ($request->area as $area) {
            $usuario->areaMedicas()->create(['area' => $area]);
        }
    }

    // Faz login automático do novo usuário
    Auth::guard('usuario')->login($usuario);

    return redirect('/dashboard');
}


    // Realizar o logout do usuário
    public function logout(Request $request)
    {
        Auth::guard('usuario')->logout(); // Logout do guard 'web'
        $request->session()->invalidate(); // Invalida a sessão
        $request->session()->regenerateToken(); // Regenera o token da sessão

        return redirect('/');
    }
}
