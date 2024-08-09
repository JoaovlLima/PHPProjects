<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
    @include('components.header')

    <main>
        <h1>Home</h1>
        <section id="produtos">
            <h2>Produtos</h2>
            <p>Aqui você encontrará uma variedade de bebidas e produtos relacionados.</p>
            <!-- Conteúdo dos produtos -->
        </section>

        <section id="contatos">
            <h2>Contatos</h2>
            <p>Entre em contato conosco para mais informações.</p>
            <!-- Informações de contato -->
        </section>
    </main>

    @include('components.footer')
</body>
</html>
