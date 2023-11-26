<?php
session_start();
require_once('../controller/sessionCheck.php');
require_once('../model/db.php');
require_once('../model/profileModel.php');

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $adminUsername = $_POST['adminUsername'];
        $adminPassword = $_POST['adminPassword'];

        $adminRole = 'admin';

        if (isAdminUsernameValid($adminUsername)) {
            $result = createAdmin($adminUsername, $adminPassword, $adminRole);

            if ($result) {
                echo "Admin registration successful!";
            } else {
                echo "Admin registration failed.";
            }
        } else {
            echo "Invalid admin username format. Admin username should follow the pattern 'admin' followed by a number.";
        }
    }
} else {
    echo "You do not have permission to register a new admin.";
}

function isAdminUsernameValid($username) {
    if (strpos($username, 'admin') === 0) {
        $adminNumber = substr($username, 5);
        return is_numeric($adminNumber);
    }

    return false;
}
?>

<html lang="en">
<head>
    <title>Admin Registration</title>
</head>
<body>
    <h2>Admin Registration</h2>
    <fieldset>
        <form method="post" action="addAdmin.php">
            Username:<br>
            <input type="text" name="adminUsername" required>
            <br>

            Password:<br>
            <input type="password" name="adminPassword" required>
            <br><br>

            <input type="submit" value="Register Admin"><br>
        </form>
        <a href="adminProfile.php">Back to Profile</a>
    </fieldset>
</body>
</html>
