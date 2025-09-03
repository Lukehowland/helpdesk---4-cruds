@extends('layouts.app')

@section('content')
<h1>Usuario #{{ $user->id }}</h1>
<p><strong>Nombre:</strong> {{ $user->name }}</p>
<p><strong>Email:</strong> {{ $user->email }}</p>
<p><strong>Rol:</strong> {{ $user->role }}</p>
<p><strong>Empresa:</strong> {{ $user->company->name ?? '-' }}</p>
<div class="actions" style="margin-top:12px">
    <a class="btn secondary" href="{{ route('users.index') }}">Volver</a>
    <a class="btn" href="{{ route('users.edit', $user) }}">Editar</a>
</div>
@endsection
