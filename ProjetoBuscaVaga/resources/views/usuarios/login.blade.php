@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('usuarios.login') }}">
    @csrf

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>


    <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" name="password" class="form-control" required>
    </div>


    <button type="submit" class="btn btn-primary">Login</button>
</form>


@endsection
