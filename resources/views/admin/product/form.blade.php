@extends('admin.app')

@section('content')
    @isset($product)
    <h1 class="text-center">Editar produto</h1>
    @else
    <h1 class="text-center">Criar produto</h1>
    @endisset
    <div class="container w-50">
        <form method="POST"
            action="{{ isset($product) ?route('admin.products.update', ['product' => $product->id]) : route('admin.products.store') }}"
            enctype="multipart/form-data">
            @csrf
            @if (isset($product))
                @method('PUT')
            @endif

            <div class="form-group mt-3 col-6">
                <label for="category">Categoria</label>
                <select class="form-select" name="category_id" id="category">
                    <option value="" selected disabled style="display: none;">Selecione uma categoria</option>
                    @foreach ($categories as $category)
                        <option
                            {{ (old('category') == $category->id ? 'selected' : (isset($product) && $product->category_id == $category->id ? 'selected' : '')) }} 
                            value="{{$category->id}}"
                            data-size="{{$category->size}}">
                            {{$category->name}}
                        </option>
                    @endforeach
                </select>                
                @error('category')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name" required
                    value="{{ old('name', isset($product) ? $product->name : '') }}">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="description">Descrição</label>
                <input type="text" class="form-control" id="description" name="description" required
                    value="{{ old('description', isset($product) ? $product->description : '') }}">
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div id="price-group" class="form-group mt-3">
                <label for="price">Preço</label>
                <div class="input-group w-25 mb-3">
                    <input type="number" class="form-control" name="price"
                        value="{{ old('price', isset($product) ? $product->price : '') }}">
                    <span class="input-group-text">,00</span>
                </div>
            </div>
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div id="second-price-group" class="form-group mt-3">
                <label for="price">Preço 2</label>
                <div class="input-group w-25 mb-3">
                    <input type="number" class="form-control" name="second_price"
                        value="{{ old('second_price', isset($product) ? $product->second_price : '') }}">
                    <span class="input-group-text">,00</span>
                </div>
            </div>

            <div class="form-check mt-3">
                <input type="hidden" name="active" value="0">
                <input class="form-check-input" type="checkbox" id="active" name="active" value="1" @empty($product) checked @endempty @if(isset($product) && $product->active) checked @endif>
                <label class="form-check-label" for="active">Ativo</label>
                @error('active')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-3">{{ isset($product) ? 'Atualizar' : 'Cadastrar' }}</button>
        </form>

    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('#category').trigger('change');
    $('#category').change(function(){
        console.log('change')
        var selectedCategorySize = $(this).children("option:selected").data('size');
        if(selectedCategorySize){
            $('#price-group').hide();
        } else {
            $('#price-group').show();
        }
    }).triggerHandler('change');
});
</script>

