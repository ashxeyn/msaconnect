<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        
        .filter-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .filter-container label {
            margin-right: 10px;
            font-weight: bold;
        }

        .filter-container select,
        .filter-container input {
            padding: 5px;
            margin-right: 10px;
        }

        .filter-container button {
            background-color: green;
            color: white;
            border: none;
            padding: 7px 15px;
            cursor: pointer;
            border-radius: 5px;
        }

        .chart-box {
            width: 45%;
            padding: 15px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            height: 300px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        canvas {
            max-width: 100%;
            height: 250px !important;
        }

        .chart-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }
    </style>
</head>
<body>

<h2>Dashboard</h2>
<br>
<br>

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
        <h3>Transparency Report (Cash Flow)</h3>
        <canvas id="transparencyChart"></canvas>
    </div>
</div>

<script>
    let volunteersChart, transparencyChart;

    function getFilteredData(filterType) {
        if (filterType === "day") {
            return {
                labels: ["00:00", "06:00", "12:00", "18:00"],
                volunteers: [5, 8, 12, 6],
                cashIn: [100, 200, 150, 300],
                cashOut: [80, 120, 130, 250],
            };
        } else if (filterType === "month") {
            return {
                labels: ["Week 1", "Week 2", "Week 3", "Week 4"],
                volunteers: [20, 25, 18, 30],
                cashIn: [500, 700, 600, 800],
                cashOut: [400, 500, 450, 600],
            };
        } else { // Year
            return {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
                volunteers: [100, 150, 120, 180, 200, 170],
                cashIn: [2000, 2500, 2200, 2700, 3000, 2800],
                cashOut: [1800, 1900, 2000, 2100, 2200, 2300],
            };
        }
    }

    function createCharts(filteredData) {
        const ctx1 = document.getElementById('volunteersChart').getContext('2d');
        const ctx2 = document.getElementById('transparencyChart').getContext('2d');

        if (volunteersChart) volunteersChart.destroy();
        if (transparencyChart) transparencyChart.destroy();

        // Line Chart for Volunteers
        volunteersChart = new Chart(ctx1, {
            type: 'line',
            data: {
                labels: filteredData.labels,
                datasets: [{
                    label: 'Registered Volunteers',
                    data: filteredData.volunteers,
                    borderColor: 'green',
                    backgroundColor: 'rgba(0, 128, 0, 0.2)',
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });

        // Bar Chart for Cash Flow
        transparencyChart = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: filteredData.labels,
                datasets: [
                    {
                        label: 'Cash In',
                        data: filteredData.cashIn,
                        backgroundColor: 'green',
                    },
                    {
                        label: 'Cash Out',
                        data: filteredData.cashOut,
                        backgroundColor: 'red',
                    },
                    {
                        label: 'Remaining Money',
                        data: filteredData.cashIn.map((inflow, index) => inflow - filteredData.cashOut[index]),
                        backgroundColor: 'blue',
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: { beginAtZero: true }
                },
                plugins: {
                    tooltip: {
                        mode: 'index',
                        intersect: false
                    }
                }
            }
        });
    }

    function applyFilter() {
        const filterType = document.getElementById('filterType').value;
        const filterDate = document.getElementById('filterDate').value;

        console.log(`Filtering by: ${filterType}, Date: ${filterDate}`);

        const newData = getFilteredData(filterType);
        createCharts(newData);
    }

    // Initialize charts on page load with 'month' filter as default
    createCharts(getFilteredData("month"));
</script>

</body>
</html>
