<?php
require_once '../tools/function.php';
require_once '../classes/accountClass.php';

session_start();

$username = $password = '';
$accountObj = new Account();
$positions = $accountObj->fetchOfficerPositions();
$first_name = $last_name = $middle_name = $username = $password = $email = $role = $position = '';
$first_nameErr = $last_nameErr = $usernameErr = $passwordErr = $roleErr = $emailErr = $positionErr = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = clean_input(($_POST['firstname']));
    $last_name = clean_input(($_POST['lastname']));
    $middle_name = clean_input(($_POST['middlename']));
    $username = clean_input(($_POST['username']));
    $email = clean_input(($_POST['email']));
    $position = clean_input(($_POST['position']));
    $password = clean_input($_POST['password']);

    if (empty($first_name)) {
        $first_nameErr = "First name is Required!";
    }
    if (empty($last_name)) {
        $last_nameErr = "Last name is Required!";
    }
    if (empty($username)) {
        $usernameErr = "Username is Required!";
    } elseif ($accountObj->usernameExist($username)) {
        $usernameErr = "Username already taken!";
    }
    if (empty($email)) {
        $emailErr = "Email is Required!";
    } elseif ($accountObj->emailExist($email)) {
        $emailErr = "Email already taken!";
    } elseif (!$accountObj->validateEmail($email)) {
        $emailErr = "Please use WMSU email!";
    }
    if (empty($password)) {
        $passwordErr = "Password is Required!";
    }elseif (!$accountObj->validatePassword($password)) {
        $passwordErr = "Password must be at least 8 characters!";
    }
    if (empty($position)) {
        $positionErr = "Please enter officer's position!";
    }
    if (empty($first_nameErr) && empty($last_nameErr) && empty($emailErr) && empty($usernameErr) && empty($passwordErr) && empty($positionErr)) {
        $accountObj->first_name = $first_name;
        $accountObj->last_name = $last_name;
        $accountObj->username = $username;
        $accountObj->email = $email;
        $accountObj->middle_name = $middle_name;
        $accountObj->position = $position;
        $accountObj->password = $password;
        $accountObj->signup();
        header("location: ../views/admin/admin_dashboard");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
</head>
<body>

    <form action="" method="POST">
        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname" placeholder="First Name" value="<?= $first_name ?>">
        <span><p><?= $first_nameErr ?></p></span>
        <br>

        <label for="middlename">Middle Name:</label>
        <input type="text" id="middlename" name="middlename" placeholder="Middle Name" value="<?= $middle_name ?>">
        <br>

        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname" placeholder="Last Name" value="<?= $last_name ?>">
        <span><p><?= $last_nameErr ?></p></span>
        <br>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" placeholder="Username" value="<?= $username ?>">
        <span><p><?= $usernameErr ?></p></span>
        <br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="johndoe@wmsu.edu.ph" value="<?= $email ?>">
        <span><p><?= $emailErr ?></p></span>
        <br>

        <label for="position">Position:</label>
        <select id="position" name="position">
            <option value="">Select Position</option>
            <?php foreach ($positions as $pos): ?>
                <option value="<?= $pos['position_id'] ?>" <?= ($position == $pos['position_id']) ? 'selected' : '' ?>>
                    <?= clean_input($pos['position_name']) ?>
                </option>
            <?php endforeach; ?>
            <span><p><?= $positionErr ?></p></span>
        </select>
        <br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Password" value="<?= $password ?>">
        <span><p><?= $passwordErr ?></p></span>
        <br>

        <button type="submit">Sign Up</button>
    </form>

</body>
</html>
