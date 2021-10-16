
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