<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Config</title>
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
        input, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: vertical;
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
            width: 100px;
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

<h2>School Configuration</h2>
<button id="addNew">Add New</button>

<div class="table-container">
    <table id="configTable" class="display">
        <thead>
            <tr>
                <th>School Year</th>
                <th>Program</th>
                <th>Course</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<div id="configModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Manage Entry</h3>
        <input type="hidden" id="configId">
        <label>School Year:</label>
        <input type="text" id="schoolYear">
        <label>Program:</label>
        <input type="text" id="program">
        <label>Course:</label>
        <input type="text" id="course">
        <button id="saveConfig">Save</button>
    </div>
</div>

<script>
    $(document).ready(function() {
        let configTable = $('#configTable').DataTable();

        $('#addNew').click(function() {
            $('#configId').val('');
            $('#schoolYear').val('');
            $('#program').val('');
            $('#course').val('');
            $('#configModal').fadeIn();
        });

        $('#configTable tbody').on('click', 'tr', function() {
            let row = $(this);
            $('#configId').val(row.attr('data-id'));
            $('#schoolYear').val(row.attr('data-schoolYear'));
            $('#program').val(row.attr('data-program'));
            $('#course').val(row.attr('data-course'));
            $('#configModal').fadeIn();
        });

        $('.close').click(function() {
            $('#configModal').fadeOut();
        });

        $('#saveConfig').click(function() {
            let id = $('#configId').val();
            let schoolYear = $('#schoolYear').val();
            let program = $('#program').val();
            let course = $('#course').val();
            
            if (id) {
                let row = $('tr[data-id="' + id + '"]');
                row.attr('data-schoolYear', schoolYear);
                row.attr('data-program', program);
                row.attr('data-course', course);
                row.find('td:nth-child(1)').text(schoolYear);
                row.find('td:nth-child(2)').text(program);
                row.find('td:nth-child(3)').text(course);
            } else {
                let newId = Date.now();
                configTable.row.add([
                    schoolYear,
                    program,
                    course,
                    '<button class="deleteBtn">Delete</button>'
                ]).draw(false);
            }
            $('#configModal').fadeOut();
        });

        $('#configTable tbody').on('click', '.deleteBtn', function() {
            configTable.row($(this).parents('tr')).remove().draw();
        });
    });
</script>

</body>
</html>
