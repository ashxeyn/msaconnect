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
function loadProgramSection() {
    $.ajax({
        url: "../admin/schoolConfig2.php",
        method: 'GET',
        success: function (response) {
            $('#contentArea').html(response);
        },
        error: function (xhr, status, error) {
            console.error('Error loading Program section:', error);
            $('#contentArea').html('<p class="text-danger">Failed to load Program section. Please try again.</p>');
        }
    });
}

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
            console.log("Server response:", response); 
            if (response.trim() === "success") {
                $(".modal").modal("hide");
                $("body").removeClass("modal-open");
                $(".modal-backdrop").remove();
                loadRegistrationsSection(); 
            } else {
                console.log("Failed to process request:", response); 
                alert("Failed to process request.");
            }
        },
        error: function(xhr, status, error) {
            console.log("AJAX error:", status, error); 
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
                    $('#existing_image').val(volunteer.cor_file);
                    if (volunteer.cor_file) {
                        $('#image-preview').show();
                        $('#preview-img').attr('src', `../../assets/cors/${volunteer.cor_file}`);
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

// SCHOOL CONFIG FUNCTIONS
function openCollegeModal(modalId, collegeId, action) {
    $('.modal').modal('hide'); 
    $('.modal-backdrop').remove();
    setTimeout(() => {
        const modal = $('#' + modalId);
        modal.attr('aria-hidden', 'false');
        modal.modal('show'); 
        setCollegeId(collegeId, action);
    }, 300);
}

function setCollegeId(collegeId, action) {
    if (action === 'edit') {
        $.ajax({
            url: "../../handler/admin/getCollege.php",
            type: "GET",
            data: { college_id: collegeId },
            success: function(response) {
                try {
                    const college = JSON.parse(response);
                    $('#collegeId').val(college.college_id);
                    $('#collegeName').val(college.college_name);
                    $('#collegeModalTitle').text('Edit College');
                    $('#confirmSaveCollege').text('Update College');
                    $('#addEditCollegeModal').modal('show');
                } catch (e) {
                    console.error("Invalid JSON response:", response);
                    alert("An error occurred while fetching the college data.");
                }
            },
            error: function() {
                alert("An error occurred while fetching the college data.");
            }
        });

        $('#confirmSaveCollege').off('click').on('click', function (e) {
            e.preventDefault(); 
            processCollege(collegeId, 'edit');
        });
    } else if (action === 'delete') {
        $('#collegeIdToDelete').val(collegeId);
        $('#deleteCollegeModal').modal('show');
        $('#confirmDeleteCollege').off('click').on('click', function () {
            processCollege(collegeId, 'delete');
        });
    } else if (action === 'add') {
        $('#collegeForm')[0].reset();
        $('#collegeModalTitle').text('Add College');
        $('#confirmSaveCollege').text('Add College');
        $('#confirmSaveCollege').off('click').on('click', function (e) {
            e.preventDefault();
            processCollege(null, 'add');
        });
    }
}

function processCollege(collegeId, action) {
    let formData = new FormData(document.getElementById('collegeForm'));
    if (collegeId) {
        formData.append('college_id', collegeId);
    }
    formData.append('action', action);

    $.ajax({
        url: "../../handler/admin/collegeAction.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response.trim() === "success") {
                $(".modal").modal("hide");
                $("body").removeClass("modal-open");
                $(".modal-backdrop").remove();
                loadSchoolConfigSection();
            } else {
                alert("Failed to process request: " + response);
            }
        },
        error: function() {
            alert("An error occurred while processing the request.");
        }
    });
}

function openProgramModal(modalId, programId, action) {
    $('.modal').modal('hide'); 
    $('.modal-backdrop').remove();
    setTimeout(() => {
        const modal = $('#' + modalId);
        modal.attr('aria-hidden', 'false');
        modal.modal('show'); 
        setProgramId(programId, action);
    }, 300);
}

