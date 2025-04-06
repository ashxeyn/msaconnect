<?php
session_start();
require_once '../../classes/adminClass.php';
require_once '../../tools/function.php';

$adminObj = new Admin();
$action = $_POST['action'] ?? '';
$eventId = $_POST['activity_id'] ?? null;
$userId = $_SESSION['user_id'] ?? null;

if ($action === 'add' || $action === 'edit') {
    $eventDate = clean_input($_POST['activity_date']);
    $activity = clean_input($_POST['title']);
    $description = clean_input($_POST['description']);

    if ($action === 'add') {
        $result = $adminObj->addCalendarEvent($eventDate, $activity, $description, $userId);
    } else {
        $result = $adminObj->updateCalendarEvent($eventId, $eventDate, $activity, $description);
    }
    echo $result ? "success" : "error";

} elseif ($action === 'delete') {
    $result = $adminObj->deleteCalendarEvent($eventId);
    echo $result ? "success" : "error";
} else {
    echo "invalid_action";
}
