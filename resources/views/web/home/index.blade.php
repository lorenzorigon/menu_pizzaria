@extends('web.app')

@section('content')
    <main class="main-container">
        @foreach ($categories as $category)
            <div class="category mt-3 container">
                <div class="row align-items-center">
                    <div class="col-6 image-container px-0">
                        <!-- Inserir a imagem aqui -->
                        <img src="{{ $category->image }}" class="img-fluid w-100" alt="{{ $category->name }}">
                    </div>
                    <div class="col-6 text-white" style="padding-left: 3rem">
                        <!-- Inserir o nome da categoria aqui -->
                        <h1>{{ $category->name }}</h>
                    </div>
                </div>
            </div>
        @endforeach
    </main>
    {{-- footer --}}
    <footer class="text-white bg-dark myfooter py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h5>O melhor lanche da cidade</h5>
                </div>
                <div class="col-md-3">
                    <h6>Horário de funcionamento:</h6>
                    <p>Segunda à Sexta: <span class="orange">19H00 às 23H00</span></p>
                    <p>Sábado: <span class="orange">20H00 às 23H00</span></p>
                </div>
                <div class="col-md-3">
                    <h6>Contato</h6>
                    <p><span class="orange material-symbols-outlined" style="font-size: 22px !important">pin_drop</span>
                        Capão do Cipó - RS</p>
                    <p><i class="orange fab fa-whatsapp" style="font-size: 22px !important"></i>&nbsp; (+55) 9 9605-1548</p>
                </div>
                <div class="col-md-3">
                    <h6>Nossas redes</h6>
                    <p><i class="orange fab fa-instagram" style="font-size: 22px !important"></i>&nbsp; @LancheriaRodrigues
                    </p>
                </div>
            </div>

            <hr>

            <p class="text-muted">© 2024, desenvolvido por Lorenzo Cardoso</p>
        </div>
    </footer>
@endsection
