<?php

session_start();
require_once('../model/db.php');
require_once('../model/profileModel.php');

$errors = []; // Initialize the errors array

if (!isset($_SESSION['username'])) {
    header('Location: ../view/login.php');
    exit();
}

$user_name = $_SESSION['username'];
$user = getUser($user_name);

if (!$user) {
    echo "User not found.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $currentPassword = isset($_POST['currentPassword']) ? $_POST['currentPassword'] : '';
    $newPassword = isset($_POST['newPassword']) ? $_POST['newPassword'] : '';
    $retypedPassword = isset($_POST['retypedPassword']) ? $_POST['retypedPassword'] : '';

    $minPasswordLength = 8;
    $requireUppercase = true;
    $requireLowercase = true;
    $requireDigit = true;
    $requireSpecialChar = true;

    $con = getConnection();
    $sql = "SELECT password FROM userinfo WHERE username = '$user_name'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $storedPassword = $row['password'];

    if ($currentPassword !== $storedPassword) {
        $errors[] = "Current password is incorrect.";
    }

    if (strlen($newPassword) < $minPasswordLength) {
        $errors[] = "New password is too short. It must be at least $minPasswordLength characters long.";
    }

    if ($requireUppercase && !containsUppercase($newPassword)) {
        $errors[] = "New password must contain at least one uppercase letter.";
    }

    if ($requireLowercase && !containsLowercase($newPassword)) {
        $errors[] = "New password must contain at least one lowercase letter.";
    }

    if ($requireDigit && !containsDigit($newPassword)) {
        $errors[] = "New password must contain at least one digit.";
    }

    if ($requireSpecialChar && !containsSpecialChar($newPassword)) {
        $errors[] = "New password must contain at least one special character.";
    }

    if ($newPassword !== $retypedPassword) {
        $errors[] = "New password and retyped password do not match.";
    }

    if (empty($errors)) {
        $result = mysqli_query($con, "UPDATE userinfo SET password = '$newPassword' WHERE username = '$user_name'");

        if ($result) {
            echo "Password changed successfully!";
            // header('Location:../view/profile.php');
            // exit();
        } else {
            $errors[] = "Password update failed. Please try again.";
        }
    }
}

function containsUppercase($str) {
    for ($i = 0; $i < strlen($str); $i++) {
        if ($str[$i] >= 'A' && $str[$i] <= 'Z') {
            return true;
        }
    }
    return false;
}

function containsLowercase($str) {
    for ($i = 0; $i < strlen($str); $i++) {
        if ($str[$i] >= 'a' and $str[$i] <= 'z') {
            return true;
        }
    }
    return false;
}

function containsDigit($str) {
    for ($i = 0; $i < strlen($str); $i++) {
        if ($str[$i] >= '0' and $str[$i] <= '9') {
            return true;
        }
    }
    return false;
}

function containsSpecialChar($str) {
    $specialChars = '!@#$%^&*()_+[]{}|;:,.<>?';
    for ($i = 0; $i < strlen($str); $i++) {
        if (strpos($specialChars, $str[$i]) !== false) {
            return true;
        }
    }
    return false;
}
?>

