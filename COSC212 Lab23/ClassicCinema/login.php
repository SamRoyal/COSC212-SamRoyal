<?php
session_start();

        if($_SESSION['lastPage']!=null) {
            $lastPage = $_SESSION['lastPage'];
        }else{
            $lastPage = 'index.php';
        }
        include('htaccess/dbconnection.php');
        $password = sha1($_POST['loginPassword']);
        $username = $_POST['loginUser'];
        $query = "SELECT * FROM Users WHERE username = '$username'";
        $result = $conn->query($query);
        if ($result->num_rows === 1) {
            $query = "SELECT * FROM Users WHERE password = '$password'";
            $result = $conn->query($query);
            $row = $result->fetch_assoc();
            $role = $row['role'];
            if ($result->num_rows === 1) {
                $_SESSION['authenticatedUser'] = $username;
                $_SESSION['role'] = $role;
            }else{
                echo '<p>Incorrect Password</p>';
            }
        } else {
            echo '<p>Incorrect Username</p>';
        }

        header('Location:'. $lastPage);
        exit;
        ?>