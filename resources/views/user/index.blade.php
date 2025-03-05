@extends('theme.base')

@section('content')
    <div class="container py-5">
        <h1 class="text-center">Usuarios</h1>
        <a href="{{ route('user.create') }}" class="btn btn-primary">Crear Usuario</a>

        @if (Session::has('message'))
            <div class="alert alert-info my-5">
                {{ Session::get('message') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <th>Nombre</th>
                <th>Email</th>
                <th>Nivel</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->level }}</td>
                        <td>
                            <a href="{{ route('user.edit', $user)}}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('user.destroy', $user) }}" method="post" class="d-inline">
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
        @if ($users->count())
            {{ $users->links() }}
        @endif
        
    </div>
@endsection