@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h3>Login</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('usuarios.login') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="cpf">CPF</label>
                            <input type="text" class="form-control @error('cpf') is-invalid @enderror" id="cpf" name="cpf" required>
                            @error('cpf')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Senha</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Entrar</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('usuarios.registro') }}" class="text-primary">Ainda não tem uma conta? Registre-se</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
