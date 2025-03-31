<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transparency Report</title>
    <link rel="stylesheet" href="../../css/admintransparency.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    
</head>
<body>

    <h2>Transparency Report</h2>
    <h5>Total No. of Students who paid the Collection Fee: </h5>

    <!-- Cash In Table -->
    <div class="section-title">I. Cash-In</div>
    <button id="addNewCashIn">Add Cash-In</button>
    <table id="cashInTable" class="display">
        <thead>
            <tr>
                <th>Month</th>
                <th>Amount</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
            <br><br><br><br><br>
    <!-- Cash Out Table -->
    <div class="section-title">II. Cash-Out</div>
    <button id="addNewExpense">Add Expense</button>
    <table id="cashOutTable" class="display">
        <thead>
            <tr>
                <th>Date</th>
                <th>Expense Detail</th>
                <th>Expense Category</th>
                <th>Amount</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
            <br><br><br><br><br>
    <!-- Net Earnings Table -->
<div class="section-title">III. Net Earnings</div>
<table id="netEarningsTable">
    <thead style="background-color: #007a3d; ; color: white; font-weight: bold;">
        <tr>
            <th>Details</th>
            <th>Amount</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Cash-in</td>
            <td id="totalCashIn">₱0.00</td>
        </tr>
        <tr>
            <td>Cash-out</td>
            <td id="totalCashOut">₱0.00</td>
        </tr>
        <tr style="font-weight: bold; background-color: #d3d3d3;">
            <td>TOTAL FUNDS:</td>
            <td id="totalFunds">₱0.00</td>
        </tr>
    </tbody>
</table>


<?php include '../adminModals/transparencymodal.php'; ?>


    <script src="../../js/admintransparency.js?v=<?php echo time(); ?>"></script>



</body>
</html>