@extends('layouts.app')

@section('content')
<h1>Ticket #{{ $ticket->id }}</h1>
<p><strong>Title:</strong> {{ $ticket->title }}</p>
<p><strong>Status:</strong> {{ $ticket->status }}</p>
<p><strong>Priority:</strong> {{ $ticket->priority }}</p>
<p><strong>Company:</strong> {{ $ticket->company->name ?? '-' }}</p>
<p><strong>User:</strong> {{ $ticket->user->name ?? '-' }}</p>
<p><strong>Agent:</strong> {{ $ticket->agent->user->name ?? '-' }}</p>
<p><strong>Description:</strong></p>
<p>{{ $ticket->description }}</p>
<div class="actions" style="margin-top:12px">
    <a class="btn secondary" href="{{ route('tickets.index') }}">Back</a>
    <a class="btn" href="{{ route('tickets.edit', $ticket) }}">Edit</a>
</div>
@endsection
