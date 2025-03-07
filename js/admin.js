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
    $('#volunteerTable').DataTable();
});

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

// function viewPhoto(photoName) {
//     const photoPath = `../../assets/cors/${photoName}`;
//     console.log("Photo Path:", photoPath);
//     document.getElementById('modalPhoto').src = photoPath;
// }

function viewPhoto(photoName) {
    $('.modal').modal('hide'); 
    // $('.modal-backdrop').remove(); 
    setTimeout(() => {
        const modal = $('#photoModal');
        modal.attr('aria-hidden', 'false');
        $('#modalPhoto').attr('src', `../../assets/cors/${photoName}`);
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
        setVolunteerId(volunteerId, action);
    }, 300);
}

$(document).on('hidden.bs.modal', function () {
    if ($('.modal.show').length === 0) { 
        $('body').removeClass('modal-open'); 
        $('.modal-backdrop').remove();
    }
});

function setVolunteerId(volunteerId, action) {
    if (action === 'approve') {
        $('#confirmApprove').off('click').on('click', function () {
            processVolunteer(volunteerId, 'approve');
        });
    } else if (action === 'reject') {
        $('#confirmReject').off('click').on('click', function () {
            processVolunteer(volunteerId, 'reject');
        });
    }
}

function processVolunteer(volunteerId, action) {
    $.ajax({
        url: "../../handler/admin/approveRegistration.php",
        type: "POST",
        data: { volunteer_id: volunteerId, action: action },
        success: function(response) {
            if (response.trim() === "success") {
                $(".modal").modal("hide");
                $("body").removeClass("modal-open");
                $(".modal-backdrop").remove();
                loadRegistrationsSection(); 
            } else {
                alert("Failed to process request.");
            }
        },
        error: function() {
            alert("An error occurred while processing the request.");
        }
    });
}
