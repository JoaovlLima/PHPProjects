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
                    <li><a href="/vagas">Vagas</a></li>
                    <li><a href="/empresas">Empresas</a></li>
                    <li><a href="/sobre">Sobre Nós</a></li>
                    <li><a href="/contato">Contato</a></li>
                    <li><a href="/login">Login</a></li>
                </ul>
            </nav>

            @if (Auth::check())
            @if (
                request()->user()->where('tipo','empresa')->first())

                    <div>
                        Olá Empresa
                    </div>
            @else
                    <div>
                        Olá Usuário
                    </div>

                    @endif
                    @endif

                    



            <div class="user-actions">
                <a href="/cadastrar" class="btn btn-primary">Cadastrar-se</a>
            </div>
        </div>
    </header>
