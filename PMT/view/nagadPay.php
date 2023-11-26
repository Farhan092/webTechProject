<?php
session_start();
require_once('../controller/sessionCheck.php');
require_once '../model/paymentModel.php';
require_once '../controller/nagadCheck.php';

$amount = isset($_POST['amount']) ? $_POST['amount'] : '';
$validationErrors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pay'])) {
    $mobileNumberNagad = $_POST['mobile-number-nagad'];
    $nagadPin = $_POST['nagad-pin'];

    $validationErrors = validateNagadPayment($mobileNumberNagad, $nagadPin);

    if (empty($validationErrors)) {
        if (insertNagadPayment($amount, $mobileNumberNagad)) {
            echo "Payment successful. Data inserted into the database.";
        } else {
            echo "Error: Payment failed.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Nagad Payment</title>
    <script src="../js/nagadCheck.js"></script>
</head>
<body>
    <div>
        <?php
            foreach ($validationErrors as $error) {
                echo $error . '<br>';
            }
        ?>
        <form action="nagadPay.php" name="nagadForm" method="post" onsubmit="return validateNagad()">
            <fieldset>
                <legend><h3>Nagad Payment</h3></legend>
                <b>Total Amount to Pay:</b>
                <input type="text" name="amount" value="<?= $amount ?>" readonly>
                <br><br>
                <b>Nagad Mobile Number:</b>
                <input type="text" name="mobile-number-nagad" placeholder="01XXXXXXXXX">
                <span id="nagadNumberError" style="color: red;"></span> 
                <br><br>
                <b>Nagad PIN:</b>
                <input type="password" name="nagad-pin">
                <span id="nagadPINError" style="color: red;"></span> 
                <br><br>
                <input type="submit" value="Pay Now" name="pay">
            </fieldset>
        </form>
        <a href="payment.php">Back</a>
    </div>
</body>
</html>
