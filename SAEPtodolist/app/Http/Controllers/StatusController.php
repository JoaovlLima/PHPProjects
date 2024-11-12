<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    // Exibir lista de status
    public function index()
    {
        $statuses = Status::all();
        return view('status.index', compact('statuses'));
    }

    // Mostrar o formulário para criar um novo status
    public function create()
    {
        return view('status.create');
    }

    // Armazenar um novo status
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        Status::create($request->all());

        return redirect()->route('status.index')->with('success', 'Status criado com sucesso.');
    }

    // Mostrar o formulário para editar um status
    public function edit(Status $status)
    {
        return view('status.edit', compact('status'));
    }

    // Atualizar o status no banco de dados
    public function update(Request $request, Status $status)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $status->update($request->all());

        return redirect()->route('status.index')->with('success', 'Status atualizado com sucesso.');
    }

    // Deletar um status
    public function destroy(Status $status)
    {
        $status->delete();

        return redirect()->route('status.index')->with('success', 'Status deletado com sucesso.');
    }
}
