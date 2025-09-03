@extends('layouts.app')

@section('content')
<h1>Crear agente</h1>
<form action="{{ route('agents.store') }}" method="POST">
    @include('agents.form')
</form>
@endsection
