<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Ticket - Developer Ticket System</title>
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
        .page-title {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        .ticket-form {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #555;
        }
        input, select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        textarea {
            min-height: 200px;
            resize: vertical;
        }
        .form-row {
            display: flex;
            gap: 20px;
        }
        .form-row .form-group {
            flex: 1;
        }
        .btn-group {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
            margin-top: 30px;
        }
        .btn {
            padding: 12px 20px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
        }
        .btn-primary {
            background-color: #4CAF50;
            color: white;
            border: none;
        }
        .btn-primary:hover {
            background-color: #45a049;
        }
        .btn-secondary {
            background-color: #f5f5f5;
            color: #333;
            border: 1px solid #ddd;
        }
        .btn-secondary:hover {
            background-color: #e0e0e0;
        }
        .file-upload {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        .file-upload input {
            margin-top: 10px;
        }
        .file-tips {
            font-size: 14px;
            color: #777;
            margin-top: 5px;
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
            .form-row {
                flex-direction: column;
                gap: 0;
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
            <li class="active"><a href="#">Create Ticket</a></li>
            <li><a href="my-tickets.html">My Tickets</a></li>
            <li><a href="profile.html">Profile</a></li>
            <li><a href="settings.html">Settings</a></li>
            <li><a href="login.html">Logout</a></li>
        </ul>
    </aside>

    <main class="main-content">
        <h1 class="page-title">Create New Support Ticket</h1>
        
        <form class="ticket-form" id="create-ticket-form">
            <div class="form-group">
                <label for="ticket-title">Ticket Title *</label>
                <input type="text" id="ticket-title" name="ticket-title" required placeholder="Brief description of the issue">
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="ticket-type">Ticket Type *</label>
                    <select id="ticket-type" name="ticket-type" required>
                        <option value="">-- Select Type --</option>
                        <option value="bug">Bug / Error</option>
                        <option value="feature">Feature Request</option>
                        <option value="question">Question</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="priority">Priority *</label>
                    <select id="priority" name="priority" required>
                        <option value="">-- Select Priority --</option>
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                        <option value="critical">Critical</option>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <label for="description">Detailed Description *</label>
                <textarea id="description" name="description" required placeholder="Please provide as much detail as possible about the issue. Include steps to reproduce, expected vs. actual behavior, etc."></textarea>
            </div>
            
            <div class="form-group file-upload">
                <label for="attachments">Attachments</label>
                <input type="file" id="attachments" name="attachments" multiple>
                <p class="file-tips">You can attach screenshots, logs, or any relevant files (Max 5MB per file)</p>
            </div>
            
            <div class="btn-group">
                <button type="button" class="btn btn-secondary" onclick="window.location.href='client-dashboard.html'">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit Ticket</button>
            </div>
        </form>
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
        
        // Form submission
        document.getElementById('create-ticket-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form values
            const title = document.getElementById('ticket-title').value;
            const type = document.getElementById('ticket-type').value;
            const priority = document.getElementById('priority').value;
            const description = document.getElementById('description').value;
            
            // Here you would normally send the ticket data to your server
            // This is just a placeholder for demonstration
            console.log('New ticket:', { title, type, priority, description });
            
            // Redirect to tickets list with success message
            alert('Ticket created successfully!');
            window.location.href = 'my-tickets.html';
        });
    </script>
</body>
</html>