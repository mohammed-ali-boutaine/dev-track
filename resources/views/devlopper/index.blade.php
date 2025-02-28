<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Ticket Dashboard</title>
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
        
        h1 {
            color: #2c3e50;
            margin-bottom: 10px;
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
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-brand">TicketSystem</div>
        <ul class="sidebar-menu">
            <li><a href="/dashboard" class="active"><i>📊</i> Dashboard</a></li>
            <li><a href="/ticket/create"><i>➕</i> Create Ticket</a></li>
            <li><a href="/profile"><i>👤</i> Profile</a></li>
            <li><a href="/dashboard"><i>⚙️</i> Settings</a></li>
            <li>
                <a id="logout">Logout</a>
            </li>
        </ul>
    </div>
    
    <!-- Main Content Area -->
    <div class="main-content">
        <!-- Header with Profile -->
        <header class="header">
            <button class="menu-toggle">☰</button>
            <div class="profile-section">
                <span class="profile-name">John Doe</span>
                <div class="avatar">JD</div>
            </div>
        </header>
        
        <!-- Content Container -->
        <div class="container">
            <div class="dashboard-header">
                <div>
                    <h1>My Tickets</h1>
                    <p>Manage and track all your support tickets</p>
                </div>
                <button class="create-btn">+ Create New Ticket</button>
            </div>
            
            <div class="tickets-container">
                <table class="tickets-table">
                    <thead>
                        <tr>
                            <th>Ticket ID</th>
                            <th>Subject</th>
                            <th>Date Created</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#TK-1001</td>
                            <td>Payment issue with recent order</td>
                            <td>Feb 24, 2025</td>
                            <td><span class="status status-open">Open</span></td>
                            <td><a href="#view-ticket-1001" class="view-link">View Details</a></td>
                        </tr>
                        <tr>
                            <td>#TK-1002</td>
                            <td>Account access problem</td>
                            <td>Feb 20, 2025</td>
                            <td><span class="status status-in-progress">In Progress</span></td>
                            <td><a href="#view-ticket-1002" class="view-link">View Details</a></td>
                        </tr>
                        <tr>
                            <td>#TK-998</td>
                            <td>Product delivery delayed</td>
                            <td>Feb 15, 2025</td>
                            <td><span class="status status-closed">Closed</span></td>
                            <td><a href="#view-ticket-998" class="view-link">View Details</a></td>
                        </tr>
                        <tr>
                            <td>#TK-994</td>
                            <td>Feature request for mobile app</td>
                            <td>Feb 12, 2025</td>
                            <td><span class="status status-closed">Closed</span></td>
                            <td><a href="#view-ticket-994" class="view-link">View Details</a></td>
                        </tr>
                        <tr>
                            <td>#TK-985</td>
                            <td>Billing discrepancy</td>
                            <td>Feb 10, 2025</td>
                            <td><span class="status status-closed">Closed</span></td>
                            <td><a href="#view-ticket-985" class="view-link">View Details</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
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
        })..then(response => {
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