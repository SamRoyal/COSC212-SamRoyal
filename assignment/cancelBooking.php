
<?php
/* Script that removes a booking from the bookings.json file.
*  @author Sam Royal
*  COSC212 Assignment 2
*/

$data = file_get_contents('json/bookings.json');

// decode json to associative array
$json_arr = json_decode($data, true);

// get array index to delete

$i=0;
echo $_POST['nameofBooking'];

foreach($json_arr as $bookings){
    foreach($bookings as $booking){
        foreach($booking as $dog) {
            if ($dog['name'] == $_POST['nameofBooking']) {
                unset($json_arr['bookings']['booking'][$i]);

            }
            $i++;
        }
    }
}


//re formats json array ready for encoding.
$json_arr['bookings']['booking'] = array_values($json_arr['bookings']['booking']);

//encode array to json and save to file
file_put_contents('json/bookings.json', json_encode($json_arr));


header('Location: admin.php');
exit;
?>

