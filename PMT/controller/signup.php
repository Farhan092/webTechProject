<?php
require_once "../model/profileModel.php";
require_once "signupCheck.php";

$nameError = $emailError = $userNameError = $passwordError = $confirmPasswordError = $phoneError = $dobError = $roleError = $successMessage = "";

$name = $email = $userName = $password = $confirmPassword = $phone = $dob = $role = "";

$role = "user";

if (isset($_POST["submit"])) {
    $postData = [
        "name" => $_POST["name"],
        "email" => $_POST["email"],
        "username" => $_POST["username"],
        "password" => $_POST["password"],
        "confirmPassword" => $_POST["confirmPassword"],
        "phone" => $_POST["phone"],
        "dob" => $_POST["dob"],
        "role" => $_POST["role"]
    ];

    $validationErrors = validateSignup($postData);

    $nameError = $validationErrors["name"] ?? "";
    $emailError = $validationErrors["email"] ?? "";
    $userNameError = $validationErrors["username"] ?? "";
    $passwordError = $validationErrors["password"] ?? "";
    $confirmPasswordError = $validationErrors["confirmPassword"] ?? "";
    $phoneError = $validationErrors["phone"] ?? "";
    $dobError = $validationErrors["dob"] ?? "";
    $roleError = $validationErrors["role"] ?? "";

    if (empty($nameError) && empty($emailError) && empty($userNameError) && empty($passwordError) && empty($confirmPasswordError) && empty($phoneError) && empty($dobError) && empty($roleError)) {
        $role = isset($_POST["role"]) ? $_POST["role"] : "user";

        $signupResult = signup($postData["name"], $postData["email"], $postData["username"], $postData["password"], $postData["phone"], $postData["dob"], $role);

        if ($signupResult) {
            $successMessage = "Registration successful! User added to the database.";
        } else {
            $successMessage = "Registration failed. Please try again.";
        }
    }
}
?>

<html lang="en">
<head>
    <title>Registration</title>
    <script src="../js/signupCheck.js"></script>

</head>
<body>

    <form id="signupForm" onsubmit="return validatSignup()" method="post" action="">
        <fieldset>
            <legend>Registration</legend>

            <div>
                <b>Name:</b><br> <input type="text" name="name"id ="name" value="">
                <span id="nameError" style="color: red;"></span><br>
               <?php echo $nameError; ?></div>
            </div>

            <div>
                <b>Email:</b> <br><input type="text" name="email" id ="email" value="">
                <span id="emailError" style="color: red;"></span><br>
                <?php echo $emailError; ?></div>
            </div>

            <div>
                <b>Username:</b> <br><input type="text" name="username" id ="username"value="">
                <span id="usernameError" style="color: red;"></span><br>
                <?php echo $userNameError; ?></div>
            </div>

            <div>
                <b>Password:</b><br> <input type="password" name="password" id ="password" value="">
                <span id="passwordError" style="color: red;"></span><br>
                <?php echo $passwordError; ?></div>
            </div>

            <div>
                <b>Confirm Password:</b><br> <input type="password" name="confirmPassword" id  = "confirmPassword" value="">
                <span id="confirmPasswordError" style="color: red;"></span><br>
                <?php echo $confirmPasswordError; ?></div>
            </div>

            <div>
                <b>Phone:</b><br> <input type="number" name="phone" id  = "phone"  value="">
                <span id="phoneError" style="color: red;"></span><br>
                <?php echo $phoneError; ?></div>
            </div>

            <div>
                <b>DOB:</b><br> <input type="date" name="dob" id  = "dob" value="">
                <span id="dobError" style="color: red;"></span><br>
                <?php echo $dobError; ?></div>
            </div>

            <div>
                <b>Role:</b> <br>
                <input type="radio" name="role" value="user" <?php echo ($role === "user") ? "checked" : ""; ?>> User
                <input type="radio" name="role" value="admin" <?php echo ($role === "admin") ? "checked" : ""; ?>> Admin
                <?php echo $roleError; ?></div>
            </div>
            <br>

            <div>
                <input type="submit" name="submit" value="Submit">
            </div>

            <div>
                <?php echo $successMessage; ?>
            </div>


            <a href="../view/login.php">Login</a>
        </fieldset>
    </form>
</body>
</html>
