@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Setor</h1>
        <form action="{{ route('setores.update', $setor->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ $setor->nome }}" required>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao">{{ $setor->descricao }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar Setor</button>
        </form>
    </div>
@endsection
