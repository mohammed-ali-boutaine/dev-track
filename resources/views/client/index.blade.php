@extends('layouts.clientDashboard')

@section('title','Client Dashboard')


@section('main-content')
        <!-- Content Container -->
        <div class="container">
            <div class="dashboard-header">
                <div>
                    <h1>My Tickets</h1>
                    <p>Manage and track all your support tickets</p>
                </div>
                <button class="open-modal-btn">+ Create New Ticket</button>

            </div>
            
            <div class="tickets-container">
                <table class="tickets-table">
                    <thead>
                        <tr>
                            <th>Ticket ID</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Singed</th>
                            <th>Proriote</th>
                            <th>Created At</th>  
                            <th>Info</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if ($tickets->isEmpty())
                            <tr>
                                <td colspan="7" class="text-center">No Tickets Available</td>
                            </tr>
                        @else

                    @foreach ($tickets as $ticket)
                    <tr>
                        <td>#TK-{{ $ticket->id }}</td>
                        <td>{{ $ticket->title }}</td>
                        <td>
                            @if($ticket->status === 'open')
                                <span class="status status-open">Open</span>
                            @elseif($ticket->status === 'progress')
                                <span class="status status-in-progress">In Progress</span>
                            @else
                                <span class="status status-closed">Closed</span>
                            @endif
                        </td>
                        <td>{{ $ticket->assigned_to ? "Yes" : "No" }}</td>
                        <td>  <span class="priority-badge 
                            @if($ticket->priority == 'low') priority-low
                            @elseif($ticket->priority == 'medium') priority-medium
                            @elseif($ticket->priority == 'high') priority-high
                            @elseif($ticket->priority == 'urgent') priority-urgent
                            @endif">
                            {{ ucfirst($ticket->priority) }}
                        </span></td>
                        <td>{{ $ticket->created_at->format('M d, Y') }}</td>
                        <td>
                            <a href="{{ route('tickets.show', $ticket->id) }}" class="view-link">View Details</a>
                        </td>
                        <td>
                            @if(is_null($ticket->assigned_to))
                                <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            @else
                                <span class="text-muted text-center">Not Deletable</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
                            @endif
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal (Hidden by Default) -->
<div id="ticketModal" class="modal">
    <div class="modal-content">
        <span class="close-modal">&times;</span> <!-- Close Button -->
        <h1>Create Support Ticket</h1>

        <form id="ticketForm" action="/ticket/create" method="POST">
            @csrf
            <div class="form-group">
                <label for="title" class="required">Ticket Title</label>
                <input type="text" id="title" name="title" placeholder="Enter a brief title describing the issue" required>
            </div>

            <div class="form-group">
                <label for="systeme" class="required">System</label>
                <input type="text" id="systeme" name="systeme" placeholder="Your OS" required>
            </div>

            <div class="form-group">
                <label for="software" class="required">Software</label>
                <select id="software" name="software_id" required>
                    <option value="" disabled selected>Select software</option>
                    @foreach($softwares as $software)
                        <option value="{{ $software['id'] }}">{{ $software['name'] }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="description" class="required">Description</label>
                <textarea id="description" name="description" placeholder="Describe the issue..." required></textarea>
            </div>

            <button type="submit" class="btn-submit">Submit Ticket</button>
            <div class="form-footer">
                <p>Fields marked with * are required</p>
            </div>
        </form>
    </div>
</div>
<script>
    // Get Modal Elements
const modal = document.getElementById("ticketModal");
const openModalBtn = document.querySelector(".open-modal-btn");
const closeModalBtn = document.querySelector(".close-modal");

// Open Modal when Button Clicked
openModalBtn.addEventListener("click", () => {
    modal.style.display = "block";
});

// Close Modal when "X" is Clicked
closeModalBtn.addEventListener("click", () => {
    modal.style.display = "none";
});

// Close Modal when Clicking Outside the Form
window.addEventListener("click", (event) => {
    if (event.target === modal) {
        modal.style.display = "none";
    }
});

</script>
@endsection