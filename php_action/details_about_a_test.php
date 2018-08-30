   <?php

            require_once 'db_connect.php';

            $sql = "SELECT test FROM laboratory_test_menu INNER JOIN performed_tests ON laboratory_test_menu.id=performed_tests.test_id";
            $query = $con->query($sql);
            $test_array = array();
            
            while ($row = mysqli_fetch_array($query) ) {
                if(in_array($row['test'],$test_array)){

                }else{
                array_push($test_array,$row['test']);
                }
        
            }

            // echo json_encode($test_array);

            $test_details ='';
            foreach ($test_array as  $value) {
                //"<li><a href='#' id='' ></a></li>"
                $sql1 = "SELECT * FROM laboratory_test_menu WHERE test='$value'";
                $query1 = $con->query($sql1);
                $row1 = $query1->fetch_assoc();
                $id =$row1['id'];
                $test_details .= '<li><a href="#"  onclick="SpecificTest('.$id.')" >'.$value.'</a></li>';
            }
            // echo $test_details;
            // $response = array();

            // $response = $test_array;

            echo $test_details;
                              
 ?>