@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bem-vindo à Página Inicial</h1>

    <p>Esta é a página inicial da sua aplicação. A partir daqui, você pode acessar diferentes funcionalidades.</p>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Cadastrar Usuário</div>
                <div class="card-body">
                    <p>Cadastre um novo usuário para a aplicação.</p>
                    <a href="{{ route('usuario.create') }}" class="btn btn-primary">Cadastrar</a>
                </div>
            </div>
        </div>

        <!-- Você pode adicionar mais cards ou seções aqui para outras funcionalidades -->
    </div>
</div>
@endsection
