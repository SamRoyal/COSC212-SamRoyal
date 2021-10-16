<?php
/* Script allows a a page user to logout of the site.
*  @author Sam Royal
*  COSC212 Assignment 2
*/
if (session_id() === "") {
    session_start();
}
if($_SESSION['lastPage']!=null) {
    $lastPage = $_SESSION['lastPage'];
}else{
    $lastPage = 'index.php';
}
unset($_SESSION['authenticatedUser']);
unset($_SESSION['role']);
$_SESSION = array();
session_destroy();
header('Location:'. $lastPage);
exit;
?>
