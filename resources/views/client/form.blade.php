@extends('theme.base')

@section('content')
    <div class="container py-5 text-center">
        @if (isset($client))
            <h1 class="">Editar Cliente</h1>
            <form action="{{ route('client.update', $client) }}" method="post">
                @method('PUT')
        @else
            <h1 class="">Crear Cliente</h1>
            <form action="{{ route('client.store') }}" method="post">
        @endif
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') ?? @$client->name }}">
                @error('name')
                    <p class="form-text text-danger"> {{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="due" class="form-label">Saldo</label>
                <input type="number" name="due" class="form-control" step="0.01" value="{{ old('due') ?? @$client->due }}">
                @error('due')
                    <p class="form-text text-danger"> {{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="comments" class="form-label">Comentarios</label>
                <textarea name="comments" cols="30" rows="4" class="form-control" value="{{ old('comments') ?? @$client->comments }}"></textarea>
                @error('comments')
                    <p class="form-text text-danger"> {{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-info">Cuardar</button>
        </form>
    </div>
@endsection