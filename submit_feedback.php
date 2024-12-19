<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "main";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$event_name = $_POST['event_name'];
$feedback = $_POST['feedback'];
$suggestions = $_POST['suggestions'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO feedback (event_name, feedback, suggestions) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $event_name, $feedback, $suggestions);

// Execute the statement
if ($stmt->execute()) {
    echo "Feedback submitted successfully.";
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();
?>

