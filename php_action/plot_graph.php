<?php

        require_once 'db_connect.php';
        
        $month = $_POST['month'];
        $sql = "SELECT * FROM laboratory_test_menu INNER JOIN performed_tests ON laboratory_test_menu.id=performed_tests.test_id ORDER BY test_id";
        $query = $con->query($sql);
        $current_cat = null;
        $test_array = array();
        $all_test_data = array();
        $fine_array = array();
        $not_fine_array = array();
        $save_fine =array();
        $save_not_fine = array();
        while($row = $query->fetch_assoc())
            {
                if($row['dispatch_time'] == null){

                }else{
                if(in_array($row['test'],$test_array)){

                }else{
                array_push($test_array,$row['test']);
                }
                }
                

        }
        
            foreach ($test_array as $value) {
                    $sql1 = "SELECT * FROM laboratory_test_menu WHERE test = '$value'";
                    $query1 = $con -> query($sql1);
                    $row2 = $query1->fetch_assoc();
                    $test_id = $row2['id'];
                    $turn_around_time = $row2['turn_around_time'];
                    //echo $turn_around_time."<br>";
                    $sql = "SELECT * FROM performed_tests WHERE test_id = $test_id  AND month='$month'";

                    //echo $sql."<br>";
                    $query = $con->query($sql);
                    while ($row = $query->fetch_assoc()){
                    $stella =  $row['elapsed_time'];
                    
                    if($stella <= $turn_around_time){
                            array_push($fine_array,$row['elapsed_time']);
                    }else{
                            array_push($not_fine_array,$row['elapsed_time']);
                    }
                        
                    }
                $fine_array_count = count($fine_array);
                $not_fine_array_count = count($not_fine_array);
                array_push($save_fine,$fine_array_count);
                array_push($save_not_fine,$not_fine_array_count);

                //unset($not_fine_array);
                array_splice($fine_array,0);
                array_splice($not_fine_array,0);
                
            

            }
        $response = array();
        $response =[
            $test_array,
            $save_fine,
            $save_not_fine
        ];

      echo json_encode($response);                               
                                       
    ?>