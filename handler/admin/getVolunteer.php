<?php
require_once '../../classes/adminClass.php';

$adminObj = new Admin();

$volunteerId = $_GET['volunteer_id'] ?? null;

if ($volunteerId) {
    $volunteer = $adminObj->getVolunteerById($volunteerId);
    echo json_encode($volunteer);
} else {
    echo json_encode(['error' => 'Invalid request']);
}
?>