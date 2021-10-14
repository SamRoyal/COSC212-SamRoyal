<!DOCTYPE html>
<html lang="en">
<head>
    <title>Classic Cinema</title>
    <meta charset="utf-8">
    <link rel = "stylesheet" href="style.css">
</head>
<main>
    <div>
        <?php
        $currentPage = basename($_SERVER['PHP_SELF']);
        $scriptList =array('jQuery-1.11.3.min.js');
        include('htaccess/header.php');
        include('htaccess/dbconnection.php');
        ?>
        <form id="registration" action="register.php" method="GET">
            <p>
                <label for="username">Username:</label>
                <input id="username" type="text" name="username">
            </p>
            <p>
                <label for="password">Password:</label>
                <input id="password" type="text" name="password">
            </p>
            <p>
                <label for="passwordconfirm">Confirm Password:</label>
                <input id="passwordconfirm" type="text" name="passwordconfirm">
            </p>
            <p>
                <label for="email">Email:</label>
                <input id="email" type="text" name="email">
            </p>
            <p>
                <input type="submit" id="registerSubmit" value="Register" name="submit">
            </p>
        </form>
        <?php
        $formokay = false;
        if(isset($_GET['submit'])) {
            $formokay = true;
            if(strlen(trim($_GET['username']))> 0 && strlen(trim($_GET['password']))> 0){
                $user = $conn->real_escape_string($_GET['username']);
            }else{
                $formokay=false;
                echo"USERNAME OR PASSWORD CANNOT BE EMPTY";
            }
            if($_GET['password'] == $_GET['passwordconfirm']){
               $password = $conn->real_escape_string(sha1($_GET['password']));
            }else{
                $formokay=false;
                echo "Passwords do not match";
            }

            $query = "SELECT * FROM Users WHERE username = '$user'";
            $result = $conn->query($query);
            if ($result->num_rows === 0 && $formokay==true) {
                echo "Successfully Registered";
            } else {
                $formokay=false;
                echo "THIS USERNAME IS TAKEN";
            }
            if($formokay) {
                $email = $conn->real_escape_string($_GET['email']);
                $query = "INSERT INTO Users (username, password, email) " . "VALUES ('$user', ('$password'),'$email')";
                $conn->query($query);
                if ($conn->error) {
                    echo"Something went wrong";
                }
            }
            $result->free();
            $conn->close();
        }
        ?>



        <?php include("htaccess/footer.php"); ?>

    </div>

</main>


</html>


