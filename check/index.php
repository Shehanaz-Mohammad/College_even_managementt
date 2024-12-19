<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Event Management</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <h1>Event Management</h1>
    
    <!-- Event Input Form -->
    <form action="store_event.php" method="post" class="event-form">
        <label for="eventName">Event Name:</label>
        <input type="text" id="eventName" name="eventName" required>
        
        <label for="eventDate">Event Date:</label>
        <input type="date" id="eventDate" name="eventDate" required>
        
        <button type="submit">Add Event</button>
      </form>
    
    <!-- All Events List -->
    <div class="events-list">
      <h2>All Events</h2>
      <ul id="eventsList"></ul>
    </div>
    
    <!-- Completed Events Count -->
    <div class="completed-events">
      <h2>Completed Events</h2>
      <p id="completedEventsCount">0</p>
    </div>
  </div>

  <script src="script.js"></script>
</body>
</html>
