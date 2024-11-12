@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Quadro de Tarefas</h1>
    <div class="row">
        <!-- Coluna A Fazer -->
        <div class="col-md-4">
            <h2 class="text-center">A Fazer</h2>
            @foreach($tarefas->where('status_id', 1) as $tarefa) <!-- Supondo que '1' é o ID para 'A Fazer' -->
                @include('components.tarefaCard', ['tarefa' => $tarefa, 'usuarios' => $usuarios])
            @endforeach
        </div>

        <!-- Coluna Fazendo -->
        <div class="col-md-4">
            <h2 class="text-center">Fazendo</h2>
            @foreach($tarefas->where('status_id', 2) as $tarefa) <!-- Supondo que '2' é o ID para 'Fazendo' -->
                @include('components.tarefaCard', ['tarefa' => $tarefa, 'usuarios' => $usuarios])
            @endforeach
        </div>

        <!-- Coluna Pronto -->
        <div class="col-md-4">
            <h2 class="text-center">Pronto</h2>
            @foreach($tarefas->where('status_id', 3) as $tarefa) <!-- Supondo que '3' é o ID para 'Pronto' -->
                @include('components.tarefaCard', ['tarefa' => $tarefa, 'usuarios' => $usuarios])
            @endforeach
        </div>
    </div>
</div>
@endsection
