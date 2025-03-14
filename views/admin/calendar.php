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
        /* General Container */
.calendar-container {
    width: 80%;
    margin: auto;
    background: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}

/* Header and Buttons */
.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

button {
    background: #007a3d;
    color: white;
    padding: 12px 20px;
    border: none;
    cursor: pointer;
    font-size: 1rem;
    font-weight: bold;
    border-radius: 5px;
    transition: 0.3s;
}

button:hover {
    background: #ce1126;
}

/* Calendar Grid */
.calendar {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 5px;
    margin-top: 10px;
    text-align: center;
}

.calendar div {
    padding: 18px;
    border: 1px solid #ddd;
    background: #f9f9f9;
    font-size: 1rem;
    font-weight: bold;
    cursor: pointer;
    transition: 0.2s;
    border-radius: 5px;
}

.calendar div:hover {
    background: #e6e6e6;
}

/* Modal Styling */
.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
    background-color: white;
    margin: 10% auto;
    padding: 25px;
    border-radius: 8px;
    width: 40%;
    text-align: left;
}

.close {
    float: right;
    font-size: 26px;
    font-weight: bold;
    cursor: pointer;
}

label {
    font-weight: bold;
    margin-top: 10px;
    display: block;
}

input, textarea {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    font-size: 1rem;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button#saveActivity {
    width: 100%;
    margin-top: 15px;
}







 .dataTables_wrapper {
        font-family: Arial, sans-serif;
        padding: 20px;
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    table.dataTable {
        width: 100% !important;
        border-collapse: collapse;
    }

    table.dataTable thead {
        background-color: #007a3d;
        color: white;
    }

    table.dataTable thead th {
        padding: 12px;
        font-size: 16px;
        text-align: left;
    }

    table.dataTable tbody tr {
        background: white;
        transition: background 0.3s;
    }

    table.dataTable tbody tr:hover {
        background: #f4f4f4;
    }

    table.dataTable tbody td {
        padding: 12px;
        font-size: 14px;
        border-bottom: 1px solid #ddd;
    }

    .dataTables_filter input {
        padding: 8px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-left: 10px;
    }

    .dataTables_length select {
        padding: 5px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-left: 5px;
    }

    .dataTables_paginate {
        margin-top: 10px;
    }

    .dataTables_paginate .paginate_button {
        background: #007a3d;
        color: white !important;
        border: none !important;
        padding: 6px 12px;
        border-radius: 5px;
        margin: 0 3px;
        cursor: pointer;
    }

    .dataTables_paginate .paginate_button:hover {
        background: #005a2c !important;
    }

    .dataTables_paginate .paginate_button.current {
        background: #005a2c !important;
        font-weight: bold;
    }





    input, textarea {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        font-size: 1rem;
        border: 1px solid #ccc;
        border-radius: 5px;
        transition: box-shadow 0.3s ease-in-out, border-color 0.3s ease-in-out;
    }

        input:focus, textarea:focus {
        outline: none;
        border-color: #ce1126;
        box-shadow: 0px 4px 10px rgba(206, 17, 38, 0.7); 
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

<script>
    $(document).ready(function() {
        $('#activityTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true
        });
    });
</script>






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
