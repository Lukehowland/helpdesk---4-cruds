@extends('layouts.app')

@section('content')
<h1>Usuarios</h1>
<div class="actions" style="margin:12px 0">
    <a class="btn" href="{{ route('users.create') }}">+ Nuevo usuario</a>
</div>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Rol</th>
        <th>Empresa</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <td>{{ $user->company->name ?? '-' }}</td>
            <td class="actions">
                <a class="btn secondary" href="{{ route('users.show', $user) }}">Ver</a>
                <a class="btn secondary" href="{{ route('users.edit', $user) }}">Editar</a>
                <form action="{{ route('users.destroy', $user) }}" method="POST" onsubmit="return confirm('¿Eliminar usuario?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn danger" type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<div style="margin-top:12px">{{ $users->links() }}</div>
@endsection
