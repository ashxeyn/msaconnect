<?php
require_once '../../tools/function.php';
require_once '../../classes/accountClass.php';
require_once '../../classes/adminClass.php';

session_start();

$adminObj = new Admin();
$programs = $adminObj->fetchProgram();
$name = $address = $program = $year_level = $school = $cor_file = '';
$nameErr = $addressErr = $imageErr = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = clean_input($_POST['name']);
    $address = clean_input($_POST['address']);
    $program = clean_input($_POST['program']);
    $year_level = clean_input($_POST['year_level']);
    $school = clean_input($_POST['school']);

    if (empty($name)) {
        $nameErr = "Name is required!";
    }
    if (empty($address)) {
        $addressErr = "Address is required!";
    }

    if (!empty($_FILES['image']['name'])) {
        $target_dir = "../../assets/cors/";
        
        if (!is_dir($target_dir) && !mkdir($target_dir, 0777, true)) {
            $imageErr = "Failed to create upload directory.";
        } else {
            $image_name = time() . "_" . basename($_FILES['image']['name']);
            $target_file = $target_dir . $image_name;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $allowed_types = ['jpg', 'jpeg', 'png'];
            $maxFileSize = 2 * 1024 * 1024; 
    
            if (!in_array($imageFileType, $allowed_types)) {
                $imageErr = "Only JPG, JPEG, & PNG files are allowed.";
            } elseif ($_FILES['image']['size'] > $maxFileSize) {
                $imageErr = "File size should not exceed 2MB.";
            } else {
                if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                    $cor_file = $image_name; 
                } else {
                    $imageErr = "There was an error uploading your file.";
                }
            }
        }
    } elseif (isset($_POST['existing_image']) && !empty($_POST['existing_image'])) {
        $cor_file = $_POST['existing_image']; 
    } else {
        $imageErr = "Please upload your COR screenshot!";
    }
    
    if (empty($nameErr) && empty($addressErr) && empty($imageErr)) {
        // Process the form data here (save to database, etc.)
        header("Location: success_page.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Madrasa Online</title>
    <link rel="stylesheet" href="../../css/registrationmadrasaonline.css">
    <?php include '../../includes/header.php'; ?>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <!-- Required Fields -->
        <div class="form-section">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" placeholder="Your Full Name" value="<?= $name ?>" required>
            <span><p><?= $nameErr ?></p></span>
            
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" placeholder="Your Complete Address" value="<?= $address ?>" required>
            <span><p><?= $addressErr ?></p></span>
        </div>
        
        <!-- Optional Fields -->
        <div class="form-section optional-section">
            <h3>Optional Information (For Students)</h3>
            
            <label for="program">Program:</label>
            <select id="program" name="program">
                <option value="">Select Program (Optional)</option>
            </select>
            <label for="course">Course:</label>
            <select id="course" name="course">
                <option value="">Select course (Optional)</option>
                
            </select>
            
            <label for="year_level">Year Level:</label>
            <select id="year_level" name="year_level">
                <option value="">Select Year Level (Optional)</option>
                <option value="1st Year" <?= ($year_level == "1st Year") ? 'selected' : '' ?>>1st Year</option>
                <option value="2nd Year" <?= ($year_level == "2nd Year") ? 'selected' : '' ?>>2nd Year</option>
                <option value="3rd Year" <?= ($year_level == "3rd Year") ? 'selected' : '' ?>>3rd Year</option>
                <option value="4th Year" <?= ($year_level == "4th Year") ? 'selected' : '' ?>>4th Year</option>
            </select>
            
            <label for="school">School:</label>
            <input type="text" id="school" name="school" placeholder="Your School (Optional)" value="<?= $school ?>">
        </div>

        <div class="button-container">
            <button type="button" class="back-button" onclick="window.location.href='Registrationmadrasa'">Back</button>
            <button type="submit" class="submit-button">Submit Registration</button>
        </div>
    </form>
    <?php include '../../includes/footer.php'; ?>
    <script src="../../js/enhancedRegistration.js"></script>
</body>
</html>