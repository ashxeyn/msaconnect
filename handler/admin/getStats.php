<?php
require_once '../../classes/adminClass.php';

$adminObj = new Admin();
$data = $adminObj->getVolunteersPerMonth();

echo json_encode($data);
?>
