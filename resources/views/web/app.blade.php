<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cardápio - Rodrigues Pizzaria</title>
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    </head>
    {{-- header --}}
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark myheader">
            <a class="navbar-brand" href="#"><img id="logo" src="{{asset('img/logo.jpg')}}" alt=""></a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav d-flex justify-content-between w-100 px-5">
                    <li class="nav-item active border-bottom">
                        <a class="nav-link" href="#">Cardápio</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><i class="orange fab fa-whatsapp"></i> &nbsp; (55) 9 9605-1548</a>
                    </li>
                    <!-- Adicione mais itens de navegação aqui -->
                </ul>
            </div>
        </nav>
    </header>
    <body>
        @yield('content')
    </body>
</html>
