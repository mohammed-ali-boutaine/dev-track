<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Tickets - Developer Ticket System</title>
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
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .page-title {
            font-size: 24px;
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
        .ticket-filters {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }
        .filter-group {
            flex: 1;
            min-width: 200px;
        }
        .filter-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
            color: #555;
        }
        .filter-group select, .filter-group input {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .tickets-table {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            overflow-x: auto;
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
            position: sticky;
            top: 0;
        }
        tr:hover {
            background-color: #f9f9f9;
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
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .pagination button {
            background-color: white;
            border: 1px solid #ddd;
            padding: 8px 14px;
            margin: 0 5px;
            cursor: pointer;
            border-radius: 4px;
        }
        .pagination button.active {
            background-color: #4CAF50;
            color: white;
            border-color: #4CAF50;
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
            .ticket-filters {
                flex-direction: column;
                gap: 10px;
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
            <li><a href="client-dashboard.html">Dashboard</a></li>
            <li><a href="create-ticket.html">Create Ticket</a></li>
            <li class="active"><a href="#">My Tickets</a></li>
            <li><a href="profile.html">Profile</a></li>
            <li><a href="settings.html">Settings</a></li>
            <li><a href="login.html">Logout</a></li>
        </ul>
    </aside>

    <main class="main-content">
        <div class="page-header">
            <h1 class="page-title">My Tickets</h1>
            <a href="create-ticket.html" class="btn">Create New Ticket</a>
        </div>
        
        <div class="ticket-filters">
            <div class="filter-group">
                <label for="status-filter">Status</label>
                <select id="status-filter">
                    <option value="all">All Statuses</option>
                    <option value="open">Open</option>
                    <option value="in-progress">In Progress</option>
                    <option value="resolved">Resolved</option>
                    <option value="closed">Closed</option>
                </select>
            </div>
            
            <div class="filter-group">
                <label for="priority-filter">Priority</label>
                <select id="priority-filter">
                    <option value="all">All Priorities</option>
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                    <option value="critical">Critical</option>
                </select>
            </div>
            
            <div class="filter-group">
                <label for="date-filter">Date Range</label>
                <select id="date-filter">
                    <option value="all">All Time</option>
                    <option value="today">Today</option>
                    <option value="week">This Week</option>
                    <option value="month">This Month</option>
                    <option value="quarter">Last 3 Months</option>
                </select>
            </div>
            
            <div class="filter-group">
                <label for="search">Search</label>
                <input type="text" id="search" placeholder="Search tickets...">
            </div>
        </div>
        
        <div class="tickets-table">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Priority</th>
                        <th>Created</th>
                        <th>Last Updated</th>
                        <th>Developer</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#1001</td>
                        <td><a href="ticket-detail.html">Login page not working on mobile</a></td>
                        <td><span class="status status-in-progress">In Progress</span></td>
                        <td class="priority-high">High</td>
                        <td>Feb 22, 2025</td>
                        <td>Feb 23, 2025</td>
                        <td>Alice Johnson</td>
                    </tr>
                    <tr>
                        <td>#1002</td>
                        <td><a href="ticket-detail.html">Add export to CSV feature</a></td>
                        <td><span class="status status-open">Open</span></td>
                        <td class="priority-medium">Medium</td>
                        <td>Feb 20, 2025</td>
                        <td>Feb 20, 2025</td>
                        <td>Unassigned</td>
                    </tr>
                    <tr>
                        <td>#1003</td>
                        <td><a href="ticket-detail.html">Fix typo on homepage</a></td>
                        <td><span class="status status-resolved">Resolved</span></td>
                        <td class="priority-low">Low</td>
                        <td>Feb 15, 2025</td>
                        <td>Feb 18, 2025</td>
                        <td>Bob Smith</td>
                    </tr>
                    <tr>
                        <td>#1004</td>
                        <td><a href="ticket-detail.html">Update documentation for API</a></td>
                        <td><span class="status status-closed">Closed</span></td>
                        <td class="priority-medium">Medium</td>
                        <td>Feb 10, 2025</td>
                        <td>Feb 15, 2025</td>
                        <td>Charlie Brown</td>
                    </tr>
                    <tr>
                        <td>#1005</td>
                        <td><a href="ticket-detail.html">Server error during payment</a></td>
                        <td><span class="status status-in-progress">In Progress</span></td>
                        <td class="priority-high">High</td>
                        <td>Feb 8, 2025</td>
                        <td>Feb 21, 2025</td>
                        <td>Diana Prince</td>
                    </tr>
                    <tr>
                        <td>#1006</td>
                        <td><a href="ticket-detail.html">Add user profile settings</a></td>
                        <td><span class="status status-open">Open</span></td>
                        <td class="priority-low">Low</td>
                        <td>Feb 5, 2025</td>
                        <td>Feb 5, 2025</td>
                        <td>Unassigned</td>
                    </tr>
                    <tr>
                        <td>#1007</td>
                        <td><a href="ticket-detail.html">Implement dark mode</a></td>
                        <td><span class="status status-resolved">Resolved</span></td>
                        <td class="priority-medium">Medium</td>
                        <td>Feb 1, 2025</td>
                        <td>Feb 12, 2025</td>
                        <td>Bob Smith</td>
                    </tr>
                    <tr>
                        <td>#1008</td>
                        <td><a href="ticket-detail.html">Fix broken links in footer</a></td>
                        <td><span class="status status-closed">Closed</span></td>
                        <td class="priority-low">Low</td>
                        <td>Jan 25, 2025</td>
                        <td>Feb 2, 2025</td>
                        <td>Alice Johnson</td>
                    </tr>
                </tbody>
            </table>
            
            <div class="pagination">
                <button>&laquo;</button>
                <button class="active">1</button>
                <button>2</button>
                <button>3</button>
                <button>&raquo;</button>
            </div>
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
        
        // Filter functionality (simplified for demo)
        document.getElementById('status-filter').addEventListener('change', filterTickets);
        document.getElementById('priority-filter').addEventListener('change', filterTickets);
        document.getElementById('date-filter').addEventListener('change', filterTickets);
        document.getElementById('search').addEventListener('input', filterTickets);
        
        function filterTickets() {
            // In a real app, this would filter the tickets based on selected criteria
            console.log('Filtering tickets...');
            // For demo, we'll just log the current filter values
            const statusFilter = document.getElementById('status-filter').value;
            const priorityFilter = document.getElementById('priority-filter').value;
            const dateFilter = document.getElementById('date-filter').value;
            const searchTerm = document.getElementById('search').value;
            
            console.log({
                status: statusFilter,
                priority: priorityFilter,
                date: dateFilter,
                search: searchTerm
            });
        }
    </script>
</body>
</html>