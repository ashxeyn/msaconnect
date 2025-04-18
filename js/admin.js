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
    $('#cashinTable').DataTable();
    $('#cashoutTable').DataTable();
});

// // SIDEBAR FUNCTIONS
// function loadProgramSection() {
//     $.ajax({
//         url: "../admin/schoolConfig2.php",
//         method: 'GET',
//         success: function (response) {
//             $('#contentArea').html(response);
//         },
//         error: function (xhr, status, error) {
//             console.error('Error loading Program section:', error);
//             $('#contentArea').html('<p class="text-danger">Failed to load Program section. Please try again.</p>');
//         }
//     });
// }

// function loadDashboardSection() {
//     $.ajax({
//         url: "../admin/viewAnalytics.php",
//         method: 'GET',
//         success: function (response) {
//             $('#contentArea').html(response);
//         },
//         error: function (xhr, status, error) {
//             console.error('Error loading dashboard section:', error);
//             $('#contentArea').html('<p class="text-danger">Failed to load Dashboard section. Please try again.</p>');
//         }
//     });
// }

// function loadSchoolConfigSection() {
//     $.ajax({
//         url: "../admin/schoolConfig.php",
//         method: 'GET',
//         success: function (response) {
//             $('#contentArea').html(response);
//         },
//         error: function (xhr, status, error) {
//             console.error('Error loading school configuration section:', error);
//             $('#contentArea').html('<p class="text-danger">Failed to load School Configuration section. Please try again.</p>');
//         }
//     });
// }

// function loadEventsSection() {
//     $.ajax({
//         url: "../admin/events.php",
//         method: 'GET',
//         success: function (response) {
//             $('#contentArea').html(response);
//         },
//         error: function (xhr, status, error) {
//             console.error('Error loading events section:', error);
//             $('#contentArea').html('<p class="text-danger">Failed to load Events section. Please try again.</p>');
//         }
//     });
// }

// function loadCalendarSection() {
//     $.ajax({
//         url: "../admin/calendar.php",
//         method: 'GET',
//         success: function (response) {
//             $('#contentArea').html(response);
//         },
//         error: function (xhr, status, error) {
//             console.error('Error loading calendar section:', error);
//             $('#contentArea').html('<p class="text-danger">Failed to load Calendar section. Please try again.</p>');
//         }
//     });
// }

// function loadTransparencySection() {
//     $.ajax({
//         url: "../admin/transparency.php",
//         method: 'GET',
//         success: function (response) {
//             $('#contentArea').html(response);
//         },
//         error: function (xhr, status, error) {
//             console.error('Error loading transparency section:', error);
//             $('#contentArea').html('<p class="text-danger">Failed to load Transparency section. Please try again.</p>');
//         }
//     });
// }

// function loadAboutsSection() {
//     $.ajax({
//         url: "../admin/abouts.php",
//         method: 'GET',
//         success: function (response) {
//             $('#contentArea').html(response);
//         },
//         error: function (xhr, status, error) {
//             console.error('Error loading abouts section:', error);
//             $('#contentArea').html('<p class="text-danger">Failed to load Abouts section. Please try again.</p>');
//         }
//     });
// }

// function loadFaqsSection() {
//     $.ajax({
//         url: "../admin/faqs.php",
//         method: 'GET',
//         success: function (response) {
//             $('#contentArea').html(response);
//         },
//         error: function (xhr, status, error) {
//             console.error('Error loading FAQs section:', error);
//             $('#contentArea').html('<p class="text-danger">Failed to load FAQs section. Please try again.</p>');
//         }
//     });
// }

// function loadOfficersSection() {
//     $.ajax({
//         url: "../admin/officers.php",
//         method: 'GET',
//         success: function (response) {
//             $('#contentArea').html(response);
//         },
//         error: function (xhr, status, error) {
//             console.error('Error loading officers section:', error);
//             $('#contentArea').html('<p class="text-danger">Failed to load Officers section. Please try again.</p>');
//         }
//     });
// }

