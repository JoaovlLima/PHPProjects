@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h1 class="mb-4">Bem-vindo ao Sistema de Gerenciamento de Consultas Médicas</h1>
            <p class="lead mb-5">Gerencie suas consultas de forma fácil e rápida. Médicos e pacientes, façam login ou registrem-se para acessar suas contas.</p>

            <div class="d-flex justify-content-center">
                <a href="/login" class="btn btn-primary btn-lg mx-2">Login</a>
                <a href="/registro" class="btn btn-secondary btn-lg mx-2">Registre-se</a>
            </div>
        </div>
    </div>
</div>
@endsection
