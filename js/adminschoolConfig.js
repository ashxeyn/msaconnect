$(document).ready(function() {
    let configTable = $('#configTable').DataTable();
    let colleges = new Set(); // Store unique colleges

    // Open Add College Modal
    $('#addCollege').click(function() {
        $('#collegeName').val('');
        $('#collegeModal').fadeIn();
    });

    // Open Add Program Modal
    $('#addProgram').click(function() {
        updateCollegeDropdown();
        $('#programName').val('');
        $('#programModal').fadeIn();
    });

    // Close Modal on Click Outside
    $('.modal').click(function(event) {
        if ($(event.target).is('.modal')) {
            $('.modal').fadeOut();
        }
    });

    // Save College Directly to Table
    $('#saveCollege').click(function() {
        let collegeName = $('#collegeName').val().trim();
        if (collegeName === '') {
            alert('College name cannot be empty.');
            return;
        }

        if (!colleges.has(collegeName)) {
            colleges.add(collegeName);
            configTable.row.add([
                collegeName,
                '', // Empty program initially
                '<button class="deleteBtn">Delete</button>'
            ]).draw(false);
        } else {
            alert('College already exists.');
        }

        $('#collegeModal').fadeOut();
    });

    // Save Program Under Selected College
    $('#saveProgram').click(function() {
        let selectedCollege = $('#collegeDropdown').val();
        let programName = $('#programName').val().trim();

        if (selectedCollege === '') {
            alert('Please select a college.');
            return;
        }

        if (programName === '') {
            alert('Program name cannot be empty.');
            return;
        }

        configTable.row.add([
            selectedCollege,
            programName,
            '<button class="deleteBtn">Delete</button>'
        ]).draw(false);

        $('#programModal').fadeOut();
    });

    // Delete Row from Table
    $('#configTable tbody').on('click', '.deleteBtn', function() {
        configTable.row($(this).parents('tr')).remove().draw();
    });

    // Update College Dropdown for Adding Programs
    function updateCollegeDropdown() {
        let dropdown = $('#collegeDropdown');
        dropdown.empty();
        dropdown.append('<option value="">Select a College</option>');

        colleges.forEach(function(college) {
            dropdown.append('<option value="' + college + '">' + college + '</option>');
        });
    }
});
