@extends('theme.base')

@section('content')
    <div class="container py-5">
        <h1 class="text-center">Clientes</h1>
        <a href="{{ route('client.create') }}" class="btn btn-primary">Crear Cliente</a>

        @if (Session::has('message'))
            <div class="alert alert-info my-5">
                {{ Session::get('message') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <th>Nombre</th>
                <th>Saldo</th>
                <th>Commentarios</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                @forelse ($clients as $client)
                    <tr>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->due }}</td>
                        <td>{{ $client->comments }}</td>
                        <td>
                            <a href="{{ route('client.edit', $client)}}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('client.destroy', $client) }}" method="post" class="d-inline">
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
        @if ($clients->count())
            {{ $clients->links() }}
        @endif
        
    </div>
@endsection