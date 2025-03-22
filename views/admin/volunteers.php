<?php
session_start();
require_once '../../classes/adminClass.php';
require_once '../../tools/function.php'; 

$adminObj = new Admin();
$result = $adminObj->fetchApprovedVolunteer();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteers</title>
    <link rel="stylesheet" href="../../css/adminvolunteers.css?v=<?php echo time(); ?>">
    <script src="../../js/admin.js"></script>
    <?php include '../../includes/head.php'; ?> 
</head>
<body>

<div>
    <h2 class="mb-4">Volunteers</h2>

    <table id="table" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Program</th>
                <th>Yr/Section</th>
                <th>Contact</th>
                <th>Email</th>
                <th>COR</th>
                <th>Approved By</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result): 
                $counter = 1; ?>
                <?php foreach ($result as $row): ?>
                    <tr>
                        <td><?= $counter++ ?></td>
                        <td><?= clean_input(strtoupper($row['full_name'])) ?></td>
                        <td><?= clean_input($row['program_name']) ?></td>
                        <td><?= clean_input($row['yr_section']) ?></td>
                        <td><?= clean_input($row['contact']) ?></td>
                        <td><?= clean_input($row['email']) ?></td>
                        <td>
                            <?php if (!empty($row['cor'])): ?>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#photoModal" onclick="viewPhoto('<?= clean_input($row['cor']) ?>', 'cors')">
                                    <img src="../../assets/cors/<?= clean_input($row['cor']) ?>" alt="COR Photo" width="80" height="80" class="img-thumbnail">
                                </a>
                            <?php else: ?>
                                No photo
                            <?php endif; ?>
                        </td>
                        <td><?= clean_input($row['registered_by']) ?></td>
                        <td>
                            <button class="btn btn-primary btn-sm" onclick="openVolunteerModal('editVolunteerModal', <?= $row['volunteer_id'] ?>, 'edit')">Edit</button>
                            <button class="btn btn-danger btn-sm" onclick="openVolunteerModal('deleteVolunteerModal', <?= $row['volunteer_id'] ?>, 'delete')">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="10" class="text-center">No approved volunteer registrations</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php include '../adminModals/corView.html'; 
include '../adminModals/deleteVolunteer.html';
include '../adminModals/editVolunteer.php';
?>

</body>
</html>