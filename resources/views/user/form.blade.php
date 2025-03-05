@extends('theme.base')

@section('content')
    <div class="container py-5r">
        @if (isset($user))
            <h1 class="">Editar Usuario</h1>
            <form action="{{ route('user.update', $user) }}" method="post">
                @method('PUT')
        @else
            <h1 class="">Crear Usuario</h1>
            <form action="{{ route('user.store') }}" method="post">
        @endif
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') ?? @$user->name }}">
                @error('name')
                    <p class="form-text text-danger"> {{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Apellido</label>
                <input type="text" name="last_name" class="form-control" value="{{ old('last_name') ?? @$user->last_name }}">
                @error('last_name')
                    <p class="form-text text-danger"> {{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">email</label>
                <input type="text" name="email" class="form-control" value="{{ old('email') ?? @$user->email }}">
                @error('email')
                    <p class="form-text text-danger"> {{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name="password" class="form-control">
                @error('password')
                    <p class="form-text text-danger"> {{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="level" class="form-label">Nivel</label>
                <select name="level" id="level" class="form-select">
                    <option value="">Seleccione un nivel</option>
                    <option value="0" {{ old('level', @$user->level) == '0' ? 'selected' : '' }}>Nivel 0</option>
                    <option value="1" {{ old('level', @$user->level) == '1' ? 'selected' : '' }}>Nivel 1</option>
                    <option value="2" {{ old('level', @$user->level) == '2' ? 'selected' : '' }}>Nivel 2</option>
                    <option value="3" {{ old('level', @$user->level) == '3' ? 'selected' : '' }}>Nivel 3</option>
                </select>
                @error('level')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-info">Cuardar</button>
        </form>
    </div>
@endsection