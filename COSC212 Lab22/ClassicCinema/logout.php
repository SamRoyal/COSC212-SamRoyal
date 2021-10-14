
<?php
if (session_id() === "") {
    session_start();
}
if($_SESSION['lastPage']!=null) {
    $lastPage = $_SESSION['lastPage'];
}else{
    $lastPage = 'index.php';
}
unset($_SESSION['authenticatedUser']);
header('Location:'. $lastPage);
exit;
?>
