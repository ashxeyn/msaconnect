<?php
session_start();
require_once '../../classes/adminClass.php';
require_once '../../tools/function.php';

$adminObj = new Admin();
$action = $_POST['action'] ?? '';
$prayerId = $_POST['prayer_id'] ?? null;

if ($action === 'add' || $action === 'edit') {
    $date = clean_input($_POST['khutbah_date']);
    $speaker = clean_input($_POST['speaker']);
    $topic = clean_input($_POST['topic']);
    $location = clean_input($_POST['location']);
    $created_by = $_SESSION['user_id'];

    if ($action === 'add') {
        $result = $adminObj->addPrayerSchedule($date, $speaker, $topic, $location, $created_by);
    } else {
        $result = $adminObj->updatePrayerSchedule($prayerId, $date, $speaker, $topic, $location);
    }

    echo $result ? "success" : "error";

} elseif ($action === 'delete') {
    $result = $adminObj->deletePrayerSchedule($prayerId);
    echo $result ? "success" : "error";
} else {
    echo "invalid_action";
}
