@extends('layouts.app')

@section('title', 'Minhas Consultas')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Minhas Consultas</h1>
    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    @if ($consultas->isEmpty())
        <p class="text-center">Você ainda não tem consultas agendadas.</p>
    @else
        <div class="table-responsive mt-4">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Descrição</th>
                        <th>Status</th>
                        <th>Data e Hora</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($consultas as $consulta)
                        <tr>
                            <td>{{ $consulta->id }}</td>
                            <td>{{ $consulta->descricao }}</td>
                            <td>
                                <span class="badge
                                    @if($consulta->status === 'pendente') badge-warning
                                    @elseif($consulta->status === 'confirmada') badge-info
                                    @else badge-success
                                    @endif">
                                    {{ ucfirst($consulta->status) }}
                                </span>
                            </td>
                            <td>{{ $consulta->agendamento ? $consulta->agendamento->data_hora->format('d/m/Y H:i') : 'Horário não disponível' }}</td>
                            <td class="text-center">
                                <a href="{{ route('consultas.edit', $consulta->id) }}" class="btn btn-primary btn-sm">
                                    Editar
                                </a>
                                <form action="{{ route('consultas.destroy', $consulta->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Você tem certeza que deseja excluir esta consulta?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <div class="text-center mt-4">
        <a href="{{ route('consultas.create') }}" class="btn btn-success">Agendar Nova Consulta</a>
    </div>
</div>
@endsection
