<?php
require_once '../../classes/adminClass.php';
require_once '../../tools/function.php'; 

$adminObj = new Admin();
$totalVolunteers = $adminObj->getApprovedVolunteers();
$pendingRegistrations = $adminObj->getPedingVolunteers();
$moderators = $adminObj->getModerators();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../../css/analytics.css">
    <script src="../../js/analytics.js"></script>

</head>
<body>

<h2>Dashboard</h2>
<br>
<br>

<div class="filter-container">
    <label for="filterType">Filter By:</label>
    <select id="filterType">
        <option value="day">Day</option>
        <option value="month" selected>Month</option>
        <option value="year">Year</option>
    </select>
    <input type="date" id="filterDate">
    <button onclick="applyFilter()">Apply</button>
</div>

<div class="stats-container">
    <div class="stat-card">
        <i class="bi bi-people-fill stat-icon"></i>
        <div class="stat-number"><?php echo $totalVolunteers; ?></div>
        <div class="stat-title">Volunteers</div>
    </div>

    <div class="stat-card">
        <i class="bi bi-person-plus-fill stat-icon"></i>
        <div class="stat-number"><?php echo $pendingRegistrations; ?></div>
        <div class="stat-title">Pending Registrations</div>
    </div>

    <div class="stat-card">
        <i class="bi bi-shield-fill stat-icon"></i>
        <div class="stat-number"><?php echo $moderators; ?></div>
        <div class="stat-title">Moderators</div>
    </div>

</div>

<div class="chart-container">
    <div class="chart-box">
        <h3>Registered Volunteers</h3>
        <canvas id="volunteersChart"></canvas>
    </div>
    <div class="chart-box">
        <h3>Transparency Report (Cash Flow)</h3>
        <canvas id="transparencyChart"></canvas>
    </div>
</div>

</body>
</html>
