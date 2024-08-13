@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('usuarios.registro') }}">
    @csrf


    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" name="nome" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="password_confirmation">Confirme a Senha</label>
        <input type="password" name="password_confirmation" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="tipo">Tipo de Usuário</label>
        <select name="tipo" id="tipo" class="form-control" required onchange="toggleCNPJField()">
            <option value="usuario">Usuário</option>
            <option value="empresa">Empresa</option>
        </select>
    </div>

    <div class="form-group" id="cnpj-field" style="display: none;">
        <label for="cnpj">CNPJ</label>
        <input type="text" name="cnpj" class="form-control">
    </div>

    <div class="form-group" id="cnpj-field" >
        <label for="nome_empresa">Nome da Empresa</label>
        <input type="text" name="nome_empresa" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Registrar-se</button>
</form>



@endsection
