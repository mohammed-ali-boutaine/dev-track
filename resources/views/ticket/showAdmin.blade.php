@extends('layouts.clientDashboard')
@section('title','Detail Ticket')

@section('main-content')
<div class="container">
    <h2 class="mb-4">{{ $ticket->title }}</h2>
    <p>{{ $ticket->description }}</p>
    <p>Status: <strong>{{ ucfirst($ticket->status) }}</strong></p>

    <div class="mt-4">
        <!-- Change Status Form -->
        <form action="{{ route('tickets.updateStatus', $ticket->id) }}" method="POST" class="d-inline">
            @csrf
            @method('PATCH')
            <select name="status" class="form-select d-inline w-auto">
                <option value="open" {{ $ticket->status == 'open' ? 'selected' : '' }}>Open</option>
                <option value="progress" {{ $ticket->status == 'progress' ? 'selected' : '' }}>In Progress</option>
                <option value="closed" {{ $ticket->status == 'closed' ? 'selected' : '' }}>Closed</option>
            </select>
            <button type="submit" class="btn btn-primary">Update Status</button>
        </form>

        <!-- Delete Button (Only if Not Assigned) -->
        @if (is_null($ticket->assigned_to))
            <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        @endif
    </div>

    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger mt-3">{{ session('error') }}</div>
    @endif
</div>
@endsection
