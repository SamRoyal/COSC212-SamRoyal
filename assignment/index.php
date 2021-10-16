<!DOCTYPE html>
<html lang="en">
<!--Nick Meek 2015-->
<!--Edited by Sam Royal for COSC212 Assignment 2021-->
<head>
    <meta charset="utf-8">
    <title>RentADog</title>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="js/jquery/jquery-ui.min.css">

</head>
<body>
<?php
$currentPage = basename($_SERVER['PHP_SELF']);
$scriptList = array('js/jquery/jQuery-1.11.3.min.js','js/jquery/jquery3.3.js', 'js/jquery/jquery-ui.js','js/Dogs.js','js/Booking.js','js/ShowReviews.js');
include('htaccess/header.php');
?>
<main>

<div id="bookingData">
    <section id="siteList">
    <fieldset>
        <legend>Our Lovely Dogs</legend>
        <ul id="dogsLst"></ul>
    </fieldset>
</section>

<section id="selectDates">
    <p>Date: <input type="text" id="arriveDatepicker"> <hr>
    Time: <input type="time" id="pickupTime"><hr>
    Hours: <input id="numHours" type="number" max="12">

    <div id="dateErrors"></div>
    <form id="bookingForm">
        <fieldset>
            <legend>Your Details</legend>
            <ul>
                <li><label>Name: <input type="text" id="renterName" name="renterName"<?php if (isset($_SESSION['authenticatedUser'])) {
                    $name = $_SESSION['authenticatedUser'];
                    echo "value=\"$name\""; }?>> </label></li>
            </ul>
        </fieldset>
        <input type="submit" id="makeBooking" value="Book Selected Dog(s)">

    </form>
</section>

<section id="dogPreviewPane"></section>
</div>



</main>

    <h2>Reviews</h2>
    <input type="button" value="press to display reviews" class="showReviews">
    <p id="reviews2">

    </p>

    <p id="debug">

    </p>
<?php
include('htaccess/footer.php');
?>
</body>
</html>