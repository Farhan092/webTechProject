<?php
session_start();
require_once('../controller/sessionCheck.php');
require_once('../model/reviewsModel.php');

// if (!isset($_SESSION['username'])) {
//     header('Location: login.php');
//     exit();
// }

$message = "";
$username = $_SESSION['flag'];

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
    <h2>Reviews and Ratings</h2>
    <fieldset>
        <legend>Submit a Review</legend>
        <section>
            <form  method = "post" id="reviewForm" onsubmit="event.preventDefault(); submitReview();">
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

                <button type="submit" >Submit Review</button>
            </form>
            
        </section>
    </fieldset>

    <div id="message"><?php echo !empty($message) ? $message : ''; ?></div>


    <br>
    <a href="userReviews.php">View User Reviews</a><br>
    <a href="home.php">Back</a><br>
</body>
</html>
<div id="reviewMessage"></div>
