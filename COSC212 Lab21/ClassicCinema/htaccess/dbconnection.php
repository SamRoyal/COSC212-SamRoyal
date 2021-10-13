<?php
$conn = new mysqli('sapphire', 'sroyal', 'roysa235', 'sroyal_dev');
if ($conn->connect_errno) {
    echo "Could not connect to database.";
}
?>