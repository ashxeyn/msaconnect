<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Downloadables</title>
</head>
<body>
    <?php include '../../includes/header.php'; ?>
    <link rel="stylesheet" href="<?php echo $base_url; ?>css/Downloadables.css">
    
    <!-- Hero Section -->
    <div class="hero">
        <div class="hero-background"></div> <!-- Background image container -->
        <div class="hero-content">
            <h2>Downloadables</h2>
            <p>
            Downloadables are free resources you can access and save for later use. 
            They’re designed to make your life easier, whether it’s through helpful guides, fun printables, planners, or templates. Downloadables give you tools you can use anytime, anywhere—perfect for learning, organizing, or getting creative.
             It's a simple way to get valuable content right at your fingertips.
            </p>
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
    <?php include '../../includes/footer.php'; ?>
</body>
</html>