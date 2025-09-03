@extends('layouts.app')

@section('content')
<h1>Tickets</h1>
<div class="actions" style="margin:12px 0">
    <a class="btn" href="{{ route('tickets.create') }}">+ Nuevo ticket</a>
</div>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Estado</th>
        <th>Prioridad</th>
        <th>Empresa</th>
        <th>Usuario</th>
        <th>Agente</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach($tickets as $ticket)
        <tr>
            <td>{{ $ticket->id }}</td>
            <td>{{ $ticket->title }}</td>
            <td>{{ $ticket->status }}</td>
            <td>{{ $ticket->priority }}</td>
            <td>{{ $ticket->company->name ?? '-' }}</td>
            <td>{{ $ticket->user->name ?? '-' }}</td>
            <td>{{ $ticket->agent->user->name ?? '-' }}</td>
            <td class="actions">
                <a class="btn secondary" href="{{ route('tickets.show', $ticket) }}">Ver</a>
                <a class="btn secondary" href="{{ route('tickets.edit', $ticket) }}">Editar</a>
                <form action="{{ route('tickets.destroy', $ticket) }}" method="POST" onsubmit="return confirm('¿Eliminar ticket?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn danger" type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<div style="margin-top:12px">{{ $tickets->links() }}</div>
@endsection
