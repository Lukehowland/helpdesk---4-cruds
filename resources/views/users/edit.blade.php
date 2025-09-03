@extends('layouts.app')

@section('content')
<h1>Editar usuario</h1>
<form action="{{ route('users.update', $user) }}" method="POST">
    @method('PUT')
    @include('users.form')
</form>
@endsection
