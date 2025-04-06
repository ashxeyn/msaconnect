<?php
require_once '../../classes/adminClass.php';

if (isset($_GET['activity_id'])) {
    $admin = new Admin();
    $event = $admin->getCalendarEventById($_GET['activity_id']);
    echo json_encode($event);
}
