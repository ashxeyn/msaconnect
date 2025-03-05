<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Volunteering</title>
</head>
<body>
    <?php include '../../includes/header.php'; ?>
    <link rel="stylesheet" href="<?php echo $base_url; ?>css/volunteering.css">
    
    <!-- Hero Section -->
    <div class="hero">
        <h2>About Volunteering</h2>
        <p>
            Volunteering is about giving your time and skills to help others without expecting financial reward. 
            It’s a way to contribute to your community, make a difference, and gain new experiences. 
            Whether it’s helping at a local shelter, teaching, or cleaning up the environment, 
            volunteering brings people together and creates positive change.
        </p>
    </div>

    <!-- Volunteer Now Button -->
    <div class="volunteer-button-container">
        <button class="volunteer-button" onclick="window.location.href='regVolunteer.php'">Volunteer Now!</button>
    </div>

    <!-- Executive Officers Section -->
    <div class="officers-section">
        <h3>EXECUTIVE OFFICERS</h3>
        <div class="officers-grid">
            <!-- Officer 1 -->
            <div class="officer">
                <img src="officer1.jpg" alt="Officer 1">
                <p class="name">John Doe</p>
                <p class="position">President</p>
            </div>
            <!-- Officer 2 -->
            <div class="officer">
                <img src="officer2.jpg" alt="Officer 2">
                <p class="name">Jane Smith</p>
                <p class="position">Vice President</p>
            </div>
            <!-- Officer 3 -->
            <div class="officer">
                <img src="officer3.jpg" alt="Officer 3">
                <p class="name">Mike Johnson</p>
                <p class="position">Secretary</p>
            </div>
            <!-- Officer 4 -->
            <div class="officer">
                <img src="officer4.jpg" alt="Officer 4">
                <p class="name">Sarah Brown</p>
                <p class="position">Treasurer</p>
            </div>
            <!-- Officer 5 -->
            <div class="officer">
                <img src="officer5.jpg" alt="Officer 5">
                <p class="name">Chris Green</p>
                <p class="position">Public Relations</p>
            </div>
            <!-- Officer 6 -->
            <div class="officer">
                <img src="officer6.jpg" alt="Officer 6">
                <p class="name">Emily White</p>
                <p class="position">Event Coordinator</p>
            </div>
            <!-- Officer 7 -->
            <div class="officer">
                <img src="officer7.jpg" alt="Officer 7">
                <p class="name">David Black</p>
                <p class="position">Volunteer Manager</p>
            </div>
            <!-- Officer 8 -->
            <div class="officer">
                <img src="officer8.jpg" alt="Officer 8">
                <p class="name">Laura Blue</p>
                <p class="position">Marketing Head</p>
            </div>
            <!-- Officer 9 -->
            <div class="officer">
                <img src="officer9.jpg" alt="Officer 9">
                <p class="name">Kevin Yellow</p>
                <p class="position">IT Support</p>
            </div>
        </div>
    </div>

 
</body>
</html>
<?php include '../../includes/footer.php'; ?>