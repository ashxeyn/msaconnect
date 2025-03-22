<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQs Management</title>
    <link rel="stylesheet" href="../../css/adminfaqs.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    
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
        <h3>Edit FAQ</h3>
        <input type="hidden" id="faqId">
        <label>Question:</label>
        <input type="text" id="faqQuestion">
        <label>Answer:</label>
        <textarea id="faqAnswer" rows="3"></textarea>
        <button id="saveFaq">Save Changes</button>
    </div>
</div>

<script src="../../js/adminfaqs.js?v=<?php echo time(); ?>"></script>


</body>
</html>
