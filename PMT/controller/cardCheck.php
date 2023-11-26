<?php

function validateCardPayment($cardNumber, $cardPin)
{
    $errors = [];


    if (empty($cardNumber) || !is_numeric($cardNumber) || strlen($cardNumber) !== 16) {
        $errors[] = 'Invalid card number. Please enter a 16-digit number.';
    }


    if (empty($cardPin) || !is_numeric($cardPin) || strlen($cardPin) !== 4) {
        $errors[] = 'Invalid card PIN. Please enter a 4-digit PIN.';
    }



    return $errors;
}

?>
