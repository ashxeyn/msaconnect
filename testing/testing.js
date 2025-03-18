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

