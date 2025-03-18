<?php
require_once '../../classes/adminClass.php';

$adminObj = new Admin();

$moderatorId = $_GET['user_id'] ?? null;

if ($moderatorId) {
    $moderator = $adminObj->getModeratorById($moderatorId);
    echo json_encode($moderator);
} else {
    echo json_encode(['error' => 'Invalid request']);
}
?>