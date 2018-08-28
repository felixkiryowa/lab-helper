<?php
// include Database connection file
include("../db_connect.php");
 
// check request
if(isset($_POST))
{
    // get values
    $id = $_POST['id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql1 = "SELECT * FROM users";
    $query2 = $con->query($sql1);
    $result = $query2->fetch_assoc();
    // Updaste User details
    $query = "UPDATE users SET name = '$name', username = '$username', password = ' $password' WHERE id = '$id'";
    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }
 
   

}