// function loadVolunteersSection() {
//     $.ajax({
//         url: "../admin/volunteers.php",
//         method: 'GET',
//         success: function (response) {
//             $('#contentArea').html(response);
//         },
//         error: function (xhr, status, error) {
//             console.error('Error loading volunteers section:', error);
//             $('#contentArea').html('<p class="text-danger">Failed to load Volunteers section. Please try again.</p>');
//         }
//     });
// }

// function loadModeratorsSection() {
//     $.ajax({
//         url: "../admin/moderators.php",
//         method: 'GET',
//         success: function (response) {
//             $('#contentArea').html(response);
//         },
//         error: function (xhr, status, error) {
//             console.error('Error loading moderators section:', error);
//             $('#contentArea').html('<p class="text-danger">Failed to load Moderators section. Please try again.</p>');
//         }
//     });
// }

// function loadRegistrationsSection() {
//     $.ajax({
//         url: "../admin/registrations.php",
//         method: 'GET',
//         success: function (response) {
//             $('#contentArea').html(response);
//         },
//         error: function (xhr, status, error) {
//             console.error('Error loading registration section:', error);
//             $('#contentArea').html('<p class="text-danger">Failed to load Registration section. Please try again.</p>');
//         }
//     });
// }

// function loadPrayerSchedSection() {
//     $.ajax({
//         url: "../admin/prayer.php",
//         method: 'GET',
//         success: function (response) {
//             $('#contentArea').html(response);
//         },
//         error: function (xhr, status, error) {
//             console.error('Error loading prayer schedule section:', error);
//             $('#contentArea').html('<p class="text-danger">Failed to load Prayer Schedule section. Please try again.</p>');
//         }
//     });
// }

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
                $('#existing_image').val(officer.image);
                $('#modalTitle').text('Edit Officer');
                $('#confirmSaveOfficer').text('Update Officer');

                if (officer.image) {
                    $('#image-preview').show();
                    $('#preview-img').attr('src', `../../assets/officers/${officer.image}`);
                } else {
                    $('#image-preview').hide();
                }

                $('#image').off('change').on('change', function () {
                    if (this.files.length > 0) {
                        $('#image-preview').show();
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            $('#preview-img').attr('src', e.target.result);
                        };
                        reader.readAsDataURL(this.files[0]);
                    }
                });
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
        $('#image-preview').hide();
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
                loadOfficersSection();
            } else {
                console.log(response);
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
                const volunteer = JSON.parse(response);
                $('#volunteerId').val(volunteer.volunteer_id);
                $('#firstName').val(volunteer.first_name);
                $('#surname').val(volunteer.last_name);
                $('#program').val(volunteer.program_id);
                $('#contact').val(volunteer.contact);
                $('#section').val(volunteer.section);
                $('#year_level').val(volunteer.year_level);
                $('#email').val(volunteer.email);
                $('#existing_image').val(volunteer.cor_file);
                $('#modalTitle').text('Edit Volunteer');
                $('#confirmSaveVolunteer').text('Update Volunteer');

                if (volunteer.cor_file) {
                    $('#image-preview').show();
                    $('#preview-img').attr('src', '../../assets/cors/' + volunteer.cor_file);
                } else {
                    $('#image-preview').hide();
                }

                $('#image').off('change').on('change', function () {
                    if (this.files.length > 0) {
                        $('#image-preview').show();
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            $('#preview-img').attr('src', e.target.result);
                        };
                        reader.readAsDataURL(this.files[0]);
                    }
                });
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
        $('#confirmDeleteVolunteer').off('click').on('click', function () {
            processVolunteer(volunteerId, 'delete');
        });
    } else if (action === 'add') {
        $('#volunteerForm')[0].reset();
        $('#image-preview').hide();
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
                loadVolunteersSection(); // Reload the page to show updated data
            } else {
                console.log("Error response:", response);
                alert("Failed to process the request. Please check the console for details.");
            }
        },
        error: function(xhr, status, error) {
            console.error("AJAX Error:", error);
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

// EVENT FUNCTIONS    
function openEventModal(modalId, eventId, action) {
    $('.modal').modal('hide'); 
    $('.modal-backdrop').remove(); 
    setTimeout(() => {
        const modal = $('#' + modalId);
        modal.attr('aria-hidden', 'false');
        modal.modal('show'); 
        setEventData(eventId, action);
    }, 300);
}

function setEventData(eventId, action) {
    if (action === 'edit') {
        $.ajax({
            url: "../../handler/admin/getEvent.php",
            type: "GET",
            data: { event_id: eventId },
            success: function(response) {
                const event = JSON.parse(response);
                $('#eventId').val(event.event_id);
                $('#description').val(event.description);
                $('#eventModalTitle').text('Edit Event');
                $('#confirmSaveEvent').text('Update Event');

                if (event.image) {
                    $('#image-preview').show();
                    $('#preview-img').attr('src', `../../assets/events/${event.image}`);
                } else {
                    $('#image-preview').hide();
                }
            },
            error: function() {
                alert("An error occurred while fetching event data.");
            }
        });

        $('#confirmSaveEvent').off('click').on('click', function (e) {
            e.preventDefault(); 
            processEvent(eventId, 'edit');
        });

    } else if (action === 'delete') {
        $('#confirmDeleteEvent').off('click').on('click', function () {
            processEvent(eventId, 'delete');
        });

    } else if (action === 'add') {
        $('#eventForm')[0].reset();
        $('#eventModalTitle').text('Add Event');
        $('#confirmSaveEvent').text('Add Event');
        $('#confirmSaveEvent').off('click').on('click', function (e) {
            e.preventDefault();
            processEvent(null, 'add');
        });
    }
}

function processEvent(eventId, action) {
    let formData = new FormData(document.getElementById('eventForm'));
    if (eventId) {
        formData.append('event_id', eventId);
    }
    formData.append('action', action);

    $.ajax({
        url: "../../handler/admin/eventAction.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response.trim() === "success") {
                $(".modal").modal("hide");
                $("body").removeClass("modal-open");
                $(".modal-backdrop").remove();
                loadEventsSection(); 
            } else {
                console.log(response);
            }
        },
        error: function() {
            alert("An error occurred while processing the request.");
        }
    });
}

