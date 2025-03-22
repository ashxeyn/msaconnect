<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../../css/adminviewAnalytics.css?v=<?php echo time(); ?>">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    
</head>
<body>

<h2>Dashboard</h2>
<br>
<br>

<!-- Stats Cards Container -->
<div class="stats-container">
    <div class="stat-card">
        <i class="bi bi-people-fill stat-icon"></i>
        <div class="stat-number">100</div>
        <div class="stat-title">Volunteers</div>
    </div>

    <div class="stat-card">
        <i class="bi bi-person-plus-fill stat-icon"></i>
        <div class="stat-number">56</div>
        <div class="stat-title">Pending Registrations</div>
    </div>

    <div class="stat-card">
        <i class="bi bi-person-dash-fill stat-icon"></i>
        <div class="stat-number">15</div>
        <div class="stat-title">Rejected Volunteers</div>
    </div>

</div>

<!-- Filter Section -->
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

<!-- Chart Section -->
<div class="chart-container">
    <div class="chart-box">
        <h3>Registered Volunteers</h3>
        <canvas id="volunteersChart"></canvas>
    </div>
    <div class="chart-box">
        <h3>Transparency Report</h3>
        <canvas id="transparencyChart"></canvas>
    </div>
</div>

<script src="../../js/adminviewAnalytics.js?v=<?php echo time(); ?>"></script>


</body>
</html>
