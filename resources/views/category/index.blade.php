@extends('theme.base')

@section('content')
    <div class="container py-5">
        <h1 class="text-center">Categorias</h1>
        <a href="{{ route('category.create') }}" class="btn btn-primary">Crear Categoria</a>

        @if (Session::has('message'))
            <div class="alert alert-info my-5">
                {{ Session::get('message') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <th>Id</th>
                <th>Nombre</th>
                <th>Image</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <img src="{{ $category->image }}" alt="" class="img-thumbnail" style="width: 50px">
                        </td>
                        <td>
                            <a href="{{ route('category.edit', $category)}}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('category.destroy', $category) }}" method="post" class="d-inline">
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
        @if ($categories->count())
            {{ $categories->links() }}
        @endif
        
    </div>
@endsection