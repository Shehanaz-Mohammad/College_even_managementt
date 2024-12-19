<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Event Management</title>
  <!-- <link rel="stylesheet" href="styles.css"> -->
  <style>
    /* Body styles */
    body {
    font-family: 'Arial', sans-serif;
    background-color: #f1e2e2; /* Light gray background */
    margin-top: 7%;
    padding: 0;
    
}

/* Container styles */
.container {
    max-width: 800px;
    margin: 20px auto;
    background-color: #494747; /* White background */
    padding: 30px; /* Increased padding for better spacing */
    border-radius: 12px;
    box-shadow: 0 5px 15px rgba(49, 48, 48, 0.1); /* Soft shadow with a slight lift */
}

/* Heading styles */
h1, h2 {
    color: #f8f6f6; /* Dark gray heading color */
    text-align: center; /* Center align headings */
    text-transform: uppercase; /* Uppercase headings */
    letter-spacing: 1px; /* Increased letter spacing for emphasis */
}

/* Form styles */
.event-form {
    margin-bottom: 20px; /* Increased bottom margin for spacing */
    background-color: #f9f9f9; /* Light gray background for forms */
    padding: 15px; /* Padding inside form */
    border-radius: 8px; /* Rounded corners for form */
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1); /* Soft shadow for form */
    align-content: center;
}

.event-form input[type="text"],
.event-form textarea {
    /* width: 100%; */
    padding: 8px;
    margin: 6px 0;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;

    
}

.event-form input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

.event-form input[type="submit"]:hover {
    background-color: #45a049;
}

/* List styles */
.events-list {
    margin-bottom: 20px; /* Increased bottom margin for spacing */
}

ul {
    list-style-type: none;
    padding: 0;
}

li {
    margin-bottom: 10px; /* Increased bottom margin for spacing */
    background-color: #f9f9f9; /* Light gray background for list items */
    padding: 10px; /* Padding inside list items */
    border-radius: 8px; /* Rounded corners for list items */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Soft shadow for list items */
}

/* Completed events styles */
.completed-events {
    border-top: 1px solid #cccccc; /* Light gray border on top */
    padding-top: 20px; /* Increased top padding */
    margin-top: 20px; /* Added margin top for separation */
    text-align: center; /* Center align content */
    color: #666666; /* Dark gray color for completed events */
    font-style: italic; /* Italicize completed events */
    background-color: #f9f9f9; /* Light gray background */
    padding: 15px; /* Padding inside completed events */
    border-radius: 8px; /* Rounded corners for completed events */
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1); /* Soft shadow for completed events */
}


  </style>
</head>
<body>
  <div class="container">
    <h1>Event Management</h1>
    
    <!-- Event Input Form -->
    <form action="store_event.php" method="post" class="event-form" enctype="multipart/form-data">
      <label for="eventName">Event Name:</label>
      <input type="text" id="eventName" name="eventName" required>
      <br><br>
      <label for="eventDate">Event Date:</label>
      <input type="date" id="eventDate" name="eventDate" required>
      <br><br>
      <label for="eventVenue">Event Venue:</label>
      <input type="text" id="eventVenue" name="eventVenue" required>
      <br><br>
      <label for="eventDescription">Event Description:</label>
      <input type="text" id="eventDescription" name="eventDescription" required>
      <br><br>
      
      <button type="submit">Add Event</button>
  </form>
  
    
    <!-- All Events List
    <div class="events-list">
      <h2>All Events</h2>
      <ul id="eventsList"></ul>
    </div>
    
    Completed Events Count 
    <div class="completed-events">
      <h2 style="color: #494747;">Completed Events</h2>
      <p id="completedEventsCount">0</p>
    </div>
  </div>-->

  <!-- <script src="script.js"></script> -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
    const addEventBtn = document.getElementById('addEventBtn');
    const eventNameInput = document.getElementById('eventName');
    const eventDateInput = document.getElementById('eventDate');
    const eventsList = document.getElementById('eventsList');
    const completedEventsCount = document.getElementById('completedEventsCount');
    
    let events = []; // Array to store events
    
    // Function to render events list
    function renderEvents() {
      eventsList.innerHTML = '';
      events.forEach(event => {
        const li = document.createElement('li');
        li.textContent = `${event.name} - ${event.date}`;
        eventsList.appendChild(li);
      });
    }
  
    // Function to update completed events count
    function updateCompletedEventsCount() {
      const currentDate = new Date();
      const completedEvents = events.filter(event => {
        return new Date(event.date) < currentDate; // Check if event date is past current date
      });
      completedEventsCount.textContent = completedEvents.length;
    }
  
    // Add event button click handler
    addEventBtn.addEventListener('click', function() {
      const eventName = eventNameInput.value.trim();
      const eventDate = eventDateInput.value.trim();
      
      if (eventName && eventDate) {
        const newEvent = {
          name: eventName,
          date: eventDate
        };
        
        events.push(newEvent);
        renderEvents();
        updateCompletedEventsCount();
        
        // Clear input fields
        eventNameInput.value = '';
        eventDateInput.value = '';
      } else {
        alert('Please enter event name and date.');
      }
    });
  
  });
  
  </script>
</body>
</html>
