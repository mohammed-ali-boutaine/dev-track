<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Dashboard - Developer Ticket System</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        body {
            background-color: #f5f5f5;
            min-height: 100vh;
        }
        .navbar {
            background-color: #333;
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar h1 {
            font-size: 1.5rem;
        }
        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .user-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #ddd;
        }
        .sidebar {
            width: 250px;
            background-color: #222;
            color: white;
            position: fixed;
            height: calc(100vh - 70px);
            padding: 20px 0;
        }
        .sidebar ul {
            list-style: none;
        }
        .sidebar li {
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .sidebar li:hover, .sidebar li.active {
            background-color: #4CAF50;
        }
        .sidebar li a {
            color: white;
            text-decoration: none;
            display: block;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        .card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        .card-title {
            font-size: 1.2rem;
            color: #333;
        }
        .card-value {
            font-size: 2rem;
            font-weight: bold;
            color: #4CAF50;
        }
        .recent-tickets {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .section-title {
            font-size: 1.5rem;
            color: #333;
        }
        .btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #45a049;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            color: #333;
        }
        .status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
        }
        .status-open {
            background-color: #e3f2fd;
            color: #1976d2;
        }
        .status-in-progress {
            background-color: #fff8e1;
            color: #ffa000;
        }
        .status-resolved {
            background-color: #e8f5e9;
            color: #4caf50;
        }
        .status-closed {
            background-color: #f5f5f5;
            color: #9e9e9e;
        }
        .priority-high {
            color: #f44336;
            font-weight: bold;
        }
        .priority-medium {
            color: #ff9800;
        }
        .priority-low {
            color: #4caf50;
        }
        .mobile-menu {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: white;
            cursor: pointer;
        }
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
                z-index: 1000;
            }
            .sidebar.active {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
            }
            .mobile-menu {
                display: block;
            }
            .navbar h1 {
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div style="display: flex; align-items: center;">
            <button class="mobile-menu">☰</button>
            <h1>Developer Ticket System</h1>
        </div>
        <div class="user-info">
            <span>John Doe</span>
            <img src="/api/placeholder/40/40" alt="User Profile">
        </div>
    </nav>

    <aside class="sidebar">
        <ul>
            <li class="active"><a href="#">Dashboard</a></li>
            <li><a href="create-ticket.html">Create Ticket</a></li>
            <li><a href="my-tickets.html">My Tickets</a></li>
            <li><a href="profile.html">Profile</a></li>
            <li><a href="settings.html">Settings</a></li>
            <li>
                <a id="logout">Logout</a>
            </li>
        </ul>
    </aside>

    <main class="main-content">
        <div class="dashboard-cards">
            <div class="card">
                <div class="card-header">
                    <span class="card-title">Total Tickets</span>
                </div>
                <div class="card-value">12</div>
            </div>
            <div class="card">
                <div class="card-header">
                    <span class="card-title">Open Tickets</span>
                </div>
                <div class="card-value">5</div>
            </div>
            <div class="card">
                <div class="card-header">
                    <span class="card-title">Resolved Tickets</span>
                </div>
                <div class="card-value">7</div>
            </div>
        </div>

        <div class="recent-tickets">
            <div class="section-header">
                <h2 class="section-title">Recent Tickets</h2>
                <a href="create-ticket.html" class="btn">Create New Ticket</a>
            </div>
            
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Priority</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Developer</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#1001</td>
                        <td><a href="ticket-detail.html">Login page not working on mobile</a></td>
                        <td class="priority-high">High</td>
                        <td><span class="status status-in-progress">In Progress</span></td>
                        <td>Feb 22, 2025</td>
                        <td>Alice Johnson</td>
                    </tr>
                    <tr>
                        <td>#1002</td>
                        <td><a href="ticket-detail.html">Add export to CSV feature</a></td>
                        <td class="priority-medium">Medium</td>
                        <td><span class="status status-open">Open</span></td>
                        <td>Feb 20, 2025</td>
                        <td>Unassigned</td>
                    </tr>
                    <tr>
                        <td>#1003</td>
                        <td><a href="ticket-detail.html">Fix typo on homepage</a></td>
                        <td class="priority-low">Low</td>
                        <td><span class="status status-resolved">Resolved</span></td>
                        <td>Feb 15, 2025</td>
                        <td>Bob Smith</td>
                    </tr>
                    <tr>
                        <td>#1004</td>
                        <td><a href="ticket-detail.html">Update documentation for API</a></td>
                        <td class="priority-medium">Medium</td>
                        <td><span class="status status-closed">Closed</span></td>
                        <td>Feb 10, 2025</td>
                        <td>Charlie Brown</td>
                    </tr>
                    <tr>
                        <td>#1005</td>
                        <td><a href="ticket-detail.html">Server error during payment</a></td>
                        <td class="priority-high">High</td>
                        <td><span class="status status-in-progress">In Progress</span></td>
                        <td>Feb 8, 2025</td>
                        <td>Diana Prince</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>

    <script>
        // Mobile sidebar toggle
        document.querySelector('.mobile-menu').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('active');
        });
        
        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.querySelector('.sidebar');
            const mobileMenu = document.querySelector('.mobile-menu');
            if (sidebar.classList.contains('active') && 
                !sidebar.contains(event.target) && 
                event.target !== mobileMenu) {
                sidebar.classList.remove('active');
            }
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