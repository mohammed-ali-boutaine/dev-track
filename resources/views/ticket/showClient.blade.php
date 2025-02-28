@extends('layouts.clientDashboard')
@section('title', 'Detail Ticket')

@section('main-content')
<div class="ticket-container">
    <!-- Ticket Header -->
    <div class="ticket-header">
        <div class="header-left">
            <h1 class="ticket-id">#{{ $ticket->id }}</h1>
            <div class="ticket-meta">
                <span class="meta-item">Created {{ $ticket->created_at->diffForHumans() }}</span>
                <span class="meta-divider"></span>
                <span class="meta-item">Updated {{ $ticket->updated_at->diffForHumans() }}</span>
            </div>
        </div>
        <div class="header-right">
            <div class="status-pill status-{{ $ticket->status }}">{{ ucfirst(str_replace('_', ' ', $ticket->status)) }}</div>
            <div class="priority-pill priority-{{ $ticket->priority }}">{{ ucfirst($ticket->priority) }}</div>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="ticket-content">
        <!-- Editable Form Section -->
        <form action="{{ route('tickets.update', $ticket) }}" method="POST" class="ticket-form">
            @csrf
            @method('PUT')
            
            <div class="form-field">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title', $ticket->title) }}" class="@error('title') input-error @enderror">
                @error('title')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-field">
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="5" class="@error('description') input-error @enderror">{{ old('description', $ticket->description) }}</textarea>
                @error('description')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-row">
                <div class="form-field">
                    <label for="systeme">System</label>
                    <input type="text" id="systeme" name="systeme" value="{{ old('systeme', $ticket->systeme) }}" class="@error('systeme') input-error @enderror">
                    @error('systeme')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-field">
                    <label for="software_id">Software</label>
                    <select id="software_id" name="software_id" class="@error('software_id') input-error @enderror">
                        <option value="">Select Software</option>
                        @foreach($softwares as $software)
                            <option value="{{ $software->id }}" {{ old('software_id', $ticket->software_id) == $software->id ? 'selected' : '' }}>
                                {{ $software->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('software_id')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn-primary">Save Changes</button>
            </div>
        </form>
        
        <!-- Info Section -->
        <div class="ticket-info">
            <h2 class="info-heading">Ticket Details</h2>
            
            <div class="info-section">
                <h3 class="section-title">Assignment</h3>
                <div class="info-grid">
                    <div class="user-info">
                        <span class="info-label">Client</span>
                        <div class="user-chip">
                            <div class="user-avatar" style="background-color: #3498db">
                                {{ substr($ticket->client->name ?? 'NA', 0, 1) }}
                            </div>
                            <span class="user-name">{{ $ticket->client->name ?? 'Not Assigned' }}</span>
                        </div>
                    </div>
                    
                    <div class="user-info">
                        <span class="info-label">Admin</span>
                        <div class="user-chip">
                            <div class="user-avatar" style="background-color: #9b59b6">
                                {{ substr($ticket->admin->name ?? 'NA', 0, 1) }}
                            </div>
                            <span class="user-name">{{ $ticket->admin->name ?? 'Not Assigned' }}</span>
                        </div>
                    </div>
                    
                    <div class="user-info">
                        <span class="info-label">Developer</span>
                        <div class="user-chip">
                            <div class="user-avatar" style="background-color: #2ecc71">
                                {{ substr($ticket->dev->name ?? 'NA', 0, 1) }}
                            </div>
                            <span class="user-name">{{ $ticket->dev->name ?? 'Not Assigned' }}</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="info-section">
                <h3 class="section-title">Status Information</h3>
                <div class="status-info">
                    <div class="status-item">
                        <span class="status-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 12L11 14L15 10M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                        <div class="status-details">
                            <span class="status-label">Signed In</span>
                            <span class="status-value {{ $ticket->signed_in ? 'status-active' : 'status-inactive' }}">
                                {{ $ticket->signed_in ? 'Yes' : 'No' }}
                            </span>
                            @if($ticket->signed_in && $ticket->signed_in_at)
                                <span class="status-meta">{{ $ticket->signed_in_at->format('M d, Y - H:i') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection