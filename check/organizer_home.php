<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organizer Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            margin: 0;
            height: 100vh;
            background: #f0f0f0;
        }

        .sidebar {
            width: 250px;
            background: #333;
            color: #fff;
            display: flex;
            flex-direction: column;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0,0,0,0.3);
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 20px 0;
        }

        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            display: block;
            padding: 10px;
            border-radius: 5px;
            transition: background 0.3s, color 0.3s;
        }

        .sidebar ul li a:hover {
            background: #575757;
            color: #fff;
        }

        .main-content {
            flex-grow: 1;
            padding: 20px;
            overflow-y: auto;
        }

        .event-item {
            background: #fff;
            border-radius: 5px;
            padding: 15px;
            margin: 10px 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            cursor: pointer;
            transition: background 0.3s;
        }

        .event-item:hover {
            background: #f7f7f7;
        }

        .event-details {
            display: none;
            margin-top: 10px;
            padding-top: 10px;
            border-top: 1px solid #ddd;
        }

        /* CSS for feedback section */
        .feedback-container {
            background: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            margin: 10px 0;
        }

        .feedback-item {
            background: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            margin: 10px 0;
        }

        .feedback-item p {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <ul>
            <li><a href="#" onclick="loadContent('events')">Events</a></li>
            <li><a href="#" onclick="loadContent('volunteers')">Volunteers</a></li>
            <li><a href="AddEvent.php">Add Event</a></li>
            <li><a href="#" onclick="loadContent('feedback')">Feedback</a></li>
        </ul>
    </div>
    <div class="main-content" id="main-content">
        <h1>Welcome, Organizer!</h1>
        <p>Select an option from the sidebar to get started.</p>
    </div>

    <script>
        function loadContent(contentType) {
            fetch(`fetch_data.php?type=${contentType}`)
                .then(response => response.text())
                .then(data => {
                    document.getElementById('main-content').innerHTML = data;
                    if (contentType === 'events' || contentType === 'volunteers') {
                        attachEventHandlers();
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        function attachEventHandlers() {
            document.querySelectorAll('.event-item').forEach(item => {
                item.addEventListener('click', () => {
                    const details = item.querySelector('.event-details');
                    details.style.display = details.style.display === 'block' ? 'none' : 'block';
                });
            });
        }
        
    </script>
</body>
</html>
