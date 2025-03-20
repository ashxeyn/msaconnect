<?php
require_once "../../tools/function.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$firstLetter = strtoupper(substr($username, 0, 1));

function generateColor($username) {
    $colors = ['#FF5733', '#33B5E5', '#9C27B0', '#FF9800', '#4CAF50', '#3F51B5', '#E91E63'];
    return $colors[ord(substr($username, 0, 1)) % count($colors)];
}

$profileColor = generateColor($username);
?>

<link rel="stylesheet" href="../../css/topNav.css">

<nav class="admin-navbar">
    <div class="nav-items">
        <button class="icon-btn">
            <i class="bi bi-bell"></i>
            <span class="notification-dot"></span>
        </button>

        <div class="dropdown">
            <button class="profile-box" data-bs-toggle="dropdown">
                <div class="profile-letter" style="background-color: <?= $profileColor ?>;">
                    <?= $firstLetter ?>
                </div>
                <span class="username"><?= clean_input($username) ?></span>
                <i class="bi bi-chevron-down"></i>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="../../accounts/logout"><i class="bi bi-box-arrow-right me-2"></i> Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
