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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <style>
        .calendar-container {
            width: 60%;
            margin: auto;
        }
        .calendar {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
            margin-top: 20px;
        }
        .calendar div {
            padding: 15px;
            border: 1px solid #ccc;
            cursor: pointer;
        }
        .calendar div:hover {
            background: #f0f0f0;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
        }
        .modal-content {
            background-color: white;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
            border-radius: 8px;
            text-align: left;
        }
        .close {
            float: right;
            font-size: 28px;
            cursor: pointer;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background: #007a3d;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            border-radius: 5px;
            margin-top: 10px;
            width: 175px;
        }
        button:hover {
            background: #005a2c;
        }
    </style>
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
        <span class="close">&times;</span>
        <h3>Edit Activity</h3>
        <label>Date:</label>
        <input type="text" id="selectedDate" readonly>
        <label>Description:</label>
        <textarea id="activityDescription" rows="3"></textarea>
        <button id="saveActivity">Save Changes</button>
    </div>
</div>

<script>
    $(document).ready(function() {
        function loadCalendar(month, year) {
            $.ajax({
                url: "admin_calendar.php", // Make sure this file returns only the calendar grid HTML
                type: "GET",
                data: { month: month, year: year },
                success: function(response) {
                    $("#calendarGrid").html(response);
                    $("#calendarTitle").text(new Date(year, month - 1).toLocaleString('en-us', { month: 'long', year: 'numeric' }));
                    $("#prevMonth").data("month", month == 1 ? 12 : month - 1).data("year", month == 1 ? year - 1 : year);
                    $("#nextMonth").data("month", month == 12 ? 1 : month + 1).data("year", month == 12 ? year + 1 : year);
                }
            });
        }

        $("#prevMonth, #nextMonth").click(function() {
            let month = $(this).data("month");
            let year = $(this).data("year");
            loadCalendar(month, year);
        });

        $(document).on("click", ".calendar-day", function() {
            let selectedDate = $(this).attr("data-date");
            console.log("Clicked date:", selectedDate); // Logging instead of alert
            $("#selectedDate").val(selectedDate);
            $("#activityDescription").val("");
            $("#calendarModal").fadeIn();
        });

        $(".close").click(function() {
            $("#calendarModal").fadeOut();
        });

        $(window).click(function(event) {
            if (event.target.id === "calendarModal") {
                $("#calendarModal").fadeOut();
            }
        });

        $("#saveActivity").click(function() {
            let date = $("#selectedDate").val();
            let description = $("#activityDescription").val();
            if (description.trim() === "") {
                alert("Please enter a description.");
                return;
            }

            // Simulating saving to the database
            console.log("Activity for " + date + " updated: " + description);
            $("#calendarModal").fadeOut();
        });
    });
</script>

</body>
</html>
