@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">Registro</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('usuarios.registro') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" id="nome" value="{{ old('nome') }}" required>
                            @error('nome')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="cpf">CPF</label>
                            <input type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf" id="cpf" value="{{ old('cpf') }}" required>
                            @error('cpf')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">Senha</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="tipo">Tipo de Usuário</label>
                            <select name="tipo" id="tipo" class="form-control @error('tipo') is-invalid @enderror" required>
                                <option value="paciente" {{ old('tipo') == 'paciente' ? 'selected' : '' }}>Paciente</option>
                                <option value="medico" {{ old('tipo') == 'medico' ? 'selected' : '' }}>Médico</option>
                            </select>
                            @error('tipo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div id="medico-fields" style="display: none;">
                            <div class="form-group mb-3">
                                <label for="crm">CRM</label>
                                <input type="text" class="form-control @error('crm') is-invalid @enderror" name="crm" id="crm" value="{{ old('crm') }}">
                                @error('crm')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="area">Áreas de Atuação</label>
                                <select name="area[]" id="area" class="form-control @error('area') is-invalid @enderror" multiple>
                                    <option value="Cardiologia">Cardiologia</option>
                                    <option value="Pediatria">Pediatria</option>
                                    <option value="Dermatologia">Dermatologia</option>
                                    <option value="Ortopedia">Ortopedia</option>
                                    <option value="Clinico Geral">Clinico Geral</option>
                                    <option value="Ginecologia">Ginecologia</option>


                                    <!-- Adicione outras áreas conforme necessário -->
                                </select>
                                @error('area')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('tipo').addEventListener('change', function () {
        var medicoFields = document.getElementById('medico-fields');
        if (this.value === 'medico') {
            medicoFields.style.display = 'block';
        } else {
            medicoFields.style.display = 'none';
        }
    });

    // Mostrar campos médicos se o valor antigo for 'medico'
    if (document.getElementById('tipo').value === 'medico') {
        document.getElementById('medico-fields').style.display = 'block';
    }
</script>
@endsection
