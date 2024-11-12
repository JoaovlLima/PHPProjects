<div class="card mb-3">
    <div class="card-body">
        <h5 class="card-title">{{ $tarefa->titulo }}</h5>
        <p class="card-text">{{ $tarefa->descricao }}</p>
        <p><strong>Data de Criação:</strong> {{ $tarefa->data_criacao }}</p>
        <p><strong>Data de Conclusão:</strong> {{ $tarefa->data_conclusao ?? 'Não concluída' }}</p>

        <!-- Formulário para adicionar responsável -->
        <form action="{{ route('tarefas.atribuirResponsavel', $tarefa->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="usuario_id" class="form-label">Adicionar Responsável</label>
                <select name="usuario_id" class="form-select" required>
                    <option value="" disabled selected>Selecione um usuário</option>
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id }}">{{ $usuario->nome }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Atribuir Responsável</button>
        </form>
    </div>
</div>
