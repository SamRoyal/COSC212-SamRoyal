<?php
/* Script that removes a dog from the animals.json file. This PHP file also
*  deals with a booked dog being deleted. If the dog is the only dog in the
*  booking then the whole booking is removed, otherwise just the reference
*  to the dog is removed.
*  @author Sam Royal
*  COSC212 Assignment 2
*/
session_start();
$data = file_get_contents('json/animals.json');

// decode json to associative array
$json_arr = json_decode($data, true);

// get array index to delete

$i=0;

foreach($json_arr as $animals){
    foreach($animals as $dogs){
        foreach($dogs as $dog) {
            if ($dog['dogId'] == $_POST['idforRemove']) {
                unset($json_arr['animals']['dogs'][$i]);

            }
            $i++;
        }
    }
}



$json_arr['animals']['dogs'] = array_values($json_arr['animals']['dogs']);

//encode array to json and save to file
file_put_contents('json/animals.json', json_encode($json_arr));


$data = file_get_contents('json/bookings.json');

// decode json to associative array
$json_arr = json_decode($data, true);

// get array index to delete

$i = 0;

foreach ($json_arr as $bookings) {
    foreach ($bookings as $booking) {
        foreach ($booking as $book) {
            $j = 0;
            foreach($book['dogId'] as $dogId){
                if ($dogId == $_POST['idforRemove']) {
                    echo(count($book['dogId']));
                    if(count($book['dogId'])==1) {
                        unset($json_arr['bookings']['booking'][$i]);
                    }else{
                        unset($json_arr['bookings']['booking'][$i]['dogId'][$j]);
                    }
                }
                $j++;

            }
            $i++;
        }

    }
}
//$json_arr['bookings']['booking']['dogId'] = array_values($json_arr['bookings']['booking']['dogId']);
$json_arr['bookings']['booking'] = array_values($json_arr['bookings']['booking']);

//encode array to json and save to file
file_put_contents('json/bookings.json', json_encode($json_arr));


header('Location: admin.php');
exit;

?>
