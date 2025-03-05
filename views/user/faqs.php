<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQs</title>
    <?php include '../../includes/header.php'; ?>
    <link rel="stylesheet" href="<?php echo $base_url; ?>css/faqs.css">
</head>
<body>
    <!-- Hero Section -->
    <div class="hero">
        <h2>Frequently Asked Questions</h2>
        <p>
            Here are some common questions and answers about our organization and its activities. 
        </p>
    </div>

    <!-- FAQs Content -->
    <div class="faqs-content">
        <h3>General Questions</h3>
        <div class="faq-item">
            <div class="faq-question">
                What is the mission of your organization?
                <span class="arrow">▼</span>
            </div>
            <div class="faq-answer">
                Our mission is to empower individuals to contribute their time and skills to meaningful causes, 
                fostering a sense of community and making a lasting impact.
            </div>
        </div>
        <div class="faq-item">
            <div class="faq-question">
                How can I become a member?
                <span class="arrow">▼</span>
            </div>
            <div class="faq-answer">
                Membership is open to all individuals who support our mission. You can join by filling out the 
                membership form on our <a href="membership.html">Membership Page</a>.
            </div>
        </div>
        <div class="faq-item">
            <div class="faq-question">
                Do you offer volunteer opportunities?
                <span class="arrow">▼</span>
            </div>
            <div class="faq-answer">
                Yes, we offer a variety of volunteer opportunities. Visit our <a href="volunteer.html">Volunteer Page</a> 
                to learn more and sign up.
            </div>
        </div>

        <h3>Events and Activities</h3>
        <div class="faq-item">
            <div class="faq-question">
                How often do you hold events?
                <span class="arrow">▼</span>
            </div>
            <div class="faq-answer">
                We hold events monthly, with additional activities scheduled throughout the year. 
                Check our <a href="events.html">Events Calendar</a> for upcoming events.
            </div>
        </div>
        <div class="faq-item">
            <div class="faq-question">
                Can I suggest an event or activity?
                <span class="arrow">▼</span>
            </div>
            <div class="faq-answer">
                Absolutely! We welcome suggestions from our members. Please contact our 
                <a href="mailto:events@example.com">Events Coordinator</a> with your ideas.
            </div>
        </div>

        <h3>Donations and Support</h3>
        <div class="faq-item">
            <div class="faq-question">
                How can I donate to your organization?
                <span class="arrow">▼</span>
            </div>
            <div class="faq-answer">
                You can donate online through our <a href="donate.html">Donation Page</a> or by mailing a check to our office. 
                Every contribution helps us make a difference!
            </div>
        </div>
        <div class="faq-item">
            <div class="faq-question">
                Are donations tax-deductible?
                <span class="arrow">▼</span>
            </div>
            <div class="faq-answer">
                Yes, we are a registered 501(c)(3) nonprofit organization, and all donations are tax-deductible 
                to the extent allowed by law.
            </div>
        </div>

        <h3>Contact and Support</h3>
        <div class="faq-item">
            <div class="faq-question">
                How can I contact your organization?
                <span class="arrow">▼</span>
            </div>
            <div class="faq-answer">
                You can reach us by email at <a href="mailto:info@example.com">info@example.com</a> or by phone at 
                (123) 456-7890. Our office hours are Monday to Friday, 9 AM to 5 PM.
            </div>
        </div>
        <div class="faq-item">
            <div class="faq-question">
                Do you have a physical office location?
                <span class="arrow">▼</span>
            </div>
            <div class="faq-answer">
                Yes, our office is located at 123 Main Street, Cityville, State, ZIP Code. 
                Feel free to visit us during office hours.
            </div>
        </div>
    </div>

    <?php include '../../includes/footer.php'; ?>
    <script src="<?php echo $base_url; ?>js/faqs.js"></script>
</body>
</html>