<?php
if (session_id() === "") {
    session_start();
}
$_SESSION['test'] = 'TEST';
$_SESSION['deliveryName'] = $_POST['deliveryName'];
$_SESSION['deliveryEmail'] = $_POST['deliveryEmail'];
$_SESSION['deliveryAddress1'] = $_POST['deliveryAddress1'];
$_SESSION['deliveryAddress2'] = $_POST['deliveryAddress2'];
$_SESSION['deliveryCity'] = $_POST['deliveryCity'];
$_SESSION['deliveryPostcode'] = $_POST['deliveryPostcode'];
$_SESSION['cardNumber'] = $_POST['cardNumber'];
$_SESSION['cardValidation'] = $_POST['cardValidation'];
$_SESSION['cardType'] = $_POST['cardType'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Classic Cinema</title>
        <meta charset="utf-8">
        <link rel = "stylesheet" href="style.css">

    </head>
    <?php
    $scriptList = array('jQuery-1.11.3.min.js');
    include("htaccess/header.php");
    include("htaccess/validationFunctions.php");
    ?>
    <body>
<main>
    <p id = "table">

    </p>
    <?php
    if (isset($_SESSION['authenticatedUser'])) {
        $formOk = false;
        if (isset($_POST['submit'])) {
            $formOk = true;

            if (isEmpty($_POST['deliveryName'])) {
                $formOk = false;
                echo "<p>you must enter a delivery name</p>";
            }

            if (isEmpty($_POST['deliveryEmail']) || !isEmail($_POST['deliveryEmail'])) {
                $formOk = false;
                echo "<p>you must enter a valid email address</p>";
            }

            if (isEmpty($_POST['deliveryAddress1'])) {
                $formOk = false;
                echo "<p>you must enter a city</p>";
            }
            if (isEmpty($_POST['deliveryPostcode']) || (!isDigits($_POST['deliveryPostcode']) || !checkLength($_POST['deliveryPostcode'], 4))) {
                $formOk = false;
                echo "<p>You must enter a valid postcode</p>";
            }

            if ((isEmpty($_POST['cardNumber'])) || (!checkCardNumber($_POST['cardType'], $_POST['cardNumber']))) {
                $formOk = false;
                echo "<p>You must enter a valid card number</p>";
            }

            if (!checkCardDate($_POST['cardMonth'], $_POST['cardYear'])) {
                $formOk = false;
                echo "<p>You must enter a valid card date</p>";

            }
            if (!checkCardVerification($_POST['cardType'], $_POST['cardValidation'])) {
                $formOk = false;
                echo "<p>Please enter a vaild CVC</p>";
            }



            if ($formOk == true) {
                echo "<script src='GetCartContents.js'></script>";
//                header('Location: orders.php');
//                exit;


            }

        }
    }else{
        echo'<p>Please Log in to checkout</p>';
    }
    ?>

</main>
<?php include("htaccess/footer.php"); ?>
</body>
