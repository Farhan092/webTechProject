<?php 
session_start();
require_once('../model/profileModel.php');

$results = '';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == "" || $password == "") {
        echo "Null username/password!";
        return;
    } else {
        $results = getUserRole($username);

        $user = getUserByUsernameAndPassword($username, $password);

        if ($user) {
            $_SESSION['username'] = $user['username'];
          
            $_SESSION['flag'] = "true";

            if ($results == "admin") {
                header('location: ../view/adminHome.php');
            } else if ($results == "user") {
                header('location: ../view/home.php');
            }
        } else {
            echo "Invalid username or password!";
        }
    }
}


?>
