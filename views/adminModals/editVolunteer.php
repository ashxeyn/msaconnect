<?php
require_once '../../classes/adminClass.php';
require_once '../../classes/accountClass.php';
require_once '../../tools/function.php';

$adminObj = new Admin();
$accountObj = new Account();
$programs = $adminObj->fetchProgram();
$schoolYears = $adminObj->fetchSy();

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
                        <input type="text" class="form-control" id="firstName" name="firstName" value="<?= $volunteer ? $volunteer['first_name'] : '' ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="surname" class="form-label">Surname</label>
                        <input type="text" class="form-control" id="surname" name="surname" value="<?= $volunteer ? $volunteer['last_name'] : '' ?>" required>
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
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        <input type="hidden" id="existing_image" name="existing_image" value="<?= $volunteer ? $volunteer['cor_file'] : '' ?>">

                            <div id="image-preview" class="mt-2" <?= ($volunteer && !empty($volunteer['cor_file'])) ? '' : 'style="display:none;"' ?>>
                                <img id="preview-img" src="<?= $volunteer && !empty($volunteer['cor_file']) ? '../../assets/cors/' . $volunteer['cor_file'] : '' ?>" alt="volunteer Image" class="img-thumbnail" width="150">
                            </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Volunteer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
