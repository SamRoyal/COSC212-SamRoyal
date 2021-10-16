<?php
/* Script that adds a booking to the bookings.json file.
*  @author Sam Royal
*  COSC212 Assignment 2
*/
$booking = ($_POST['booking']);
$inp = file_get_contents('json/bookings.json');
$tempArray = json_decode($inp,true);
array_push($tempArray['bookings']['booking'],$booking);
$jsonData = json_encode($tempArray);
file_put_contents('json/bookings.json',$jsonData );
?>