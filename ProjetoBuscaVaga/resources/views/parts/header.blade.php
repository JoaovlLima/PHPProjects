<header>
    <div class="container">
        <div class="logo">
            <a href="/">
                <img src="caminho/para/o/logo.png" alt="Logo do Projeto">
            </a>
        </div>
        <nav class="menu">
            <ul>
                <li><a href="/">Início</a></li>

@if (Auth::check())
@if (Auth::user()->isEmpresa())

  <li> <a href="/vagas">Acesse o deshboard de Vagas</a></li>

@endif

@endif
                <li><a href="/empresas">Empresas</a></li>
                <li><a href="/sobre">Sobre Nós</a></li>
                <li><a href="/contato">Contato</a></li>
                <li><a href="/login">Login</a></li>
            </ul>
        </nav>

        @if (Auth::check())

        <div class="user-actions">
            <div>
                <h3>
                    Olá, {{ Auth::user()->nome }}
                </h3>
            </div>
            <div>
                <form action="/logout" method="POST" >
                    @csrf
                    <input type="submit" value="Sair" class="btn btn-primary">
                </form>
            </div>
        </div>
            @else
            <div class="user-actions">
                <a href="/login" class="btn btn-primary">Login</a>
                <a href="/cadastrar" class="btn btn-primary">Cadastrar-se</a>
            </div>
        @endif






    </div>
</header>
