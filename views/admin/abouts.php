<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About MSA</title>
    <link rel="stylesheet" href="../../css/adminabouts.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    
    
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
        <h3>Edit About MSA</h3>
        <input type="hidden" id="aboutId">
        <label>Type:</label>
        <input type="text" id="aboutType" readonly>
        <label>Content:</label>
        <textarea id="aboutContent" rows="5"></textarea>
        <button id="saveAbout">Save Changes</button>
    </div>
</div>

<script src="../../js/adminabouts.js?v=<?php echo time(); ?>"></script>

</body>
</html>