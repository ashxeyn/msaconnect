<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About MSA</title>
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
        textarea {
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
            width: 100%;
        }
        button:hover {
            background: #005a2c;
        }
    </style>
</head>
<body>

<h2>About MSA</h2>

<div class="table-container">
    <table id="aboutTable" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Type</th>
                <th>Content</th>
            </tr>
        </thead>
        <tbody>
            <tr data-id="1" data-type="About MSA" data-content="About MSA.">
                <td>1</td>
                <td>About MSA</td>
                <td>About MSA.</td>
            </tr>
            <tr data-id="2" data-type="Bylaws" data-content="About Bylaws.">
                <td>2</td>
                <td>Bylaws</td>
                <td>About Bylaws.</td>
            </tr>
        </tbody>
    </table>
</div>

<div id="aboutModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Edit About MSA</h3>
        <input type="hidden" id="aboutId">
        <label>Type:</label>
        <input type="text" id="aboutType" readonly>
        <label>Content:</label>
        <textarea id="aboutContent" rows="5"></textarea>
        <button id="saveAbout">Save Changes</button>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#aboutTable').DataTable();

        $('#aboutTable tbody').on('click', 'tr', function() {
            let aboutId = $(this).attr('data-id');
            let aboutType = $(this).attr('data-type');
            let aboutContent = $(this).attr('data-content');

            $('#aboutId').val(aboutId);
            $('#aboutType').val(aboutType);
            $('#aboutContent').val(aboutContent);

            $('#aboutModal').fadeIn();
        });

        $('.close').click(function() {
            $('#aboutModal').fadeOut();
        });

        $('#saveAbout').click(function() {
            let aboutId = $('#aboutId').val();
            let updatedContent = $('#aboutContent').val();

            let row = $('tr[data-id="' + aboutId + '"]');
            row.attr('data-content', updatedContent);
            row.find('td:nth-child(3)').text(updatedContent);

            $('#aboutModal').fadeOut();
        });

        $(window).click(function(event) {
            if (event.target.id === "aboutModal") {
                $('#aboutModal').fadeOut();
            }
        });
    });
</script>

</body>
</html>