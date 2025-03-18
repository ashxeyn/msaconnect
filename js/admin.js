// GENERAL FUNCTIONS
function previewImage(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview-img').src = e.target.result;
            document.getElementById('image-preview').style.display = 'flex';
        };
        reader.readAsDataURL(file);
    }
}

function removeImage() {
    document.getElementById('image').value = ""; 
    document.getElementById('image-preview').style.display = 'none'; 
}

$(document).ready(function() {
    $('#table').DataTable();
});

// SIDEBAR FUNCTIONS
function loadDashboardSection() {
    $.ajax({
        url: "../admin/viewAnalytics.php",
        method: 'GET',
        success: function (response) {
            $('#contentArea').html(response);
        },
        error: function (xhr, status, error) {
            console.error('Error loading dashboard section:', error);
            $('#contentArea').html('<p class="text-danger">Failed to load Dashboard section. Please try again.</p>');
        }
    });
}

function loadSchoolConfigSection() {
    $.ajax({
        url: "../admin/schoolConfig.php",
        method: 'GET',
        success: function (response) {
            $('#contentArea').html(response);
        },
        error: function (xhr, status, error) {
            console.error('Error loading school configuration section:', error);
            $('#contentArea').html('<p class="text-danger">Failed to load School Configuration section. Please try again.</p>');
        }
    });
}

function loadEventsSection() {
    $.ajax({
        url: "../admin/events.php",
        method: 'GET',
        success: function (response) {
            $('#contentArea').html(response);
        },
        error: function (xhr, status, error) {
            console.error('Error loading events section:', error);
            $('#contentArea').html('<p class="text-danger">Failed to load Events section. Please try again.</p>');
        }
    });
}

function loadCalendarSection() {
    $.ajax({
        url: "../admin/calendar.php",
        method: 'GET',
        success: function (response) {
            $('#contentArea').html(response);
        },
        error: function (xhr, status, error) {
            console.error('Error loading calendar section:', error);
            $('#contentArea').html('<p class="text-danger">Failed to load Calendar section. Please try again.</p>');
        }
    });
}

function loadTransparencySection() {
    $.ajax({
        url: "../admin/transparency.php",
        method: 'GET',
        success: function (response) {
            $('#contentArea').html(response);
        },
        error: function (xhr, status, error) {
            console.error('Error loading transparency section:', error);
            $('#contentArea').html('<p class="text-danger">Failed to load Transparency section. Please try again.</p>');
        }
    });
}

function loadAboutsSection() {
    $.ajax({
        url: "../admin/abouts.php",
        method: 'GET',
        success: function (response) {
            $('#contentArea').html(response);
        },
        error: function (xhr, status, error) {
            console.error('Error loading abouts section:', error);
            $('#contentArea').html('<p class="text-danger">Failed to load Abouts section. Please try again.</p>');
        }
    });
}

function loadFaqsSection() {
    $.ajax({
        url: "../admin/faqs.php",
        method: 'GET',
        success: function (response) {
            $('#contentArea').html(response);
        },
        error: function (xhr, status, error) {
            console.error('Error loading FAQs section:', error);
            $('#contentArea').html('<p class="text-danger">Failed to load FAQs section. Please try again.</p>');
        }
    });
}

function loadOfficersSection() {
    $.ajax({
        url: "../admin/officers.php",
        method: 'GET',
        success: function (response) {
            $('#contentArea').html(response);
        },
        error: function (xhr, status, error) {
            console.error('Error loading officers section:', error);
            $('#contentArea').html('<p class="text-danger">Failed to load Officers section. Please try again.</p>');
        }
    });
}

function loadVolunteersSection() {
    $.ajax({
        url: "../admin/volunteers.php",
        method: 'GET',
        success: function (response) {
            $('#contentArea').html(response);
        },
        error: function (xhr, status, error) {
            console.error('Error loading volunteers section:', error);
            $('#contentArea').html('<p class="text-danger">Failed to load Volunteers section. Please try again.</p>');
        }
    });
}

