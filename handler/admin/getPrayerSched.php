<?php
require_once '../../classes/adminClass.php';
$adminObj = new Admin();

$prayerId = $_GET['prayer_id'] ?? null;
if ($prayerId) {
    $prayer = $adminObj->getPrayerScheduleById($prayerId);
    echo json_encode($prayer);
} else {
    echo json_encode(['error' => 'Invalid request']);
}
