<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Home</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .feedback-container {
            display: none;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
    </style>

</head>
<body>
    <div class="container">
        <div class="sidebar">
            <ul>
                <li><a href="#" onclick="showContent('home')">Home</a></li>
                <li><a href="feedback.php" >Feedback</a></li>
                <li><a href="#">Book Venues</a></li>
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Event Posts</a></li>
                <li><a href="#">Discussions</a></li>
            </ul>
        </div>
        <div class="main-content">
            <div class="search-bar">
                <input type="text" placeholder="Search...">
                <button class="help-button">?</button>
            </div>
            <div id="content" class="content">
                <h1>Welcome to the Student Event Management System</h1>
                <!-- Main content goes here -->
            </div>
        </div>
    </div>
    <footer>
        <div class="footer-content">
            <p>Contact Us:</p>
            <p>Phone: 9701917015</p>
            <p>Email: contact@youremail.com</p>
            <p>Address: 123 Your Address, Your City, Your Country</p>
            <p>Follow us on <a href="#">Social Media</a></p>
            <p>© 2024 YourDomain.com</p>
        </div>
    </footer>

</body>
</html>

