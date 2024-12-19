<?php
// store_event.php

$hostname = 'localhost'; // Replace with your host name
$username = 'root';      // Replace with your database username
$password = '';  // Replace with your database password
$database = 'main'; // Replace with your database name

// Create connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming form data is submitted using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize inputs (for simplicity, skipping detailed validation here)
    $eventName = $_POST['eventName'];
    $eventDate = $_POST['eventDate'];
    $eventVenue = $_POST['eventVenue'];


    
    // Prepare SQL query to insert data into database
    $sql = "INSERT INTO events (name, date,venue) VALUES ('$eventName', '$eventDate','$eventVenue')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New event added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
