<?php
session_start();
require_once('../controller/sessionCheck.php');
require_once('../model/profileModel.php');


$allUsers = getAllUser();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>All Users</title>
</head>
<body>
    <center>
        <h2>All Users</h2>
        <table border="1">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Phone</th>
                <th>DOB</th>
                <th>Role</th> 
            </tr>

            <?php foreach ($allUsers as $user): ?>
                <tr>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['phone']; ?></td>
                    <td><?php echo $user['dob']; ?></td>
                    <td><?php echo $user['role']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <br/>
        <a href="adminProfile.php">Back to Profile</a>
    </center>
</body>
</html>
