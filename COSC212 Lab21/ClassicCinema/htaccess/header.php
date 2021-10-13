
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
        <div id="login">
            <form id="loginForm">
                <label for="loginUser">Username: </label>
                <input type="text" name="loginUser" id="loginUser"><br>
                <label for="loginPassword">Password: </label>
                <input type="password" name="loginPassword" id="loginPassword"><br>
                <input type="submit" id="loginSubmit" value="Login">
                <a href = "register.php" class="submit">Register<a/>
            </form>
        </div>
        <div id="logout">
            <p>Welcome, <span id="logoutUser"></span></p>
            <form id="logoutForm">
                <input type="submit" id="logoutSubmit" value="Logout">
            </form>
        </div>
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
            if ($currentPage === 'Cart.php') {
            echo "<li> Cart";
                } else {
                echo "<li> <a href='Cart.php'>Cart</a>";
                }
            if ($currentPage === 'orders.php') {
                echo "<li> Orders";
            } else {
                echo "<li> <a href='orders.php'>Orders</a>";
            }
            ?>
        </ul>
    </nav>
</header>


