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
                <h5 class="modal-title" id="modalTitle">
                    Edit Volunteer
                </h5>
            </div>
            <div class="modal-body">
                <form id="volunteerForm" method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="volunteerId" name="volunteerId" value="<?= $volunteer ? $volunteer['volunteer_id'] : '' ?>">
                    <div class="mb-3">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" value="<?= $volunteer ? $volunteer['first_name'] : '' ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="middleName" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" id="middleName" name="middleName" value="<?= $volunteer ? $volunteer['middle_name'] : '' ?>">
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
                        <label for="year" class="form-label">Year Level</label>
                            <select class="form-select" id="year" name="year" required>
                                <option value="">Select Year Level</option>
                                <option value="1st Year" <?= ($volunteer && $volunteer['year'] == '1st Year') ? 'selected' : '' ?>>1st Year</option>
                                <option value="2nd Year" <?= ($volunteer && $volunteer['year'] == '2nd Year') ? 'selected' : '' ?>>2nd Year</option>
                                <option value="3rd Year" <?= ($volunteer && $volunteer['year'] == '3rd Year') ? 'selected' : '' ?>>3rd Year</option>
                                <option value="4th Year" <?= ($volunteer && $volunteer['year'] == '4th Year') ? 'selected' : '' ?>>4th Year</option>
                            </select>
                    </div>

                    <div class="mb-3">
                        <label for="section" class="form-label">Section</label>
                        <input type="text" class="form-control" id="section" name="section" value="<?= $volunteer ? $volunteer['section'] : '' ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="contact" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" id="contact" name="contact" value="<?= $volunteer ? $volunteer['contact'] : '' ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $volunteer ? $volunteer['email'] : '' ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        <?php if ($volunteer && !empty($volunteer['image'])): ?>
                            <small class="text-muted">Current Image: <?= $volunteer['image'] ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="confirmSaveVolunteer">
                            Update Volunteer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>