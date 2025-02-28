<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
     @yield('title')
    </title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }
        
        body {
            background-color: #f5f7fa;
            display: flex;
            min-height: 100vh;
        }
        .btn-danger {
    background-color: #dc3545; /* Red color */
    color: white; /* White text */
    border: none;
    padding: 8px 12px;
    font-size: 14px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
}

.btn-danger:hover {
    background-color: #c82333; /* Darker red on hover */
}

.btn-danger:active {
    background-color: #a71d2a; /* Even darker red when clicked */
}

.btn-danger:disabled {
    background-color: #e0a0a7; /* Greyish red when disabled */
    cursor: not-allowed;
}

.text-center{
    text-align: center;
}

/* Modal Background */
.modal {
    display: none; 
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /
    /* Centering the modal using Flexbox */
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Modal Content */
.modal-content {
    background: #fff;
    padding: 20px;
    width: 50%;
    max-width: 500px;
    border-radius: 8px;
    /* position: relative; */
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
}
/* Close Button */
.close-modal {
    position: absolute;
    top: 10px;
    right: 15px;
    font-size: 20px;
    font-weight: bold;
    color: #333;
    cursor: pointer;
}

.close-modal:hover {
    color: red;
}

/* Open Modal Button */
.open-modal-btn {
    background-color: #007bff;
    color: white;
    padding: 10px 15px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}

.open-modal-btn:hover {
    background-color: #0056b3;
}

/* Submit Button */
.btn-submit {
    background-color: #28a745;
    color: white;
    padding: 10px 15px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    width: 100%;
    margin-top: 10px;
}

.btn-submit:hover {
    background-color: #218838;
}
        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: white;
            padding: 20px 0;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            transition: all 0.3s;
        }
        .priority-badge {
    display: inline-block;
    padding: 4px 8px;
    border-radius: 4px;
    font-weight: bold;
    color: white;
}

.priority-low {
    background-color: #28a7468a; /* Green */
}

.priority-medium {
    background-color: #ffc10783; /* Yellow */
    color: #212529; /* Dark text for better contrast on yellow */
}

.priority-high {
    background-color: #fd7e14; /* Orange */
}

.priority-urgent {
    background-color: #dc354690; /* Red */
}
        .sidebar-brand {
            font-size: 22px;
            font-weight: bold;
            padding: 15px 20px;
            margin-bottom: 30px;
            border-bottom: 1px solid #3d5166;
        }
        
        .sidebar-menu {
            list-style: none;
        }
        
        .sidebar-menu li {
            margin-bottom: 5px;
        }
        
        .sidebar-menu a {
            color: #ecf0f1;
            text-decoration: none;
            padding: 12px 20px;
            display: block;
            transition: all 0.3s;
            border-left: 4px solid transparent;
        }
        
        .sidebar-menu a:hover, .sidebar-menu a.active {
            background-color: #34495e;
            border-left: 4px solid #3498db;
        }
        
        .sidebar-menu i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }
        
        /* Main Content Area */
        .main-content {
            flex: 1;
            margin-left: 250px;
            transition: all 0.3s;
        }
        
        /* Header/Navbar */
        .header {
            background-color: white;
            height: 70px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 0 30px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        
        .profile-section {
            display: flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
            padding: 8px 15px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        
        .profile-section:hover {
            background-color: #f5f7fa;
        }
        
        .profile-name {
            color: #2c3e50;
            font-weight: 500;
        }
        
        .avatar {
            width: 40px;
            text-transform: uppercase;
            height: 40px;
            border-radius: 50%;
            background-color: #3498db;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
        
        /* Content Container */
        .container {
            padding: 30px;
        }
        
        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        .form-container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            padding: 30px;
            max-width: 800px;
            margin: 0 auto;
        }
        h1 {
            color: #2c3e50;
            margin-bottom: 10px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            color: #34495e;
            font-weight: 500;
        }
        
        label.required::after {
            content: " *";
            color: #e74c3c;
        } input[type="text"],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #dcdfe6;
            border-radius: 4px;
            font-size: 15px;
            color: #2c3e50;
            transition: border-color 0.3s;
        }
        
        input[type="text"]:focus,
        select:focus,
        textarea:focus {
            border-color: #3498db;
            outline: none;
        }
        
        textarea {
            min-height: 150px;
            resize: vertical;
        }
        
        select {
            background-color: white;
            cursor: pointer;
        }
        
        .btn-submit {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 12px 24px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 10px;
        }
        
        .btn-submit:hover {
            background-color: #2980b9;
        }
        
        .form-footer {
            margin-top: 20px;
            color: #7f8c8d;
            font-size: 14px;
        }
        .create-btn {
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        
        .create-btn:hover {
            background-color: #2980b9;
        }
        
        .tickets-container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            overflow: hidden;
        }
        
        .tickets-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .tickets-table th {
            background-color: #f1f3f6;
            padding: 15px;
            text-align: left;
            color: #2c3e50;
            font-weight: bold;
            border-bottom: 1px solid #e1e5ea;
        }
        
        .tickets-table td {
            padding: 15px;
            border-bottom: 1px solid #e1e5ea;
            color: #34495e;
        }
        
        .tickets-table tr:last-child td {
            border-bottom: none;
        }
        
        .tickets-table tr:hover {
            background-color: #f9fafc;
        }
        
        .status {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            display: inline-block;
        }
        
        .status-open {
            background-color: #e3f2fd;
            color: #1976d2;
        }
        
        .status-in-progress {
            background-color: #fff8e1;
            color: #ff8f00;
        }
        
        .status-closed {
            background-color: #e8f5e9;
            color: #388e3c;
        }
        
        .view-link {
            color: #3498db;
            text-decoration: none;
        }
        
        .view-link:hover {
            text-decoration: underline;
        }
        
        .logout-link {
            color: #ff6b6b;
            
        }
        #logout-link:hover {
            cursor: pointer;       

        }
        
        /* Mobile Responsive */
        .menu-toggle {
            display: none;
            background: none;
            border: none;
            color: #2c3e50;
            font-size: 24px;
            cursor: pointer;
            margin-right: auto;
        }
        /* Container */
