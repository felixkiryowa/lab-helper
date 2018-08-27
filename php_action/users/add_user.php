<?php
     require_once('../db_connect.php');
        // get values
        $names = $_POST['name'];
        $username = $_POST['username'];
        $password = sha1($_POST['password']);
 
        $query = "INSERT INTO users(name,username,password) VALUES('$names', '$username', '$password')";
        if (!$result = mysqli_query($con, $query)) {
            exit(mysqli_error($con));
        }
        echo "<script> alert('1 Record Added!');</script>";
    
?>