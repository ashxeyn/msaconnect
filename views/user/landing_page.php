<?php include '../../includes/header.php'; ?>

<link rel="stylesheet" href="<?php echo $base_url; ?>css/user.landingpage.css">

<section id="home" class="carousel">
    <!-- Carousel Slides -->
    <div class="carousel-slide active">
        <div class="carousel-background" style="background-image: url('<?php echo $base_url; ?>assets/images/login.jpg');"></div>
        <div class="carousel-overlay"></div>
        <div class="hero-content">
            <h2>Welcome to Our Community</h2>
            <p>Join us in making a difference through volunteering and community initiatives.</p>
        </div>
    </div>
    <div class="carousel-slide">
        <div class="carousel-background" style="background-image: url('<?php echo $base_url; ?>assets/images/file-28065-f13c4b6341cbf0b3faeb63a57bbefe55.jpg');"></div>
        <div class="carousel-overlay"></div>
        <div class="hero-content">
            <h2>Upcoming Events</h2>
            <p>Stay informed about our latest events and activities.</p>
        </div>
    </div>
    <div class="carousel-slide">
        <div class="carousel-background" style="background-image: url('<?php echo $base_url; ?>assets/images/file-28065-f13c4b6341cbf0b3faeb63a57bbefe55.jpg');"></div>
        <div class="carousel-overlay"></div>
        <div class="hero-content">
            <h2>Community Event</h2>
            <p>Join us in our community events and make a positive impact.</p>
        </div>
    </div>
    <div class="carousel-slide">
        <div class="carousel-background" style="background-image: url('<?php echo $base_url; ?>assets/images/file-28065-f13c4b6341cbf0b3faeb63a57bbefe55.jpg');"></div>
        <div class="carousel-overlay"></div>
        <div class="hero-content">
            <h2>Prayer Schedule</h2>
            <p>Check out our upcoming prayer schedules and topics.</p>
        </div>
    </div>
    <!-- Carousel Navigation Buttons -->
    <button class="carousel-button prev" onclick="prevSlide()">&#10094;</button>
    <button class="carousel-button next" onclick="nextSlide()">&#10095;</button>
</section>

<section id="latest-updates" class="latest-updates">
    <h2>LATEST UPDATES</h2>
    <div class="updates-container">
        <div class="update-item">
            <img src="<?php echo $base_url; ?>assets/images/login.jpg" alt="Latest Update">
            <div class="update-details">
                <p class="update-date">October 10, 2023</p>
                <h3 class="update-title">Exciting New Features Launched!</h3>
            </div>
        </div>
        <div class="update-item">
            <img src="<?php echo $base_url; ?>assets/images/login.jpg" alt="Update 2">
            <div class="update-details">
                <p class="update-date">November 5, 2023</p>
                <h3 class="update-title">New Community Initiatives</h3>
            </div>
        </div>
        <div class="update-item">
            <img src="<?php echo $base_url; ?>assets/images/login.jpg" alt="Update 3">
            <div class="update-details">
                <p class="update-date">December 1, 2023</p>
                <h3 class="update-title">Upcoming Events for the Holiday Season</h3>
            </div>
        </div>
        <div class="update-item">
            <img src="<?php echo $base_url; ?>assets/images/login.jpg" alt="Update 4">
            <div class="update-details">
                <p class="update-date">January 15, 2024</p>
                <h3 class="update-title">New Year Celebrations</h3>
            </div>
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
        <a href="regVolunteer.php" class="cta-button">Join Now!</a>
    </div>
</section>

<?php include '../../includes/footer.php'; ?>

<script src="<?php echo $base_url; ?>js/landingpage.js"></script>