function loadModeratorsSection() {
    $.ajax({
        url: "../admin/moderators.php",
        method: 'GET',
        success: function (response) {
            $('#contentArea').html(response);
        },
        error: function (xhr, status, error) {
            console.error('Error loading moderators section:', error);
            $('#contentArea').html('<p class="text-danger">Failed to load Moderators section. Please try again.</p>');
        }
    });
}

function loadRegistrationsSection() {
    $.ajax({
        url: "../admin/registrations.php",
        method: 'GET',
        success: function (response) {
            $('#contentArea').html(response);
        },
        error: function (xhr, status, error) {
            console.error('Error loading registration section:', error);
            $('#contentArea').html('<p class="text-danger">Failed to load Registration section. Please try again.</p>');
        }
    });
}

// REGISTRATION FUNCTIONS
function viewPhoto(photoName, folder) {
    $('.modal').modal('hide'); 
    setTimeout(() => {
        const modal = $('#photoModal');
        modal.attr({
            'aria-hidden': 'false'
        });
        $('#modalPhoto').attr('src', `../../assets/${folder}/${photoName}`);
        modal.modal('show'); 
    }, 300);
}

function openModal(modalId, volunteerId, action) {
    $('.modal').modal('hide'); 
    $('.modal-backdrop').remove(); -
    setTimeout(() => {
        const modal = $('#' + modalId);
        modal.attr('aria-hidden', 'false');
        modal.modal('show'); 
        setRegistrationId(volunteerId, action);
    }, 300);
}

function setRegistrationId(volunteerId, action) {
    if (action === 'approve') {
        $('#confirmApprove').off('click').on('click', function () {
            processRegistration(volunteerId, 'approve');
        });
    } else if (action === 'reject') {
        $('#confirmReject').off('click').on('click', function () {
            processRegistration(volunteerId, 'reject');
        });
    }
}

function processRegistration(volunteerId, action) {
    $.ajax({
        url: "../../handler/admin/approveRegistration.php",
        type: "POST",
        data: { volunteer_id: volunteerId, action: action },
        success: function(response) {
            console.log("Server response:", response); // Log the server response
            if (response.trim() === "success") {
                $(".modal").modal("hide");
                $("body").removeClass("modal-open");
                $(".modal-backdrop").remove();
                loadRegistrationsSection(); 
            } else {
                console.log("Failed to process request:", response); // Log the failure message
                alert("Failed to process request.");
            }
        },
        error: function(xhr, status, error) {
            console.log("AJAX error:", status, error); // Log the AJAX error
            alert("An error occurred while processing the request.");
        }
    });
}

// OFFICER FUNCTIONS
function openOfficerModal(modalId, officerId, action) {
    $('.modal').modal('hide'); 
    $('.modal-backdrop').remove(); 
    setTimeout(() => {
        const modal = $('#' + modalId);
        modal.attr('aria-hidden', 'false');
        modal.modal('show'); 
        setOfficerId(officerId, action);
    }, 300);
}

function setOfficerId(officerId, action) {
    if (action === 'edit') {
        $.ajax({
            url: "../../handler/admin/getOfficer.php",
            type: "GET",
            data: { officer_id: officerId },
            success: function(response) {
                const officer = JSON.parse(response);
                $('#officerId').val(officer.officer_id);
                $('#firstName').val(officer.first_name);
                $('#middleName').val(officer.middle_name);
                $('#surname').val(officer.last_name);
                $('#program').val(officer.program_id);
                $('#position').val(officer.position_id);
                $('#schoolYear').val(officer.school_year_id);
                $('#modalTitle').text('Edit Officer');
                $('#confirmSaveOfficer').text('Update Officer');

                if (officer.image) {
                    $('#image-preview').show();
                    $('#preview-img').attr('src', `../../assets/officers/${officer.image}`);
                } else {
                    $('#image-preview').hide();
                }
            },
            error: function() {
                alert("An error occurred while fetching the officer data.");
            }
        });

        $('#confirmSaveOfficer').off('click').on('click', function (e) {
            e.preventDefault(); 
            processOfficer(officerId, 'edit');
        });
    } else if (action === 'delete') {
        $('#confirmDeleteOfficer').off('click').on('click', function () {
            processOfficer(officerId, 'delete');
        });
    } else if (action === 'add') {
        $('#officerForm')[0].reset();
        $('#modalTitle').text('Add Officer');
        $('#confirmSaveOfficer').text('Add Officer');
        $('#confirmSaveOfficer').off('click').on('click', function (e) {
            e.preventDefault();
            processOfficer(null, 'add');
        });
    }
}

