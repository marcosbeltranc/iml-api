@extends('theme.base')

@section('content')
    <div class="container py-5">
        <h1 class="text-center">Productos</h1>
        <a href="{{ route('product.create') }}" class="btn btn-primary">Crear Produco</a>

        @if (Session::has('message'))
            <div class="alert alert-info my-5">
                {{ Session::get('message') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <th>Id</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Image</th>
                <th>Categoria</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                            <img src="{{ $product->image }}" alt="" class="img-thumbnail" style="width: 50px">
                        </td>
                        <td>{{ $product->category }}</td>
                        <td>
                            <a href="{{ route('product.edit', $product)}}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('product.destroy', $product) }}" method="post" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" type="submit" onclick="return confirm('Estas seguro de eliminar este registro?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>No existen registros</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        @if ($products->count())
            {{ $products->links() }}
        @endif
        
    </div>
@endsection