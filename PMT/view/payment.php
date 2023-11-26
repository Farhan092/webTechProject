<?php
session_start();
require_once('../controller/sessionCheck.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Booking Payment</title>
    <script src="../js/paymentCheck.js"></script>
</head>
<body>
    <header>
        <h2>Payment Gateway</h2>
    </header>
    <section>
        <fieldset>
            <legend>Payment Details</legend>
            <form method="post" action="" onsubmit="return validateForm()">
                Total Amount to Pay: $<input type="text" name="amount" placeholder="Enter Amount">
                <span id="amountError" style="color: red;"></span> 
                <br><br>
                <hr>
                <br>
                <fieldset>
                    <legend>Select Payment Method:</legend>
                    Payment Method:
                    <br><br>
                    <input type='submit' name='payment_method' formaction='cardPay.php' value='Card'>
                    <input type='submit' name='payment_method' formaction='bkashPay.php' value='bKash'>
                    <input type='submit' name='payment_method' formaction='nagadPay.php' value='Nagad'>
                </fieldset>
                <br>
                <hr>
                <br>
            </form>
            <a href="home.php">Back</a>
        </fieldset>
    </section>
</body>
</html>
