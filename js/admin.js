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

function loadDashboardSection() {
    $.ajax({
        url: "../views/admin/adminAnalytics.php",
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
        url: "../views/admin/schoolConfig.php",
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
        url: "../views/admin/events.php",
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
        url: "../views/admin/calendar.php",
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
        url: "../views/admin/transparency.php",
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
        url: "../views/admin/abouts.php",
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
        url: "../views/admin/faqs.php",
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
        url: "../views/admin/officers.php",
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
        url: "../views/admin/volunteers.php",
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

$(document).ready(function() {
    $(document).on('click', '[data-section]', function(e) {
        e.preventDefault();
        const section = $(this).data('section');
        
        $('.nav-link').removeClass('active');
        $(this).addClass('active');
        
        switch(section) {
            case 'dashboard':
                loadDashboardSection();
                break;
            case 'school-config':
                loadSchoolConfigSection();
                break;
            case 'events':
                loadEventsSection();
                break;
            case 'calendar':
                loadCalendarSection();
                break;
            case 'transparency':
                loadTransparencySection();
                break;
            case 'abouts':
                loadAboutsSection();
                break;
            case 'faqs':
                loadFaqsSection();
                break;
            case 'officers':
                loadOfficersSection();
                break;
            case 'volunteers':
                loadVolunteersSection();
                break;
            case 'registrations':
                loadRegistrationsSection();
                break;
            case 'moderators':
                loadModeratorsSection();
                break;
            default:
                console.log('Section not found');
        }
    });
});