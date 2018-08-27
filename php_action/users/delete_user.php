<?php
// check request
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // include Database connection file
    require_once("../db_connect.php");
 
    // get user id
    $user_id = $_POST['id'];
 
    // delete User
    $query = "DELETE FROM users WHERE id = '$user_id'";
    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }else{
        echo "<script>alert('1 user has been deleted');</script>";
    }
}
?>
