<?php
session_start();
require_once('../model/profileModel.php');

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}


$user_name = $_SESSION['username'];


$user = getUser($user_name);

if (!$user) {
    echo "User not found.Username: $user_name";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Profile</title>
</head>
<body>
    <fieldset>
        <legend><h1><b>Admin Profile</b></h1></legend>
        <form action="#" method="post">
        <h2>Profile Information</h2>


            <b>Name:</b><br>
            <input type="text"  name="name" value="<?php echo $user['name']; ?>" readonly><br><br>

            <b>Email:</b><br>
            <input type="text"  name="email" value="<?php echo $user['email']; ?>" readonly><br><br>

            <b>Username:</b><br>
            <input type="text" name="username" value="<?php echo $user['username']; ?>" readonly><br><br>

            <b>Phone:</b><br>
            <input type="text"  name="phone" value="<?php echo $user['phone']; ?>" readonly><br><br>

            <b>DOB:</b><br>
            <input type="text"  name="dob" value="<?php echo $user['dob']; ?>" readonly><br><br>

        <hr>
        
        
        <h3><a href="addAdmin.php">  Add Admin <a></h3>
        </form>
        <h3><a href="adminHome.php"> Back <a></h3>
        </form>
    </fieldset>
</body>
</html>

