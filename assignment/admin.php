<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>RentADog</title>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
$currentPage = basename($_SERVER['PHP_SELF']);
$scriptList =array('js/jquery/jQuery-1.11.3.min.js');
include('htaccess/header.php');
?>
<main>
    <?php
    //restricts the admin page to only users logged on in an admin account.
    if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] === 'admin') {
            ?>
            <div id="adminPage">
                <section id="bookingPane">
                    <h2>
                        Current Bookings
                    </h2>
                    <hr>
                    <?php
                    //Displays current bookings
                    $json = file_get_contents('json/bookings.json');
                    $currentBookings = json_decode($json, true);
                    foreach ($currentBookings as $bookings) {
                        foreach ($bookings as $booking) {
                            foreach ($booking as $book) {
                                $delete = $book['name'];
                                echo '<form id="cancelForm" action="cancelBooking.php" method="POST">';
                                echo "<input type='hidden' name='nameofBooking' value='$delete'>";
                                echo '<p>' . $book['name'] . '<br>';
                                foreach ($book['dogId'] as $dogID) {
                                    echo($dogID . ",");
                                }
                                echo '<br>';
                                echo $book['pickup']['day'] . '/' . $book['pickup']['month'] . '/' . $book['pickup']['year'] . '<br>';
                                echo $book['pickup']['time'] . ' for: ' . $book['numHours'] . ' Hours <br>';
                                echo '<input type="submit" name="cancelBooking" value="Cancel">';
                                echo '</form>';
                            }
                        }
                    }

                    ?>
                </section>
                <section id="dogPane">
                    <h2>
                        Current Dogs
                    </h2>
                    <hr>
                    <?php
                    //Displays current dogs.
                    $json = file_get_contents('json/animals.json');
                    $currentAnimals = json_decode($json, true);
                    foreach ($currentAnimals as $animals) {
                        foreach ($animals as $dogs) {
                            foreach ($dogs as $dog) {
                                $edit = $dog['dogId'];
                                echo '<form id="editForm" action="editDog.php" method="POST">';
                                echo "<input type='hidden' name='idforEdit' value='$edit'>";
                                echo '<p>' . $dog['dogId'] . '<br>';
                                echo $dog['dogName'] . "--" . $dog['dogType'] . "--" . $dog['dogSize'] . '<br>';
                                echo $dog['description'] . '<br>';
                                echo $dog['pricePerHour'] . '</p>';
                                echo '<input type="submit" name="editDog" value="Edit">';
                                echo '</form>';
                                echo '<form id="removeDog" action="removeDog.php" method="POST">';
                                echo '<input type="submit" name="removeDog" value="Remove">';
                                echo "<input type='hidden' name='idforRemove' value='$edit'>";
                                echo '</form>';
                            }
                        }
                    }
                    ?>

                </section>
                <section id="addPane">
                    <h2>
                        Add Dog
                    </h2>
                    <hr>
                    <form id="addForm" action="addDog.php" method="POST">
                        <label for="dogname">Dogs Name: </label>
                        <input type="text" name="dogname" id="dogname"<?php if (isset($_SESSION['dogname'])) {
                            $dogname = $_SESSION['dogname'];
                            echo "value=\"$dogname\"";
                        }
                        ?> ><br>
                        <label for="dogid">Dog ID Number: </label>
                        <input type="number" name="dogid" id="dogid"<?php if (isset($_SESSION['dogid'])) {
                            $dogid = $_SESSION['dogid'];
                            echo "value=\"$dogid\"";
                        }
                        ?>><br>

                        <label for="dogtype">Dog Type: </label>
                        <input type="text" name="dogtype" id="dogtype"<?php if (isset($_SESSION['dogtype'])) {
                            $dogtype = $_SESSION['dogtype'];
                            echo "value=\"$dogtype\"";
                        }
                        ?>><br>
                        <label for="dogSize">Dog Size: </label>
                        <select name="dogSize" id="dogSize">
                            <option value="Small"<?php if (isset($_SESSION['dogSize'])) {
                                if ($_SESSION['dogSize'] === "Small") {
                                    echo "selected";
                                }
                            }
                            ?>>Small
                            </option>
                            <option value="Medium"<?php if (isset($_SESSION['dogSize'])) {
                                if ($_SESSION['dogSize'] === "Medium") {
                                    echo "selected";
                                }
                            }
                            ?>>Medium
                            </option>
                            <option value="Large"<?php if (isset($_SESSION['dogSize'])) {
                                if ($_SESSION['dogSize'] === "Large") {
                                    echo "selected";
                                }
                            }
                            ?>>Large
                            </option>
                            <option value="Huge"<?php if (isset($_SESSION['dogSize'])) {
                                if ($_SESSION['dogSize'] === "Huge") {
                                    echo "selected";
                                }
                            }
                            ?>>Huge
                            </option>
                        </select><br>
                        <label for="dogDescription">Dog Description: </label>
                        <input type="text" name="dogDescription"<?php if (isset($_SESSION['dogDescription'])) {
                            $dogDescription = $_SESSION['dogDescription'];
                            echo "value=\"$dogDescription\"";
                        }
                        ?>><br>
                        <label for="dogPrice">Dog Price: </label>
                        <input type="text" name="dogPrice"<?php if (isset($_SESSION['dogPrice'])) {
                            $dogPrice = $_SESSION['dogPrice'];
                            echo "value=\"$dogPrice\"";
                        }
                        ?>><br>
                        <input type="submit" name="adddog" value="Add Dog">
                    </form>
                </section>
            </div>
            <?php
        }
    }

    ?>

</main>

<?php
include('htaccess/footer.php');
?>
</body>
</html>