<?php
if (session_id() === "") {
    session_start();
}
$_SESSION['lastPage'] = $_SERVER['PHP_SELF'];

?>
<header>
    <?php
    if (isset($scriptList) && is_array($scriptList)) {
        foreach ($scriptList as $script) {
            echo "<script src='$script'></script>";
        }
    }
    ?>
    <h1>RentADog</h1>
    <hr>
    <div id="user">

                <?php if (isset($_SESSION['authenticatedUser'])) { ?>
                    <div id="logout">
                        <p>Welcome, <?php echo$_SESSION['authenticatedUser'];?> <span id="logoutUser"></span></p>
                        <form id="logoutForm" action="logout.php">
                            <input type="submit" id="logoutSubmit" value="Logout">
                        </form>
                    </div>
                <?php } else { ?>
        <div id="login">
             <form id="loginForm" action="login.php" method="POST">
                    <label for="loginUser">Username: </label>
                    <input type="text" name="loginUser" id="loginUser"><br>
                    <label for="loginPassword">Password: </label>
                    <input type="password" name="loginPassword" id="loginPassword"><br>
                    <input type="submit" id="loginSubmit" value="Login">
                    <a href = "register.php" class="submit">Register<a/>
             </form>
        </div>
                <?php } ?>
    </div>
    <nav class="navMenu">
        <ul>
            <?php
            if ($currentPage === 'index.php') {
            echo "<li> Home";
                } else {
                echo "<li> <a href='index.php'>Home</a>";
                }
            if ($currentPage === 'localParks.php') {
            echo "<li> Map";
                } else {
                echo "<li> <a href='localParks.php'>Map</a>";
                }
            if (isset($_SESSION['role'])) {
                if($_SESSION['role']==='admin') {
                    if ($currentPage === 'admin.php') {
                        echo "<li> Admin";
                    } else {
                        echo "<li> <a href='admin.php'>Admin</a>";
                    }
                }else {
                }
            }
//            if (isset($_SESSION['authenticatedUser'])) {
//                if ($currentPage === 'Cart.php') {
//                    echo "<li> Cart";
//                } else {
//                    echo "<li> <a href='Cart.php'>Cart</a>";
//                }
//            }else{
//                echo "<li>Please Login to view your Cart";
//            }
//            if (isset($_SESSION['authenticatedUser'])) {
//                    if ($currentPage === 'orders.php') {
//                        echo "<li> Orders";
//                    } else {
//                        echo "<li> <a href='orders.php'>Orders</a>";
//                    }
//            }else{
//                echo "<li>Please Login to view Orders";
//            }
            ?>
        </ul>
    </nav>
</header>