// CALENDAR FUNCTIONS
function openCalendarModal(modalId, activityId, action) {
    $('.modal').modal('hide');
    $('.modal-backdrop').remove();

    setTimeout(() => {
        const modal = $('#' + modalId);
        modal.attr('aria-hidden', 'false');
        modal.modal('show');
        setCalendarId(modalId, activityId, action);
    }, 300);
}

function setCalendarId(modalId, activityId, action) {
    if (action === 'edit' && activityId) {
        $.ajax({
            url: "../../handler/admin/getCalendarEvents.php",
            type: "GET",
            data: { activity_id: activityId },
            success: function(response) {
                try {
                    const activity = JSON.parse(response);
                    $('#activityId').val(activity.activity_id);
                    $('#activityDate').val(activity.activity_date);
                    $('#title').val(activity.title);
                    $('#description').val(activity.description);
                    $('#calendarModalTitle').text('Edit Activity');
                    $('#confirmSaveActivity').text('Update Activity');

                    $('#confirmSaveActivity').off('click').on('click', function(e) {
                        e.preventDefault();
                        processCalendar(activity.activity_id, 'edit');
                    });
                } catch (e) {
                    console.error("JSON Parse Error:", response);
                    alert("Failed to fetch event data.");
                }
            },
            error: function() {
                alert("An error occurred while fetching event.");
            }
        });

    } else if (action === 'delete' && activityId) {
        $('#activityIdToDelete').val(activityId);
        $('#confirmDeleteActivity').off('click').on('click', function () {
            processCalendar(activityId, 'delete');
        });

    } else if (action === 'add') {
        $('#calendarForm')[0].reset();
        $('#activityId').val('');
        $('#calendarModalTitle').text('Add Activity');
        $('#confirmSaveActivity').text('Add Activity');

        $('#confirmSaveActivity').off('click').on('click', function(e) {
            e.preventDefault();
            processCalendar(null, 'add');
        });
    }
}

