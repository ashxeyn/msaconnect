<?php
require_once '../../classes/adminClass.php';
require_once '../../tools/function.php';

$adminObj = new Admin();
$action = $_POST['action'] ?? '';
$volunteerId = $_POST['volunteer_id'] ?? null;

if ($action === 'edit') {
    $firstName = clean_input($_POST['firstName']);
    $lastName = clean_input($_POST['surname']);
    $program = clean_input($_POST['program']);
    $contact = clean_input($_POST['contact']);
    $year = clean_input($_POST['year_level'] ?? '');
    $section = clean_input($_POST['section']);
    $email = clean_input($_POST['email']);
    $existingImage = $_POST['existing_image'] ?? null;

    $image = $existingImage;
    if (!empty($_FILES['image']['name'])) {
        $targetDir = "../../assets/cors/";
        $fileName = time() . '_' . basename($_FILES['image']['name']);
        $targetFile = $targetDir . $fileName;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            $image = $fileName;
        }
    }

    $result = $adminObj->updateVolunteer(
        $volunteerId,
        $lastName,
        $firstName,
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
        'image' => null
    ];

    if (!empty($_FILES['image']['name'])) {
        $targetDir = "../../assets/cors/";
        $fileName = time() . '_' . basename($_FILES['image']['name']);
        $targetFile = $targetDir . $fileName;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            $data['image'] = $fileName;
        }
    }

    $result = $adminObj->addVolunteer($data);
    echo $result ? "success" : "error";
} else {
    echo "invalid_action";
}
?>