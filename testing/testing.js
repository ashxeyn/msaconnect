$(document).ready(function() {
    $('#table').DataTable();
});

// $(document).ready(function() {
    function openVolunteerModal(modalId, volunteerId, action) {
        $('.modal').modal('hide'); 
        $('.modal-backdrop').remove();
        setTimeout(() => {
            const modal = $('#' + modalId);
            modal.attr('aria-hidden', 'false');
            modal.modal('show'); 
            setVolunteerId(volunteerId, action);
        }, 300);
    }

    function setVolunteerId(volunteerId, action) {
        if (action === 'edit') {
            $.ajax({
                url: "../../handler/admin/getVolunteer.php",
                type: "GET",
                data: { volunteer_id: volunteerId },
                success: function(response) {
                    try {
                        const volunteer = JSON.parse(response);
                        $('#volunteerId').val(volunteer.volunteer_id);
                        $('#firstName').val(volunteer.first_name);
                        $('#middleName').val(volunteer.middle_name);
                        $('#surname').val(volunteer.last_name);
                        $('#program').val(volunteer.program_id);
                        $('#year').val(volunteer.year_level);
                        $('#section').val(volunteer.section);
                        $('#contact').val(volunteer.contact);
                        $('#email').val(volunteer.email);
                        $('#existing_image').val(volunteer.image);
                        if (volunteer.image) {
                            $('#image-preview').show();
                            $('#preview-img').attr('src', `../../assets/volunteers/${volunteer.image}`);
                        } else {
                            $('#image-preview').hide();
                        }
                        $('#addEditVolunteerModal').modal('show');
                    } catch (e) {
                        console.error("Invalid JSON response:", response);
                        alert("An error occurred while fetching the volunteer data.");
                    }
                },
                error: function() {
                    alert("An error occurred while fetching the volunteer data.");
                }
            });

            $('#confirmSaveVolunteer').off('click').on('click', function (e) {
                e.preventDefault(); 
                processVolunteer(volunteerId, 'edit');
            });
        } else if (action === 'delete') {
            $('#volunteerIdToDelete').val(volunteerId);
            $('#deleteVolunteerModal').modal('show');
            $('#confirmDeleteVolunteer').off('click').on('click', function () {
                processVolunteer(volunteerId, 'delete');
            });
        } else if (action === 'add') {
            $('#volunteerForm')[0].reset();
            $('#modalTitle').text('Add Volunteer');
            $('#confirmSaveVolunteer').text('Add Volunteer');
            $('#confirmSaveVolunteer').off('click').on('click', function (e) {
                e.preventDefault();
                processVolunteer(null, 'add');
            });
        }
    }

    function processVolunteer(volunteerId, action) {
        let formData = new FormData(document.getElementById('volunteerForm'));
        if (volunteerId) {
            formData.append('volunteer_id', volunteerId);
        }
        formData.append('action', action);

        $.ajax({
            url: "../../handler/admin/volunteerAction.php",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.trim() === "success") {
                    $(".modal").modal("hide");
                    $("body").removeClass("modal-open");
                    $(".modal-backdrop").remove();
                    loadVolunteersSection();
                } else {
                    alert("Failed to process request: " + response);
                }
            },
            error: function() {
                alert("An error occurred while processing the request.");
            }
        });
    }

    document.getElementById('confirmDeleteVolunteer').addEventListener('click', function() {
        const volunteerId = document.getElementById('volunteerIdToDelete').value;
        deleteVolunteer(volunteerId);
    });

    function deleteVolunteer(volunteerId) {
        $.ajax({
            url: "../../handler/admin/volunteerAction.php",
            type: "POST",
            data: { volunteer_id: volunteerId, action: 'delete' },
            success: function(response) {
                if (response.trim() === "success") {
                    $(".modal").modal("hide");
                    $("body").removeClass("modal-open");
                    $(".modal-backdrop").remove();
                    loadVolunteersSection();
                } else {
                    alert("Failed to delete volunteer: " + response);
                }
            },
            error: function() {
                alert("An error occurred while processing the request.");
            }
        });
    }
// });