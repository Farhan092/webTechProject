<?php 
require_once('../controller/passwordCheck.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Change Password</title>
    <script src="../js/passwordCheck.js"></script>
</head>
<body>
    <fieldset>
        <legend><b>CHANGE PASSWORD</b></legend>

        <?php
        if (!empty($errors)) {
            echo '<div style="color: red;">';
            foreach ($errors as $error) {
                echo $error . '<br>';
            }
            echo '</div>';
        }
        ?>

        <form name="changePasswordForm" action=""onsubmit = "return validateChangePassword()" method="post">

            Current Password:<br>
            <input type="password" name="currentPassword" id="currentPassword">
            <?php echo isset($errors['currentPassword']) ? "<div style='color: red;'>{$errors['currentPassword']}</div>" : ""; ?>
            <span id="currentPasswordError" style="color: red;"></span><br>
            <br>

   
            New Password:<br>
            <input type="password" name="newPassword" id="newPassword">
            <?php echo isset($errors['newPasswordLength']) ? "<div style='color: red;'>{$errors['newPasswordLength']}</div>" : ""; ?>
            <?php echo isset($errors['newPasswordUppercase']) ? "<div style='color: red;'>{$errors['newPasswordUppercase']}</div>" : ""; ?>
            <?php echo isset($errors['newPasswordLowercase']) ? "<div style='color: red;'>{$errors['newPasswordLowercase']}</div>" : ""; ?>
            <?php echo isset($errors['newPasswordDigit']) ? "<div style='color: red;'>{$errors['newPasswordDigit']}</div>" : ""; ?>
            <?php echo isset($errors['newPasswordSpecialChar']) ? "<div style='color: red;'>{$errors['newPasswordSpecialChar']}</div>" : ""; ?>
            <span id="newPasswordError" style="color: red;"></span><br>
            <br>


            Retype New Password:<br>
            <input type="password" name="retypedPassword" id="retypedPassword">
            <?php echo isset($errors['retypedPassword']) ? "<div style='color: red;'>{$errors['retypedPassword']}</div>" : ""; ?>
            <span id="retypedPasswordError" style="color: red;"></span><br>

            <hr>

            <input type="submit" name="submit" value="Submit">
        </form>

        <br>
        <a href="../view/profile.php">Back to Profile</a>
    </fieldset>
</body>
</html>
