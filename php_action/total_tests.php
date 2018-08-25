 <?php

    require_once 'db_connect.php';

    $sql = "SELECT * FROM  performed_tests";
    $query40 = $con->query($sql);
    $total_tests_done = mysqli_num_rows($query40);
    
    echo "<p align='center' > Total Test Done : <b style='color:red;'>".$total_tests_done."</b></p>"

?>