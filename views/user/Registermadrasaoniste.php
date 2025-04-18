<?php
require_once '../../tools/function.php';
require_once '../../classes/accountClass.php';
require_once '../../classes/adminClass.php';

session_start();

$adminObj = new Admin();
$programs = $adminObj->fetchProgram();
$name = $program = $college = $cor_file = '';
$nameErr = $programErr = $collegeErr = $imageErr = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = clean_input($_POST['name']);
    $program = clean_input($_POST['program']);
    $college = clean_input($_POST['college']);

    if (empty($name)) {
        $nameErr = "Name is required!";
    }
    if (empty($program)) {
        $programErr = "Please select your program/course!";
    }
    if (empty($college)) {
        $collegeErr = "Please enter your college!";
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
    
    if (empty($nameErr) && empty($programErr) && empty($collegeErr) && empty($imageErr)) {
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
    <title>Registration Madrasa Onsite</title>
    <link rel="stylesheet" href="../../css/registrationmadrasaonsite.css">
    <?php include '../../includes/header.php'; ?>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" placeholder="Your Full Name" value="<?= $name ?>">
        <span><p><?= $nameErr ?></p></span>
        <br>

        <label for="college">College:</label>
        <input type="text" id="college" name="college" placeholder="Your College" value="<?= $college ?>">
        <span><p><?= $collegeErr ?></p></span>
        <br>

        <label for="program">Program/Course:</label>
        <select id="program" name="program">
            <option value="">Select Program</option>
            <?php foreach ($programs as $prog): ?>
                <option value="<?= $prog['program_id'] ?>" <?= ($program == $prog['program_id']) ? 'selected' : '' ?>>
                    <?= clean_input($prog['program_name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <span><p><?= $programErr ?></p></span>
        <br>

        <label for="image">Upload COR (Certificate of Registration):</label>
        <div class="upload-container">
            <div class="upload-area" id="upload-area" onclick="document.getElementById('image').click()">
                <div class="upload-placeholder" id="upload-placeholder">
                    <img src="../../assets/icons/upload-icon.png" alt="Upload Icon" class="upload-icon">
                    <p>Click to upload your COR screenshot</p>
                    <p class="upload-hint">(Only JPG, JPEG, or PNG, max 2MB)</p>
                </div>
                <div class="image-preview" id="image-preview" style="display: none;">
                    <img id="preview-img" src="#" alt="Image Preview">
                    <button type="button" class="remove-image" onclick="removeImage()">×</button>
                </div>
            </div>
            <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(event)" style="display: none;">
            <input type="hidden" name="existing_image" value="<?= $cor_file ?>">
            <span><p><?= $imageErr ?></p></span>
        </div>

        <div class="button-container">
            <button type="button" class="back-button" onclick="window.location.href='Registrationmadrasa'">Back</button>
            <button type="submit" class="submit-button">Submit</button>
        </div>
    </form>
    <?php include '../../includes/footer.php'; ?>
    <script src="../../js/registrationonsite.js"></script>
</body>
</html>