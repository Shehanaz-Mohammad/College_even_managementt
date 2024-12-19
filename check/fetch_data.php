<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "main";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$type = $_GET['type'];

if ($type === 'events') {
    $sql = "SELECT * FROM events";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="event-item">';
            echo '<h2>' . htmlspecialchars($row['name']) . '</h2>';
            echo '<p>Date: ' . htmlspecialchars($row['event_date']) . '</p>';
            echo '<p>' . htmlspecialchars($row['description']) . '</p>';
            if (!empty($row['photo_url'])) {
                echo '<img src="' . htmlspecialchars($row['photo_url']) . '" alt="Event Photo" style="width: 100%; max-width: 400px; height: auto; margin-top: 10px;">';
            }
            echo '<div class="event-details">More details about the event...</div>';
            echo '</div>';
        }
    } else {
        echo 'No events found.';
    }
} elseif ($type === 'volunteers') {
    // Add code to handle volunteers
    
} elseif ($type === 'feedback') {
    // Add code to handle dashboard
    $sql = "SELECT * FROM feedback";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="feedback-item">';
            echo '<p>' . htmlspecialchars($row['feedback_text']) . '</p>';
            echo '</div>';
        }
    } else {
        echo 'No events found.';
    }
}

$conn->close();
?>
