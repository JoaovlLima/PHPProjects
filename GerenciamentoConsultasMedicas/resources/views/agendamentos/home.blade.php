@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Meus Agendamentos</h2>
    <div class="mb-3">
        <a href="{{ route('agendamentos.create') }}" class="btn btn-primary">Criar Novo Agendamento</a>
    </div>
    @if($agendamentos->isEmpty())
        <div class="alert alert-info">Você ainda não tem agendamentos.</div>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Data e Hora</th>
                    <th>Área</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($agendamentos as $agendamento)
                    <tr>
                        <td>{{ $agendamento->data_hora }}</td>
                        <td>{{ $agendamento->area }}</td>
                        <td>{{ $agendamento->disponivel }}</td>
                        <td>
                            <a href="{{ route('agendamentos.edit', $agendamento->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('agendamentos.destroy', $agendamento->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este agendamento?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
