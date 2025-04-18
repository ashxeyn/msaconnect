<?php
require_once '../../classes/adminClass.php';
require_once '../../tools/function.php';

$adminObj = new Admin();

$sDate = isset($_GET['start_date']) ? $_GET['start_date'] : '';
$eDate = isset($_GET['end_date']) ? $_GET['end_date'] : '';

$stats = [
    'totalVolunteers' => $adminObj->getApprovedVolunteers($sDate, $eDate),
    'pendingRegistrations' => $adminObj->getPedingVolunteers($sDate, $eDate),
    'moderators' => $adminObj->getModerators()
];

header('Content-Type: application/json');
echo json_encode($stats);
?>