@extends('admin.app')

@section('content')
    @isset($category)
    <h1 class="text-center">Editar categoria</h1>
    @else
    <h1 class="text-center">Criar categoria</h1>
    @endisset
    <div class="container w-50">
        <form method="POST"
            action="{{ isset($category) ?route('admin.categories.update', ['category' => $category->id]) : route('admin.categories.store') }}"
            enctype="multipart/form-data">
            @csrf
            @if (isset($category))
                @method('PUT')
            @endif

            <div class="form-group mt-3">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name" required
                    value="{{ old('name', isset($category) ? $category->name : '') }}">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-3 row align-items-center">
                <div class="col-6 row">
                    <div class="col-12">
                        <label for="image">Foto</label>
                        <input @empty($category) required @endempty type="file" class="form-control" id="inputImage" name="image" accept="image/*" onchange="previewImage(event)">
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="position">Posição</label>
                        <input type="number" class="form-control" id="position" name="position" required
                            value="{{ old('position', isset($category) ? $category->position : '') }}">
                        @error('position')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <img id="imagePreview"
                        @isset($category) 
                            src="{{ asset($category->image) }}"
                            alt="{{ $category->name }}"
                        @else 
                            src="{{ asset('img/placeholder-image.png') }}"
                            alt="Escolha uma imagem"
                        @endisset 
                        
                        class="img-thumbnail mt-4" 
                        style="height: 100px; width:150px; object-fit:cover">
                </div>
            </div>

            <div class="form-check mt-3">
                <input type="hidden" name="size" value="0">
                <input class="form-check-input" type="checkbox" id="size" name="size" value="1"
                @if (isset($category) && $category->size)
                    checked
                @endif
                >
                <label class="form-check-label" for="size">Porção</label>
                @error('size')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div id="sizes-container" 
                class="row g-3" 
                @empty($category) hidden @endempty
                @if (isset($category) && !$category->size) hidden @endif
            >
                <div class="col-md-2">
                    <label for="size_m" class="form-label">M</label>
                    <input type="number" name="size_m" class="form-control" id="size_m"
                        value="{{ old('size_m', isset($category) ? $category->size_m : '') }}"
                    >
                </div>
                <div class="col-md-2">
                    <label for="size_g" class="form-label">G</label>
                    <input type="number" name="size_g" class="form-control" id="g"
                        value="{{ old('size_g', isset($category) ? $category->size_g : '') }}"    
                    >
                </div>
                <div class="col-md-2">
                    <label for="size_gg" class="form-label">GG</label>
                    <input type="number" name="size_gg" class="form-control" id="gg"
                        value="{{ old('size_gg', isset($category) ? $category->size_gg : '') }}"
                    >
                </div>
            </div>

            <div class="form-check mt-3">
                <input type="hidden" name="active" value="0">
                <input class="form-check-input" type="checkbox" id="active" name="active" value="1" checked>
                <label class="form-check-label" for="active">Ativo</label>
                @error('active')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-3">{{ isset($category) ? 'Atualizar' : 'Cadastrar' }}</button>
        </form>

    </div>
    <style>
        #image {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
    </style>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script defer>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('imagePreview');
            output.src = reader.result;
            output.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }

    $(document).ready(function(){
        $('#size').change(function(){
            
            if(this.checked){
                $('#sizes-container').removeAttr('hidden');
            }else{
                $('#sizes-container').attr('hidden', 'hidden'); 
            }
        })
    });
</script>