function processCalendar(activityId, action) {
    let formData = new FormData(document.getElementById('calendarForm'));
    formData.append('action', action);
    if (activityId) {
        formData.append('activity_id', activityId);
    }

    $.ajax({
        url: "../../handler/admin/calendarAction.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response.trim() === "success") {
                $(".modal").modal("hide");
                $("body").removeClass("modal-open");
                $(".modal-backdrop").remove();
                loadCalendarSection();
            } else {
                alert("Request failed: " + response);
            }
        },
        error: function() {
            alert("An error occurred.");
        }
    });
}

// PRAYER FUNCTIONS
function openPrayerModal(modalId, prayerId, action) {
    $('.modal').modal('hide');
    $('.modal-backdrop').remove();
    setTimeout(() => {
        const modal = $('#' + modalId);
        modal.attr('aria-hidden', 'false');
        modal.modal('show');
        setPrayerId(prayerId, action);
    }, 300);
}

function setPrayerId(prayerId, action) {
    if (action === 'edit' && prayerId) {
        $.ajax({
            url: "../../handler/admin/getprayerSched.php",
            type: "GET",
            data: { prayer_id: prayerId },
            success: function(response) {
                const data = JSON.parse(response);
                $('#prayerId').val(data.prayer_id);
                $('#khutbahDate').val(data.khutbah_date);
                $('#speaker').val(data.speaker);
                $('#topic').val(data.topic);
                $('#location').val(data.location);
                $('#prayerModalTitle').text('Edit Schedule');
                $('#confirmSavePrayer').text('Update Schedule');
            }
        });

        $('#confirmSavePrayer').off('click').on('click', function (e) {
            e.preventDefault();
            processPrayer(prayerId, 'edit');
        });

    } else if (action === 'add') {
        $('#prayerForm')[0].reset();
        $('#prayerId').val('');
        $('#prayerModalTitle').text('Add Schedule');
        $('#confirmSavePrayer').text('Add Schedule');
        $('#confirmSavePrayer').off('click').on('click', function (e) {
            e.preventDefault();
            processPrayer(null, 'add');
        });
    } else if (action === 'delete') {
        $('#prayerIdToDelete').val(prayerId);
        $('#confirmDeletePrayer').off('click').on('click', function () {
            processPrayer(prayerId, 'delete');
        });
    }
}

function processPrayer(prayerId, action) {
    let formData = new FormData(document.getElementById('prayerForm'));
    if (prayerId) {
        formData.append('prayer_id', prayerId);
    }
    formData.append('action', action);

    $.ajax({
        url: "../../handler/admin/prayerAction.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.trim() === "success") {
                $(".modal").modal("hide");
                $("body").removeClass("modal-open");
                $(".modal-backdrop").remove();
                loadPrayerSchedSection();
            } else {
                alert("Failed: " + response);
            }
        },
        error: function () {
            alert("An error occurred while processing the request.");
        }
    });
}

// TRANSPARENCY FUNCTIONS
function openTransactionModal(modalId, reportId, action, transactionType) {
    $('.modal').modal('hide'); 
    $('.modal-backdrop').remove();
    setTimeout(() => {
        const modal = $('#' + modalId);
        modal.attr('aria-hidden', 'false');
        modal.modal('show'); 
        setTransactionId(reportId, action, transactionType);
    }, 300);
}

