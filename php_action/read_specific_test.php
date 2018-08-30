<?php
// include Database connection file
require_once("db_connect.php");
 
// check request
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // get User ID
    $test_id = $_POST['id'];
 
    // Get User Details
    $query = "SELECT * FROM laboratory_test_menu INNER JOIN performed_tests ON laboratory_test_menu.id=performed_tests.test_id WHERE performed_tests.id = $test_id ";
    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }
    $response = array();
    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response = [
                $row['sample_id'],
                $row['test'],
                DateTime::createFromFormat('Y-m-d H:i:s',$row['reception_time'])->format('d/m/Y H:i:s'),
                DateTime::createFromFormat('Y-m-d H:i:s', $row['dispatch_time'])->format('d/m/Y H:i:s')
            ];
        }
    }
    else
    {
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }
    // display JSON data
    echo json_encode($response);
}
else
{
    $response['status'] = 200;
    $response['message'] = "Invalid Request!";
}