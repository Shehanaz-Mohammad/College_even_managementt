<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
 
        .feedback-container {
            background-color: lightblue;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 600px;
            margin: 20px auto;
            position: relative;
            transition: transform 0.3s, opacity 0.3s;
            opacity: 1;
        }
        .feedback-container.hidden {
            opacity: 0;
            transform: scale(0.9);
        }
        .feedback-container h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
            text-align: center;
        }
        .feedback-container label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        .feedback-container input, .feedback-container textarea {
            width: calc(100% - 20px);
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        .feedback-container input:focus, .feedback-container textarea:focus {
            border-color: #007BFF;
            outline: none;
        }
        .feedback-container button {
            background-color: #007BFF;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s, transform 0.3s;
        }
        .feedback-container button:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }
        .feedback-container button:active {
            background-color: #004494;
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <div class="feedback-container">
        <h1>Feedback Form</h1>
        <form action="submit_feedback.php" method="post">
            <label for="event-name">Event Name:</label>
            <input type="text" id="event-name" name="event_name" required>
            
            <label for="feedback">Feedback:</label>
            <textarea id="feedback" name="feedback" rows="4" required></textarea>
            
            <label for="suggestions">Suggestions:</label>
            <textarea id="suggestions" name="suggestions" rows="4" required></textarea>
            
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>

