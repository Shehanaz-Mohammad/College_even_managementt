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

// Check if ID is set in the query string
if (isset($_GET['id'])) {
    // Fetch detailed feedback
    $id = intval($_GET['id']);
    $sql = "SELECT feedback, suggestions FROM feedback WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $details = $result->fetch_assoc();
    echo json_encode($details);
} else {
    // Fetch list of feedback items
    $sql = "SELECT id, event_name FROM feedback";
    $result = $conn->query($sql);

    $feedbacks = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $feedbacks[] = $row;
        }
    }
    
    // Output HTML with embedded CSS
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            .feedback-container {
                margin: 20px;
                padding: 20px;
                border-radius: 10px;
                background-color: #f9f9f9;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }
            .feedback-box {
                border: 1px solid #ddd;
                border-radius: 8px;
                margin-bottom: 10px;
                padding: 10px;
                cursor: pointer;
                transition: background-color 0.3s;
            }
            .feedback-box:hover {
                background-color: #f0f0f0;
            }
            .feedback-details {
                display: none;
                margin-top: 10px;
                padding: 10px;
                border: 1px solid #ddd;
                border-radius: 8px;
                background-color: #fff;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }
        </style>
    </head>
    <body>
        <div id="feedback-container" class="feedback-container">
            <h2>Feedback</h2>';

    foreach ($feedbacks as $feedback) {
        echo '<div class="feedback-box" data-id="' . $feedback['id'] . '">
                ' . htmlspecialchars($feedback['event_name']) . '
              </div>
              <div class="feedback-details" id="feedback-' . $feedback['id'] . '"></div>';
    }

    echo '  <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const feedbackContainer = document.getElementById("feedback-container");

                    feedbackContainer.addEventListener("click", function(event) {
                        if (event.target.classList.contains("feedback-box")) {
                            const id = event.target.dataset.id;
                            const details = document.getElementById("feedback-" + id);
                            
                            if (details.style.display === "block") {
                                details.style.display = "none";
                            } else {
                                details.style.display = "block";
                                fetch("fetch_feedback.php?id=" + id)
                                    .then(response => response.json())
                                    .then(data => {
                                        details.innerHTML = `
                                            <strong>Feedback:</strong><br>${data.feedback}<br><br>
                                            <strong>Suggestions:</strong><br>${data.suggestions}
                                        `;
                                    });
                            }
                        }
                    });
                });
            </script>
        </div>
    </body>
    </html>';

    $conn->close();
}
?>

