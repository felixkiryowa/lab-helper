  <?php

        require_once 'php_action/db_connect.php';

        $sql = "SELECT test FROM laboratory_test_menu INNER JOIN performed_tests ON laboratory_test_menu.id=performed_tests.test_id";
        $query = $con->query($sql);
        $test_array = array();
        $x = array();
        while ($row = mysqli_fetch_array($query) ) {
            if(in_array($row['test'],$test_array)){

            }else{
               array_push($test_array,$row['test']);
            }
    
        }

        echo json_encode($test_array);

            
        foreach ($output_array as  $value) {
            echo '<li><a href="index.html">'.$value.'</a></li>';
        }

        $x = date('m');
        echo $x;

    
    ?>