@extends('web.app')

@section('content')
    <main class="main-container">
        <div class="w-100">
            <img class="img-fluid" src="{{asset('img/banner.jpeg')}}" alt="">
        </div>
        @foreach ($categories as $category)
            <div class="category mt-4 container">
                <div class="row align-items-center">
                    <div class="col image-container px-0">
                        <!-- Inserir a imagem aqui -->
                        <img src="{{ $category->image }}" class="img-fluid w-100" alt="{{ $category->name }}">
                    </div>
                    <div class="col text-white" style="padding-left: 3rem">
                        <!-- Inserir o nome da categoria aqui -->
                        <h1>{{ $category->name }}</h>
                    </div>
                </div>
            </div>

            @if ($category->size)
            <div class="container mt-3">
                <div class="row justify-content-center">
                        <div class="col-sm-12 col-md-3 mt-1 container-size">
                            <span class="size-btn">M</span><span> R$ {{$category->size_m}},00</span>
                        </div>
                        <div class="col-sm-12 mt-1 col-md-3 container-size">
                            <span class="size-btn">G</span><span> R$ {{$category->size_g}},00</span>
                        </div>
                        <div class="col-sm-12 mt-1 col-md-3 container-size">
                            <span class="size-btn">GG</span><span> R$ {{$category->size_gg}},00</span>
                        </div>
                </div>
            </div>
            @endif

            <div class="container px-0 mt-3">
                <div class="row">
                    @foreach ($category->products as $product)
                        <div class="col-sm-12 col-md-6 mt-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class=" @if($product->price) col-md-9 @else col-md-12 @endif">
                                            <h1 class="card-title">{{ $product->name }}</h1>
                                            <h5 class="card-text">
                                                {{ $product->description }}
                                            </h5>
                                        </div>
                                        @if($product->price)
                                        <div class="col-md-3">
                                            <h1 class="btn btn-primary btn-price d-flex align-items-center justify-content-center">
                                                <div class="valor">
                                                    <span class="moeda">R$</span>{{$product->price}},00
                                                 </div>
                                            </h1>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Repita as colunas para mais cartões -->
                    @endforeach
                </div>
            </div>
        @endforeach
    </main>
    {{-- footer --}}
    <footer class="text-white bg-dark myfooter py-4 mt-3">
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
