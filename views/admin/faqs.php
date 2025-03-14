<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQs Management</title>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <style>
    .dataTables_wrapper {
        font-family: Arial, sans-serif;
       
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
            background: #ce1126;
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

<h2>FAQs Management</h2>

<div class="table-container">
    <table id="faqTable" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Question</th>
                <th>Answer</th>
            </tr>
        </thead>
        <tbody>
            <tr data-id="1" data-question="Sheesh?" data-answer="Sheesh">
                <td>1</td>
                <td>Sheesh?</td>
                <td>Sheesh</td>
            </tr>
            <tr data-id="2" data-question="Sheesh?" data-answer="Sheesh">
                <td>2</td>
                <td>Sheesh?</td>
                <td>Sheesh</td>
            </tr>
            <tr data-id="3" data-question="Sheesh?" data-answer="Sheesh">
                <td>3</td>
                <td>Sheesh?</td>
                <td>Sheesh</td>
            </tr>
            <tr data-id="4" data-question="Sheesh?" data-answer="Sheesh">
                <td>4</td>
                <td>Sheesh?</td>
                <td>Sheesh</td>
            </tr>
            <tr data-id="5" data-question="Sheesh?" data-answer="Sheesh">
                <td>5</td>
                <td>Sheesh?</td>
                <td>Sheesh</td>
            </tr>
            <tr data-id="6" data-question="Sheesh?" data-answer="Sheesh">
                <td>6</td>
                <td>Sheesh?</td>
                <td>Sheesh</td>
            </tr>
        </tbody>
    </table>
</div>

<div id="faqModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Edit FAQ</h3>
        <input type="hidden" id="faqId">
        <label>Question:</label>
        <input type="text" id="faqQuestion">
        <label>Answer:</label>
        <textarea id="faqAnswer" rows="3"></textarea>
        <button id="saveFaq">Save Changes</button>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#faqTable').DataTable();

        $('#faqTable tbody').on('click', 'tr', function() {
            let faqId = $(this).attr('data-id');
            let faqQuestion = $(this).attr('data-question');
            let faqAnswer = $(this).attr('data-answer');

            $('#faqId').val(faqId);
            $('#faqQuestion').val(faqQuestion);
            $('#faqAnswer').val(faqAnswer);

            $('#faqModal').fadeIn();
        });

        $('.close').click(function() {
            $('#faqModal').fadeOut();
        });
        
        $('#saveFaq').click(function() {
            let faqId = $('#faqId').val();
            let updatedQuestion = $('#faqQuestion').val();
            let updatedAnswer = $('#faqAnswer').val();

            let row = $('tr[data-id="' + faqId + '"]');
            row.attr('data-question', updatedQuestion);
            row.attr('data-answer', updatedAnswer);
            row.find('td:nth-child(2)').text(updatedQuestion);
            row.find('td:nth-child(3)').text(updatedAnswer);

            $('#faqModal').fadeOut();
        });

        $(window).click(function(event) {
            if (event.target.id === "faqModal") {
                $('#faqModal').fadeOut();
            }
        });
    });
</script>

</body>
</html>
