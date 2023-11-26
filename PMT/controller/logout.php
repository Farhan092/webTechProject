<?php
session_start();
session_destroy();
//$_SESSION = array();
//session_destroy();

//setcookie('flag', 'true', time() - 20, '/', '');
header('location: ../view/login.php');
?>

