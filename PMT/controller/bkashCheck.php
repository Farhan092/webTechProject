<?php

function validateBkashPayment($bkashNumber, $bkashPin)
{
    $errors = [];


    if (empty($bkashNumber) || !is_numeric($bkashNumber) || strlen($bkashNumber) !== 11) {
        $errors[] = 'Invalid bKash number. Please enter an 11-digit number.';
    }


    if (empty($bkashPin) || !is_numeric($bkashPin) || strlen($bkashPin) !== 5) {
        $errors[] = 'Invalid bKash PIN. Please enter a 5-digit PIN.';
    }


    return $errors;
}

?>
