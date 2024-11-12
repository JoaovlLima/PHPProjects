<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Tarefa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1>Criar Tarefa</h1>

    <!-- Exibe erros de validação, se houver -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulário para criar uma tarefa -->
    <form action="{{ route('tarefas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo') }}" required>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao">{{ old('descricao') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="data_criacao" class="form-label">Data de Criação</label>
            <input type="date" class="form-control" id="data_criacao" name="data_criacao" value="{{ old('data_criacao') }}" required>
        </div>

        <div class="mb-3">
            <label for="data_conclusao" class="form-label">Data de Conclusão</label>
            <input type="date" class="form-control" id="data_conclusao" name="data_conclusao" value="{{ old('data_conclusao') }}">
        </div>

        <div class="mb-3">
            <label for="status_id" class="form-label">Status</label>
            <select class="form-select" id="status_id" name="status_id" required>
                <option value="" disabled selected>Selecione o status</option>
                @foreach ($statuses as $status)
                    <option value="{{ $status->id }}" {{ old('status_id') == $status->id ? 'selected' : '' }}>
                        {{ $status->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="setor_id" class="form-label">Setor</label>
            <select class="form-select" id="setor_id" name="setor_id" required>
                <option value="" disabled selected>Selecione o setor</option>
                @foreach ($setores as $setor)
                    <option value="{{ $setor->id }}" {{ old('setor_id') == $setor->id ? 'selected' : '' }}>
                        {{ $setor->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Criar Tarefa</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
