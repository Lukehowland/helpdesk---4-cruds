@extends('layouts.app')

@section('content')
<h1>Editar empresa</h1>
<form action="{{ route('companies.update', $company) }}" method="POST">
    @method('PUT')
    @include('companies.form')
</form>
@endsection
