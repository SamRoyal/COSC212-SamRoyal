
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Classic Cinema</title>
    <meta charset="utf-8">
    <link rel = "stylesheet" href="style.css">
</head>
<main>
<div>
<?php
$currentPage = basename($_SERVER['PHP_SELF']);
$scriptList =array('jQuery-1.11.3.min.js');
include('htaccess/header.php');
?>




<?php
if (isset($_SESSION['authenticatedUser'])) {
    $orders = simplexml_load_file('htaccess/orders.xml');
    foreach ($orders->order as $order) {
        $name = $order->delivery->deliveryName;
        echo "</p>Name: $name<p>";
        $email = $order->delivery->deliveryEmail;
        echo "</p>Email: $email<p>";
        $address1 = $order->delivery->deliveryAddress1;
        echo "</p>Address: $address1<p>";
        $address2 = $order->delivery->deliveryAddress2;
        echo "</p>Address: $address2<p>";
        $city = $order->delivery->deliveryCity;
        echo "</p>City: $city<p>";
        $postcode = $order->delivery->deliveryPostcode;
        echo "</p>Postcode: $postcode<p>";

        $items = $orders->xpath('//item');
        foreach ($items as $item) {
            $itemName = $item->title;
            $itemPrice = $item->price;

            echo "</p>Purchased: $itemName<p>";
            echo "</p>Price: $itemPrice<p>";

        }
    }
}else{
    echo '<p>Please log in</p>';
}

?>


</main>
</div>

<div>
<?php include("htaccess/footer.php"); ?>
</div>




</html>
