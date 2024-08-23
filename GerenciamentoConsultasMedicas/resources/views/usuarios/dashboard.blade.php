@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="jumbotron text-center bg-primary text-white p-4 rounded">
        <h1 class="display-4">
            @if(Auth::user()->tipo === 'medico')
                Olá, Dr. {{ Auth::user()->nome }}!
            @else
                Olá, {{ Auth::user()->nome }}!
            @endif
        </h1>
        <p class="lead">
            @if(Auth::user()->tipo === 'medico')
                CRM: {{ Auth::user()->crm }}
            @else
                CPF: {{ Auth::user()->cpf }}
            @endif
        </p>
        <p>Gerencie suas consultas e agendamentos facilmente.</p>
    </div>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title">Minhas Consultas</h5>
                    <p class="card-text">Veja e gerencie todas as suas consultas.</p>
                    <a href="{{ route('consultas.home') }}" class="btn btn-primary">Ver Consultas</a>
                </div>
            </div>
        </div>
        @if(Auth::user()->tipo === 'medico')
    <div class="col-md-4">
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h5 class="card-title">Minhas Agendas</h5>
                <p class="card-text">Crie e gerencie suas agendas de consultas.</p>
                <a href="{{ route('agendamentos.home') }}" class="btn btn-primary">Ver Agendas</a>
            </div>
        </div>
    </div>
@endif
        <div class="col-md-4">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title">Perfil</h5>
                    <p class="card-text">Gerencie seu perfil e configurações.</p>
                    <form action="{{route('usuarios.logout')}}" method="POST">
                        @csrf
                        <input type="submit" value="Sair" class="btn btn-danger">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
