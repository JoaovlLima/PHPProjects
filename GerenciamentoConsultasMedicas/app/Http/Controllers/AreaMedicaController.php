<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AreaMedica;
use Illuminate\Support\Facades\Auth;

class AreaMedicaController extends Controller
{
    // Exibir o formulário para criar uma nova área médica
    public function create()
    {
        return view('area_medicas.create');
    }

    // Processar a criação de uma nova área médica
    public function store(Request $request)
    {
        // Validações para a criação da área médica
        $request->validate([
            'area' => 'required|string|max:255',
        ]);

        // Verifica se o usuário logado é um médico
        $usuario = Auth::guard('usuario')->user();
        if ($usuario->tipo !== 'medico') {
            return redirect()->back()->withErrors([
                'authorization' => 'Somente médicos podem adicionar áreas médicas.',
            ]);
        }

        // Cria a nova área médica
        AreaMedica::create([
            'area' => $request->area,
            'usuario_id' => $usuario->id,
        ]);

        return redirect('/dashboard')->with('status', 'Área médica criada com sucesso!');
    }

    // Exibir todas as áreas médicas do médico logado
    public function index()
    {
        $usuario = Auth::guard('usuario')->user();
        if ($usuario->tipo !== 'medico') {
            return redirect()->back()->withErrors([
                'authorization' => 'Somente médicos podem visualizar suas áreas médicas.',
            ]);
        }

        // Busca as áreas médicas do médico logado
        $areaMedicas = $usuario->areaMedicas;

        return view('area_medicas.index', compact('areaMedicas'));
    }

    // Exibir o formulário de edição de uma área médica específica
    public function edit($id)
    {
        $areaMedica = AreaMedica::findOrFail($id);

        $usuario = Auth::guard('usuario')->user();
        if ($areaMedica->usuario_id !== $usuario->id) {
            return redirect()->back()->withErrors([
                'authorization' => 'Você não tem permissão para editar esta área médica.',
            ]);
        }

        return view('area_medicas.edit', compact('areaMedica'));
    }

    // Processar a atualização de uma área médica
    public function update(Request $request, $id)
    {
        $areaMedica = AreaMedica::findOrFail($id);

        $usuario = Auth::guard('usuario')->user();
        if ($areaMedica->usuario_id !== $usuario->id) {
            return redirect()->back()->withErrors([
                'authorization' => 'Você não tem permissão para atualizar esta área médica.',
            ]);
        }

        // Validações para a atualização
        $request->validate([
            'area' => 'required|string|max:255',
        ]);

        // Atualiza os dados da área médica
        $areaMedica->update([
            'area' => $request->area,
        ]);

        return redirect('/dashboard')->with('status', 'Área médica atualizada com sucesso!');
    }

    // Excluir uma área médica
    public function destroy($id)
    {
        $areaMedica = AreaMedica::findOrFail($id);

        $usuario = Auth::guard('usuario')->user();
        if ($areaMedica->usuario_id !== $usuario->id) {
            return redirect()->back()->withErrors([
                'authorization' => 'Você não tem permissão para excluir esta área médica.',
            ]);
        }

        $areaMedica->delete();

        return redirect('/dashboard')->with('status', 'Área médica excluída com sucesso!');
    }
}
