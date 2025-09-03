@extends('layouts.app')

@section('content')
<h1>Editar agente</h1>
<form action="{{ route('agents.update', $agent) }}" method="POST">
    @method('PUT')
    @include('agents.form')
</form>
@endsection
