<?php
/* Allows an admin to edit the characteristics of a dog.
*  The selected dog is initially removed, and the characteristics are
*  auto filled into the add dog form. These can then be edited and the dog
*  can be added back to the list.
*  @author Sam Royal
*  COSC212 Assignment 2
*/
if (session_id() === "") {
    session_start();
}
$data = file_get_contents('json/animals.json');

// decode json to associative array
$json_arr = json_decode($data, true);

// get array index to delete

$i=0;

foreach($json_arr as $animals){
    foreach($animals as $dogs){
        foreach($dogs as $dog) {
            if ($dog['dogId'] == $_POST['idforEdit']) {
                $strArray = explode('-',$dog['dogId']);
                $lastElement = end($strArray);
                $_SESSION['dogname']=$dog['dogName'];
                $_SESSION['dogSize']=$dog['dogSize'];
                $_SESSION['dogid']=(int)$lastElement;
                $_SESSION['dogtype']=$dog['dogType'];
                $_SESSION['dogDescription']=$dog['description'];
                $_SESSION['dogPrice']=$dog['pricePerHour'];
                unset($json_arr['animals']['dogs'][$i]);

            }
            $i++;
        }
    }
}



$json_arr['animals']['dogs'] = array_values($json_arr['animals']['dogs']);

//encode array to json and save to file
file_put_contents('json/animals.json', json_encode($json_arr));


header('Location: admin.php');
exit;
?>
