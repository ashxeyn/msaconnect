<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $base_url; ?>css/user.calendar.css">
    <link rel="stylesheet" href="calendar.css"> <!-- External CSS -->
    <title>Calendar</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <?php include '../../includes/header.php'; ?>
    <link rel="stylesheet" href="<?php echo $base_url; ?>css/volunteering.css">
    
    <!-- Hero Section (Unchanged) -->
    <div class="hero">
        <h2>MSA Calendar</h2>
        <p>
            Stay up-to-date with MSA events and activities by checking our calendar regularly. 
            From community service projects to social gatherings, there's something for everyone to enjoy and participate in.
        </p>
    </div>

    <!-- Calendar Section -->
    <div class="container mx-auto px-4 py-12">
        <!-- Navigation Controls -->
        <div class="flex justify-between items-center mb-8">
            <button id="prev-month" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Previous Month
            </button>
            <h2 id="current-month-year" class="text-2xl font-bold text-gray-800"></h2>
            <button id="next-month" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Next Month
            </button>
        </div>

        <!-- Calendar Grid -->
        <div id="calendar-grid" class="grid grid-cols-7 gap-4 p-6 text-lg"></div>
    </div>

    <?php include '../../includes/footer.php'; ?>

    <!-- External JavaScript -->
    <script src="<?php echo $base_url; ?>js/calendar.js"></script>
</body>
</html>