@extends('theme.base')

@section('content')
    <div class="container py-5 text-center">
        @if (isset($category))
            <h1 class="">Editar Categoria</h1>
            <form action="{{ route('category.update', $category) }}" method="post">
                @method('PUT')
        @else
            <h1 class="">Crear Categoria</h1>
            <form action="{{ route('category.store') }}" method="post">
        @endif
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') ?? @$category->name }}">
                @error('name')
                    <p class="form-text text-danger"> {{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">URL Imagen</label>
                <input type="text" name="image" class="form-control" value="{{ old('image') ?? @$category->image }}">
                @error('name')
                    <p class="form-text text-danger"> {{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-info">Cuardar</button>
        </form>
    </div>
@endsection