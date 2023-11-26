<?php
session_start();
require_once('../controller/sessionCheck.php');
require_once '../model/paymentModel.php';
require_once '../controller/cardCheck.php';

$amount = isset($_POST['amount']) ? $_POST['amount'] : '';
$validationErrors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pay'])) {
    $cardNumber = $_POST['card-number'];
    $cardPin = $_POST['card-pin'];

    $validationErrors = validateCardPayment($cardNumber, $cardPin, $amount);

    if (empty($validationErrors)) {
        if (insertCardPayment($amount, $cardNumber)) {
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
    <title>Card Payment</title>
    <script src="../js/cardCheck.js"></script>
</head>
<body>
    <div>
        <?php
        foreach ($validationErrors as $error) {
            echo $error . '<br>';
        }
        ?>
        <form action="cardPay.php" name="paymentForm" method="post" onsubmit="return validateCard()">
            <fieldset>
                <legend><h3>Card Payment</h3></legend>
                <b>Total Amount to Pay:</b>
                <input type="text" name="amount" value="<?= $amount ?>" readonly>
                <br><br>
                <b>Card Number:</b>
                <input type="text" name="card-number" placeholder="1234 5678 9012 3456">
                <span id="cardNumberError" style="color: red;"></span> 
                <br><br>
                <b>Card PIN:</b>
                <input type="password" name="card-pin">
                <span id="cardPinError" style="color: red;"></span> 
                <br><br>
                <input type="submit" value="Pay Now" name="pay">
            </fieldset>
        </form>
        <a href="payment.php">Back</a>
    </div>
</body>
</html>

