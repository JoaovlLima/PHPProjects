<?php

namespace App\Http\Controllers;

use App\Models\Setor;
use Illuminate\Http\Request;

class SetorController extends Controller
{
    // Exibir lista de setores
    public function index()
    {
        $setores = Setor::all();
        return view('setores.index', compact('setores'));
    }

    // Mostrar o formulário para criar um novo setor
    public function create()
    {
        return view('setores.create');
    }

    // Armazenar um novo setor
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        Setor::create($request->all());

        return redirect()->route('setores.index')->with('success', 'Setor criado com sucesso.');
    }

    // Mostrar o formulário para editar um setor
    public function edit(Setor $setor)
    {
        return view('setores.edit', compact('setor'));
    }

    // Atualizar o setor no banco de dados
    public function update(Request $request, Setor $setor)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        $setor->update($request->all());

        return redirect()->route('setores.index')->with('success', 'Setor atualizado com sucesso.');
    }

    // Deletar um setor
    public function destroy(Setor $setor)
    {
        $setor->delete();

        return redirect()->route('setores.index')->with('success', 'Setor deletado com sucesso.');
    }
}
