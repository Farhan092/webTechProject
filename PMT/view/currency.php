<?php 
   require_once('../controller/sessionCheck.php');
   
?>


<html>
<head>
    <title>Currency Converter with History</title>
</head>
<body>
    <h2>Currency Converter</h2>
    <fieldset>
        <legend>Currency Conversion</legend>
        <div >
            <form action="../controller/currencyController.php" method="post">
                Amount:
                <input type="number" name="amount" placeholder="Enter amount">
                From Currency:
                <select name="from-currency">
                    <option value="BDT">Bangladeshi Taka (BDT)</option>
                    <option value="USD">US Dollar (USD)</option>
                    <option value="GBP">British Pound (GBP)</option>

                </select>
                To Currency:
                <select name="to-currency">
                    <option value="USD">US Dollar (USD)</option>
                    <option value="GBP">British Pound (GBP)</option>
                    <option value="BDT">Bangladeshi Taka (BDT)</option>

                </select>
                <button type="submit">Convert</button>
            </form>
            <p>
            <?php
            if (!empty($error_message)) {
                echo "<p style='color: red;'>Error: $error_message</p>";
            } else {
                echo "<p>";
                if (isset($conversion_result)) {
                    echo $conversion_result;
                } else {
                    echo "Conversion result will appear here";
                }
                echo "</p>";
            }
            ?>
            </p>
        </div>
        <!-- <h2><a href="conversionHistory.php">Conversion History</a></h2> -->


        <form action="../view/conversionHistory.php" method = "get">
            <input type="submit" name="submit" value="Conversion History">
        </form>

        <form action="../view/home.php" method="get">
        <input type="submit" name="submit" value="Go Back">
       </form>
    </fieldset>
</body>
</html>
