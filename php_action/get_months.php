<?php
require_once 'db_connect.php';

$sql = "SELECT month FROM performed_tests";

$result = mysqli_query($con,$sql);

$months_arr = array();
$all_months_array = array();

while( $row = mysqli_fetch_array($result) ){
     if(in_array($row['month'],$all_months_array)){

    }else{
    array_push($all_months_array,$row['month']);
    }
    //$month = $row['month'];

    //$months_arr[] = array("month" =>$month);
}

// encoding array to json format
echo json_encode($all_months_array);
?>