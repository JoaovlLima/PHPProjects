@extends('layouts.app')

@section('title', 'Editar Consulta')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Editar Consulta</h1>

    <div class="card mt-4">
        <div class="card-body">
            <form action="{{ route('consultas.update', $consulta->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" name="descricao" id="descricao" class="form-control @error('descricao') is-invalid @enderror" value="{{ old('descricao', $consulta->descricao) }}" placeholder="Descrição da consulta">
                    @error('descricao')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                        <option value="pendente" {{ $consulta->status == 'pendente' ? 'selected' : '' }}>Pendente</option>
                        <option value="confirmada" {{ $consulta->status == 'confirmada' ? 'selected' : '' }}>Confirmada</option>
                        <option value="concluida" {{ $consulta->status == 'concluida' ? 'selected' : '' }}>Concluída</option>
                    </select>
                    @error('status')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                    <a href="{{ route('consultas.home') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