.ticket-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
}

/* Ticket Header */
.ticket-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
    padding-bottom: 1.5rem;
    border-bottom: 1px solid #edf2f7;
}

.ticket-id {
    font-size: 2rem;
    font-weight: 700;
    color: #2d3748;
    margin-bottom: 0.5rem;
}

.ticket-meta {
    display: flex;
    align-items: center;
    color: #718096;
    font-size: 0.875rem;
}

.meta-divider {
    height: 4px;
    width: 4px;
    border-radius: 50%;
    background-color: #cbd5e0;
    margin: 0 0.75rem;
}

.header-right {
    display: flex;
    gap: 1rem;
}

/* Status Pills */
.status-pill, .priority-pill {
    padding: 0.5rem 1rem;
    border-radius: 9999px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

/* Status Colors */
.status-open {
    background-color: #ebf8ff;
    color: #3182ce;
}

.status-in_progress {
    background-color: #ebf4ff;
    color: #5a67d8;
}

.status-resolved {
    background-color: #f0fff4;
    color: #38a169;
}

.status-closed {
    background-color: #edf2f7;
    color: #718096;
}

/* Priority Colors */
.priority-low {
    background-color: #f0fff4;
    color: #38a169;
}

.priority-medium {
    background-color: #fffaf0;
    color: #dd6b20;
}

.priority-high {
    background-color: #fff5f5;
    color: #e53e3e;
}

.priority-urgent {
    background-color: #742a2a;
    color: #fff;
}

/* Main Content Area */
.ticket-content {
    display: grid;
    grid-template-columns: 1fr 380px;
    gap: 2rem;
}

/* Form Styles */
.ticket-form {
    background-color: #fff;
    border-radius: 0.5rem;
    padding: 2rem;
    box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
}

.form-field {
    margin-bottom: 1.5rem;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
    margin-bottom: 1.5rem;
}

label {
    display: block;
    margin-bottom: 0.5rem;
    font-size: 0.875rem;
    font-weight: 500;
    color: #4a5568;
}

input, textarea, select {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 1px solid #e2e8f0;
    border-radius: 0.375rem;
    font-size: 1rem;
    color: #2d3748;
    background-color: #fff;
    transition: all 0.2s ease;
}

input:focus, textarea:focus, select:focus {
    outline: none;
    border-color: #a3bffa;
    box-shadow: 0 0 0 3px rgba(163, 191, 250, 0.2);
}

.input-error {
    border-color: #fc8181;
}

.error-message {
    color: #e53e3e;
    font-size: 0.75rem;
    margin-top: 0.25rem;
}

.form-actions {
    margin-top: 2rem;
}

.btn-primary {
    background-color: #4c51bf;
    color: #fff;
    padding: 0.75rem 1.5rem;
    border-radius: 0.375rem;
    font-weight: 600;
    border: none;
    cursor: pointer;
    transition: all 0.2s ease;
}

.btn-primary:hover {
    background-color: #434190;
    transform: translateY(-1px);
    box-shadow: 0 4px 6px rgba(76, 81, 191, 0.1), 0 2px 4px rgba(76, 81, 191, 0.06);
}

.btn-primary:active {
    transform: translateY(0);
}

/* Info Section */
.ticket-info {
    background-color: #fff;
    border-radius: 0.5rem;
    box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
    overflow: hidden;
}

.info-heading {
    font-size: 1.25rem;
    font-weight: 600;
    padding: 1.5rem;
    border-bottom: 1px solid #edf2f7;
    color: #2d3748;
}

.info-section {
    padding: 1.5rem;
    border-bottom: 1px solid #edf2f7;
}

.info-section:last-child {
    border-bottom: none;
}

.section-title {
    font-size: 0.875rem;
    font-weight: 600;
    color: #718096;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    margin-bottom: 1rem;
}

.info-grid {
    display: grid;
    gap: 1rem;
}

/* User Info */
.user-info {
    margin-bottom: 1rem;
}

.info-label {
    display: block;
    font-size: 0.75rem;
    color: #718096;
    margin-bottom: 0.25rem;
}

.user-chip {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.user-avatar {
    width: 2rem;
    height: 2rem;
    border-radius: 50%;
    background-color: #4c51bf;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
}

.user-name {
    font-weight: 500;
    color: #2d3748;
}

/* Status Info */
.status-info {
    display: grid;
    gap: 1rem;
}

.status-item {
    display: flex;
    align-items: flex-start;
    gap: 0.75rem;
}

.status-icon {
    color: #718096;
    margin-top: 0.25rem;
}

.status-details {
    display: flex;
    flex-direction: column;
}

.status-label {
    font-size: 0.75rem;
    color: #718096;
}

.status-value {
    font-weight: 600;
    margin: 0.25rem 0;
}

.status-active {
    color: #38a169;
}

.status-inactive {
    color: #e53e3e;
}

.status-meta {
    font-size: 0.75rem;
    color: #a0aec0;
}

/* Responsive Design */
@media (max-width: 1024px) {
    .ticket-content {
        grid-template-columns: 1fr;
    }
    
    .ticket-info {
        order: -1;
        margin-bottom: 2rem;
    }
}

@media (max-width: 640px) {
    .ticket-container {
        padding: 1rem;
    }
    
    .ticket-header {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .header-right {
        margin-top: 1rem;
    }
    
    .form-row {
        grid-template-columns: 1fr;
    }
}
        @media (max-width: 768px) {
            .sidebar {
                width: 0;
                padding: 0;
                z-index: 100;
            }
            
            .sidebar.active {
                width: 250px;
                padding: 20px 0;
            }
            
            .main-content {
                margin-left: 0;
                width: 100%;
            }
            
            .menu-toggle {
                display: block;
            }
            
            .dashboard-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .tickets-table th:nth-child(3),
            .tickets-table td:nth-child(3) {
                display: none;
            }
            .form-container {
                padding: 20px;
            }
        }
        
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-brand">TicketSystem</div>
        <ul class="sidebar-menu">
            <li><a href="/dashboard"><i>📊</i> Dashboard</a></li>
            <li><a href="/ticket/create"><i>➕</i> Create Ticket</a></li>
            <li><a href="/profile"><i>👤</i> Profile</a></li>
            <li><a href="/dashboard"><i>⚙️</i> Settings</a></li>
            <li>
                <a  id="logout" class="logout-link"><i>🚪</i> Logout</a>
            </li>

        </ul>
    </div>
    
    <!-- Main Content Area -->
    <div class="main-content">
        <!-- Header with Profile -->
        <header class="header">
            <button class="menu-toggle">☰</button>
            <div class="profile-section">
                    <span class="profile-name">
                        {{Auth::user()->name}}
                    </span>
                    <div class="avatar">
                        {{ substr(auth()->user()->name, 0, 2) }}
                    </div>             
            </div>
        </header>
        @yield('main-content')
    </div>
    
    <script>
        // Toggle sidebar for mobile view
        document.querySelector('.menu-toggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('active');
        });

            // Logout functionality
    document.getElementById('logout').addEventListener('click', function(event) {
        event.preventDefault();
        fetch('/logout', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Ensure you have a CSRF token for security
            }
        }).then(response => {
            if (response.ok) {
                window.location.href = '/login'; // Redirect to login page after logout
            } else {
                console.log('Logout failed. Please try again.');
            }
        }).catch(error => {
            console.error('Error:', error);
            console.log('Logout failed. Please try again.');
        });
    });
    </script>
</body>
</html>