<?php

require_once 'db_connect.php';

$specific_test = $_POST['specific_test'];

$sql1 = "SELECT * FROM laboratory_test_menu WHERE test = '$specific_test'";
$query1 = $con -> query($sql1);
$row2 = $query1->fetch_assoc();

$test_id = $row2['id'];
$turn_around_time = $row2['turn_around_time'];
echo $turn_around_time."<br>";
$sql = "SELECT * FROM performed_tests WHERE test_id = $test_id";
echo $sql."<br>";
$query = $con->query($sql);
$fine_array = array();
$not_fine_array = array();
                                 
while ($row = $query->fetch_assoc()){
      echo $row['elapsed_time'] ."<br>";
      $stella =  $row['elapsed_time'];
    if($stella <= $turn_around_time){
           array_push($fine_array,$row['elapsed_time']);
    }else{
           array_push($not_fine_array,$row['elapsed_time']);
    }

}

$fine_array_count = count($fine_array);
$not_fine_array_count = count($not_fine_array);

$merge_array = array('fine'=>$fine_array_count,'notfine'=>$not_fine_array_count);
print_r($fine_array);
print_r($not_fine_array);
//$result = $query->fetch_assoc();

// if(!empty($fine_array)){
//     print_r($fine_array);
// }else{
//     print_r($not_fine_array);
// }

$con->close();

echo json_encode($merge_array);

?>