function setProgramId(programId, action) {
    if (action === 'edit') {
        $.ajax({
            url: "../../handler/admin/getProgram.php",
            type: "GET",
            data: { program_id: programId },
            success: function(response) {
                try {
                    const program = JSON.parse(response);
                    $('#programId').val(program.program_id);
                    $('#programName').val(program.program_name);
                    $('#collegeSelect').val(program.college_id);
                    $('#programModalTitle').text('Edit Program');
                    $('#confirmSaveProgram').text('Update Program');
                    $('#addEditProgramModal').modal('show');
                } catch (e) {
                    console.error("Invalid JSON response:", response);
                    alert("An error occurred while fetching the program data.");
                }
            },
            error: function() {
                alert("An error occurred while fetching the program data.");
            }
        });

        $('#confirmSaveProgram').off('click').on('click', function (e) {
            e.preventDefault(); 
            processProgram(programId, 'edit');
        });
    } else if (action === 'delete') {
        $('#programIdToDelete').val(programId);
        $('#deleteProgramModal').modal('show');
        $('#confirmDeleteProgram').off('click').on('click', function () {
            processProgram(programId, 'delete');
        });
    } else if (action === 'add') {
        $('#programForm')[0].reset();
        $('#programModalTitle').text('Add Program');
        $('#confirmSaveProgram').text('Add Program');
        $('#confirmSaveProgram').off('click').on('click', function (e) {
            e.preventDefault();
            processProgram(null, 'add');
        });
    }
}

function processProgram(programId, action) {
    let formData = new FormData(document.getElementById('programForm'));
    if (programId) {
        formData.append('program_id', programId);
    }
    formData.append('action', action);

    // console.log("Form data being sent:");
    // for (let [key, value] of formData.entries()) {
    //     console.log(key, value);
    // }

    $.ajax({
        url: "../../handler/admin/programAction.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            console.log("Server response:", response);
            if (response.trim() === "success") {
                $(".modal").modal("hide");
                $("body").removeClass("modal-open");
                $(".modal-backdrop").remove();
                loadProgramSection();
            } else {
                console.error("Failed to process request:", response);
                alert("Failed to process request: " + response);
            }
        },
        error: function(xhr, status, error) {
            console.error("AJAX error:", status, error);
            alert("An error occurred while processing the request.");
        }
    });
}

// FAQS FUNCTIONS
function openFaqModal(modalId, faqId, action) {
    $('.modal').modal('hide');
    $('.modal-backdrop').remove();
    setTimeout(() => {
        const modal = $('#' + modalId);
        modal.attr('aria-hidden', 'false');
        modal.modal('show');
        setFaqId(faqId, action);
    }, 300);
}

function setFaqId(faqId, action) {
    if (action === 'edit') {
        $.ajax({
            url: "../../handler/admin/getFaq.php",
            type: "GET",
            data: { faq_id: faqId },
            success: function(response) {
                try {
                    const faq = JSON.parse(response);
                    $('#faqId').val(faq.faq_id);
                    $('#question').val(faq.question);
                    $('#answer').val(faq.answer);
                    $('#category').val(faq.category);
                    $('#modalTitle').text('Edit FAQ');
                    $('#confirmSaveFaq').text('Update FAQ');
                } catch (e) {
                    console.error("Invalid JSON response:", response);
                    alert("An error occurred while fetching the FAQ data.");
                }
            },
            error: function() {
                alert("An error occurred while fetching the FAQ data.");
            }
        });

        $('#confirmSaveFaq').off('click').on('click', function (e) {
            e.preventDefault();
            processFaq(faqId, 'edit');
        });
    } else if (action === 'delete') {
        $('#faqIdToDelete').val(faqId);
        $('#deleteFaqModal').modal('show');
        $('#confirmDeleteFaq').off('click').on('click', function () {
            processFaq(faqId, 'delete');
        });
    } else if (action === 'add') {
        $('#faqForm')[0].reset();
        $('#modalTitle').text('Add FAQ');
        $('#confirmSaveFaq').text('Add FAQ');
        $('#confirmSaveFaq').off('click').on('click', function (e) {
            e.preventDefault();
            processFaq(null, 'add');
        });
    }
}

function processFaq(faqId, action) {
    const form = document.getElementById('faqForm');
    const formData = new FormData(form);
    
    if (faqId) {
        formData.append('faq_id', faqId);
    }
    formData.append('action', action);

    // for (let [key, value] of formData.entries()) {
    //     console.log(key, value);
    // }

    $.ajax({
        url: "../../handler/admin/faqsAction.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            console.log("Server response:", response);
            if (response.trim() === "success") {
                $("#addEditFaqModal").modal("hide");
                $("#deleteFaqModal").modal("hide");
                loadFaqsSection();
            } else {
                alert("Error: " + response);
            }
        },
        error: function(xhr, status, error) {
            console.error("AJAX Error:", status, error);
            alert("Failed to save. Check console for details.");
        }
    });
}

$(document).on('hidden.bs.modal', function () {
    if ($('.modal.show').length === 0) { 
        $('body').removeClass('modal-open'); 
        $('.modal-backdrop').remove();
    }
});

