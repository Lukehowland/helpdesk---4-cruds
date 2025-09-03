@extends('layouts.app')

@section('content')
<h1>Crear usuario</h1>
<form action="{{ route('users.store') }}" method="POST">
    @include('users.form')
</form>
@endsection