function processOfficer(officerId, action) {
    let formData = new FormData(document.getElementById('officerForm'));
    if (officerId) {
        formData.append('officer_id', officerId);
    }
    formData.append('action', action);

    $.ajax({
        url: "../../handler/admin/officersAction.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response.trim() === "success") {
                $(".modal").modal("hide");
                $("body").removeClass("modal-open");
                $(".modal-backdrop").remove();
                loadOfficersSection()
            } else {
                alert("Failed to process request: " + response);
            }
        },
        error: function() {
            alert("An error occurred while processing the request.");
        }
    });
}

// VOLUNTEER FUNCTIONS
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
                    $('#year').val(volunteer.year);
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

// MODERATOR FUNCTIONS
function openModeratorModal(modalId, moderatorId, action) {
    $('.modal').modal('hide'); 
    $('.modal-backdrop').remove(); 
    setTimeout(() => {
        const modal = $('#' + modalId);
        modal.attr('aria-hidden', 'false');
        modal.modal('show'); 
        setModeratorId(moderatorId, action);
    }, 300);
}

function setModeratorId(moderatorId, action) {
    if (action === 'edit') {
        $.ajax({
            url: "../../handler/admin/getModerator.php",
            type: "GET",
            data: { user_id: moderatorId },
            success: function(response) {
                const moderator = JSON.parse(response);
                $('#moderatorId').val(moderator.user_id);
                $('#firstName').val(moderator.first_name);
                $('#middleName').val(moderator.middle_name);
                $('#lastName').val(moderator.last_name);
                $('#username').val(moderator.username);
                $('#email').val(moderator.email);
                $('#positionId').val(moderator.position_id);
                $('#modalTitle').text('Edit Moderator');
                $('#confirmSaveModerator').text('Update Moderator');
            },
            error: function() {
                alert("An error occurred while fetching the moderator data.");
            }
        });

        $('#confirmSaveModerator').off('click').on('click', function (e) {
            e.preventDefault(); 
            processModerator(moderatorId, 'edit');
        });
    } else if (action === 'delete') {
        $('#confirmDeleteModerator').off('click').on('click', function () {
            processModerator(moderatorId, 'delete');
        });
    }
}

function processModerator(moderatorId, action) {
    let formData = new FormData(document.getElementById('moderatorForm'));
    if (moderatorId) {
        formData.append('user_id', moderatorId);
    }
    formData.append('action', action);

    // for (let [key, value] of formData.entries()) {
    //     console.log(key, value);
    // }

    $.ajax({
        url: "../../handler/admin/moderatorAction.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            //console.log("Server response:", response); 
            if (response.trim() === "success") {
                $(".modal").modal("hide");
                $("body").removeClass("modal-open");
                $(".modal-backdrop").remove();
                loadModeratorsSection();
            } else {
                try {
                    const errors = JSON.parse(response);
                    displayValidationErrors(errors);
                } catch (e) {
                    //console.log("Failed to process request: " + response);
                }
            }
        },
        error: function() {
            alert("An error occurred while processing the request.");
        }
    });
}

$(document).on('hidden.bs.modal', function () {
    if ($('.modal.show').length === 0) { 
        $('body').removeClass('modal-open'); 
        $('.modal-backdrop').remove();
    }
});