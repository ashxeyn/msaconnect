<?php
require_once '../tools/function.php';
require_once '../classes/accountClass.php';

session_start();

$username = $password = '';
$accountObj = new Account();
$loginErr = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = clean_input($_POST['username']);
    $password = clean_input($_POST['password']);

    if ($accountObj->login($username, $password)) {
        $data = $accountObj->fetch($username);
        $_SESSION['account'] = $data;

        if ($data['role'] == 'admin') {
            header('location: ../views/admin/admin_dashboard');
            exit();
        } elseif ($data['role'] == 'sub-admin') {
            header('location: ../views/sub-admin/dashboard');
            exit();
        } else {
            $loginErr = 'Invalid username or password';
        }
    } else {
        $loginErr = 'Invalid username or password';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <form action="" method="post">
        <h2>Login</h2>
        <label for="username">Username/Email</label>
        <br>
        <input type="text" name="username" id="username" value="<?= $username ?>">
        <br>
        <label for="password">Password</label>
        <br>
        <input type="password" name="password" id="password">
        <br>
        <?php
        if (!empty($loginErr)) {
        ?>
            <p class="error"><?= $loginErr ?></p>
        <?php
        }
        ?>
        <input type="submit" value="Login" name="login">
    </form>
</body>

</html>
