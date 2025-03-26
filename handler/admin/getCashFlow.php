<?php
require_once '../../classes/adminClass.php';

$adminObj = new Admin();
//header('Content-Type: application/json');
$data = $adminObj->getCashFlowPerMonth();
echo json_encode($data);
?>
