<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Developer Dashboard - Developer Ticket System</title>
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
        .dashboard-header {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        .stat-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            display: flex;
            flex-direction: column;
        }
        .stat-title {
            font-size: 16px;
            color: #666;
            margin-bottom: 10px;
        }
        .stat-value {
            font-size: 28px;
            font-weight: bold;
            color: #333;
        }
        .stat-trend {
            margin-top: 10px;
            font-size: 14px;
        }
        .trend-up {
            color: #4CAF50;
        }
        .trend-down {
            color: #f44336;
        }
        .dashboard-row {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }
        .ticket-section, .activity-section, .performance-section {
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
            font-size: 18px;
            color: #333;
            font-weight: 600;
        }
        .view-all {
            color: #4CAF50;
            text-decoration: none;
            font-size: 14px;
        }
        .view-all:hover {
            text-decoration: underline;
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
            color: #666;
            font-weight: 600;
            font-size: 14px;
        }
        tr:last-child td {
            border-bottom: none;
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
        .activity-list {
            list-style: none;
        }
        .activity-item {
            padding: 15px 0;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: flex-start;
        }
        .activity-item:last-child {
            border-bottom: none;
        }
        .activity-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: #e8f5e9;
            color: #4CAF50;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 18px;
        }
        .activity-content {
            flex: 1;
        }
        .activity-text {
            margin-bottom: 5px;
            line-height: 1.4;
        }
        .activity-time {
            font-size: 12px;
            color: #888;
        }
        .performance-metrics {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
        }
        .metric {
            text-align: center;
            padding: 15px;
            flex: 1;
            border-right: 1px solid #eee;
        }
        .metric:last-child {
            border-right: none;
        }
        .metric-value {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }
        .metric-label {
            font-size: 14px;
            color: #666;
        }
        .progress-container {
            width: 100%;
            height: 6px;
            background-color: #eee;
            border-radius: 3px;
            overflow: hidden;
            margin-top: 10px;
        }
        .progress-bar {
            height: 100%;
            background-color: #4CAF50;
        }
        .mobile-menu {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: white;
            cursor: pointer;
        }
        @media (max-width: 992px) {
            .dashboard-row {
                grid-template-columns: 1fr;
            }
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
            <span>Bob Smith</span>
            <img src="/api/placeholder/40/40" alt="Developer Profile">
        </div>
    </nav>

    <aside class="sidebar">
        <ul>
            <li class="active"><a href="#">Dashboard</a></li>
            <li><a href="assigned-tickets.html">Assigned Tickets</a></li>
            <li><a href="unassigned-tickets.html">Unassigned Tickets</a></li>
            <li><a href="developer-profile.html">Profile</a></li>
            <li><a href="developer-settings.html">Settings</a></li>
            <li><a href="login.html">Logout</a></li>
        </ul>
    </aside>

    <main class="main-content">
        <div class="dashboard-header">
            <div class="stat-card">
                <div class="stat-title">Assigned Tickets</div>
                <div class="stat-value">12</div>
                <div class="stat-trend trend-up">↑ 3 from last week</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-title">Tickets Resolved</div>
                <div class="stat-value">8</div>
                <div class="stat-trend trend-up">↑ 2 from last week</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-title">Average Resolution Time</div>
                <div class="stat-value">2.5 days</div>
                <div class="stat-trend trend-down">↓ 0.3 days from last week</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-title">Client Satisfaction</div>
                <div class="stat-value">4.8/5</div>
                <div class="stat-trend trend-up">↑ 0.2 from last week</div>
            </div>
        </div>
        
        <div class="dashboard-row">
            <div class="ticket-section">
                <div class="section-header">
                    <h2 class="section-title">Assigned Tickets</h2>
                    <a href="assigned-tickets.html" class="view-all">View All</a>
                </div>
                
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Client</th>
                            <th>Priority</th>
                            <th>Status</th>
                            <th>Due Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#1001</td>
                            <td><a href="ticket-detail.html">Login page not working on mobile</a></td>
                            <td>Acme Inc.</td>
                            <td class="priority-high">High</td>
                            <td><span class="status status-in-progress">In Progress</span></td>
                            <td>Feb 26, 2025</td>
                        </tr>
                        <tr>
                            <td>#1003</td>
                            <td><a href="ticket-detail.html">Fix typo on homepage</a></td>
                            <td>XYZ Corp</td>
                            <td>Low</td>
                            <td><span class="status status-resolved">Resolved</span></td>
                            <td>Feb 28, 2025</td>
                        </tr>
                        <tr>
                            <td>#1007</td>
                            <td><a href="ticket-detail.html">Implement dark mode</a></td>
                            <td>ABC Ltd</td>
                            <td>Medium</td>
                            <td><span class="status status-resolved">Resolved</span></td>
                            <td>Mar 3, 2025</td>
                        </tr>
                        <tr>
                            <td>#1010</td>
                            <td><a href="ticket-detail.html">Database optimization</a></td>
                            <td>Tech Solutions</td>
                            <td class="priority-high">High</td>
                            <td><span class="status status-open">Open</span></td>
                            <td>Feb 27, 2025</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <div class="activity-section">
                <div class="section-header">
                    <h2 class="section-title">Recent Activity</h2>
                </div>
                
                <ul class="activity-list">
                    <li class="activity-item">
                        <div class="activity-icon">✓</div>
                        <div class="activity-content">
                            <div class="activity-text">You resolved ticket <strong>#1003</strong> - Fix typo on homepage</div>
                            <div class="activity-time">2 hours ago</div>
                        </div>
                    </li>
                    <li class="activity-item">
                        <div class="activity-icon">✓</div>
                        <div class="activity-content">
                            <div class="activity-text">You resolved ticket <strong>#1007</strong> - Implement dark mode</div>
                            <div class="activity-time">Yesterday</div>
                        </div>
                    </li>
                    <li class="activity-item">
                        <div class="activity-icon">+</div>
                        <div class="activity-content">
                            <div class="activity-text">You were assigned ticket <strong>#1010</strong> - Database optimization</div>
                            <div class="activity-time">Yesterday</div>
                        </div>
                    </li>
                    <li class="activity-item">
                        <div class="activity-icon">+</div>
                        <div class="activity-content">
                            <div class="activity-text">You were assigned ticket <strong>#1001</strong> - Login page not working on mobile</div>
                            <div class="activity-time">2 days ago</div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="performance-section">
            <div class="section-header">
                <h2 class="section-title">Your Performance</h2>
            </div>
            
            <div class="performance-metrics">
                <div class="metric">
                    <div class="metric-value">92%</div>
                    <div class="metric-label">On-Time Completion</div>
                    <div class="progress-container">
                        <div class="progress-bar" style="width: 92%"></div>
                    </div>
                </div>
                
                <div class="metric">
                    <div class="metric-value">4.8</div>
                    <div class="metric-label">Client Rating</div>
                    <div class="progress-container">
                        <div class="progress-bar" style="width: 96