<?php
session_start();
require_once('../controller/sessionCheck.php');
require_once '../model/paymentModel.php';
require_once '../controller/bkashCheck.php';

$amount = isset($_POST['amount']) ? $_POST['amount'] : '';
$validationErrors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pay'])) {
    $bkashNumber = $_POST['mobile-number-bkash'];
    $bkashPin = $_POST['bkash-pin'];

    $validationErrors = validateBkashPayment($bkashNumber, $bkashPin);

    if (empty($validationErrors)) {
        if (insertBkashPayment($amount, $bkashNumber)) {
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
    <title>bKash Payment</title>
    <script src="../js/bkashCheck.js"></script>
</head>
<body>
    <div>
        <?php
        foreach ($validationErrors as $error) {
            echo $error . '<br>';
        }
        ?>
        <form action="bkashPay.php" name="bkashForm" method="post" onsubmit="return validateBkash()">
            <fieldset>
                <legend><h3>bKash Payment</h3></legend>
                <b>Total Amount to Pay:</b>
                <input type="text" name="amount" value="<?= $amount ?>" readonly>
                <br><br>
                <b>bKash Mobile Number:</b>
                <input type="text" name="mobile-number-bkash" placeholder="01XXXXXXXXX">
                <span id="bkashNumberError" style="color: red;"></span> 
                <br><br>
                <b>bKash PIN:</b>
                <input type="password" name="bkash-pin">
                <span id="bkashPINError" style="color: red;"></span>
                <br><br>
                <input type="submit" value="Pay Now" name="pay">
            </fieldset>
        </form>
        <a href="payment.php">Back</a>
    </div>
</body>
</html>
