<?php

namespace App\Http\Controllers;


use App\Models\Status;
use App\Models\Setor;
use Illuminate\Http\Request;
use App\Models\Tarefa;

class TarefaController extends Controller
{
    public function create()
    {
        // Obtenha todos os status e setores para a view
        $statuses = Status::all();
        $setores = Setor::all();

        // Retorne a view com os dados
        return view('tarefas.create', compact('statuses', 'setores'));
    }

    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'data_criacao' => 'required|date',
            'data_conclusao' => 'nullable|date',
            'status_id' => 'required|exists:statuses,id',
            'setor_id' => 'required|exists:setores,id',
        ]);

        // Criação da tarefa
        Tarefa::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'data_criacao' => $request->data_criacao,
            'data_conclusao' => $request->data_conclusao,
            'status_id' => $request->status_id,
            'setor_id' => $request->setor_id,
        ]);

        // Redireciona para a página de tarefas
        return redirect()->route('tarefas.index')->with('success', 'Tarefa criada com sucesso!');
    }

    public function index()
{
    $tarefas = [
        'a_fazer' => Tarefa::where('status_id', 1)->get(),
        'fazendo' => Tarefa::where('status_id', 2)->get(),
        'pronto' => Tarefa::where('status_id', 3)->get(),
    ];

    return view('tarefas.index', compact('tarefas'));
}

public function atribuirResponsavel(Request $request, $id)
{
    $tarefa = Tarefa::findOrFail($id);
    $tarefa->usuario_id = $request->usuario_id; // campo para o responsável
    $tarefa->save();

    return redirect()->back()->with('success', 'Responsável atribuído com sucesso!');
}

}
