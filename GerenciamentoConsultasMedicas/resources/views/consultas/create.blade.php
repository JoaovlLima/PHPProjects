@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4>Nova Consulta</h4>
                </div>
                <div class="card-body">
                    <!-- Formulário de Filtro -->
                    <form method="GET" action="{{ route('consultas.create') }}">
                        <div class="form-row mb-3">
                            <div class="col">
                                <label for="area">Especialidade</label>
                                <input type="text" name="area" id="area" class="form-control" value="{{ request('area') }}">
                            </div>
                            <div class="col">
                                <label>&nbsp;</label>
                                <button type="submit" class="btn btn-secondary btn-block">Filtrar</button>
                            </div>
                        </div>
                    </form>

                    <!-- Exibição dos Agendamentos Disponíveis -->
                    <form method="POST" action="{{ route('consultas.store') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="Agendamento_id">Horário Disponível</label>
                            <select name="Agendamento_id" id="Agendamento_id" class="form-control" required>
                                @if($agendamentos->isEmpty())
                                    <option value="">Nenhum horário disponível</option>
                                @else
                                    @foreach($agendamentos as $agendamento)
                                        <option value="{{ $agendamento->id }}">
                                            {{ \Carbon\Carbon::parse($agendamento->data_hora)->format('d/m/Y H:i') }} - {{ $agendamento->area }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="descricao">Descrição</label>
                            <textarea name="descricao" id="descricao" class="form-control" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Criar Consulta</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
