@extends('theme.base')

@section('content')
    <div class="container py-5 text-center">
        @if (isset($product))
            <h1 class="">Editar Producto</h1>
            <form action="{{ route('product.update', $product) }}" method="post">
                @method('PUT')
        @else
            <h1 class="">Crear Producto</h1>
            <form action="{{ route('product.store') }}" method="post">
        @endif
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') ?? @$product->name }}">
                @error('name')
                    <p class="form-text text-danger"> {{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descripcion</label>
                <input type="text" name="description" class="form-control" value="{{ old('description') ?? @$product->description }}">
                @error('description')
                    <p class="form-text text-danger"> {{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">URL Imagen</label>
                <input type="text" name="image" class="form-control" value="{{ old('image') ?? @$product->image }}">
                @error('name')
                    <p class="form-text text-danger"> {{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Precio</label>
                <input type="number" name="price" class="form-control" step="0.01" value="{{ old('price') ?? @$product->price }}">
                @error('price')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Categoría</label>
                <select name="category_id" class="form-control">
                    <option value="">-- Selecciona una categoría --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" 
                            {{ (old('category_id') ?? @$product->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-info">Cuardar</button>
        </form>
    </div>
@endsection