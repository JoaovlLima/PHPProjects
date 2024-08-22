<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agendamento;
use App\Models\AreaMedica;
use Illuminate\Support\Facades\Auth;

class AgendamentoController extends Controller
{
    // Exibir o formulário de criação de agendamento
    public function create()
    {
        return view('agendamentos.create');
    }

    // Processar a criação de um novo agendamento
    public function store(Request $request)
    {
        // Validações para o agendamento
        $request->validate([
            'data_hora' => 'required|date|after:now',
            'area' => 'required|string|max:255',
        ]);

        // Verifica se o usuário logado é um médico
        $usuario = Auth::guard('usuario')->user();
        if ($usuario->tipo !== 'medico') {
            return redirect()->back()->withErrors([
                'authorization' => 'Somente médicos podem criar agendamentos.',
            ]);
        }

        // Verifica se a área selecionada está na lista de áreas do médico
        $areasMedicas = $usuario->areaMedicas->pluck('area')->toArray();
        if (!in_array($request->area, $areasMedicas)) {
            return redirect()->back()->withErrors([
                'area' => 'Você só pode criar agendamentos para suas áreas de atuação: ' . implode(', ', $areasMedicas),
            ]);
        }

        // Cria o novo agendamento
        Agendamento::create([
            'data_hora' => $request->data_hora,
            'usuario_id' => $usuario->id,
            'area' => $request->area,
            'disponivel' => 'disponivel',
        ]);

        return redirect('/dashboard')->with('status', 'Agendamento criado com sucesso!');
    }

    // Exibir todos os agendamentos do médico logado
    public function index()
    {
        // Verifica se o usuário logado é um médico
        $usuario = Auth::guard('usuario')->user();
        if ($usuario->tipo !== 'medico') {
            return redirect()->back()->withErrors([
                'authorization' => 'Somente médicos podem visualizar seus agendamentos.',
            ]);
        }

        // Busca os agendamentos do médico logado
        $agendamentos = Agendamento::where('usuario_id', $usuario->id)->get();

        return view('agendamentos.home', compact('agendamentos'));
    }

    // Exibir o formulário de edição de um agendamento específico
    public function edit($id)
    {
        $agendamento = Agendamento::findOrFail($id);

        // Verifica se o agendamento pertence ao médico logado
        $usuario = Auth::guard('usuario')->user();
        if ($agendamento->usuario_id !== $usuario->id) {
            return redirect()->back()->withErrors([
                'authorization' => 'Você não tem permissão para editar este agendamento.',
            ]);
        }

        return view('agendamentos.edit', compact('agendamento'));
    }

    // Processar a atualização de um agendamento
    public function update(Request $request, $id)
    {
        $agendamento = Agendamento::findOrFail($id);

        // Verifica se o agendamento pertence ao médico logado
        $usuario = Auth::guard('usuario')->user();
        if ($agendamento->usuario_id !== $usuario->id) {
            return redirect()->back()->withErrors([
                'authorization' => 'Você não tem permissão para editar este agendamento.',
            ]);
        }

        // Validações para a atualização
        $request->validate([
            'data_hora' => 'required|date|after:now',
            'area' => 'required|string|max:255',
        ]);

        // Verifica se a área selecionada está na lista de áreas do médico
        $areasMedicas = $usuario->areaMedicas->pluck('area')->toArray();
        if (!in_array($request->area, $areasMedicas)) {
            return redirect()->back()->withErrors([
                'area' => 'Você só pode atualizar agendamentos para suas áreas de atuação: ' . implode(', ', $areasMedicas),
            ]);
        }

        // Atualiza os dados do agendamento
        $agendamento->update([
            'data_hora' => $request->data_hora,
            'area' => $request->area,
        ]);

        return redirect('/dashboard')->with('status', 'Agendamento atualizado com sucesso!');
    }

    // Excluir um agendamento
    public function destroy($id)
    {
        $agendamento = Agendamento::findOrFail($id);

        // Verifica se o agendamento pertence ao médico logado
        $usuario = Auth::guard('usuario')->user();
        if ($agendamento->usuario_id !== $usuario->id) {
            return redirect()->back()->withErrors([
                'authorization' => 'Você não tem permissão para excluir este agendamento.',
            ]);
        }

        $agendamento->delete();

        return redirect('/dashboard')->with('status', 'Agendamento excluído com sucesso!');
    }
}
