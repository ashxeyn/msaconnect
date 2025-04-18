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
    $existingImage = $_POST['existing_image'] ?? ''; 

     if (isset($_FILES['image']) && $_FILES['image']['name'] != "") {
        $imageName = time() . '_' . basename($_FILES['image']['name']);
        $targetDir = "../../assets/officers/";
        $targetFile = $targetDir . $imageName;
        move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
    } else {
        $imageName = basename($existingImage); 
    }
    $result = $adminObj->updateOfficer(
        $officerId,
        $surname,
        $firstName,
        $middleName,
        $positionId,
        $schoolYearId,
        $programId,
        $imageName
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