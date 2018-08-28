<?php

require_once 'db_connect.php';

$output = array('data' => array());

$sql = "SELECT * FROM laboratory_test_menu INNER JOIN performed_tests ON laboratory_test_menu.id=performed_tests.test_id ORDER BY reception_time DESC";
$query = $con->query($sql);

while ($row = $query->fetch_assoc()) {
     $completeButton = '
     <button type="button" class="btn btn-success" onclick="completeTest('.$row['id'].')"  data-toggle="modal" data-target="#complete_adding_a_test">
      complete test
     </button>
    ';
    $update = '<button onclick="GetTestDetails('.$row['id'].')" class="btn btn-warning btn-sm">Update</button>';
    $delete = '<button onclick="DeleteTest('.$row['id'].')" class="btn btn-danger btn-sm">Delete</button>';
    $mark = 'Completed <i class="fa fa-check-circle" style="font-size:30px;" align="center" ></i>';
    if($row['dispatch_time'] == null){
        $output['data'][] = array(
        $row['sample_id'],
        $row['test'],
        $row['reception_time'],
        $row['dispatch_time'],
        $row['actual_time'],
        $completeButton,
        $update,
        $delete
    );
    }
    else {
        $output['data'][] = array(
        $row['sample_id'],
        $row['test'],
        $row['reception_time'],
        $row['dispatch_time'],
        $row['actual_time'],
        $mark,
        $update,
        $delete
        );
  }
}

// database conion close
$con->close();

echo json_encode($output);
