@extends('layouts.app')

@section('content')
<h1>Create Ticket</h1>
<form action="{{ route('tickets.store') }}" method="POST">
    @include('tickets.form')
</form>
@endsection
