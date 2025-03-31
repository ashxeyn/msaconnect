<?php
require_once '../../classes/adminClass.php';
require_once '../../classes/accountClass.php';
require_once '../../tools/function.php';

$adminObj = new Admin();
$accountObj = new Account();
$programs = $adminObj->fetchProgram();
$positions = $accountObj->fetchOfficerPositions();
$schoolYears = $adminObj->fetchSy();

$officerId = $_GET['officerId'] ?? null;
$officer = null;
if ($officerId) {
    $officer = $adminObj->getOfficerById($officerId);
}
?>

<div class="modal fade" id="addEditOfficerModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">
                    <?= $officer ? 'Edit Officer' : 'Add Officer' ?>
                </h5>
            </div>
            <div class="modal-body">
                <form id="officerForm">
                    <input type="hidden" id="officerId" name="officerId" value="<?= $officer ? $officer['officer_id'] : '' ?>">
                    <div class="mb-3">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" value="<?= $officer ? $officer['first_name'] : '' ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="middleName" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" id="middleName" name="middleName" value="<?= $officer ? $officer['middle_name'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="surname" class="form-label">Surname</label>
                        <input type="text" class="form-control" id="surname" name="surname" value="<?= $officer ? $officer['last_name'] : '' ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="program" class="form-label">Program</label>
                        <select class="form-select" id="program" name="program" required>
                            <option value="">Select Program</option>
                            <?php foreach ($programs as $program): ?>
                                <option value="<?= $program['program_id'] ?>" <?= ($officer && $officer['program_id'] == $program['program_id']) ? 'selected' : '' ?>>
                                    <?= clean_input($program['program_name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="position" class="form-label">Position</label>
                        <select class="form-select" id="position" name="position" required>
                            <option value="">Select Position</option>
                            <?php foreach ($positions as $position): ?>
                                <option value="<?= $position['position_id'] ?>" <?= ($officer && $officer['position_id'] == $position['position_id']) ? 'selected' : '' ?>>
                                    <?= clean_input($position['position_name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="schoolYear" class="form-label">School Year</label>
                        <select class="form-select" id="schoolYear" name="schoolYear" required>
                            <option value="">Select School Year</option>
                            <?php foreach ($schoolYears as $schoolYear): ?>
                                <option value="<?= $schoolYear['school_year_id'] ?>" <?= ($officer && $officer['school_year_id'] == $schoolYear['school_year_id']) ? 'selected' : '' ?>>
                                    <?= clean_input($schoolYear['school_year']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        <input type="hidden" id="existing_image" name="existing_image" value="<?= $officer ? $officer['image'] : '' ?>">

                            <div id="image-preview" class="mt-2" <?= ($officer && !empty($officer['image'])) ? '' : 'style="display:none;"' ?>>
                                <img id="preview-img" src="<?= $officer && !empty($officer['image']) ? '../../assets/officers/' . $officer['image'] : '' ?>" alt="Officer Image" class="img-thumbnail" width="150">
                            </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="confirmSaveOfficer">
                            <?= $officer ? 'Update Officer' : 'Add Officer' ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>