<?php
session_start();
require_once '../../classes/adminClass.php';
require_once '../../tools/function.php';

$adminObj = new Admin();
$eventPhotos = $adminObj->fetchEventPhotos();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Event Photos</title>
    <link rel="stylesheet" href="../../css/adminRegistration.css?v=<?php echo time(); ?>">
    <script src="../../js/admin.js"></script>
    <?php include '../../includes/head.php'; ?> 
</head>
<body>

<div>
    <h1 class="mb-4">Manage Event Photos</h1>

    <button class="btn btn-success mb-3" onclick="openEventModal('addEditEventModal', null, 'add')">Add Event</button>

    <table id="table" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Description</th>
                <th>Photo</th>
                <th>Uploaded By</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($eventPhotos): ?>
                <?php foreach ($eventPhotos as $event): ?>
                    <tr>
                        <td><?= clean_input($event['description']) ?></td>
                        <td>
                            <?php if (!empty($event['image'])): ?>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#photoModal" onclick="viewPhoto('<?= clean_input($event['image']) ?>', 'events')">
                                    <img src="../../assets/events/<?= clean_input($event['image']) ?>" alt="Event Photo" width="80" height="80" class="img-thumbnail">
                                </a>
                            <?php else: ?>
                                No photo
                            <?php endif; ?>
                        </td>
                        <td><?= clean_input($event['uploaded_by']) ?></td>
                        <td>
                            <button class="btn btn-success btn-sm" onclick="openEventModal('addEditEventModal', <?= $event['event_id'] ?>, 'edit')">Edit</button>
                            <button class="btn btn-danger btn-sm" onclick="openEventModal('deleteEventModal', <?= $event['event_id'] ?>, 'delete')">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">No event photos found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php include '../adminModals/addEditEvents.php'; ?>
<?php include '../adminModals/deleteEvent.html'; ?>

</body>
</html>
