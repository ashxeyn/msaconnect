<?php
require_once '../../classes/adminClass.php';
require_once '../../tools/function.php';

$adminObj = new Admin();

$action = $_POST['action'] ?? '';
$programId = $_POST['program_id'] ?? null;

if ($action === 'edit') {
    $programName = clean_input($_POST['programName']);
    $collegeId = clean_input($_POST['collegeSelect']); 

    $result = $adminObj->updateProgram($programId, $programName, $collegeId);
    echo $result ? "success" : "error";
} elseif ($action === 'delete') {
    $result = $adminObj->deleteProgram($programId);
    echo $result ? "success" : "error";
} elseif ($action === 'add') {
    $programName = clean_input($_POST['programName']);
    $collegeId = clean_input($_POST['collegeSelect']); 

    $result = $adminObj->addProgram($programName, $collegeId);
    echo $result ? "success" : "error";
} else {
    echo "invalid_action";
}
?>