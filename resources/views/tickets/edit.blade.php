@extends('layouts.app')

@section('content')
<h1>Edit Ticket</h1>
<form action="{{ route('tickets.update', $ticket) }}" method="POST">
    @method('PUT')
    @include('tickets.form')
</form>
@endsection
