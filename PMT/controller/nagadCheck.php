<?php

function validateNagadPayment($nagadNumber, $nagadPin)
{
    $errors = [];


    if (empty($nagadNumber) || !is_numeric($nagadNumber) || strlen($nagadNumber) !== 11) {
        $errors[] = 'Invalid Nagad number. Please enter an 11-digit number.';
    }


    if (empty($nagadPin) || !is_numeric($nagadPin) || strlen($nagadPin) !== 6) {
        $errors[] = 'Invalid Nagad PIN. Please enter a 6-digit PIN.';
    }

    

    return $errors;
}

?>
