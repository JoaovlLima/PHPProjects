@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h3>Registro</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('usuarios.registro') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="nome">Nome Completo</label>
                            <input type="text" class="form-control" id="nome" name="nome" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="cpf">CPF</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Senha</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password_confirmation">Confirme a Senha</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="tipo">Tipo de Usuário</label>
                            <select class="form-control" id="tipo" name="tipo" required>
                                <option value="paciente">Paciente</option>
                                <option value="medico">Médico</option>
                            </select>
                        </div>
                        <div class="form-group mb-3 d-none" id="crm-area">
                            <label for="crm">CRM</label>
                            <input type="text" class="form-control" id="crm" name="crm">
                            <label for="area" class="mt-3">Área de Atuação</label>
                            <input type="text" class="form-control" id="area" name="area">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Registrar</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('usuarios.login') }}" class="text-primary">Já tem uma conta? Faça login</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('tipo').addEventListener('change', function() {
        var crmArea = document.getElementById('crm-area');
        if (this.value === 'medico') {
            crmArea.classList.remove('d-none');
        } else {
            crmArea.classList.add('d-none');
        }
    });
</script>
@endsection
