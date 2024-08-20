<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">Consultas Médicas</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('agendamentos.home') }}">Meus Agendamentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('consultas.home') }}">Minhas Consultas</a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('usuarios.logout') }}">
                            @csrf
                            <button class="nav-link btn btn-link" type="submit">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('usuarios.login.form') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('usuarios.registro.form') }}">Registrar</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
