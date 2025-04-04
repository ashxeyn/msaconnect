<?php
session_start();
require_once '../../classes/adminClass.php';
require_once '../../tools/function.php';

$adminObj = new Admin();

$action = $_POST['action'] ?? '';
$eventId = $_POST['event_id'] ?? null;

if (!isset($_SESSION['user_id'])) {
    echo 'error: unauthorized';
    exit;
}

$userId = $_SESSION['user_id'];

if ($action === 'edit') {
    $description = clean_input($_POST['description']);
    $image = !empty($_FILES['image']['name']) ? $_FILES['image']['name'] : null;

    if (!empty($_FILES['image']['name'])) {
        $targetDir = "../../assets/events/";
        $targetFile = $targetDir . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
    }

    $result = $adminObj->updateEvent($eventId, $description, $image);
    echo $result ? "success" : "error";

} elseif ($action === 'delete') {
    $result = $adminObj->deleteEvent($eventId);
    echo $result ? "success" : "error";

} elseif ($action === 'add') {
    $description = clean_input($_POST['description']);
    $image = !empty($_FILES['image']['name']) ? $_FILES['image']['name'] : null;

    if (!empty($_FILES['image']['name'])) {
        $targetDir = "../../assets/events/";
        $targetFile = $targetDir . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
    }

    $result = $adminObj->addEvent($description, $image, $userId);
    echo $result ? "success" : "error";

} else {
    echo "invalid_action";
}
?>
