<?php include '../../includes/header.php'; ?>
<link rel="stylesheet" href="<?php echo $base_url; ?>css/user.landingpage.css">

<section id="home" class="hero">
    <div class="carousel">
        <!-- Carousel Slides -->
        <div class="carousel-slide active">
            <img src="image1.jpg" alt="Slide 1">
            <div class="hero-content">
                <h1>Welcome to MyBrand</h1>
                <p>Your success is our priority. Let's build something amazing together!</p>
                <a href="#contact" class="cta-button">Get Started</a>
            </div>
        </div>
        <div class="carousel-slide">
            <img src="image2.jpg" alt="Slide 2">
            <div class="hero-content">
                <h1>Innovative Solutions</h1>
                <p>We provide cutting-edge solutions tailored to your needs.</p>
                <a href="#services" class="cta-button">Learn More</a>
            </div>
        </div>
        <div class="carousel-slide">
            <img src="image3.jpg" alt="Slide 3">
            <div class="hero-content">
                <h1>Join Us Today</h1>
                <p>Be part of a community that values growth and innovation.</p>
                <a href="#latest-updates" class="cta-button">Latest Updates</a>
            </div>
        </div>

        <!-- Carousel Navigation Buttons -->
        <button class="carousel-button prev" onclick="prevSlide()">&#10094;</button>
        <button class="carousel-button next" onclick="nextSlide()">&#10095;</button>
    </div>
</section>

<section id="latest-updates" class="latest-updates">
    <h2>LATEST UPDATES</h2>
    <div class="update-item">
        <img src="update-image.jpg" alt="Latest Update">
        <div class="update-details">
            <p class="update-date">October 10, 2023</p>
            <h3 class="update-title">Exciting New Features Launched!</h3>
        </div>
    </div>
</section>

<section id="prayer-schedule" class="prayer-schedule">
    <h2>Prayer Schedule</h2>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Khateeb</th>
                    <th>Topic</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>October 15, 2023</td>
                    <td>Dr. Ahmed Ali (Professor of Islamic Studies)</td>
                    <td>The Importance of Patience in Islam</td>
                </tr>
                <tr>
                    <td>October 22, 2023</td>
                    <td>Sheikh Mohammed Hassan (Imam and Community Leader)</td>
                    <td>Building Strong Family Ties in Islam</td>
                </tr>
                <tr>
                    <td>October 29, 2023</td>
                    <td>Ustadha Fatima Khan (Educator and Public Speaker)</td>
                    <td>Women's Rights in Islam</td>
                </tr>
                <tr>
                    <td>November 5, 2023</td>
                    <td>Brother Yusuf Ahmed (Businessman and Volunteer)</td>
                    <td>Balancing Work and Worship</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

<section id="volunteer" class="volunteer">
    <div class="volunteer-content">
        <h2>Join our Volunteers!</h2>
        <p>Volunteering is a great way to give back to the community, develop new skills, and make a positive impact. Whether you're helping with events, organizing activities, or supporting our initiatives, your contribution matters!</p>
        <a href="#join" class="cta-button">Join Now!</a>
    </div>
</section>

<?php include '../../includes/footer.php'; ?>