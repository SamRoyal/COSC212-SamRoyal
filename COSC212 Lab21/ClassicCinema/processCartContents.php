<?php
session_start();
?>
<table>
    <?php
$arr = json_decode(file_get_contents("php://input"));
foreach ($arr as $value){
    echo '<tr><th>';
    echo $value->title;
    echo '</th><th>';
    echo $value->price;
    echo '</th></tr>';
}
?>
</table>

<?php
$orders = simplexml_load_file('htaccess/orders.xml');
$newOrder = $orders->addChild('order');
$delivery = $newOrder->addChild('delivery');


$delivery->addChild('deliveryName', $_SESSION['deliveryName']);
$delivery->addChild('deliveryEmail', $_SESSION['deliveryEmail']);
$delivery->addChild('deliveryAddress1', $_SESSION['deliveryAddress1']);
$delivery->addChild('deliveryAddress2', $_SESSION['deliveryAddress2']);
$delivery->addChild('deliveryCity', $_SESSION['deliveryCity']);
$delivery->addChild('deliveryPostcode', $_SESSION['deliveryPostcode']);

$items = $newOrder->addChild('items');
foreach ($arr as $value){
    $item = $items->addChild('item');
    $item->addChild('title',$value->title);
    $item->addChild('price',$value->price);

}

$orders->saveXML('htaccess/orders.xml');

echo'<script type="text/javascript">
          localStorage.clear();
           </script>';

$_SESSION = array();
session_destroy();

?>
