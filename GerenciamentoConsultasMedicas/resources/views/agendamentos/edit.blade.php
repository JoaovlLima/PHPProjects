@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Editar Agendamento</h2>
    <form method="POST" action="{{ route('agendamentos.update', $agendamento->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="data_hora">Data e Hora</label>
            <input type="datetime-local" class="form-control @error('data_hora') is-invalid @enderror" id="data_hora" name="data_hora" value="{{ old('data_hora', $agendamento->data_hora) }}" required>
            @error('data_hora')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="area">Área</label>
            <input type="text" class="form-control @error('area') is-invalid @enderror" id="area" name="area" value="{{ old('area', $agendamento->area) }}" required>
            @error('area')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Atualizar Agendamento</button>
    </form>
</div>
@endsection