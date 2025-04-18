<?php
require_once '../../classes/adminClass.php';
require_once '../../tools/function.php';

$adminObj = new Admin();

$action = $_POST['action'] ?? '';

if ($action === 'add') {
    $mission = clean_input($_POST['mission']);
    $vision = clean_input($_POST['vision']);
    $description = clean_input($_POST['description']);

    $result = $adminObj->addAbout($mission, $vision, $description);
    echo $result ? "success" : "error";

} elseif ($action === 'edit') {
    $id = $_POST['id'] ?? null;
    $mission = clean_input($_POST['mission']);
    $vision = clean_input($_POST['vision']);
    $description = clean_input($_POST['description']);

    $result = $adminObj->updateAbout($id, $mission, $vision, $description);
    echo $result ? "success" : "error";

} elseif ($action === 'delete') {
    $id = $_POST['id'] ?? null;

    $result = $adminObj->deleteAbout($id);
    echo $result ? "success" : "error";

} else {
    echo "invalid_action";
}
?>
