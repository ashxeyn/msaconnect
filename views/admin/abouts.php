<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About MSA</title>
    <link rel="stylesheet" href="../../css/adminAbouts.css?v=<?php echo time(); ?>">
    <script src="../../js/admin.js"></script>

</head>
<body>

<div id="page1">
    <h2>About MSA</h2>
    <div class="table-container">
        <table id="table" class="display">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr data-id="1" data-name="About Us" data-description="About Us description.">
                    <td>About Us</td>
                    <td>About Us description.</td>
                    <td><button class="edit-btn">Edit</button></td>
                </tr>
                <tr data-id="2" data-name="Our Mission" data-description="Our mission description.">
                    <td>Our Mission</td>
                    <td>Our mission description.</td>
                    <td><button class="edit-btn">Edit</button></td>
                </tr>
                <tr data-id="3" data-name="Our Vision" data-description="Our vision description.">
                    <td>Our Vision</td>
                    <td>Our vision description.</td>
                    <td><button class="edit-btn">Edit</button></td>
                </tr>
                <tr data-id="4" data-name="MSA Bylaws" data-description="MSA Bylaws description.">
                    <td>MSA Bylaws</td>
                    <td>MSA Bylaws description.</td>
                    <td><button class="edit-btn">Edit</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<div id="page2" style="display: none;">
    <h2>Section of Bylaws</h2>
    <div class="table-container">
        <table id="bylawsTable" class="display">
            <thead>
                <tr>
                    <th>Section</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr data-id="1" data-name="Section 1" data-description="Section 1 description.">
                    <td>Section 1</td>
                    <td>Section 1 description.</td>
                    <td><button class="edit-btn">Edit</button></td>
                </tr>
                <tr data-id="2" data-name="Section 2" data-description="Section 2 description.">
                    <td>Section 2</td>
                    <td>Section 2 description.</td>
                    <td><button class="edit-btn">Edit</button></td>
                </tr>
                <tr data-id="3" data-name="Section 3" data-description="Section 3 description.">
                    <td>Section 3</td>
                    <td>Section 3 description.</td>
                    <td><button class="edit-btn">Edit</button></td>
                </tr>
                <tr data-id="4" data-name="Section 4" data-description="Section 4 description.">
                    <td>Section 4</td>
                    <td>Section 4 description.</td>
                    <td><button class="edit-btn">Edit</button></td>
                </tr>
                <tr data-id="5" data-name="Section 5" data-description="Section 5 description.">
                    <td>Section 5</td>
                    <td>Section 5 description.</td>
                    <td><button class="edit-btn">Edit</button></td>
                </tr>
                <tr data-id="6" data-name="Section 6" data-description="Section 6 description.">
                    <td>Section 6</td>
                    <td>Section 6 description.</td>
                    <td><button class="edit-btn">Edit</button></td>
                </tr>
                <tr data-id="7" data-name="Section 7" data-description="Section 7 description.">
                    <td>Section 7</td>
                    <td>Section 7 description.</td>
                    <td><button class="edit-btn">Edit</button></td>
                </tr>
                <tr data-id="8" data-name="Section 8" data-description="Section 8 description.">
                    <td>Section 8</td>
                    <td>Section 8 description.</td>
                    <td><button class="edit-btn">Edit</button></td>
                </tr>
                <tr data-id="9" data-name="Section 9" data-description="Section 9 description.">
                    <td>Section 9</td>
                    <td>Section 9 description.</td>
                    <td><button class="edit-btn">Edit</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<br><br><br><br><br><br><br><br><br>



<div class="abouts-navigation">
    <button id="prevPage" class="btn-nav">← Back</button>
    <button id="nextPage" class="btn-nav">Go To →</button>
</div>
</body>
</html>