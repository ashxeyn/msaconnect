<?php
require_once '../../classes/adminClass.php';
require_once '../../tools/function.php';

$adminObj = new Admin();

$action = $_POST['action'] ?? '';
$volunteerId = $_POST['volunteer_id'] ?? null;

if ($action === 'edit') {
    $firstName = clean_input($_POST['firstName']);
    $middleName = clean_input($_POST['middleName']);
    $lastName = clean_input($_POST['surname']);
    $program = clean_input($_POST['program']);
    $year = !empty($_POST['year']) ? clean_input($_POST['year']) : null;
    $section = clean_input($_POST['section']);
    $contact = clean_input($_POST['contact']);
    $email = clean_input($_POST['email']);
    $image = !empty($_FILES['image']['name']) ? $_FILES['image']['name'] : null;

    if (!empty($_FILES['image']['name'])) {
        $targetDir = "../../assets/cors/";
        $targetFile = $targetDir . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
    }

    $result = $adminObj->updateVolunteer(
        $volunteerId,
        $lastName,
        $firstName,
        $middleName,
        $year,
        $section,
        $program,
        $contact,
        $email,
        $image
    );
       
    echo $result ? "success" : "error";
} elseif ($action === 'delete') {
    $result = $adminObj->deleteVolunteer($volunteerId);
    echo $result ? "success" : "error";
} elseif ($action === 'add') {
    $data = [
        'surname' => clean_input($_POST['surname']),
        'firstName' => clean_input($_POST['firstName']),
        'middleName' => clean_input($_POST['middleName']),
        'program' => clean_input($_POST['program']),
        'year' => !empty($_POST['year']) ? clean_input($_POST['year']) : null,
        'section' => clean_input($_POST['section']),
        'contact' => clean_input($_POST['contact']),
        'email' => clean_input($_POST['email']),
        'image' => !empty($_FILES['image']['name']) ? $_FILES['image']['name'] : null
    ];

    if (!empty($_FILES['image']['name'])) {
        $targetDir = "../../assets/cors/";
        $targetFile = $targetDir . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
    }

    $result = $adminObj->addVolunteer($data);
    echo $result ? "success" : "error";
} else {
    echo "invalid_action";
}
?>
