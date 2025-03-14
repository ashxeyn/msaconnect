<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transparency Report</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <style>
        body {
            margin: 0;
            
        }

        h2 {
            color: #333;
        }

        table.dataTable {
            width: 100%;
            border-collapse: collapse;
        }

        table.dataTable thead {
            background-color: #007a3d;
            color: white;
        }

        table.dataTable th, table.dataTable td {
            padding: 12px;
            font-size: 14px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        .dataTables_wrapper {
        font-family: Arial, sans-serif;
       
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
        }

        button:hover {
            background: #005a2c;
        }

        .deleteBtn {
            background: #ce1126;
            color: white;
            border: none;
            cursor: pointer;
        }

        .deleteBtn:hover {
            background: #a10d1e;
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

        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <h2>Transparency Report</h2>
    <button id="addNew">Add New</button>

    <div class="table-container">
        <table id="transparencyTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Student ID</th>
                    <th>Amount</th>
                    <th>Payment Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr data-id="1" data-student-id="2023-01073" data-amount="50" data-date="2024-03-01">
                    <td>1</td>
                    <td>2023-01073</td>
                    <td>50</td>
                    <td>2024-03-01</td>
                    <td><button class="deleteBtn">Delete</button></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div id="transparencyModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3>Manage Payment</h3>
            <input type="hidden" id="paymentId">
            <label>Student ID:</label>
            <input type="text" id="studentId">
            <label>Amount:</label>
            <input type="text" id="amount">
            <label>Payment Date:</label>
            <input type="date" id="paymentDate">
            <button id="savePayment">Save</button>
        </div>
    </div>

<script>
    $(document).ready(function() {
        let transparencyTable = $('#transparencyTable').DataTable();

        $('#addNew').click(function() {
            $('#paymentId').val('');
            $('#studentId').val('');
            $('#amount').val('');
            $('#paymentDate').val('');
            $('#transparencyModal').fadeIn();
        });

        $('#transparencyTable tbody').on('click', 'tr', function() {
            let row = $(this);
            $('#paymentId').val(row.attr('data-id'));
            $('#studentId').val(row.attr('data-student-id'));
            $('#amount').val(row.attr('data-amount'));
            $('#paymentDate').val(row.attr('data-date'));
            $('#transparencyModal').fadeIn();
        });

        $('.close').click(function() {
            $('#transparencyModal').fadeOut();
        });

        $('#savePayment').click(function() {
            let id = $('#paymentId').val();
            let studentId = $('#studentId').val();
            let amount = $('#amount').val();
            let paymentDate = $('#paymentDate').val();

            if (id) {
                let row = $('tr[data-id="' + id + '"]');
                row.attr('data-student-id', studentId);
                row.attr('data-amount', amount);
                row.attr('data-date', paymentDate);
                row.find('td:nth-child(2)').text(studentId);
                row.find('td:nth-child(3)').text(amount);
                row.find('td:nth-child(4)').text(paymentDate);
            } else {
                let newId = Date.now();
                transparencyTable.row.add([
                    newId,
                    studentId,
                    amount,
                    paymentDate,
                    '<button class="deleteBtn">Delete</button>'
                ]).draw(false);
            }
            $('#transparencyModal').fadeOut();
        });

        $('#transparencyTable tbody').on('click', '.deleteBtn', function() {
            transparencyTable.row($(this).parents('tr')).remove().draw();
        });
    });
</script>

</body>
</html>
