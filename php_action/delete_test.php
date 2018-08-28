<?php
// check request
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // include Database connection file
    require_once("db_connect.php");
 
    // get user id
    $test_id = $_POST['id'];
 
    // delete User
    $query = "DELETE FROM performed_tests WHERE id = '$test_id'";
    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }else{
        echo "<script>alert('Test has been deleted');</script>";
    }
}
?>
