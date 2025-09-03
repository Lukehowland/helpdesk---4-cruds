@extends('layouts.app')

@section('content')
<h1>Empresas</h1>
<div class="actions" style="margin:12px 0">
    <a class="btn" href="{{ route('companies.create') }}">+ Nueva empresa</a>
</div>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Teléfono</th>
        <th>Estado</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach($companies as $company)
        <tr>
            <td>{{ $company->id }}</td>
            <td>{{ $company->name }}</td>
            <td>{{ $company->email }}</td>
            <td>{{ $company->phone }}</td>
            <td>{{ $company->status }}</td>
            <td class="actions">
                <a class="btn secondary" href="{{ route('companies.show', $company) }}">Ver</a>
                <a class="btn secondary" href="{{ route('companies.edit', $company) }}">Editar</a>
                <form action="{{ route('companies.destroy', $company) }}" method="POST" onsubmit="return confirm('¿Eliminar empresa?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn danger" type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<div style="margin-top:12px">{{ $companies->links() }}</div>
@endsection
