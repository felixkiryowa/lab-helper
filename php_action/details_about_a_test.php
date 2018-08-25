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

                
            foreach ($test_array as  $value) {
                echo '<li><a href="#" id="'.$value.'" class="specific_test" >'.$value.'</a></li>';
            }

                              
 ?>