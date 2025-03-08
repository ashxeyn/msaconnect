<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    <?php $base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/msaconnect/'; ?>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo $base_url; ?>css/calendar.css">
</head>
<body>
    <!-- Wrap Header in a Specific Class -->
    <div id="main-header">
        <?php include '../../includes/header.php'; ?>
    </div>

    <!-- Hero Section -->
    <div class="hero">
        <h2>MSA Calendar</h2>
        <p>
            Stay up-to-date with MSA events and activities by checking our calendar regularly. 
            From community service projects to social gatherings, there's something for everyone to enjoy and participate in.
        </p>
    </div>

    <!-- Calendar Section -->
    <div class="calendar-container">
        <div class="container">
            <!-- Navigation Controls -->
            <div class="calendar-navigation">
                <button id="prev-month" class="nav-button">← Previous Month</button>
                <h2 id="current-month-year" class="month-year"></h2>
                <button id="next-month" class="nav-button">Next Month →</button>
            </div>

            <!-- Calendar Grid -->
            <div id="calendar-grid" class="calendar-grid"></div>
        </div>
    </div>

    <!-- Include Footer -->
    <?php include '../../includes/footer.php'; ?>

    <!-- Include Calendar JavaScript -->
    <script src="<?php echo $base_url; ?>js/calendar.js"></script>
</body>
</html>