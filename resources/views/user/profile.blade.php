@extends('layouts.clientDashboard')

@section('title', 'My Profile')

@section('main-content')
<div class="profile-container">
    <div class="profile-header">
        <h1>My Profile</h1>
        <p>Manage your account information</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="profile-card">
        <div class="profile-card-header">
            <div class="profile-avatar">
                <div class="avatar-large">
                    {{ substr(auth()->user()->name, 0, 2) }}
                </div>
            </div>
            <div class="profile-info">
                <h2>{{ auth()->user()->name }}</h2>
                <span class="profile-role">{{ ucfirst(auth()->user()->role) }}</span>
                <p class="profile-email">{{ auth()->user()->email }}</p>
                <p class="profile-joined">Member since: {{ auth()->user()->created_at->format('M d, Y') }}</p>
            </div>
        </div>

        <div class="profile-tabs">
            <button class="tab-btn active" data-tab="account">Account Information</button>
            <button class="tab-btn" data-tab="security">Security</button>
        </div>

        <div class="tab-content active" id="account-tab">
            <form action="{{ route('profile.update') }}" method="POST" class="profile-form">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" value="{{ auth()->user()->name }}" required>
                    @error('name')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" required>
                    @error('email')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label>Account Type</label>
                    <input type="text" value="{{ ucfirst(auth()->user()->role) }}" readonly disabled class="readonly-input">
                </div>
                
                <div class="form-group">
                    <label>Email Verification</label>
                    <div class="verification-status">
                        @if(auth()->user()->email_verified_at)
                            <span class="verified">Verified on {{ auth()->user()->email_verified_at->format('M d, Y') }}</span>
                        @else
                            <span class="not-verified">Not Verified</span>
                            {{-- <a href="{{ route('verification.send') }}" class="verify-link">Resend Verification Email</a> --}}
                        @endif
                    </div>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn-save">Save Changes</button>
                </div>
            </form>
        </div>
        
        <div class="tab-content" id="security-tab">
            <form method="POST" class="profile-form">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="current_password">Current Password</label>
                    <input type="password" id="current_password" name="current_password" required>
                    @error('current_password')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" id="password" name="password" required>
                    @error('password')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="password_confirmation">Confirm New Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn-save">Update Password</button>
                </div>
            </form>
            
            <div class="account-security">
                <h3>Account Security</h3>
                <div class="last-login">
                    <p>Last login: {{ session('last_login') ? \Carbon\Carbon::parse(session('last_login'))->format('M d, Y h:i A') : 'Not available' }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Tab switching functionality
    document.addEventListener('DOMContentLoaded', function() {
        const tabBtns = document.querySelectorAll('.tab-btn');
        const tabContents = document.querySelectorAll('.tab-content');
        
        tabBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const tabId = this.getAttribute('data-tab');
                
                // Remove active class from all buttons and tabs
                tabBtns.forEach(b => b.classList.remove('active'));
                tabContents.forEach(t => t.classList.remove('active'));
                
                // Add active class to current button and tab
                this.classList.add('active');
                document.getElementById(`${tabId}-tab`).classList.add('active');
            });
        });
    });
</script>

<style>
    .profile-container {
        max-width: 900px;
        margin: 0 auto;
        padding: 20px;
    }
    
    .profile-header {
        margin-bottom: 25px;
    }
    
    .profile-header h1 {
        color: #2c3e50;
        margin-bottom: 5px;
    }
    
    .profile-header p {
        color: #7f8c8d;
    }
    
    .alert {
        padding: 15px;
        border-radius: 4px;
        margin-bottom: 20px;
    }
    
    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }
    
    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }
    
    .profile-card {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        overflow: hidden;
    }
    
    .profile-card-header {
        display: flex;
        padding: 30px;
        background-color: #f8f9fa;
        border-bottom: 1px solid #e9ecef;
    }
    
    .profile-avatar {
        margin-right: 25px;
    }
    
    .avatar-large {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background-color: #3498db;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 36px;
        font-weight: bold;
        text-transform: uppercase;
    }
    
    .profile-info h2 {
        margin: 0 0 5px 0;
        color: #2c3e50;
    }
    
    .profile-role {
        display: inline-block;
        padding: 3px 10px;
        background-color: #e3f2fd;
        color: #1976d2;
        border-radius: 20px;
        font-size: 14px;
        margin-bottom: 10px;
    }
    
    .profile-email {
        color: #7f8c8d;
        margin-bottom: 5px;
    }
    
    .profile-joined {
        color: #95a5a6;
        font-size: 14px;
    }
    
    .profile-tabs {
        display: flex;
        border-bottom: 1px solid #e9ecef;
    }
    
    .tab-btn {
        padding: 15px 20px;
        background: none;
        border: none;
        border-bottom: 2px solid transparent;
        font-weight: 500;
        color: #7f8c8d;
        cursor: pointer;
        transition: all 0.3s;
    }
    
    .tab-btn:hover {
        color: #3498db;
    }
    
    .tab-btn.active {
        color: #3498db;
        border-bottom: 2px solid #3498db;
    }
    
    .tab-content {
        display: none;
        padding: 30px;
    }
    
    .tab-content.active {
        display: block;
    }
    
    .profile-form .form-group {
        margin-bottom: 20px;
    }
    
    .profile-form label {
        display: block;
        margin-bottom: 8px;
        color: #34495e;
        font-weight: 500;
    }
    
    .profile-form input {
        width: 100%;
        padding: 12px;
        border: 1px solid #dcdfe6;
        border-radius: 4px;
        font-size: 15px;
        color: #2c3e50;
        transition: border-color 0.3s;
    }
    
    .profile-form input:focus {
        border-color: #3498db;
        outline: none;
    }
    
    .readonly-input {
        background-color: #f8f9fa;
        cursor: not-allowed;
    }
    
    .verification-status {
        display: flex;
        align-items: center;
    }
    
    .verified {
        color: #27ae60;
        display: flex;
        align-items: center;
    }
    
    .verified::before {
        content: "✓";
        display: inline-block;
        width: 18px;
        height: 18px;
        background-color: #27ae60;
        color: white;
        border-radius: 50%;
        margin-right: 8px;
        font-size: 12px;
        text-align: center;
        line-height: 18px;
    }
    
    .not-verified {
        color: #e74c3c;
        margin-right: 15px;
    }
    
    .verify-link {
        color: #3498db;
        text-decoration: none;
    }
    
    .verify-link:hover {
        text-decoration: underline;
    }
    
    .form-actions {
        margin-top: 30px;
    }
    
    .btn-save {
        background-color: #3498db;
        color: white;
        border: none;
        padding: 12px 24px;
        font-size: 16px;
        font-weight: bold;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    
    .btn-save:hover {
        background-color: #2980b9;
    }
    
    .error-message {
        color: #e74c3c;
        font-size: 14px;
        margin-top: 5px;
        display: block;
    }
    
    .account-security {
        margin-top: 40px;
        padding-top: 30px;
        border-top: 1px solid #e9ecef;
    }
    
    .account-security h3 {
        margin-bottom: 15px;
        color: #2c3e50;
    }
    
    .last-login {
        color: #7f8c8d;
        font-size: 14px;
    }
    
    @media (max-width: 768px) {
        .profile-card-header {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        
        .profile-avatar {
            margin-right: 0;
            margin-bottom: 20px;
        }
        
        .profile-tabs {
            justify-content: center;
        }
    }
</style>
@endsection