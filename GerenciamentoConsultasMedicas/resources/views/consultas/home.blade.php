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

    @if ($errors->has('authorization'))
        <div class="alert alert-danger text-center">
            {{ $errors->first('authorization') }}
        </div>
    @endif

    @if ($consultas->isEmpty())
        <p class="text-center">Você ainda não tem consultas agendadas.</p>
    @else
        <div class="row mt-4">
            @foreach ($consultas as $consulta)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            Consulta #{{ $consulta->id }}
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $consulta->descricao }}</h5>
                            <p class="card-text">
                                <strong>Status:</strong>
                                <span class="badge
                                    @if($consulta->status === 'pendente') badge-warning
                                    @elseif($consulta->status === 'confirmado') badge-info
                                    @else badge-success
                                    @endif" style="color: black">
                                    {{ ucfirst($consulta->status) }}
                                </span>
                            </p>
                            <p class="card-text">
                                <strong>Data e Hora:</strong> {{ \Carbon\Carbon::parse($consulta->agendamento->data_hora)->format('d/m/Y H:i') }}
                            </p>

                            <div class="d-flex justify-content-between">
                                @if(Auth::guard('usuario')->user()->tipo === 'medico')
                                    @if($consulta->status === 'pendente')
                                        <form action="{{ route('consultas.updateStatus', $consulta->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="confirmado">
                                            <button type="submit" class="btn btn-info btn-sm">Confirmar</button>
                                        </form>
                                    @elseif($consulta->status === 'confirmado')
                                        <form action="{{ route('consultas.updateStatus', $consulta->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="concluida">
                                            <button type="submit" class="btn btn-success btn-sm">Concluir</button>
                                        </form>
                                    @endif
                                @endif
                                <a href="{{ route('consultas.edit', $consulta->id) }}" class="btn btn-primary btn-sm">
                                    Editar
                                </a>
                                <form action="{{ route('consultas.destroy', $consulta->id) }}" method="POST" onsubmit="return confirm('Você tem certeza que deseja excluir esta consulta?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Excluir
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <div class="text-center mt-4">
        <a href="{{ route('consultas.create') }}" class="btn btn-success">Agendar Nova Consulta</a>
    </div>
</div>
@endsection
