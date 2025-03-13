<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Payments</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <style>
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
        input {
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
            width: 100%;
        }
        button:hover {
            background: #005a2c;
        }
    </style>
</head>
<body>

<h2>Transparency Report</h2>

<div class="table-container">
    <table id="paymentTable" class="display">
        <thead>
            <tr>
                <th>Payment ID</th>
                <th>Student ID</th>
                <th>Amount</th>
                <th>Payment Date</th>
            </tr>
        </thead>
        <tbody>
            <!-- Manually added student entries -->
            <tr data-id="1" data-student-id="2023-01073" data-amount="50" data-date="2024-03-01">
                <td>1</td>
                <td>2023-01073</td>
                <td>50</td>
                <td>2024-03-01</td>
            </tr>
            <tr data-id="2" data-student-id="2023-01073" data-amount="50" data-date="2024-03-02">
                <td>2</td>
                <td>2023-01073</td>
                <td>50</td>
                <td>2024-03-02</td>
            </tr>
            <tr data-id="3" data-student-id="2023-01073" data-amount="50" data-date="2024-03-03">
                <td>3</td>
                <td>2023-01073</td>
                <td>50</td>
                <td>2024-03-03</td>
            </tr>
            <!-- Add more manually as needed -->
        </tbody>
    </table>
</div>

<div id="paymentModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Edit Payment</h3>
        <input type="hidden" id="paymentId">
        <label>Student ID:</label>
        <input type="text" id="studentId" disabled>
        <label>Amount:</label>
        <input type="number" id="paymentAmount">
        <label>Payment Date:</label>
        <input type="date" id="paymentDate">
        <button id="savePayment">Save Changes</button>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#paymentTable').DataTable();

        $('#paymentTable tbody').on('click', 'tr', function() {
            let paymentId = $(this).attr('data-id');
            let studentId = $(this).attr('data-student-id');
            let paymentAmount = $(this).attr('data-amount');
            let paymentDate = $(this).attr('data-date');

            $('#paymentId').val(paymentId);
            $('#studentId').val(studentId);
            $('#paymentAmount').val(paymentAmount);
            $('#paymentDate').val(paymentDate);

            $('#paymentModal').fadeIn();
        });

        $('.close').click(function() {
            $('#paymentModal').fadeOut();
        });

        $(window).click(function(event) {
            if (event.target.id === "paymentModal") {
                $('#paymentModal').fadeOut();
            }
        });
    });
</script>

</body>
</html>
