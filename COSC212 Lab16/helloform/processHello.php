

<?php
if (strlen(trim($_GET['user']))> 0) {
    if (isset($_GET['submit'])) {
        echo "<p>Hello " . htmlentities($_GET['user']) . "</p>";
    }

} else {
?>
<form name="myForm" action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">
    <label for="user">User: </label><br>
    <input type="text" id ="user" name="user"><br>
    <input type="submit" name="submit" value="Submit">
</form>

<?php } ?>
