@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Setores</h1>
        <a href="{{ route('setores.create') }}" class="btn btn-primary mb-3">Criar Novo Setor</a>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($setores as $setor)
                    <tr>
                        <td>{{ $setor->id }}</td>
                        <td>{{ $setor->nome }}</td>
                        <td>{{ $setor->descricao }}</td>
                        <td>
                            <a href="{{ route('setores.edit', $setor->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('setores.destroy', $setor->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
