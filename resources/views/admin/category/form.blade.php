@extends('admin.app')

@section('content')
    @isset($category)
    <h1>Editar categoria</h1>
    @else
    <h1>Criar categoria</h1>
    @endisset
@endsection