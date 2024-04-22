@extends('admin.app')

@section('content')
    <div class="container w-50">
        <form method="POST"
            action="{{ isset($category) ?route('categories.update', ['category' => $category->id]) : route('categories.store') }}"
            enctype="multipart/form-data">
            @csrf
            @if (isset($category))
                @method('PUT')
            @endif

            <div class="form-group mt-3">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="{{ old('name', isset($category) ? $category->name : '') }}">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-3 w-50">
                <label for="image">Foto</label>
                <input type="file" class="form-control" id="inputImage" name="image" accept="image/*">
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-check mt-3">
                <input type="hidden" name="active" value="0">
                <input class="form-check-input" type="checkbox" id="active" name="active" value="1"
                    {{ old('active', isset($category) && $category->active ? 'checked' : '') }}>
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
<script defer>
    
</script>
