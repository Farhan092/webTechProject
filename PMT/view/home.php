<?php 
     session_start();
      require_once('../controller/sessionCheck.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <center>
        <a href="profile.php">View Profile</a> <br>
        <a href="currency.php">Currency Converter</a><br>

        <a href="reviews.php">Reviews and Ratings</a><br>
        <a href="transaction.php">Transaction Details</a><br>
        <a href="payment.php">Pay</a>

    </center>
    <center>
    </form>
        <h3><a href="../controller/logout.php"> Log Out <a></h3>
    </form>
</center>
</body>
</html>