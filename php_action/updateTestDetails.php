<?php
require_once 'db_connect.php'; //if form is submitted if($_POST) { $validator = array('success' => false, 'messages' => array());

     # code...
    $validator = array('success' => false ,'messages' =>array());
    $id = $_POST['specific_test_id'];
    $sample_id = $_POST['update_sample_id'];
    $test = $_POST['update_test'];
    $receptiondatetime = $_POST['receptiondatetime'];
    $dispatchdatetime = $_POST['dispatchdatetime'];
    echo $receptiondatetime;
    echo $dispatchdatetime;
    $prefered_format1 = DateTime::createFromFormat('d/m/Y H:i:s',$dispatchdatetime)->format('Y-m-d H:i:s');
    $second_date = new DateTime($prefered_format1);
    $prefered_format2 = DateTime::createFromFormat('d/m/Y H:i:s',$receptiondatetime)->format('Y-m-d H:i:s');
    $first_date = new DateTime($prefered_format2);


    $sql1 = "SELECT * FROM laboratory_test_menu WHERE test = '$test'";
    $ff = $con -> query($sql1);
    $row2 = $ff->fetch_assoc();

    $updated_test_id = $row2['id'];

    $interval = $first_date->diff($second_date);
    $days = $interval->format('%a');
    $hours = $interval->format('%h');
    $minutes = $interval->format('%i');
    $seconds = $interval->format('%s');

    //Converting Days To Hours
    $days_to_hours = ($days * 24);
    $gotten_days_to_minutes = $days_to_hours * 60;
    //Converting Hours To Minutes
    $gotten_hours_to_minute = $hours * 60;
    //Gotten Minutes
    $gotten_minutes = $minutes;
    //Gotten Seconds
    $consumed_seconds = $seconds/60;
    $gotten_seconds_to_minutes = (integer)$consumed_seconds;

    //Total Time Consumed in Minutes
    $total_time = $gotten_days_to_minutes + $gotten_hours_to_minute + $gotten_minutes + $gotten_seconds_to_minutes;
    //For users To Understand
    $actual_time = $interval->format('%a Days:%h hours:%i minutes:%s seconds');
    

    echo $prefered_format1 ."<br>";
    echo $total_time ."<br>";
     echo $actual_time;

   
     $update_query = "UPDATE performed_tests SET sample_id='$sample_id',test_id='$updated_test_id',reception_time = '$prefered_format2', dispatch_time = '$prefered_format1',elapsed_time = '$total_time',actual_time = '$actual_time' WHERE id='$id'";
     $query23 = $con->query($update_query);

     if($query23 === TRUE) {
         $validator['success'] = true;
         $validator['messages'] = "Successfully Completed Updating A Given Test";
     } else {
         $validator['success'] = false;
         $validator['messages'] = "Error While Completing A  Test Data";
     }

     // close the database connection
     $con->close();

     echo json_encode($validator);


?>
