<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Classic Cinema</title>
        <meta charset="utf-8">

        <link rel = "stylesheet" href="style.css">
    </head>

    <body>
    <?php
    $currentPage = basename($_SERVER['PHP_SELF']);
    $scriptList =array('jQuery-1.11.3.min.js','dynamicList.js');
    include("htaccess/header.php");
    ?>

        <main>
            <p>
                Welcome to Classic Cinema, your online store for classic film.
            </p>
            <div id="dynamicList">

            </div>

        </main>
        <?php include("htaccess/footer.php"); ?>
    </body>
</html>