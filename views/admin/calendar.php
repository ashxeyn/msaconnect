<?php
date_default_timezone_set('UTC');
$month = isset($_GET['month']) ? (int)$_GET['month'] : date('m');
$year = isset($_GET['year']) ? (int)$_GET['year'] : date('Y');

// Calculate previous and next months
$prevMonth = $month - 1;
$prevYear = $year;
if ($prevMonth < 1) {
    $prevMonth = 12;
    $prevYear--;
}

$nextMonth = $month + 1;
$nextYear = $year;
if ($nextMonth > 12) {
    $nextMonth = 1;
    $nextYear++;
}

// Generate calendar grid
$firstDayOfMonth = strtotime("$year-$month-01");
$daysInMonth = date('t', $firstDayOfMonth);
$startDay = date('w', $firstDayOfMonth);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Calendar</title>
    <link rel="stylesheet" href="../../css/admincalendar.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
   
</head>
<body>
<h2>Manage Calendar</h2>
<br>
<br>
<div class="calendar-container">
    <div class="header">
        <button id="prevMonth" data-month="<?= $prevMonth; ?>" data-year="<?= $prevYear; ?>">Previous Month</button>
        <h2 id="calendarTitle"><?= date('F Y', $firstDayOfMonth); ?></h2>
        <button id="nextMonth" data-month="<?= $nextMonth; ?>" data-year="<?= $nextYear; ?>">Next Month </button>
    </div>

    <div class="calendar" id="calendarGrid">
        <?php
        // Weekday headers
        $daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        foreach ($daysOfWeek as $day) {
            echo "<div style='font-weight:bold;'>$day</div>";
        }

        // Empty cells before the first day
        for ($i = 0; $i < $startDay; $i++) {
            echo "<div></div>";
        }

        // Days of the month
        for ($day = 1; $day <= $daysInMonth; $day++) {
            echo "<div class='calendar-day' data-date='$year-$month-$day'>$day</div>";
        }
        ?>
    </div>
</div>

<div id="calendarModal" class="modal">
    <div class="modal-content">
        <h3>Edit Activity</h3>
        <label>Date:</label>
        <input type="text" id="selectedDate" readonly>
        <label>Description:</label>
        <textarea id="activityDescription" rows="3"></textarea>
        <button id="saveActivity">Save Changes</button>
    </div>
</div>



<br><br>
<h3>Activity List</h3>
<table id="activityTable" class="display" style="width: 100%;">
    <thead>
        <tr>
            <th>Date</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
    <tr>
            <td>March 13, 2025</td>
            <td>EXAMPLE</td>
        </tr>
    </tbody>
</table>

<script src="../../js/admincalendar.js?v=<?php echo time(); ?>"></script>


</body>
</html>
