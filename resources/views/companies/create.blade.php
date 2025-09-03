@extends('layouts.app')

@section('content')
<h1>Crear empresa</h1>
<form action="{{ route('companies.store') }}" method="POST">
    @include('companies.form')
</form>
@endsection
