<!DOCTYPE html>
<html lang="en">
<head>
    <title>RentADog</title>
    <meta charset="utf-8">
    <link rel = "stylesheet" href="style.css">
    <link rel="stylesheet" href="leaflet.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
</head>
<body>
<?php
$currentPage = basename($_SERVER['PHP_SELF']);
$scriptList = array('js/jquery/jQuery-1.11.3.min.js','js/jquery/jquery3.3.js', 'js/jquery/jquery-ui.js','js/map.js','js/jquery/leaflet.js');
include('htaccess/header.php');
?>
<main>
    <figure id="map">
        <img src="images/map.png" alt="Map placeholder">

    </figure>
    <ul class="contact">
            <h3>RrntADog Offices</h3>
            <p>
                22. St David Street
            </p>
            <p>
                (03) 827 3213
            </p>
        </ul>
</main>
<?php
include('htaccess/footer.php');
?>
</body>
</html>