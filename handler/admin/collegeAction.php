<?php
require_once '../../classes/adminClass.php';
require_once '../../tools/function.php';

$adminObj = new Admin();

$action = $_POST['action'] ?? '';
$collegeId = $_POST['college_id'] ?? null;

if ($action === 'edit') {
    $collegeName = clean_input($_POST['collegeName']);

    $result = $adminObj->updateCollege($collegeId, $collegeName);
    echo $result ? "success" : "error";
} elseif ($action === 'delete') {
    $result = $adminObj->deleteCollege($collegeId);
    echo $result ? "success" : "error";
} elseif ($action === 'add') {
    $collegeName = clean_input($_POST['collegeName']);

    $result = $adminObj->addCollege($collegeName);
    echo $result ? "success" : "error";
} else {
    echo "invalid_action";
}
?>
