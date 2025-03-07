<?php
session_start();
require_once '../../classes/adminClass.php';
require_once '../../tools/function.php'; 

$adminObj = new Admin();
$result = $adminObj->fetchPendingVolunteer();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approve Volunteer Registrations</title>
    <script src="../../js/admin.js"></script>
    <?php include '../../includes/head.php'; ?> 
</head>
<body>
    <div>
        <h2 class="mb-4">Pending Volunteer Registrations</h2>

        <table id="volunteerTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Program</th>
                    <th>Yr/Section</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>COR</th>
                    <th>Status</th>
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
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#photoModal" onclick="viewPhoto('<?= clean_input($row['cor']) ?>')">
                                <img src="../../assets/cors/<?= clean_input($row['cor']) ?>" alt="COR Photo" width="80" height="80" class="img-thumbnail">
                                    </a>
                                <?php else: ?>
                                    No photo
                                <?php endif; ?>
                            </td>
                            <td><?= ucfirst(clean_input($row['status'])) ?></td>
                            <td>
                                <button class="btn btn-success btn-sm" onclick="openModal('approveModal', <?= $row['volunteer_id'] ?>, 'approve')">Approve</button>
                                <button class="btn btn-danger btn-sm" onclick="openModal('rejectModal', <?= $row['volunteer_id'] ?>, 'reject')">Reject</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td class="text-center" colspan="9">No pending volunteer registrations</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <?php include '../adminModals/corView.html';
    include '../adminModals/approval.html';
    include '../adminModals/rejection.html';
    ?>
</body>
</html>