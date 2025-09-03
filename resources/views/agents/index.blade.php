@extends('layouts.app')

@section('content')
<h1>Agentes</h1>
<div class="actions" style="margin:12px 0">
    <a class="btn" href="{{ route('agents.create') }}">+ Nuevo agente</a>
</div>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Usuario</th>
        <th>Empresa</th>
        <th>Puesto</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach($agents as $agent)
        <tr>
            <td>{{ $agent->id }}</td>
            <td>{{ $agent->user->name ?? '-' }}</td>
            <td>{{ $agent->company->name ?? '-' }}</td>
            <td>{{ $agent->position }}</td>
            <td class="actions">
                <a class="btn secondary" href="{{ route('agents.show', $agent) }}">Ver</a>
                <a class="btn secondary" href="{{ route('agents.edit', $agent) }}">Editar</a>
                <form action="{{ route('agents.destroy', $agent) }}" method="POST" onsubmit="return confirm('¿Eliminar agente?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn danger" type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<div style="margin-top:12px">{{ $agents->links() }}</div>
@endsection
