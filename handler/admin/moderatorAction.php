<?php
require_once '../../classes/adminClass.php';
require_once '../../classes/accountClass.php';
require_once '../../tools/function.php';

$adminObj = new Admin();
$accountObj = new Account();

$action = $_POST['action'] ?? '';
$moderatorId = $_POST['user_id'] ?? null;

if ($action === 'edit') {
    $firstName = clean_input($_POST['firstName']);
    $middleName = clean_input($_POST['middleName']);
    $lastName = clean_input($_POST['lastName']);
    $username = clean_input($_POST['username']);
    $email = clean_input($_POST['email']);
    $positionId = clean_input($_POST['positionId']);

    $result = $adminObj->updateModerator(
        $moderatorId,
        $firstName,
        $middleName,
        $lastName,
        $username,
        $email,
        $positionId
    );

    echo $result === true ? "success" : "error";
} elseif ($action === 'delete') {
    $result = $adminObj->deleteModerator($moderatorId);
    echo $result ? "success" : "error";
} else {
    echo "invalid_action";
}
?>
