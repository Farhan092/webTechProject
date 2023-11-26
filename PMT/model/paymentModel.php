<?php
require_once('db.php');

function insertCardPayment($paymentAmount, $cardNumber) {
    $con = getConnection();
    
    $sql = "INSERT INTO payments (payment_amount, card_number, payment_method) 
            VALUES ('$paymentAmount', '$cardNumber', 'Card')";

    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        return false;
    }
}



function insertBkashPayment($paymentAmount, $mobileNumber) {
    $con = getConnection();
    
    $sql = "INSERT INTO payments (payment_amount, mobile_number, payment_method) 
            VALUES ('$paymentAmount', '$mobileNumber', 'bKash')";

        if (mysqli_query($con, $sql)) {
            return true;
        } else {
            return false;
        }
}

function insertNagadPayment($paymentAmount, $mobileNumberNagad) {
    $con = getConnection();
    
    $sql = "INSERT INTO payments (payment_amount, mobile_number, payment_method) 
            VALUES ('$paymentAmount', '$mobileNumberNagad', 'Nagad')";
            
    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        return false;
    }

}

?>

