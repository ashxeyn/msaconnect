<?php include '../../includes/header.php'; ?>
<link rel="stylesheet" href="<?php echo $base_url; ?>css/transparencyreport.css"> <!-- Use the same CSS file as About Us -->

<!-- Hero Section -->
<div class="hero">
  <div class="hero-background"></div> <!-- Background image container -->
  <div class="hero-content">
    <h2>Transparency Report</h2>
    <p>
      We are committed to maintaining transparency in all our transactions. 
      Below is a detailed breakdown of our financial activities.
    </p>
  </div>
</div>

<!-- Transparency Report Table Section -->
<section id="transparency-report" class="transparency-report">
    <div class="container">
        <h2>Transaction Details</h2>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Transaction Date</th>
                        <th>Description</th>
                        <th>Amount</th>
                        <th>Overall Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2023-10-01</td>
                        <td>Payment for Services</td>
                        <td>$500.00</td>
                        <td>Monthly service fee for October 2023.</td>
                    </tr>
                    <tr>
                        <td>2023-10-05</td>
                        <td>Refund</td>
                        <td>-$100.00</td>
                        <td>Refund for overcharged amount.</td>
                    </tr>
                    <tr>
                        <td>2023-10-10</td>
                        <td>Donation</td>
                        <td>$200.00</td>
                        <td>Donation to charity organization.</td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php include '../../includes/footer.php'; ?>