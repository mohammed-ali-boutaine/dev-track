@extends('layouts.clientDashboard')

@section('title','Create Ticket')


@section('main-content')
        <!-- Content Container -->
        <div class="container">
            <div class="form-container">
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
                        <textarea id="description" name="description" placeholder="Please provide detailed information about the issue, including steps to reproduce it and any error messages" required></textarea>
                    </div>
                    
                    <button type="submit" class="btn-submit">Submit Ticket</button>
                    
                    <div class="form-footer">
                        <p>Fields marked with * are required</p>
                    </div>
                </form>
            </div>
        </div>
@endsection