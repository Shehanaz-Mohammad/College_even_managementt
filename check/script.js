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
  