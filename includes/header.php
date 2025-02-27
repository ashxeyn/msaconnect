<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Landing Page</title>
    <?php $base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/msaconnect/'; ?>
    <link rel="stylesheet" href="<?php echo $base_url; ?>css/header.css">
    
</head>
<body>
<header>
    <nav class="navbar">
        <div class="logo">MSA CONNECT</div>
        <ul class="nav-links">
            <li><a href="<?php echo $base_url; ?>views/user/volunteer.php">Be a Volunteer</a></li>
            <li class="dropdown">
                <a href="#about">About MSA</a>
                <ul class="dropdown-content">
                    <li><a href="#about-us">About Us</a></li>
                    <li><a href="#bylaws">Bylaws</a></li>
                    <li><a href="#transparency-report">Transparency Report</a></li>
                </ul>
            </li>
            <li><a href="<?php echo $base_url; ?>views/user/calendar.php">Calendar</a></li>
            <li><a href="#faqs">FAQs</a></li>
        </ul>
    </nav>
</header>