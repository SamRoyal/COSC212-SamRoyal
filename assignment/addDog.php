<?php
/* Script that adds a dog to the animals.json file.
*  After adding a dog the $_SESSION variables for the dog characteristics
*  are unset (this is for the edit dog function).
*  @author Sam Royal
*  COSC212 Assignment 2
*/
session_start();
unset($_SESSION['dogname']);
unset($_SESSION['dogSize']);
unset($_SESSION['dogid']);
unset($_SESSION['dogtype']);
unset($_SESSION['dogDescription']);
unset($_SESSION['dogPrice']);

$dogID = str_pad((int)$_POST['dogid'], 3, '0', STR_PAD_LEFT);

//creation of new dog.
$dog = array(
    'dogId' => 'DW-'.$dogID,
    'dogName' => $_POST['dogname'],
    'dogType' => $_POST['dogtype'],
    'dogSize' => $_POST['dogSize'],
    'description' => $_POST['dogDescription'],
    'pricePerHour' => $_POST['dogPrice']
);

$inp = file_get_contents('json/animals.json');
$tempArray = json_decode($inp,true);
array_push($tempArray['animals']['dogs'],$dog);
$jsonData = json_encode($tempArray);
file_put_contents('json/animals.json',$jsonData );


header('Location:admin.php');
exit;
?>



