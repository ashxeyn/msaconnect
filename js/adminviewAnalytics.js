
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
                }
            }
        });
    }

    function applyFilter() {
        const filterType = document.getElementById('filterType').value;
        const newData = getFilteredData(filterType);
        createCharts(newData);
    }

    createCharts(getFilteredData("month"));
