<?php
require_once '../../classes/adminClass.php';
require_once '../../classes/accountClass.php';
require_once '../../tools/function.php';

$adminObj = new Admin();
$accountObj = new Account();
$programs = $adminObj->fetchProgram();

$volunteerId = $_GET['volunteerId'] ?? null;
$volunteer = null;
if ($volunteerId) {
    $volunteer = $adminObj->getVolunteerById($volunteerId);
}
?>

<div class="modal fade" id="editVolunteerModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Volunteer</h5>
            </div>
            <div class="modal-body">
                <form id="volunteerForm" method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="volunteerId" name="volunteerId" value="<?= $volunteer ? $volunteer['volunteer_id'] : '' ?>">

                    <div class="mb-3">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" value="<?= $volunteer['first_name'] ?? '' ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="middleName" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" id="middleName" name="middleName" value="<?= $volunteer['middle_name'] ?? '' ?>">
                    </div>

                    <div class="mb-3">
                        <label for="surname" class="form-label">Surname</label>
                        <input type="text" class="form-control" id="surname" name="surname" value="<?= $volunteer['last_name'] ?? '' ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="year" class="form-label">Year Level</label>
                        <input type="number" class="form-control" id="year" name="year" value="<?= $volunteer['year'] ?? '' ?>" required min="1" max="6">
                    </div>

                    <div class="mb-3">
                        <label for="section" class="form-label">Section</label>
                        <input type="text" class="form-control" id="section" name="section" value="<?= $volunteer['section'] ?? '' ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="program" class="form-label">Program</label>
                        <select class="form-select" id="program" name="program" required>
                            <option value="">Select Program</option>
                            <?php foreach ($programs as $program): ?>
                                <option value="<?= $program['program_id'] ?>" <?= ($volunteer && $volunteer['program_id'] == $program['program_id']) ? 'selected' : '' ?>>
                                    <?= clean_input($program['program_name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="contact" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" id="contact" name="contact" value="<?= $volunteer['contact'] ?? '' ?>" required pattern="\d{11}" maxlength="11">
                        <div class="form-text">Format: 11-digit number (e.g., 09XXXXXXXXX)</div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $volunteer['email'] ?? '' ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Certificate of Registration (COR)</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        <input type="hidden" id="existing_image" name="existing_image" value="<?= $volunteer['cor_file'] ?? '' ?>">

                        <div id="image-preview" class="mt-2" <?= ($volunteer && !empty($volunteer['cor_file'])) ? '' : 'style="display:none;"' ?>>
                            <img id="preview-img" src="<?= $volunteer && !empty($volunteer['cor_file']) ? '../../assets/cors/' . $volunteer['cor_file'] : '' ?>" alt="Volunteer COR Image" class="img-thumbnail" width="150">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" id="confirmSaveVolunteer" class="btn btn-primary">Update Volunteer</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
