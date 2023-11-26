<?php
require_once('db.php');

function getPaymentDetails() {
    $con = getConnection();
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM payments";
    $result = mysqli_query($con, $sql);

    $paymentDetails = array();

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $paymentDetails[] = $row;
        }
    }
    mysqli_close($con);

    return $paymentDetails;
}
?>
