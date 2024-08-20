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
                    <form method="POST" action="{{ route('consultas.store') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="Agendamento_id">Horário Disponível</label>
                            <select name="Agendamento_id" id="Agendamento_id" class="form-control" required>
                                @foreach($agendamentos as $agendamento)
                                    <option value="{{ $agendamento->id }}">
                                        {{ $agendamento->data_hora }} - {{ $agendamento->area }}
                                    </option>
                                @endforeach
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
