<?php
session_start();


if($_SESSION['lastPage']!=null) {
    $lastPage = $_SESSION['lastPage'];
}else{
    $lastPage = 'index.php';
}


if (isset($_SESSION['authenticatedUser'])) {
    $reviews = simplexml_load_file($_POST['xmlFileName']);
    $review = $reviews->addChild('review');
    $review->addChild('user', $_SESSION['authenticatedUser']);
    $review->addChild('rating', $_POST['review']);
}
$reviews->saveXML($_POST['xmlFileName']);


header('Location:'.$lastPage);
exit;

?>