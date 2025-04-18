<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us</title>
</head>
<body>
<?php include '../../includes/header.php'; ?>
<link rel="stylesheet" href="<?php echo $base_url; ?>css/aboutus.css">

  <!-- Hero Section -->
  <div class="hero">
    <div class="hero-background"></div> <!-- Background image container -->
    <div class="hero-content">
      <h2>About Us</h2>
      <p>
        Our website is dedicated to connecting volunteers with opportunities to make a difference in their communities. 
        We believe in the power of volunteering to bring people together and create positive change.
      </p>
    </div>
  </div>

  <!-- Mission Section -->
  <div class="mission-section">
    <h3>Our Mission</h3>
    <p>
    Our mission is to empower individuals to contribute their time, skills, and passion to meaningful causes that promote positive change. By fostering a strong sense of community and connection, we aim to create lasting impact. Our goal is to inspire people to get involved, make a difference, and build stronger, more resilient communities that can thrive for generations to come.
    </p>
  </div>

  <!-- Vision Section -->
  <div class="vision-section">
    <h3>Our Vision</h3>
    <p>
    We envision a world where everyone is inspired to volunteer, sparking a ripple effect of kindness,
     empathy, and support that reaches far beyond individual actions. By encouraging people to give their time and
     talents, we aim to create a collective movement that strengthens communities, fosters meaningful relationships, and transforms lives.
     Volunteers can be the catalysts for positive change, uplifting those in need and making a lasting impact on society.
    Through collaboration and dedication, 
    we believe that together we can create a world where compassion and generosity are at
    the heart of everything we do,
    building a brighter future for all.
    </p>
  </div>
  

  <!-- Executive Officers Section -->
  <div class="officers-section">
    <h3>EXECUTIVE OFFICERS</h3>
    <div class="officers-grid">
      <!-- Officer 1 -->
      <div class="officer">
        <img src="<?php echo $base_url; ?>assets/images/officer.jpg" alt="Officer 1">
        <p class="name">John Doe</p>
        <p class="position">President</p>
      </div>
      <!-- Officer 2 -->
      <div class="officer">
        <img src="<?php echo $base_url; ?>assets/images/officer.jpg" alt="Officer 2">
        <p class="name">Jane Smith</p>
        <p class="position">Vice President</p>
      </div>
      <!-- Officer 3 -->
      <div class="officer">
        <img src="<?php echo $base_url; ?>assets/images/officer.jpg" alt="Officer 3">
        <p class="name">Mike Johnson</p>
        <p class="position">Secretary</p>
      </div>
      <!-- Officer 4 -->
      <div class="officer">
        <img src="<?php echo $base_url; ?>assets/images/officer.jpg" alt="Officer 4">
        <p class="name">Sarah Brown</p>
        <p class="position">Treasurer</p>
      </div>
      <!-- Officer 5 -->
      <div class="officer">
        <img src="<?php echo $base_url; ?>assets/images/officer.jpg" alt="Officer 5">
        <p class="name">Chris Green</p>
        <p class="position">Public Relations</p>
      </div>
      <!-- Officer 6 -->
      <div class="officer">
        <img src="<?php echo $base_url; ?>assets/images/officer.jpg" alt="Officer 6">
        <p class="name">Emily White</p>
        <p class="position">Event Coordinator</p>
      </div>
      <!-- Officer 7 -->
      <div class="officer">
        <img src="<?php echo $base_url; ?>assets/images/officer.jpg" alt="Officer 7">
        <p class="name">David Black</p>
        <p class="position">Volunteer Manager</p>
      </div>
      <!-- Officer 8 -->
      <div class="officer">
        <img src="<?php echo $base_url; ?>assets/images/officer.jpg" alt="Officer 8">
        <p class="name">Laura Blue</p>
        <p class="position">Marketing Head</p>
      </div>
      <!-- Officer 9 -->
      <div class="officer">
        <img src="<?php echo $base_url; ?>assets/images/officer.jpg" alt="Officer 9">
        <p class="name">Kevin Yellow</p>
        <p class="position">IT Support</p>
      </div>
    </div>
  </div>
  <section class="downloads-section">
    <div class="content-wrapper">
        <h2 class="section-title">Downloadable Files</h2>
        
        <div class="downloads-list">
            <!-- File 1 -->
            <div class="file-item">
                <div class="file-info">
                    <span class="file-icon">📄</span>
                    <div class="file-details">
                        <h3>User Guide.pdf</h3>
                        <p>2.4 MB • Updated 12/05/2023</p>
                    </div>
                </div>
                <a href="#" class="download-link">Download</a>
            </div>
            
            <!-- File 2 -->
            <div class="file-item">
                <div class="file-info">
                    <span class="file-icon">🗂️</span>
                    <div class="file-details">
                        <h3>Resources.zip</h3>
                        <p>156 MB • Updated 04/02/2024</p>
                    </div>
                </div>
                <a href="#" class="download-link">Download</a>
            </div>
            
            <!-- Add more files as needed -->
        </div>
    </div>
</section>

</body>
</html>
<?php include '../../includes/footer.php'; ?>