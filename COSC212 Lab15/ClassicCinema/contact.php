<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Classic Cinema</title>
        <meta charset="utf-8">
        <link rel = "stylesheet" href="style.css">
        <link rel="stylesheet" href="leaflet.css"/>
    </head>
    <body>
    <?php
    $currentPage = basename($_SERVER['PHP_SELF']);
    $scriptList =array('jQuery-1.11.3.min.js','leaflet.js','map.js');
    include('header.php');
    ?>
        <main>
            <figure id="map">
                <img src="images/map.png" alt="Map placeholder">
            </figure>
            <ul class="contact">
                <li>
                    <h3>Central</h3>
                    <p>
                        101 The Octagon
                    </p>
                    <p>
                        (03) 490 1234
                    </p>
                </li>
                <li>
                    <h3>North</h3>
                    <p>
                        789 Princes St
                    </p>
                    <p>
                        (03) 490 2468
                    </p>
                </li>
                <li>
                    <h3>South</h3>
                    <p>
                        561 Great King St
                    </p>
                    <p>
                        (03) 490 3579
                    </p>
                </li>
        </main>
       <?php include("footer.php"); ?>
    </body>
</html>