<?php
require_once '../../classes/adminClass.php';
require_once '../../tools/function.php';

$adminObj = new Admin();

$action = $_POST['action'] ?? '';
$officerId = $_POST['officer_id'] ?? null;

if ($action === 'edit') {
    $firstName = clean_input($_POST['firstName']);
    $middleName = clean_input($_POST['middleName']);
    $surname = clean_input($_POST['surname']);
    $programId = clean_input($_POST['program']);
    $positionId = clean_input($_POST['position']);
    $schoolYearId = clean_input($_POST['schoolYear']);
    $image = $_FILES['image']['name'] ?? '';

    if ($image) {
        $targetDir = "../../assets/officers/";
        $targetFile = $targetDir . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
    }
    $result = $adminObj->updateOfficer(
        $_POST['officerId'],
        $_POST['surname'],
        $_POST['firstName'],
        $_POST['middleName'],
        $_POST['position'],
        $_POST['schoolYear'],
        $_POST['program'],
        $_FILES['image']['name'] ?? null
    );    
    echo $result ? "success" : "error";
} elseif ($action === 'delete') {
    $result = $adminObj->deleteOfficer($officerId);
    echo $result ? "success" : "error";
} elseif ($action === 'add') {
    $data = [
        'surname' => clean_input($_POST['surname']),
        'firstName' => clean_input($_POST['firstName']),
        'middleName' => clean_input($_POST['middleName']),
        'position' => clean_input($_POST['position']),
        'schoolYear' => clean_input($_POST['schoolYear']),
        'program' => clean_input($_POST['program']),
        'image' => $_FILES['image'] ?? null
    ];

    $result = $adminObj->addOfficer($data);
    echo $result ? "success" : "error";
} else {
    echo "invalid_action";
}
?>