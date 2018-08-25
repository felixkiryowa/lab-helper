<?php
require_once 'db_connect.php'; //if form is submitted if($_POST) { $validator = array('success' => false, 'messages' => array());

    $sampe_id = $_POST['sample_id'];
    $receptiondatetime = $_POST['receptiondatetime'];
    $test = $_POST['test'];
    $prefered_format = DateTime::createFromFormat('d/m/Y H:i:s',$receptiondatetime)->format('Y-m-d H:i:s');
    $sql1 = "SELECT * FROM laboratory_test_menu WHERE test = '$test'";
    $ff = $con -> query($sql1);
    $row2 = $ff->fetch_assoc();
    
    $test_id = $row2['id'];
    $date = date("Y-m-d");
    $month = date('M');

    $sql = "INSERT INTO performed_tests(sample_id,reception_time,test_id,day_date,month) VALUES ('$sampe_id','$prefered_format','$test_id','$date','$month')";
    
    $query = $con->query($sql);

    if($query === TRUE) {
        $validator['success'] = true;
        $validator['messages'] = "Successfully Added A Test";
    } else {
        $validator['success'] = false;
        $validator['messages'] = "Error While Adding Test Data";
    }

    // close the database connection
    $con->close();

    echo json_encode($validator);

?>
