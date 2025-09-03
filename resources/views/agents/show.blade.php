@extends('layouts.app')

@section('content')
<h1>Agente #{{ $agent->id }}</h1>
<p><strong>Usuario:</strong> {{ $agent->user->name ?? '-' }} ({{ $agent->user->email ?? '' }})</p>
<p><strong>Empresa:</strong> {{ $agent->company->name ?? '-' }}</p>
<p><strong>Puesto:</strong> {{ $agent->position }}</p>
<div class="actions" style="margin-top:12px">
    <a class="btn secondary" href="{{ route('agents.index') }}">Volver</a>
    <a class="btn" href="{{ route('agents.edit', $agent) }}">Editar</a>
</div>
@endsection
