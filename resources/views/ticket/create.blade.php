<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Support Ticket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #34495e;
        }
        input, select, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }
        textarea {
            min-height: 150px;
            resize: vertical;
        }
        select {
            height: 42px;
        }
        .required:after {
            content: " *";
            color: red;
        }
        .btn-submit {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
        }
        .btn-submit:hover {
            background-color: #2980b9;
        }
        .form-footer {
            margin-top: 15px;
            text-align: center;
            font-size: 14px;
            color: #7f8c8d;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Create Support Ticket</h1>
        <form id="ticketForm" action="/ticket/create" method="POST">
            @csrf
            <div class="form-group">
                <label for="title" class="required">Ticket Title</label>
                <input type="text" id="title" name="title" placeholder="Enter a brief title describing the issue" required>
            </div>
            
            <div class="form-group">
                <label for="system" class="required">System</label>
                <select id="system" name="systeme" required>
                    <option value="" disabled selected>Select system</option>
                    <option value="accounting">Accounting</option>
                    <option value="crm">Customer Relationship Management</option>
                    <option value="hr">Human Resources</option>
                    <option value="inventory">Inventory Management</option>
                    <option value="reporting">Reporting</option>
                    <option value="other">Other</option>
                </select>
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

    <script>
        // document.getElementById('ticketForm').addEventListener('submit', function(e) {
            // e.preventDefault();
            
            // Collect form data
            // const formData = {
            //     title: document.getElementById('title').value,
            //     system: document.getElementById('system').value,
            //     software: document.getElementById('software').value,
            //     description: document.getElementById('description').value
            // };
            
            // In a real application, you would send this data to a server
            // console.log('Ticket submitted:', formData);
            
            // Show success message
            // alert('Ticket successfully created!');
            
            // Reset form
            // this.reset();
        // });
    </script>
</body>
</html>