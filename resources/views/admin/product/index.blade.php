@extends('admin.app')

@section('content')
<h1 class="text-center">Lista de produtos</h1>
<div class="container mt-5">
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Cadastrar</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th scope="col" class="align-middle">Nome</th>
                <th scope="col" class="align-middle">Preço</th>
                <th scope="col" class="align-middle">Categoria</th>
                <th scope="col" class="align-middle">Status</th>
                <th scope="col" class="align-middle">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td class="align-middle">{{ $product->nome }}</td>
                    <td class="align-middle">{{ $product->position}}</td>
                    <td class="align-middle">{{ $product->active ? 'Ativo' : 'Inativo' }}</td>
                    <td class="align-middle">
                        <a href="{{ route('admin.products.edit', ['product' => $product->id]) }}" class="btn btn-warning"><i
                                class="material-icons" style="font-size: 16px">edit</i> Editar</a>
                        <form action="{{ route('admin.products.destroy', ['product' => $product->id]) }}" method="POST"
                            class="d-inline-block mb-0">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger delete-btn"><i class="material-icons"
                                    style="font-size: 16px">delete</i>Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function() {
        $('.delete-btn').click(function(e) {
            e.preventDefault();
            var form = this.parentElement;
            console.log(form)
            Swal.fire({
                title: 'Você tem certeza?',
                text: "Você não poderá reverter isso!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, deletar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        });
    });
</script>