function setTransactionId(reportId, action, transactionType) {
    if (action === 'edit') {
        $.ajax({
            url: "../../handler/admin/getTransparency.php",
            type: "GET",
            data: { 
                action: 'get_transaction',
                report_id: reportId 
            },
            success: function(response) {
                const transaction = JSON.parse(response);
                
                if (transactionType === 'Cash In') {
                    $('#reportId').val(transaction.report_id);
                    $('#cashInDate').val(transaction.report_date);
                    $('#cashInDetail').val(transaction.expense_detail);
                    $('#cashInCategory').val(transaction.expense_category);
                    $('#cashInAmount').val(transaction.amount);
                    $('#cashInSemester').val(transaction.semester);
                    $('#cashInSchoolYearId').val(transaction.school_year_id);
                    $('#cashInModalTitle').text('Edit Cash-In');
                    $('#confirmSaveCashIn').text('Update Cash-In');
                    
                    $('#confirmSaveCashIn').off('click').on('click', function(e) {
                        e.preventDefault();
                        processTransaction(reportId, 'edit', 'cash_in');
                    });
                } else {
                    $('#reportIdOut').val(transaction.report_id);
                    $('#cashOutDate').val(transaction.report_date);
                    $('#cashOutDetail').val(transaction.expense_detail);
                    $('#cashOutCategory').val(transaction.expense_category);
                    $('#cashOutAmount').val(transaction.amount);
                    $('#cashOutSemester').val(transaction.semester);
                    $('#cashOutSchoolYearId').val(transaction.school_year_id);
                    $('#cashOutModalTitle').text('Edit Cash-Out');
                    $('#confirmSaveCashOut').text('Update Cash-Out');
                    
                    $('#confirmSaveCashOut').off('click').on('click', function(e) {
                        e.preventDefault();
                        processTransaction(reportId, 'edit', 'cash_out');
                    });
                }
            },
            error: function() {
                alert("An error occurred while fetching the transaction data.");
            }
        });
    } else if (action === 'delete') {
        if (transactionType === 'Cash In') {
            $('#deleteReportId').val(reportId);
            $('#confirmDeleteTransaction').off('click').on('click', function() {
                processTransaction(reportId, 'delete', 'cash_in');
            });
        } else {
            $('#deleteReportIdOut').val(reportId);
            $('#confirmDeleteTransactionOut').off('click').on('click', function() {
                processTransaction(reportId, 'delete', 'cash_out');
            });
        }
    } else if (action === 'add') {
        if (transactionType === 'Cash In') {
            $('#cashInForm')[0].reset();
            $('#reportId').val('');
            $('#cashInSchoolYearId').val($('#schoolYearSelect').val());
            $('#cashInSemester').val($('#semesterSelect').val());
            $('#cashInModalTitle').text('Add Cash-In');
            $('#confirmSaveCashIn').text('Add Cash-In');
            
            $('#confirmSaveCashIn').off('click').on('click', function(e) {
                e.preventDefault();
                processTransaction(null, 'add', 'cash_in');
            });
        } else {
            $('#cashOutForm')[0].reset();
            $('#reportIdOut').val('');
            $('#cashOutSchoolYearId').val($('#schoolYearSelect').val());
            $('#cashOutSemester').val($('#semesterSelect').val());
            $('#cashOutModalTitle').text('Add Cash-Out');
            $('#confirmSaveCashOut').text('Add Cash-Out');
            
            $('#confirmSaveCashOut').off('click').on('click', function(e) {
                e.preventDefault();
                processTransaction(null, 'add', 'cash_out');
            });
        }
    }
}

function processTransaction(reportId, action, type) {
    let formData;
    
    if (action === 'delete') {
        formData = new FormData();
        formData.append('report_id', reportId);
        formData.append('action', action);
        formData.append('type', type);
    } else {
        if (type === 'cash_in') {
            formData = new FormData(document.getElementById('cashInForm'));
        } else {
            formData = new FormData(document.getElementById('cashOutForm'));
        }
        
        if (reportId) {
            formData.append('report_id', reportId);
        }
        formData.append('action', action);
        formData.append('type', type);
    }

    $.ajax({
        url: "../../handler/admin/transparencyAction.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response.trim() === "success") {
                $(".modal").modal("hide");
                $("body").removeClass("modal-open");
                $(".modal-backdrop").remove();
                loadTransparencySection();
            } else {
                console.log(response);
            }
        },
        error: function() {
            alert("An error occurred while processing the request.");
        }
    });
}

