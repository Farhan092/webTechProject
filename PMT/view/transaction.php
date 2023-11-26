<?php
session_start();
require_once('../controller/sessionCheck.php');
require_once('../model/transactionModel.php');

$paymentDetails = getPaymentDetails();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Transaction Details</title>
</head>
<body>
    <h2>Transaction Details</h2>
    <table border="1">
        <tr>
            <th>Payment ID</th>
            <th>Payment Method</th>
            <th>Card Number</th>
            <th>Card PIN</th>
            <th>Mobile Number</th>
            <th>bKash PIN</th>
            <th>Nagad PIN</th>
            <th>Payment Amount</th>
            <th>Status</th>
        </tr>
        <?php foreach ($paymentDetails as $payment): ?>
        <tr>
            <td><?= $payment['payment_id'] ?></td>
            
            <td><?= $payment['payment_method'] ?></td>
            <td><?= $payment['card_number'] ?></td>
            <td><?= $payment['card_pin'] ?></td>
            <td><?= $payment['mobile_number'] ?></td>
            <td><?= $payment['bkash_pin'] ?></td>
            <td><?= $payment['nagad_pin'] ?></td>
            <td><?= $payment['payment_amount'] ?></td>
            <td><?= $payment['status'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <a href="home.php">Back</a>
</body>
</html>
