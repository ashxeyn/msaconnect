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
        <div class="logo">
            <a href="<?php echo $base_url; ?>views/user/landing_page.php">
                <img src="<?php echo $base_url; ?>assets/images/msa_logo.png" class="logo-image">
                <span class="logo-text">MSA CONNECT</span>
            </a>
        </div>
        <ul class="nav-links">
            <li><a href="<?php echo $base_url; ?>views/user/volunteer.php">Be a Volunteer</a></li>
            <li class="dropdown">
            <a href="<?php echo $base_url; ?>views/user/aboutus.php">About MSA <span class="arrow"></span></a>
            <ul class="dropdown-content">
                <li><a href="<?php echo $base_url; ?>views/user/aboutus.php">About Us</a></li>
                <li><a href="<?php echo $base_url; ?>views/user/Bylaws.php">Bylaws</a></li>
                <li><a href="<?php echo $base_url; ?>views/user/transparencyreport.php">Transparency</a></li>
            </ul>
            </li>
            <li><a href="<?php echo $base_url; ?>views/user/calendar.php">Calendar</a></li>
            <li><a href="<?php echo $base_url; ?>views/user/faqs.php">FAQs</a></li>
        </ul>
    </nav>
</header>
</body>
</html>