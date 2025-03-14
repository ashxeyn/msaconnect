const calendarGrid = document.getElementById('calendar-grid');
const currentMonthYear = document.getElementById('current-month-year');
const prevMonthButton = document.getElementById('prev-month');
const nextMonthButton = document.getElementById('next-month');

let currentDate = new Date();

// Sample events data
const events = {
    10: { 5: "Islamic Lecture: The Life of Prophet Muhammad", 12: "Quran Study", 19: "Community Iftar", 26: "Youth Halaqa" }, // October
    11: { 14: "Islamic Workshop: Understanding Hadith", 18: "Board Meeting", 25: "Islamic Charity Drive", 28: "Family Picnic" }, // November
    12: { 5: "Islamic Festival: Mawlid al-Nabi", 12: "Community Cleanup", 19: "Islamic Art Exhibition", 25: "Islamic New Year Celebration" } // December
};

// Function to generate the calendar for the current month
function generateCalendar(date) {
    const year = date.getFullYear();
    const month = date.getMonth();

    const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    const firstDay = new Date(year, month, 1).getDay();
    const daysInMonth = new Date(year, month + 1, 0).getDate();

    // Set the month and year in the header
    currentMonthYear.textContent = `${monthNames[month]} ${year}`;

    // Clear the calendar grid
    calendarGrid.innerHTML = `
        <div class="col text-center fw-medium">Sun</div>
        <div class="col text-center fw-medium">Mon</div>
        <div class="col text-center fw-medium">Tue</div>
        <div class="col text-center fw-medium">Wed</div>
        <div class="col text-center fw-medium">Thu</div>
        <div class="col text-center fw-medium">Fri</div>
        <div class="col text-center fw-medium">Sat</div>
    `;

    // Add empty cells for days before the first day of the month
    for (let i = 0; i < firstDay; i++) {
        const emptyCell = document.createElement('div');
        emptyCell.classList.add('col');
        calendarGrid.appendChild(emptyCell);
    }

    // Add cells for each day of the month
    for (let day = 1; day <= daysInMonth; day++) {
        const dateCell = document.createElement('div');
        dateCell.classList.add('col', 'calendar-cell');

        // Add the date
        const dateText = document.createElement('span');
        dateText.classList.add('date-text');
        dateText.textContent = day;
        dateCell.appendChild(dateText);

        // Add events if they exist for this date
        if (events[month + 1] && events[month + 1][day]) {
            const eventBadge = document.createElement('div');
            eventBadge.classList.add('event-badge');
            eventBadge.textContent = events[month + 1][day];
            dateCell.appendChild(eventBadge);
        }

        calendarGrid.appendChild(dateCell);
    }
}

// Event listeners for navigation
prevMonthButton.addEventListener('click', () => {
    currentDate.setMonth(currentDate.getMonth() - 1);
    generateCalendar(currentDate);
});

nextMonthButton.addEventListener('click', () => {
    currentDate.setMonth(currentDate.getMonth() + 1);
    generateCalendar(currentDate);
});

// Generate the calendar for the current month on page load
generateCalendar(currentDate);