function openUpdateStudentsModal() {
    $('.modal').modal('hide');
    $('.modal-backdrop').remove();
    
    setTimeout(() => {
        const schoolYearId = $('#schoolYearSelect').val();
        const semester = $('#semesterSelect').val();
        
        $.ajax({
            url: "../../handler/admin/getTransparency.php",
            type: "GET",
            data: { 
                action: 'get_student_paid',
                school_year_id: schoolYearId,
                semester: semester
            },
            success: function(response) {
                const data = JSON.parse(response);
                
                $('#updateStudentsModal').attr('aria-hidden', 'false');
                $('#updateStudentsModal').modal('show');
                $('#studentSchoolYearId').val(schoolYearId);
                $('#studentSemester').val(semester);
                
                if (data) {
                    $('#paidId').val(data.paid_id);
                    $('#noStudents').val(data.no_students);
                } else {
                    $('#paidId').val('');
                    $('#noStudents').val('0');
                }
                
                $('#confirmSaveStudents').off('click').on('click', function(e) {
                    e.preventDefault();
                    updateStudentsPaid();
                });
            },
            error: function() {
                alert("An error occurred while fetching student data.");
            }
        });
    }, 300);
}

function updateStudentsPaid() {
    let formData = new FormData(document.getElementById('studentsForm'));
    formData.append('action', 'update_students');
    
    $.ajax({
        url: "../../handler/admin/transparencyAction.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response.trim() === "success") {
                $("#updateStudentsModal").modal("hide");
                $("body").removeClass("modal-open");
                $(".modal-backdrop").remove();
                loadTransparencySection();
            } else {
                console.log(response);
            }
        },
        error: function() {
            alert("An error occurred while processing the request.");
        }
    });
}

// Transparency Filter Functions
$(document).ready(function() {
    $('.input-group.date').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true
    });
    
    $('.filter-control, .filter-date').change(function() {
        applyFilters();
    });
    
    $('#clearDates').click(function() {
        $('#startDate').val('');
        $('#endDate').val('');
        applyFilters();
    });
    
    function applyFilters() {
        const schoolYearId = $('#schoolYearSelect').val();
        const semester = $('#semesterSelect').val();
        const startDate = $('#startDate').val();
        const endDate = $('#endDate').val();
        
        loadFilteredTransparencySection(schoolYearId, semester, startDate, endDate);
    }
});

function loadFilteredTransparencySection(schoolYearId, semester, startDate, endDate) {
    $.ajax({
        url: "../admin/transparency.php",
        method: 'GET',
        data: {
            school_year_id: schoolYearId,
            semester: semester,
            start_date: startDate,
            end_date: endDate
        },
        success: function (response) {
            $('#contentArea').html(response);
        },
        error: function (xhr, status, error) {
            console.error('Error loading transparency section:', error);
            $('#contentArea').html('<p class="text-danger">Failed to load Transparency section. Please try again.</p>');
        }
    });
}

// ABOUTS FUNCTIONS
function openAboutModal(modalId, aboutId, action) {
    $('.modal').modal('hide');
    $('.modal-backdrop').remove();
    setTimeout(() => {
        const modal = $('#' + modalId);
        modal.attr('aria-hidden', 'false');
        modal.modal('show');
        setAboutId(aboutId, action);
    }, 300);
}

function setAboutId(aboutId, action) {
    if (action === 'edit') {
        $.ajax({
            url: "../../handler/admin/getAbouts.php",
            type: "GET",
            data: { id: aboutId },
            success: function (response) {
                try {
                    const about = JSON.parse(response);
                    $('#aboutId').val(about.id);
                    $('#mission').val(about.mission);
                    $('#vision').val(about.vision);
                    $('#description').val(about.description);
                    $('#aboutModalTitle').text('Edit About MSA');
                    $('#confirmSaveAbout').text('Update About');
                    $('#addEditAboutModal').modal('show');
                } catch (e) {
                    console.error("Invalid JSON response:", response);
                    alert("An error occurred while fetching the about data.");
                }
            },
            error: function () {
                alert("An error occurred while fetching the about data.");
            }
        });

        $('#confirmSaveAbout').off('click').on('click', function (e) {
            e.preventDefault();
            processAbout(aboutId, 'edit');
        });

    } else if (action === 'delete') {
        $('#aboutIdToDelete').val(aboutId);
        $('#deleteAboutModal').modal('show');
        $('#confirmDeleteAbout').off('click').on('click', function () {
            processAbout(aboutId, 'delete');
        });

    } else if (action === 'add') {
        $('#aboutForm')[0].reset();
        $('#aboutModalTitle').text('Add About MSA');
        $('#confirmSaveAbout').text('Add About');
        $('#confirmSaveAbout').off('click').on('click', function (e) {
            e.preventDefault();
            processAbout(null, 'add');
        });
    }
}

