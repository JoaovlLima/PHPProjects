<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta;
use App\Models\Agendamento;
use Illuminate\Support\Facades\Auth;

class ConsultaController extends Controller
{
    // Exibir todas as consultas do usuário autenticado
    public function index()
    {
        // Recupera o usuário autenticado
        $usuario = Auth::user();

        // Recupera as consultas relacionadas a esse usuário
        $consultas = Consulta::where('usuario_id', $usuario->id)->get();

        // Retorna a view com a lista de consultas
        return view('consultas.home', compact('consultas'));
    }

    // Exibir o formulário de criação de uma nova consulta
    public function create()
{
    // Recupera todos os agendamentos disponíveis, independentemente de quem os criou
    $agendamentos = Agendamento::where('disponivel', 'disponivel')->get();

    return view('consultas.create', compact('agendamentos'));
}

public function store(Request $request)
{
    // Validação dos dados
    $request->validate([
        'Agendamento_id' => 'required|exists:agendamentos,id',
        'descricao' => 'required|string|max:255',
    ]);

    // Verifica se o agendamento selecionado está disponível
    $agendamento = Agendamento::find($request->Agendamento_id);

    if (!$agendamento->disponivel) {
        return back()->withErrors(['Agendamento_id' => 'Este horário já está ocupado.']);
    }

    // Criação da nova consulta com status "pendente"
    Consulta::create([
        'Agendamento_id' => $request->Agendamento_id,
        'descricao' => $request->descricao,
        'status' => 'pendente',
        'usuario_id' => Auth::user()->id,
    ]);

    // Atualiza o agendamento para marcar como não disponível
    $agendamento->update(['disponivel' => 'indisponivel']);

    return redirect()->route('consultas.home')->with('success', 'Consulta criada com sucesso.');
}

    // Exibir os detalhes de uma consulta específica
    public function show($id)
    {
        $consulta = Consulta::findOrFail($id);

        return view('consultas.show', compact('consulta'));
    }

    // Exibir o formulário de edição de uma consulta existente
    public function edit($id)
    {
        $consulta = Consulta::findOrFail($id);

        // Verifica se o usuário autenticado pode editar a consulta
        if ($consulta->usuario_id !== Auth::user()->id) {
            return redirect()->route('consultas.home')->withErrors('Você não tem permissão para editar essa consulta.');
        }

        return view('consultas.edit', compact('consulta'));
    }

    // Atualizar uma consulta existente no banco de dados
    public function update(Request $request, $id)
    {
        $consulta = Consulta::findOrFail($id);

        // Validação dos dados
        $request->validate([
            'descricao' => 'required|string|max:255',
            'status' => 'required|in:pendente,confirmada,concluida',
        ]);

        // Verifica se o usuário autenticado pode editar a consulta
        if ($consulta->usuario_id !== Auth::user()->id) {
            return redirect()->route('consultas.home')->withErrors('Você não tem permissão para editar essa consulta.');
        }

        // Atualização dos dados da consulta
        $consulta->update([
            'descricao' => $request->descricao,
            'status' => $request->status,
        ]);

        return redirect()->route('consultas.home')->with('success', 'Consulta atualizada com sucesso.');
    }

    // Excluir uma consulta do banco de dados
    public function destroy($id)
    {
        $consulta = Consulta::findOrFail($id);

        // Verifica se o usuário autenticado pode excluir a consulta
        if ($consulta->usuario_id !== Auth::user()->id) {
            return redirect()->route('consultas.home')->withErrors('Você não tem permissão para excluir essa consulta.');
        }

        $consulta->delete();

        return redirect()->route('consultas.home')->with('success', 'Consulta excluída com sucesso.');
    }
}
