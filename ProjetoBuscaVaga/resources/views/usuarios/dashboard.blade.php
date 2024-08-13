@extends('layouts.app')

@section('content')


<div>
<h2>Dashboard - usuario </h2>
<form action="{{route('usuarios.logout')}}" method="POST">
@csrf
<input type="submit" value="sair">
</form>
</div>



@endsection
