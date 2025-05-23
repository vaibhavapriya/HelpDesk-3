@extends('components.layouts.app.client')
@section('content')
    <div class="container">
        <h1>Ticket Details</h1>
        <div class="mb-3">
            <strong>Title:</strong> {{ $ticket->title }}
        </div>
        <div class="mb-3">
            <strong>Description:</strong> {{ $ticket->description }}
        </div>
        <div class="mb-3">
            <strong>Priority:</strong> {{ ucfirst($ticket->priority) }}
        </div>
        <div class="mb-3">
            <strong>Status:</strong> {{ ucfirst($ticket->status) }}
        </div>
        <div class="mb-3">
            <strong>Department:</strong> {{ $ticket->department }}
        </div>
        <div class="mb-3">
            <strong>Requester:</strong> {{ $ticket->requester->name }}
        </div>
        <a href="{{ route('tickets.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
@endsection