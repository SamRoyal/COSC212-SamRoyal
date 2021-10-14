<?php
if (session_id() === "") {
    session_start();
}
$_SESSION['lastPage'] = $_SERVER['PHP_SELF'];


function addReviewForm($xmlFileName) {
    if (isset($_SESSION['authenticatedUser'])) {
        echo "<form action='addReview.php' method='POST'>";
        echo " <input type='hidden' name='xmlFileName' value='$xmlFileName'>";
        echo "<select name='review' value='review'>
            <option value='1'>1</option> 
            <option value='2'>2</option>
            <option value='3'>3</option>
            <option value='4'>4</option>
            <option value='5'>5</option>
            <option value='6'>6</option>
            </select>";
        echo"<input type='submit' value = 'Submit' name = 'submitReview'>";
        echo"</form>";
            }
}
?>
<header>
    <?php
    if (isset($scriptList) && is_array($scriptList)) {
        foreach ($scriptList as $script) {
            echo "<script src='$script'></script>";
        }
    }
    ?>
    <h1>Classic Cinema</h1>
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
    <nav>
        <ul>
            <?php
            if ($currentPage === 'index.php') {
            echo "<li> Home";
                } else {
                echo "<li> <a href='index.php'>Home</a>";
                }
            if ($currentPage === 'classic.php') {
            echo "<li> Classic";
                } else {
                echo "<li> <a href='classic.php'>Classic</a>";
                }
               if ($currentPage === 'scifi.php') {
            echo "<li> Scifi";
                } else {
                echo "<li> <a href='scifi.php'>Scifi</a>";
                }
           if ($currentPage === 'hitchcock.php') {
            echo "<li> Hitchcock";
                } else {
                echo "<li> <a href='hitchcock.php'>Hitchcock</a>";
                }
            if ($currentPage === 'contact.php') {
            echo "<li> Contact";
                } else {
                echo "<li> <a href='contact.php'>Contact</a>";
                }
            if (isset($_SESSION['authenticatedUser'])) {
                if ($currentPage === 'Cart.php') {
                    echo "<li> Cart";
                } else {
                    echo "<li> <a href='Cart.php'>Cart</a>";
                }
            }else{
                echo "<li>Please Login to view your Cart";
            }
            if (isset($_SESSION['authenticatedUser'])) {
                    if ($currentPage === 'orders.php') {
                        echo "<li> Orders";
                    } else {
                        echo "<li> <a href='orders.php'>Orders</a>";
                    }
            }else{
                echo "<li>Please Login to view Orders";
            }
            ?>
        </ul>
    </nav>
</header>


