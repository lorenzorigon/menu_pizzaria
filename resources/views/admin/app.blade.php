<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador - Pizzaria</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('admin.categories.index') }}">Categorias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.products.index') }}">Produtos</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div
        style="background-color: #f0f0f0; /* Cor de fundo */
             min-height: 100vh; /* Altura mínima para ocupar toda a tela */
             padding-top: 20px; /* Espaçamento do topo */
             padding-bottom: 20px; /* Espaçamento do rodapé */
             ">
        @yield('content')
    </div>
    <footer class="text-white bg-dark myfooter py-4">
        <div class="container">
            <hr>
            <p class="text-muted">© 2024, desenvolvido por Lorenzo Cardoso</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
