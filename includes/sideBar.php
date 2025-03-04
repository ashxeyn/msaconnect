<?php
session_start();
require_once 'head.php';

if (!isset($_SESSION['role'])) {
    header('Location: ../accounts/login.php');
    exit();
}

$role = $_SESSION['role']; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../css/sideBar.css">
</head>
<body>
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark sidebar" id="sidebar">
        <a href="#" class="d-flex align-items-center mb-3 text-white text-decoration-none logo-container">
            <img src="../../assets/images/msa_logo.png" alt="MSA Logo" width="40" height="50" class="me-2 logo">
            <b><span class="fs-4 sidebar-text">MSA</span></b>
        </a>
        <hr class="text-white">

        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="#" onclick="loadDashboardSection()" class="nav-link text-white">
                    <i class="bi bi-house-door me-2"></i> <span class="sidebar-text">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" onclick="loadSchoolConfigSection()" class="nav-link text-white">
                    <i class="bi bi-gear me-2"></i> <span class="sidebar-text">School Configuration</span>
                </a>
            </li>

            <li>
                <hr class="text-white">
                <span class="text-uppercase text-muted small fw-bold sidebar-text">MSA Management</span>
            </li>
            <li class="nav-item">
                <a href="#" onclick="loadEventsSection()" class="nav-link text-white">
                    <i class="bi bi-calendar-event me-2"></i> <span class="sidebar-text">Events</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" onclick="loadCalendarSection()" class="nav-link text-white">
                    <i class="bi bi-calendar3 me-2"></i> <span class="sidebar-text">Calendar</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" onclick="loadTransparencySection()" class="nav-link text-white">
                    <i class="bi bi-clipboard-data me-2"></i> <span class="sidebar-text">Transparency Report</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" onclick="loadAboutsSection()" class="nav-link text-white">
                    <i class="bi bi-info-circle me-2"></i> <span class="sidebar-text">Abouts & Bylaws</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" onclick="loadFaqsSection()" class="nav-link text-white">
                    <i class="bi bi-question-circle me-2"></i> <span class="sidebar-text">FAQs</span>
                </a>
            </li>

            <li>
                <hr class="text-white">
                <span class="text-uppercase text-muted small fw-bold sidebar-text">Student Management</span>
            </li>
            <li class="nav-item">
                <a href="#" onclick="loadOfficersSection()" class="nav-link text-white">
                    <i class="bi bi-person-badge me-2"></i> <span class="sidebar-text">Officers</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" onclick="loadVolunteersSection()" class="nav-link text-white">
                    <i class="bi bi-people me-2"></i> <span class="sidebar-text">Volunteers</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" onclick="loadRegistrationsSection()" class="nav-link text-white">
                    <i class="bi bi-person-plus me-2"></i> <span class="sidebar-text">Registrations</span>
                </a>
            </li>

            <?php if ($role === 'admin') : ?>
                <!-- Only show this section if the user is an admin -->
                <li>
                    <hr class="text-white">
                    <span class="text-uppercase text-muted small fw-bold sidebar-text">Access Management</span>
                </li>
                <li class="nav-item">
                    <a href="#" onclick="loadModeratorsSection()" class="nav-link text-white">
                        <i class="bi bi-person-gear me-2"></i> <span class="sidebar-text">Moderators</span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>

        <hr class="text-white">

        <div class="text-center">
            <a href="../accounts/logout.php" class="btn btn-outline-danger w-100">
                <i class="bi bi-box-arrow-right me-2"></i> <span class="sidebar-text">Logout</span>
            </a>
        </div>
    </div>
</body>
</html>