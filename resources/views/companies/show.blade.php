@extends('layouts.app')

@section('content')
<h1>Empresa #{{ $company->id }}</h1>
<p><strong>Nombre:</strong> {{ $company->name }}</p>
<p><strong>Email:</strong> {{ $company->email }}</p>
<p><strong>Teléfono:</strong> {{ $company->phone }}</p>
<p><strong>Estado:</strong> {{ $company->status }}</p>
<div class="actions" style="margin-top:12px">
    <a class="btn secondary" href="{{ route('companies.index') }}">Volver</a>
    <a class="btn" href="{{ route('companies.edit', $company) }}">Editar</a>
</div>
@endsection
