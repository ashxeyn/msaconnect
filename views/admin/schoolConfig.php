<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Config</title>
    <link rel="stylesheet" href="../../css/adminschoolConfig.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</head>
<body>

<h2>School Configuration</h2>
<button id="addCollege">Add College</button>
<button id="addProgram">Add Program</button>

<div class="table-container">
    <table id="configTable" class="display">
        <thead>
            <tr>
                <th>College</th>
                <th>Program</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<!-- College Modal -->
<div id="collegeModal" class="modal">
    <div class="modal-content">
        <h3>Add College</h3>
        <label>College Name:</label>
        <input type="text" id="collegeName">
        <button id="saveCollege">Save College</button>
    </div>
</div>

<!-- Program Modal -->
<div id="programModal" class="modal">
    <div class="modal-content">
        <h3>Add Program</h3>
        <label>Select College:</label>
        <select id="collegeDropdown">
            <option value="">Select a College</option>
        </select>
        <label>Program Name:</label>
        <input type="text" id="programName">
        <button id="saveProgram">Save Program</button>
    </div>
</div>

<script src="../../js/adminschoolConfig.js?v=<?php echo time(); ?>"></script>

</body>
</html>
