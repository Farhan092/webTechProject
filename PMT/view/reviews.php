<?php
session_start();
require_once('../controller/sessionCheck.php');
require_once('../model/reviewsModel.php');

// if (!isset($_SESSION['username'])) {
//     header('Location: login.php');
//     exit();
// }

$message = "";
$username = $_SESSION['username'];

if (isset($_POST['review'], $_POST['rating'], $_POST['service-type'])) {
    $rating = $_POST['rating'];
    $reviews = $_POST['review'];
    $serviceType = $_POST['service-type'];

    $allReviews = getAllReviews();

    if ($reviews == "") {
        echo "Null review";
    } else {
        if (insertReview($username, $rating, $reviews, $serviceType)) {
            $message = "Your review has been submitted.";
        } else {
            $message = "Failed to submit the review. Please try again later.";
        }
    }
}
?>

<html>
<head>
    <title>Review and Ratings</title>
    <script src="../js/reviewsAjax.js"></script>


</head>
<body>

    <fieldset id = "form1">
    <h2>Reviews and Ratings</h2>
        <legend>Submit a Review</legend>

            <form id ="form" action="reviews.php" method = "post"  >

                Rating:
                <select id="rating" name="rating">
                    <option value="5">5 (Excellent)</option>
                    <option value="4">4 (Very Good)</option>
                    <option value="3">3 (Good)</option>
                    <option value="2">2 (Fair)</option>
                    <option value="1">1 (Poor)</option>
                </select>

                Review:
                <textarea name="review" id = "review"rows="4"></textarea>

                Service Type:
                <select name="service-type" id = "service-type">
                    <option value="hotel">Hotel</option>
                    <option value="flight">Flight</option>
                    <option value="car_rental">Car Rental</option>
                </select>

                <input type="button" name="submit" value="Submit" onclick="submitReview()"/>

                <!-- <button type="button" >Submit Review</button> -->
                <!-- <h2 id="h2"></h2> -->
            </form>
        
        <br>
    <a href="userReviews.php">View User Reviews</a><br>
    <a href="home.php">Back</a><br>
    </fieldset>

    <div id="message"><?php echo !empty($message) ? $message : ''; ?></div>


    
</body>
</html>
<!-- <div id="reviewMessage"></div> -->
