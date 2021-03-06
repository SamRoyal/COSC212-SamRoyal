
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Classic Cinema</title>
        <meta charset="utf-8">
        <link rel = "stylesheet" href="style.css">
    </head>
    <?php
    $scriptList = array('jQuery-1.11.3.min.js');
    include("header.php");
    include("validationFunctions.php");
    ?>
    <body>
<main>
    <?php
    $formOk = false;
    if(isset($_POST['submit'])){
        $formOk = true;

        if(isEmpty($_POST['deliveryName'])){
            $formOk = false;
            echo "<p>you must enter a delivery name</p>";
        }

        if(isEmpty($_POST['deliveryEmail']) || !isEmail($_POST['deliveryEmail']) ){
            $formOk = false;
            echo "<p>you must enter a valid email address</p>";
        }

        if(isEmpty($_POST['deliveryAddress1'])){
            $formOk = false;
            echo "<p>you must enter a city</p>";
        }
        if (isEmpty($_POST['deliveryPostcode']) || (!isDigits($_POST['deliveryPostcode']) || !checkLength($_POST['deliveryPostcode'], 4))){
            $formOk = false;
            echo "<p>You must enter a valid postcode</p>";
        }

        if((isEmpty($_POST['cardNumber'])) || (!checkCardNumber($_POST['cardType'], $_POST['cardNumber']))){
            $formOk = false;
            echo "<p>You must enter a valid card number</p>";
        }

        if(!checkCardDate($_POST['cardMonth'],$_POST['cardYear'])) {
            $formOk = false;
            echo "<p>You must enter a valid card date</p>";

        }
        if (!checkCardVerification($_POST['cardType'], $_POST['cardValidation'])) {
            $formOk = false;
            echo "<p>Please enter a vaild CVC</p>";
        }



    if($formOk == true){
        echo "<p>Success!</p>";
    }
  }
    ?>

</main>
<?php include("footer.php"); ?>
</body>
