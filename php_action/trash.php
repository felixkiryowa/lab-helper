<?php

// include Database connection file
    require_once("db_connect.php");


if(isset($_POST['delete']))
{
    
    $selected_month = $_POST['selected_month'];
    if($selected_month != ""){
            // delete User
        $query = "DELETE FROM performed_tests WHERE month = '$selected_month'";
        if (!$result = mysqli_query($con, $query)) {
            exit(mysqli_error($con));
        }else{
            echo "
            <script>
            alert('".$selected_month." data has been deleted');
            window.location.href='../dashboard.php';
            </script>";
            
        }
    }else{
        echo "<script>
        alert('No month has been selected');
        window.location.href='../dashboard.php';
        </script>";  
        
    }
 
   
}
?>
