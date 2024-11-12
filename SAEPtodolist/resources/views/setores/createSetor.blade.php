@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Criar Setor</h1>
        <form action="{{ route('setores.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Criar Setor</button>
        </form>
    </div>
@endsection