function processAbout(aboutId, action) {
    let formData = new FormData(document.getElementById('aboutForm'));
    if (aboutId) formData.append('id', aboutId);
    formData.append('action', action);

    $.ajax({
        url: "../../handler/admin/aboutsAction.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.trim() === "success") {
                $(".modal").modal("hide");
                $("body").removeClass("modal-open");
                $(".modal-backdrop").remove();
                loadAboutsSection();
            } else {
                console.error("Failed to process request:", response);
                alert("Failed to process request: " + response);
            }
        },
        error: function (xhr, status, error) {
            console.error("AJAX error:", status, error);
            alert("An error occurred while processing the request.");
        }
    });
}

// DOWNLOADS FUNCTIONS
function openFileModal(modalId, fileId, action) {
    $('.modal').modal('hide'); 
    $('.modal-backdrop').remove(); 
    setTimeout(() => {
        const modal = $('#' + modalId);
        modal.attr('aria-hidden', 'false');
        modal.modal('show'); 
        setFileId(fileId, action);
    }, 300);
}

function setFileId(fileId, action) {
    if (action === 'edit') {
        $.ajax({
            url: "../../handler/admin/getFile.php",
            type: "GET",
            data: { file_id: fileId },
            success: function(response) {
                const file = JSON.parse(response);
                $('#fileId').val(file.file_id);
                $('#file_name').val(file.file_name);
                $('#fileModalTitle').text('Edit File');
                $('#confirmSaveFile').text('Update File');
                
                $('#current-file-info').show();
                $('#current-file-name').text(file.file_name);

                let fileType = file.file_type;
                if (fileType === 'application/pdf') {
                    fileType = 'PDF';
                } else if (fileType === 'application/vnd.openxmlformats-officedocument.word') {
                    fileType = 'DOCX';
                }

                $('#current-file-type').text(fileType);
                $('#current-file-size').text(formatFileSize(file.file_size));
            },
            error: function() {
                alert("An error occurred while fetching file data.");
            }
        });

        $('#confirmSaveFile').off('click').on('click', function (e) {
            e.preventDefault(); 
            processFile(fileId, 'edit');
        });

    } else if (action === 'delete') {
        $.ajax({
            url: "../../handler/admin/getFile.php",
            type: "GET",
            data: { file_id: fileId },
            success: function(response) {
                const file = JSON.parse(response);
                $('#delete-file-name').text(file.file_name);
            }
        });
        
        $('#confirmDeleteFile').off('click').on('click', function () {
            processFile(fileId, 'delete');
        });

    } else if (action === 'add') {
        $('#fileForm')[0].reset();
        $('#fileModalTitle').text('Add File');
        $('#confirmSaveFile').text('Add File');
        $('#current-file-info').hide();
        
        $('#confirmSaveFile').off('click').on('click', function (e) {
            e.preventDefault();
            processFile(null, 'add');
        });
    }
}

function processFile(fileId, action) {
    let formData = new FormData(document.getElementById('fileForm'));
    if (fileId) {
        formData.append('file_id', fileId);
    }
    formData.append('action', action);

    $.ajax({
        url: "../../handler/admin/fileAction.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response.trim() === "success") {
                $(".modal").modal("hide");
                $("body").removeClass("modal-open");
                $(".modal-backdrop").remove();
                loadDownloadablesSection(); 
            } else {
                console.log(response);
                // console.log("Error: " + response);
            }
        },
        error: function() {
            alert("An error occurred while processing the request.");
        }
    });
}

function formatFileSize(bytes) {
    if (bytes === 0) return '0 Bytes';
    const k = 1024;
    const sizes = ['Bytes', 'KB', 'MB', 'GB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
}

$(document).on('hidden.bs.modal', function () {
    if ($('.modal.show').length === 0) { 
        $('body').removeClass('modal-open'); 
        $('.modal-backdrop').remove();
    }
});

